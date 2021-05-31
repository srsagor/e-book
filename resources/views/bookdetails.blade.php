<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Books Details</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('book-list')}}">EBooks -Home</a>

        </div>
    </nav>

    <div class="row">
        <div class="col-6">
            <img src="{{asset($Bookinfo->cover_image)}}" class="card-img-top" alt="...">
            <p style="padding-left: 240px;
    padding-top: 25px;">
                Book Name <br>
                {{$Bookinfo->title}}
                <br>
                <button> <a href="{{asset($Bookinfo->pdf)}}">Download </a></button>
            </p>
        </div>
        <div class="col-6">
            <h1> E-Book Information </h1> <br>
            <div class="container">
                <div class="row">
                    <div class="col-6 col-sm-6">Author</div>
                    <div class="col-6 col-sm-6">Publisher</div>

                    <!-- Force next columns to break to new line -->
                    <div class="w-100"></div>


                    <div class="col-6 col-sm-6">{{$Bookinfo->author}}</div>
                    <div class="col-6 col-sm-6">{{$Bookinfo->publisher}}</div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6 col-sm-6">Corporate Author</div>
                    <div class="col-6 col-sm-6">Language</div>

                    <!-- Force next columns to break to new line -->
                    <div class="w-100"></div>


                    <div class="col-6 col-sm-6">{{$Bookinfo->corporate_autor}}</div>
                    <div class="col-6 col-sm-6">{{$Bookinfo->language}}</div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6 col-sm-6">ISSN</div>
                    <div class="col-6 col-sm-6">ISBN</div>

                    <!-- Force next columns to break to new line -->
                    <div class="w-100"></div>


                    <div class="col-6 col-sm-6">{{$Bookinfo->issn}}</div>
                    <div class="col-6 col-sm-6">{{$Bookinfo->isbn}}</div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6 col-sm-6">Price</div>
                    <div class="col-6 col-sm-6">Page</div>

                    <!-- Force next columns to break to new line -->
                    <div class="w-100"></div>


                    <div class="col-6 col-sm-6">{{$Bookinfo->price}}</div>
                    <div class="col-6 col-sm-6">{{$Bookinfo->total_page}}</div>
                </div>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>


</body>

</html>