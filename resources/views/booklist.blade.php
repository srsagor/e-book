<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>E book</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">EBooks</a>
            <form class="d-flex" method="POST" action="{{url('book-list')}}">
                @csrf
                <select class="form-select" name="search_type" aria-label="Default select example">

                    <option value="1" @if($request->search_type == 1) Selected @endif >Title</option>
                    <option value="2" @if($request->search_type == 2) Selected @endif>Author</option>
                    <option value="3" @if($request->search_type == 3) Selected @endif>Name Of Publisher</option>
                    <option value="4" @if($request->search_type == 4) Selected @endif>ISSN</option>
                    <option value="5" @if($request->search_type == 5) Selected @endif>ISBN</option>
                </select>
                <input class="form-control me-2" value="{{$request->search}}" type="search" name="search"
                    placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="row">
        @forelse($allBooks as $allbook)
        <div class="col-sm-4">
            <div class="card">
                <a href="{{url('book_details/'.$allbook->id)}}"><img src="{{asset($allbook->cover_image)}}"
                        class="card-img-top" alt="..."> </a>
                <div class="card-body">
                    <h5 class="card-title"><a href="{{url('book_details/'.$allbook->id)}}">{{$allbook->title}} </a>
                    </h5>
                </div>
            </div>
        </div>
        @empty
        @endforelse
    </div>
    {{-- <div class="row">
        <div class="pagignation-sector text-center">
            <div aria-label="Page navigation example"> --}}
    <div class="d-flex justify-content-center">
        <form action="{{url('book-list')}}" method="post">
            {{$allBooks->appends(request()->input())->links()}}
        </form>
        {{-- </div>
        </div> --}}
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>


</body>

</html>