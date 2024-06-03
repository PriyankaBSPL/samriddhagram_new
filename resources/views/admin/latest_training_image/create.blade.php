@extends('admin.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="overflow-y: auto;">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$title}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
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
                        <form method="POST" action="{{ route('latest_training_image.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="main_image">Main Image</label>
                                    <span style="color: red;" class="star">*</span>
                                    <input type="file" name="main_image" class="form-control @error('main_image') is-invalid @enderror" value="{{old('main_image')}}" id="main_image">
                                    <span class="text-danger">@error('main_image'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="upper_image">Upper Image</label>
                                    <span style="color: red;" class="star">*</span>
                                    <input type="file" name="upper_image" class="form-control @error('upper_image') is-invalid @enderror" value="{{old('upper_image')}}" id="upper_image">
                                    <span class="text-danger">@error('upper_image'){{$message}}@enderror</span>
                                </div>
 
                                <div class="form-group">
                                    <label for="lower_image">Lower Image</label>
                                    <span style="color: red;" class="star">*</span>
                                    <input type="file" name="lower_image" class="form-control @error('lower_image') is-invalid @enderror" value="{{old('lower_image')}}" id="lower_image">
                                    <span class="text-danger">@error('lower_image'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <span style="color: red;" class="star">*</span>
                                    <textarea id="summernote" class="summernote" name="description">{{ old('description') }}</textarea>
                                    <span class="text-danger">@error('description'){{$message}}@enderror</span>
                                </div>

                                <button type="submit" class="btn btn-primary">Create</button>
                                <a onclick="history.back()" class="btn btn-primary">Back</a>
                            </div>
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