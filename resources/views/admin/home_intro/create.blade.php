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
                        <form method="POST" action="{{ route('home_intro.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <span style="color: red;" class="star">*</span>
                                    <textarea id="summernote" class="summernote" name="description">{{ old('description') }}</textarea>
                                    <span class="text-danger">@error('description'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="left_image">Left Image</label>
                                    <span style="color: red;" class="star">*</span>
                                    <input type="file" name="left_image" class="form-control @error('left_image') is-invalid @enderror" value="{{old('left_image')}}" id="left_image">
                                    <span class="text-danger">@error('left_image'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="left_url">Left URL</label>
                                    <span style="color: red;" class="star">*</span>
                                    <input type="text" name="left_url" class="form-control" id="left_url" placeholder="https://www.xyz.com" value="{{old('left_url')}}">
                                    <span class="text-danger">@error('left_url'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="right_image">Right Image</label>
                                    <span style="color: red;" class="star">*</span>
                                    <input type="file" name="right_image" class="form-control @error('right_image') is-invalid @enderror" value="{{old('right_image')}}" id="right_image">
                                    <span class="text-danger">@error('right_image'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="right_url">Right URL</label>
                                    <span style="color: red;" class="star">*</span>
                                    <input type="text" name="right_url" class="form-control" id="right_url" placeholder="https://www.xyz.com" value="{{old('right_url')}}">
                                    <span class="text-danger">@error('right_url'){{$message}}@enderror</span>
                                </div>

                                <button type="submit" class="btn btn-primary">Create</button>
                                <a href="{{route('home_intro.index')}}" class="btn btn-primary">Back</a>
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