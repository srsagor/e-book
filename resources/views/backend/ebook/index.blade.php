@extends('layouts.vertical.master')
@section('sidebar')
@include('partials.vertical.sidebar')
@endsection
@section('title')
{{__("E Books Type")}}
@endsection

@section('breadcrumbs')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{__("E Books")}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">{{__("Home")}}</a></li>
                    <li class="breadcrumb-item active">{{__("E Books")}}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection


@section('content')
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">E-Book Management</h3>
                        <div class="card-tools">

                            <a class="btn btn-primary" href="{{route('E-Book.create')}}">Create</a>

                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Book Name</th>
                                    <th>Autore Name</th>
                                    {{-- <th> Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($allBooks as $key => $allBook)
                                {{-- {{dd($allBook->title)}} --}}
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$allBook->title}}</td>
                                    <td>{{$allBook->author}}</td>
                                    {{-- <td>

                                        <a class="button is-light" href="{{route('itemstypes.edit',$allBook->id)}}">
                                    Edit </a>

                                    <a class="button is-light" onclick="return confirm('Are you sure?')"
                                        href={{route('itemstypes.destroy',$allBook)}} data-method="delete">
                                        Delete</a>

                                    </td> --}}
                                </tr>
                                @empty
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection


@push('after-styles')

@endpush

@push('after-scripts')


@endpush