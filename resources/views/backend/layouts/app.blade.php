<!doctype html>
<html lang="{{App::getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{getSetting()->getFrontFaviconLink()??asset('img/favicon.png')}}">
    <meta name="keyword" content="{{ setting('meta_keyword') }}">
    <meta name="description" content="{{ setting('meta_description') }}">

    <!-- Shortcut Icon -->
    <link rel="shortcut icon" href="{{getSetting()->getFrontFaviconLink()}}">
    <link rel="icon" type="image/ico" href="{{getSetting()->getFrontFaviconLink()}}"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name') }}</title>

    @stack('before-styles')

    <link rel="stylesheet" href="{{ mix('css/backend.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+Bengali+UI&display=swap" rel="stylesheet"/>
    <style>body {
            font-family: Ubuntu, "Noto Sans Bengali UI", Arial, Helvetica, sans-serif
        }</style>

    @stack('after-styles')

</head>
<body class="c-app">

<!-- Sidebar -->
@include('backend.includes.sidebar')
<!-- /Sidebar -->

<div class="c-wrapper">

    <!-- Header Block -->
@include('backend.includes.header')
<!-- / Header Block -->

    <div class="c-body">
        <main class="c-main">
            <div class="container-fluid">

                <div class="animated fadeIn" id="app">

                @include('flash::message')

                <!-- Errors block -->
                @include('backend.includes.errors')
                <!-- / Errors block -->

                    <!-- Main content block -->
                @yield('content')
                <!-- / Main content block -->

                </div>
            </div>
        </main>
    </div>


    <div class="modal fade" tabindex="-1" role="dialog" id="callCenterMISModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btn-modal-save" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer block -->
@include('backend.includes.footer')
<!-- / Footer block -->
</div>

<!-- Scripts -->
@stack('before-scripts')

<script src="{{ mix('js/backend.js') }}"></script>

<script src="{{ mix('js/vue-file-loader.js') }}"></script>
@stack('after-scripts')
<!-- / Scripts -->

