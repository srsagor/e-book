@extends('layouts.vertical.master')
@section('sidebar')
@include('partials.vertical.sidebar')
@endsection
@section('title')
{{__("E Book")}}
@endsection

@section('breadcrumbs')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{__("E Book")}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">{{__("Home")}}</a></li>
                    <li class="breadcrumb-item active">{{__("E Book")}}</li>
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
                        <form method="POST" class="form" action="{{route('E-Book.store')}}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group col-6">
                                    <label for="title">{{__("Title")}}</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="{{__('Enter title')}}" value="{{old('title')}}">
                                    <div id="title_message">
                                        <p class="text-danger">{{ __($errors->first('title')) }}</p>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="volume">{{__("Volume")}}</label>
                                    <input type="text" class="form-control" id="volume" name="volume"
                                        placeholder="{{__('Enter volume')}}" value="{{old('volume')}}">
                                    <div id="volume_message">
                                        <p class="text-danger">{{ __($errors->first('volume')) }}</p>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="Sub Title">{{__("Sub Title")}}</label>
                                    <input type="text" class="form-control" id="sub_title" name="sub_title"
                                        placeholder="{{__('Enter Sub Title')}}" value="{{old('sub_title')}}">
                                    <div id="sub_title_message">
                                        <p class="text-danger">{{ __($errors->first('sub_title')) }}</p>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="Series">{{__("Series")}}</label>
                                    <input type="text" class="form-control" id="Series" name="series"
                                        placeholder="{{__('Enter series')}}" value="{{old('series')}}">
                                    <div id="series_message">
                                        <p class="text-danger">{{ __($errors->first('series')) }}</p>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="item_type">{{__("Item Type")}}</label>
                                    <select class="form-control" name="item_type">
                                        @forelse($itemstypes as $itemstype)
                                        <option value="{{$itemstype->id}}">{{$itemstype->type_name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    <div id="title_message">
                                        <p class="text-danger">{{ __($errors->first('title')) }}</p>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="subject_heading">{{__("Subject Heading")}}</label>
                                    <input type="text" class="form-control" id="subject_heading" name="subject_heading"
                                        placeholder="{{__('Enter subject heading')}}"
                                        value="{{old('subject_heading')}}">
                                    <div id="subject_heading">
                                        <p class="text-danger">{{ __($errors->first('subject_heading')) }}</p>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="author">{{__("Author")}}</label>
                                    <input type="text" class="form-control" id="author" name="author"
                                        placeholder="{{__('Enter author Name')}}" value="{{old('author')}}">
                                    <div id="author_message">
                                        <p class="text-danger">{{ __($errors->first('author')) }}</p>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="publisher">{{__("Publisher")}}</label>
                                    <input type="text" class="form-control" id="publisher" name="publisher"
                                        placeholder="{{__('Enter publisher Name')}}" value="{{old('publisher')}}">
                                    <div id="publisher_message">
                                        <p class="text-danger">{{ __($errors->first('publisher')) }}</p>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="issn">{{__("ISSN")}}</label>
                                    <input type="text" class="form-control" id="issn" name="issn"
                                        placeholder="{{__('Enter ISSN')}}" value="{{old('issn')}}">
                                    <div id="issn_message">
                                        <p class="text-danger">{{ __($errors->first('issn')) }}</p>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="isbn">{{__("ISBN")}}</label>
                                    <input type="text" class="form-control" id="isbn" name="isbn"
                                        placeholder="{{__('Enter ISBN')}}" value="{{old('isbn')}}">
                                    <div id="isbn_message">
                                        <p class="text-danger">{{ __($errors->first('isbn')) }}</p>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="corporate_author">{{__("Corporate Author")}}</label>
                                    <input type="text" class="form-control" id="corporate_author"
                                        name="corporate_author" placeholder="{{__('Enter Corporate Author')}}"
                                        value="{{old('corporate_author')}}">
                                    <div id="corporate_author_message">
                                        <p class="text-danger">{{ __($errors->first('corporate_author')) }}</p>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="total_page">{{__("Total Page")}}</label>
                                    <input type="text" class="form-control" id="total_page" name="total_page"
                                        placeholder="{{__('Enter Total Page')}}" value="{{old('total_page')}}">
                                    <div id="total_page_message">
                                        <p class="text-danger">{{ __($errors->first('total_page')) }}</p>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="price">{{__("Price")}}</label>
                                    <input type="text" class="form-control" id="price" name="price"
                                        placeholder="{{__('Enter price')}}" value="{{old('price')}}">
                                    <div id="price_message">
                                        <p class="text-danger">{{ __($errors->first('price')) }}</p>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="language">{{__("Language")}}</label>
                                    <input type="text" class="form-control" id="language" name="language"
                                        placeholder="{{__('Enter Language')}}" value="{{old('language')}}">
                                    <div id="language_message">
                                        <p class="text-danger">{{ __($errors->first('language')) }}</p>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="pdf">{{__("PDF")}}</label>
                                    <input type="file" class="form-control" id="pdf" name="pdf"
                                        placeholder="{{__('Enter pdf')}}" value="{{old('pdf')}}">
                                    <div id="pdf_message">
                                        <p class="text-danger">{{ __($errors->first('pdf')) }}</p>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="image">{{__("Image")}}</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    <div id="image_message">
                                        <p class="text-danger">{{ __($errors->first('image')) }}</p>
                                    </div>
                                </div>

                                <div class="form-group col-6">
                                    <input type="submit" class="form-control" id="submit" value="Save">
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