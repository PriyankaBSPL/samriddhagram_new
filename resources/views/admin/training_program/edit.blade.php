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
                        <form method="POST" action="{{ route('training.update',$trainings->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="startdate">Start Date</label>
                                    <span style="color: red;" class="star">*</span>
                                    <input type="date" name="startdate" class="form-control @error('startdate') is-invalid @enderror" value="{{ old('startdate', $trainings->startdate) }}" id="startdate">
                                    <span class="text-danger">@error('startdate'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="enddate">End Date</label>
                                    <span style="color: red;" class="star">*</span>
                                    <input type="date" name="enddate" class="form-control @error('enddate') is-invalid @enderror" value="{{ old('enddate', $trainings->enddate) }}" id="enddate">
                                    <span class="text-danger">@error('enddate'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="title">Programme Title</label>
                                    <span style="color: red;" class="star">*</span>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $trainings->title) }}" id="title">
                                    <span class="text-danger">@error('title'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="duration">Duration</label>
                                    <span style="color: red;" class="star">*</span>
                                    <input type="text" name="duration" class="form-control" id="duration" value="{{ old('duration', $trainings->duration) }}">
                                    <span class="text-danger">@error('duration'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="beneficiaries">Target Beneficiaries</label>
                                    <span style="color: red;" class="star">*</span>
                                    <textarea name="beneficiaries" class="form-control" id="beneficiaries">{{ old('beneficiaries', $trainings->beneficiaries) }}</textarea>
                                    <span class="text-danger">@error('beneficiaries'){{$message}}@enderror</span>
                                </div>

                                <button type="submit" class="btn btn-primary">Edit</button>
                                <a href="{{route('training.index')}}" class="btn btn-primary">Back</a>
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