<script>

    "use strict";

    $(document).ready(function () {
        const bodyTag = $("body");
        const dataTable = $(".dataTable");

        window.modalProperties = {
            actionUrl: "",
            actionType: "Show",
            methodType: "POST",
            title: "Create New",
            buttonLabel: "Save",
            size: 'md',
            deleteTextMessage: "Are You Sure?|This action can not be undone. Do you want to continue?"
        };

        window.modal = $("#callCenterMISModal");

        window.renderModal = function () {
            $(window.modal).find(".modal-title").html(window.modalProperties.title);
            $(window.modal).find("#btn-modal-save").html(window.modalProperties.buttonLabel);
            $(window.modal).find(".modal-body").html("Loading..");

            $(window.modal).find(".modal-dialog").removeClass('modal-sm modal-md modal-lg').addClass('modal-' + window.modalProperties.size);

            if (window.modalProperties.actionType == "Show") {
                $(window.modal).find("#btn-modal-save").hide();
            } else {
                $(window.modal).find("#btn-modal-save").show();
            }
        }

        function loadModal() {

            /*
            // Implement BlockUI For future usage
            $.blockUI({
                css: {
                    border: 'none',
                    padding: '15px',
                    backgroundColor: '#000',
                    '-webkit-border-radius': '10px',
                    '-moz-border-radius': '10px',
                    opacity: .5,
                    color: '#fff'
                }
            });
            */
            window.renderModal();
            axios
                .get(window.modalProperties.actionUrl)
                .then(function (response) {
                    if (response.status === 200) {
                        $(window.modal).find(".modal-body").html(response.data);
                        $(window.modal).modal();
                        /*$.unblockUI();*/
                        window.common_bind("#callCenterMISModal");
                        window.common_bind_select("#callCenterMISModal");
                    }
                })
                .catch(function (error) {
                    console.log(error);
                    /*$.unblockUI();*/
                })
                .then(function () {
                    //console.log(window.modalProperties.actionUrl);
                });
        }

        bodyTag.on("click", ".btn-datatable-row-action", function (ev) {
            ev.preventDefault();

            window.modalProperties.actionUrl = $(this).data("url");
            window.modalProperties.title = $(this).data("title");
            window.modalProperties.size = $(this).data("modal_size");

            let type = $(this).data("type");
            window.common_bind("#callCenterMISModal");
            window.common_bind_select("#callCenterMISModal");

            switch (type) {

                case 'details':
                    window.modalProperties.methodType = "GET";
                    window.modalProperties.actionType = "Show";
                    window.modalProperties.size = $(this).data("modal_size");

                    // loadModal();
                    break;
                case 'delete':
                    window.modalProperties.buttonLabel = "Delete";
                    window.modalProperties.methodType = "DELETE";
                    window.modalProperties.deleteTextMessage = $(this).data("message")

                    Swal.fire({
                        title: "Are you sure?",
                        text: window.modalProperties.deleteTextMessage,
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#FFCC00',
                        confirmButtonText: 'Delete'
                    }).then((willDelete) => {
                        if (willDelete.isConfirmed) {
                            axios({
                                method: window.modalProperties.methodType,
                                url: window.modalProperties.actionUrl,
                                config: {
                                    headers: {
                                        "Content-Type": "multipart/form-data",
                                    },
                                },
                            }).then(function (response) {
                                $.modalCallBackOnAnyChange();
                                $.load_izitoast_success_message("Success", response.data.message, "topRight");
                            }).catch(function (error) {
                            }).then(function () {
                            });
                        }
                    });
                    break;
            }
        });

        window.common_bind = function (selector = "body") {
            /*let $datepicker = $(selector + ' .datepicker');

            $datepicker.daterangepicker({
                singleDatePicker: true,
                format: 'yyyy-mm-dd',
                locale: date_picker_locale,
                todayHighlight: true,
            });*/

            /*if ($(".datetimepicker").length) {
                $('.datetimepicker').daterangepicker({
                    locale: {format: 'YYYY-MM-DD H:mm'},
                    singleDatePicker: true,
                    timePicker: true,
                    timePicker24Hour: true,
                });
            }

            // Daterangepicker
            if (jQuery().daterangepickeer) {
                if ($(".datepicker").length) {
                    $('.datepicker').daterangepicker({
                        locale: {format: 'YYYY-MM-DD'},
                        singleDatePicker: true,
                    });
                }
                if ($(".datetimepicker").length) {
                    $('.datetimepicker').daterangepicker({
                        locale: {
                            format: 'YYYY-MM-DD H:mm'
                        },
                        singleDatePicker: true,
                        timePicker: true,
                        timePicker24Hour: true,
                    });
                }
                if ($(".daterange").length) {
                    $('.daterange').daterangepicker({
                        locale: {format: 'YYYY-MM-DD'},
                        drops: 'down',
                        opens: 'right'
                    });
                }

            }

            // Timepicker
            if (jQuery().timepicker && $(".timepicker").length) {
                $(".timepicker").timepicker({
                    icons: {
                        up: 'fas fa-chevron-up',
                        down: 'fas fa-chevron-down'
                    },
                    showMeridian: false
                });
            }

            if ($(".jscolor").length) {
                jscolor.installByClassName("jscolor");
            }
            */


            if (dataTable.length) {
                dataTable.DataTable();
            }

            if ($(".summernote").length) {
                $(".summernote").summernote({
                    dialogsInBody: true,
                    minHeight: 150,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['fontname', ['fontname']],
                        ['color', ['color']],
                        ['para', ['paragraph']],
                        ['insert', ['link']],
                        ['view', ['undo', 'redo', 'fullscreen', 'help']],
                    ]
                });
            }

            if ($(".summernote-simple").length) {
                $(".summernote-simple").summernote({
                    dialogsInBody: true,
                    minHeight: 150,
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough']],
                        ['para', ['paragraph']]
                    ]
                });
            }

            if (jQuery().select2) {
                $(".select2").select2();
            }
            // if(jquery().)
            // flatpickr.js date picker
            if ($(".date-picker").length) {

                $(".date-picker").flatpickr();
            }
            // flatpickr.js time picker
            if ($(".time-picker").length) {

                $(".time-picker").flatpickr({
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                    time_24hr: true
                });
            }
        }

        window.common_bind_select = function (selector = "body") {
            if (jQuery().selectric) {
                $(".selectric").selectric({
                    disableOnMobile: false,
                    nativeOnMobile: false
                });
            }
        }
        $.load_izitoast_success_message = function (title, message, position) {
            iziToast.success({
                title: title,
                message: message,
                position: position,
            });
        }
        $.axiosGetRequest = function (route, reqDataObject,) {
            datatable.draw(false);
        }
    });
</script>
</body>
</html>
