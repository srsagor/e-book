<!doctype html>
<html lang="{{App::getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    @include('backend.includes.adminlte.header')
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo"
             height="60" width="60">
    </div>

    <!-- Navbar -->
    @include('backend.includes.adminlte.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('backend.includes.adminlte.sidebar')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @yield('breadcrumbs')

        @include('flash::message')

        <!-- Errors block -->
        @include('backend.includes.errors')
        <!-- Main content -->
            @yield('content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>

        <a class="dropdown-item" href="{{route('backend.users.profile', Auth::user()->id)}}">
            <i class="c-icon cil-user"></i>&nbsp;
            {{ Auth::user()->name }}
        </a>

        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="c-icon cil-account-logout"></i>&nbsp;
            @lang('Logout')
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>

    </aside>
    <!-- /.control-sidebar -->


    <div class="modal fade" tabindex="-1" role="dialog" id="cstHrmModal">
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
@include('backend.includes.adminlte.footer')
<!-- / Footer block -->
</div>

<!-- Scripts -->
@stack('before-scripts')

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('plugins/axios/dist/axios.min.js')}}"></script>
<script src="{{asset('plugins/jquery.blockUI/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('plugins/izitoast/dist/js/iziToast.min.js')}}"></script>
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>

@toastr_js

{{--<script src="{{ mix('js/vue-file-loader.js') }}"></script>--}}

@stack('after-scripts')
<!-- / Scripts -->

<script>

    $(document).ready(function () {

        "use strict";
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

        window.modal = $("#cstHrmModal");

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
            window.renderModal();
            axios
                .get(window.modalProperties.actionUrl)
                .then(function (response) {
                    if (response.status === 200) {
                        $(window.modal).find(".modal-body").html(response.data);
                        $(window.modal).modal();
                        $.unblockUI();
                        window.common_bind("#cstHrmModal");
                        window.common_bind_select("#cstHrmModal");
                    }
                })
                .catch(function (error) {
                    console.log(error);
                    $.unblockUI();
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
            window.common_bind("#cstHrmModal");
            window.common_bind_select("#cstHrmModal");

            switch (type) {

                case 'details':
                    window.modalProperties.methodType = "GET";
                    window.modalProperties.actionType = "Show";
                    window.modalProperties.size = $(this).data("modal_size");

                    // loadModal();
                    break;

                case 'edit':
                    modalProperties.buttonLabel = "Update";
                    modalProperties.methodType = "PATCH";
                    modalProperties.actionType = "Edit";
                    loadModal();
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
                                $(modal).modal("hide");
                                $.load_izitoast_success_message("Success", response.data.message, "topRight");
                            }).catch(function (error) {
                            }).then(function () {
                            });
                        }
                    });
                    break;
            }
        });



        function resetFormErrors() {
            $('.form-control').removeClass('is-invalid');
            $('.form-group').find('.invalid-feedback').hide();
        }

        bodyTag.on("click", "#btn-modal-save", function (ev) {
            ev.preventDefault();

            $(modal).find("#name").removeClass("is-invalid");
            $(modal).find("#name_mesage").removeClass();

            $(modal).find("#name_message").html("");

            $(modal).find("#btn-modal-save").html("Processing..").attr("disabled", true);

            let actionUrl = $(modal).find("form").attr("action");
            modalProperties.methodType = $(modal).find("form").attr("method");

            let modalFromData = arrayToJson($(modal).find("form"));

            if (modalProperties.actionType == "Edit") {
                modalFromData.status = $(modal).find("#status").val();
            }

            $(modal).find(".modal-body").block({
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

            axios({
                method: modalProperties.methodType,
                url: actionUrl,
                data: modalFromData,
                config: {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                },
            }).then(function (response) {
                $(modal).find("#btn-modal-save").html("Processing..").attr("disabled", false);
                $(modal).find(".modal-body").unblock();
                $.modalCallBackOnAnyChange();
                $(modal).modal("hide");
                $.load_izitoast_success_message("Success", response.data.message, "topRight");

            }).catch(function (error) {
                if (error.response) {
                    $(modal).find("#btn-modal-save").html("Processing..").attr("disabled", false);
                    $(modal).find(".modal-body").unblock();
                    resetFormErrors();
                    let errors = error.response.data.errors;
                    $.each(errors, function (key, value) {
                        $(modal).find("#" + key).addClass("is-invalid");
                        $(modal).find("#" + key + "_message")
                            .html(value[0]);
                        $(modal).find("#" + key + "_message").show().addClass("invalid-feedback");
                    });
                }
            }).then(function () {
                $(modal).find("#btn-modal-save").html("Processing..").attr("disabled", false);
                $(modal).find(".modal-body").unblock();
                $(modal).find("#btn-modal-save").html(modalProperties.buttonLabel);
            });
        });

        window.common_bind = function (selector = "body") {
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



        $(document).on('click', '#btn-open-modal-to-create', function (ev) {
            ev.preventDefault();

            modalProperties.title = $(this).data('title');
            modalProperties.size = $(this).data("modal_size");

            modalProperties.actionType = "Create";
            modalProperties.buttonLabel = "Create";

            modalProperties.actionUrl = $(this).data("url");
            modalProperties.methodType = $(this).data('method');

            loadModal();

        });

        // Convert Form Data Array into JSON
        function arrayToJson(form) {
            let data = $(form).serializeArray();
            let indexed_array = {};
            $.map(data, function (n, i) {
                indexed_array[n["name"]] = n["value"];
            });
            return indexed_array;
        }
    });


</script>
</body>
</html>
