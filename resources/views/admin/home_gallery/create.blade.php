@extends('admin.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Home Gallery</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Home Gallery</li>
                    </ol>
                </div>
            </div>
        </div> <!--/.container-fluid  -->
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('home_gallery.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="type">Select Type</label>
                                    <span style="color: red;" class="star">*</span>
                                    <select name="type" id="type" class="form-control">
                                        <option value="" selected disabled>Select type</option>
                                        @php
                                        $SelectTypeArray = ["1" => "Programs And Training", "2" => "Voice Of Samriddha Gram", "3" => "OurPartners"];
                                        @endphp
                                        @foreach($SelectTypeArray as $key => $row)
                                        <option value="{{ $key }}" @if(old('SelectTypeArray')==$key) selected @endif>{{ $row }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('type'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <span style="color: red;" class="star">*</span>
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}" id="image">
                                    <span class="text-danger">@error('image'){{$message}}@enderror</span>
                                </div>

                                <button type="submit" class="btn btn-primary">Create</button>                             
                                <a onclick="history.back()" class="btn btn-primary">Back</a>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection