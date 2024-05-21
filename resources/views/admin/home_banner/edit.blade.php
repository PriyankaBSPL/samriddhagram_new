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
                        <form method="POST" action="{{ route('home_banner.update',$home_banners->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="video">Video</label>
                                    <input type="file" name="video" class="form-control @error('video') is-invalid @enderror" value="{{ old('video', $home_banners->video) }}" id="video">
                                    @if($home_banners->video)
                                    <a href="{{ URL::asset('/admin/upload/HomeBanner/'.$home_banners->video)}}" target="_blank">
                                        <video width="320" height="240" controls>
                                            <source src="{{ asset('/admin/upload/HomeBanner/'.$home_banners->video) }}" type="video/mp4">
                                        </video></a>
                                    @endif
                                    <input type="hidden" name="oldvideo" class="input_class w-50 inline-block" value="{{ !empty($home_banners->video)?$home_banners->video:old('video')}}" />
                                    <span class="text-danger">@error('video'){{$message}}@enderror</span>
                                </div>

                                <button type="submit" class="btn btn-primary">Edit</button>
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