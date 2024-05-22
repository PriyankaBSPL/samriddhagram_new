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
                        <form method="POST" action="{{ route('latest_training_image.update',$latest_training_images->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="main_image">Main Image</label>
                                    <input type="file" name="main_image" class="form-control @error('main_image') is-invalid @enderror" value="{{ old('main_image', $latest_training_images->main_image) }}" id="main_image">
                                    @if($latest_training_images->main_image)
                                    <a href="{{ URL::asset('/admin/upload/LatestTrainingImage/MainImage/'.$latest_training_images->main_image)}}"><img src="{{ URL::asset('/admin/upload/LatestTrainingImage/MainImage/'.$latest_training_images->main_image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;"></a>
                                    @endif
                                    <input type="hidden" name="oldmainimage" class="input_class w-50 inline-block" value="{{ !empty($latest_training_images->main_image)?$latest_training_images->main_image:old('main_image')}}" />
                                    <span class="text-danger">@error('main_image'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="upper_image">Upper Image</label>
                                    <input type="file" name="upper_image" class="form-control @error('upper_image') is-invalid @enderror" value="{{ old('upper_image', $latest_training_images->upper_image) }}" id="upper_image">
                                    @if($latest_training_images->upper_image)
                                    <a href="{{ URL::asset('/admin/upload/LatestTrainingImage/UpperImage/'.$latest_training_images->upper_image)}}"><img src="{{ URL::asset('/admin/upload/LatestTrainingImage/UpperImage/'.$latest_training_images->upper_image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;"></a>
                                    @endif
                                    <input type="hidden" name="oldupperimage" class="input_class w-50 inline-block" value="{{ !empty($latest_training_images->upper_image)?$latest_training_images->upper_image:old('upper_image')}}" />
                                    <span class="text-danger">@error('upper_image'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="lower_image">Lower Image</label>
                                    <input type="file" name="lower_image" class="form-control @error('lower_image') is-invalid @enderror" value="{{ old('lower_image', $latest_training_images->lower_image) }}" id="lower_image">
                                    @if($latest_training_images->lower_image)
                                    <a href="{{ URL::asset('/admin/upload/LatestTrainingImage/LowerImage/'.$latest_training_images->lower_image)}}"><img src="{{ URL::asset('/admin/upload/LatestTrainingImage/LowerImage/'.$latest_training_images->lower_image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;"></a>
                                    @endif
                                    <input type="hidden" name="oldlowerimage" class="input_class w-50 inline-block" value="{{ !empty($latest_training_images->lower_image)?$latest_training_images->lower_image:old('lower_image')}}" />
                                    <span class="text-danger">@error('lower_image'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <span style="color: red;" class="star">*</span>
                                    <textarea id="summernote" class="summernote" name="description">{{ old('description',$latest_training_images->description) }}</textarea>
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