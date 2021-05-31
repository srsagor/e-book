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


                    <!-- /.card-header -->
                    <div class="card-body">
                        <form role="form" action="{{route('itemstypes.update', $itemtype->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="itemtypes">{{__("Item Types")}}</label>
                                    <input type="text" class="form-control" id="itemtypes" name="itemtypes"
                                        value="{{old('itemtypes',$itemtype->type_name)}}">
                                    <div id="designation_name_message">
                                        <p class="text-danger">{{ __($errors->first('itemtypes')) }}</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="form-control" id="submit" value="Update">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection