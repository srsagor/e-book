@extends('layouts.vertical.master')
@section('sidebar')
@include('partials.vertical.sidebar')
@endsection
@section('title')
{{__("Item Type")}}
@endsection

@section('breadcrumbs')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{__("Item Type")}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">{{__("Home")}}</a></li>
                    <li class="breadcrumb-item active">{{__("Item Type")}}</li>
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
                        <h3 class="card-title">Item Type Management </h3>
                        <div class="card-tools">

                            <a class="btn btn-primary" href="{{route('itemstypes.create')}}"> Create</a>


                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>item type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($itemstypes as $key => $itemstype)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$itemstype->type_name}}</td>
                                    <td>

                                        <a class="button is-light" href="{{route('itemstypes.edit',$itemstype->id)}}">
                                            Edit </a>
                                        <a class="button is-light" onclick="return confirm('Are you sure?')"
                                            href='itemstypes/delete/{{ $itemstype->id }}' title="Remove">Remove</a>

                                    </td>
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