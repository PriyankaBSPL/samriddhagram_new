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
                        <form method="POST" action="{{ route('about.update',$abouts->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="banner_description">Banner Description</label>
                                    <span style="color: red;" class="star">*</span>
                                    <textarea id="summernote" class="summernote" name="banner_description">{{ old('banner_description',$abouts->banner_description) }}</textarea>
                                    <span class="text-danger">@error('banner_description'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="side_description">Side Description</label>
                                    <span style="color: red;" class="star">*</span>
                                    <textarea id="summernote" class="summernote" name="side_description">{{ old('side_description',$abouts->side_description) }}</textarea>
                                    <span class="text-danger">@error('side_description'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image', $abouts->image) }}" id="image">
                                    @if($abouts->image)
                                    <a href="{{ URL::asset('/admin/upload/About/'.$abouts->image)}}"><img src="{{ URL::asset('/admin/upload/About/'.$abouts->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;"></a>
                                    @endif
                                    <input type="hidden" name="oldimage" class="input_class w-50 inline-block" value="{{ !empty($abouts->image)?$abouts->image:old('image')}}" />
                                    <span class="text-danger">@error('image'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <span style="color: red;" class="star">*</span>
                                    <textarea id="summernote" class="summernote" name="description">{{ old('description',$abouts->description) }}</textarea>
                                    <span class="text-danger">@error('description'){{$message}}@enderror</span>
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