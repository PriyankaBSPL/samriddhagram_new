@extends('admin.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

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
                        <form method="POST" action="{{ route('program_and_training.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <span style="color: red;" class="star">*</span>
                                    <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}">
                                    <span class="text-danger">@error('title'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <span style="color: red;" class="star">*</span>
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}" id="image">
                                    <span class="text-danger">@error('image'){{$message}}@enderror</span>
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