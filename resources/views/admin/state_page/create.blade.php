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
                        <form method="POST" action="{{ route('state_page.store') }}">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="state_name">State Name</label>
                                    <span style="color: red;" class="star">*</span>
                                    <input type="text" name="state_name" class="form-control" id="state_name" value="{{old('state_name')}}">
                                    <span class="text-danger">@error('state_name'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="number_of_training">Number Of Training</label>
                                    <input type="text" name="number_of_training" class="form-control" id="number_of_training" value="{{old('number_of_training')}}">
                                    <span class="text-danger">@error('number_of_training'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="number_of_trainee">Number Of Trainee</label>
                                    <input type="text" name="number_of_trainee" class="form-control" id="number_of_trainee" value="{{old('number_of_trainee')}}">
                                    <span class="text-danger">@error('number_of_trainee'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="url">URL</label>
                                    <input type="text" name="url" class="form-control" id="url" placeholder="https://www.xyz.com" value="{{old('url')}}">
                                    <span class="text-danger">@error('url'){{$message}}@enderror</span>
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