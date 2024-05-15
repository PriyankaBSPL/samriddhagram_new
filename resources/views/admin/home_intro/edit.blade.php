@extends('admin.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Home Intro</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Home Intro</li>
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
                        <form method="POST" action="{{ route('home_intro.update',$home_intros->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                            <div class="form-group">
                                    <label for="description">Description</label>
                                    <span style="color:red;" class="star">*</span>
                                    <textarea name="description" class="form-control" id="description">{{ old('description', $home_intros->description) }}</textarea>
                                    <span class="text-danger">@error('description'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="left_image">Left Image</label>
                                    <input type="file" name="left_image" class="form-control @error('left_image') is-invalid @enderror" value="{{ old('left_image', $home_intros->left_image) }}" id="left_image">
                                    @if($home_intros->left_image)
                                    <a href="{{ URL::asset('/admin/upload/HomeIntro/LeftImage/'.$home_intros->left_image)}}"><img src="{{ URL::asset('/admin/upload/HomeIntro/LeftImage/'.$home_intros->left_image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;"></a>
                                    @endif
                                    <input type="hidden" name="oldimage" class="input_class w-50 inline-block" value="{{ !empty($home_intros->left_image)?$home_intros->left_image:old('left_image')}}" />
                                    <span class="text-danger">@error('left_image'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="left_url">Left URL</label>
                                    <span style="color:red;" class="star">*</span>
                                    <input type="text" name="left_url" class="form-control" id="left_url" value="{{ old('left_url', $home_intros->left_url) }}">
                                    <span class="text-danger">@error('left_url'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="right_image">Right Image</label>
                                    <input type="file" name="right_image" class="form-control @error('right_image') is-invalid @enderror" value="{{ old('right_image', $home_intros->right_image) }}" id="right_image">
                                    @if($home_intros->right_image)
                                    <a href="{{ URL::asset('/admin/upload/HomeIntro/RightImage/'.$home_intros->right_image)}}"><img src="{{ URL::asset('/admin/upload/HomeIntro/RightImage/'.$home_intros->right_image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;"></a>
                                    @endif
                                    <input type="hidden" name="oldimage" class="input_class w-50 inline-block" value="{{ !empty($home_intros->right_image)?$home_intros->right_image:old('right_image')}}" />
                                    <span class="text-danger">@error('right_image'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="right_url">Right URL</label>
                                    <span style="color:red;" class="star">*</span>
                                    <input type="text" name="right_url" class="form-control" id="right_url" value="{{ old('right_url', $home_intros->right_url) }}">
                                    <span class="text-danger">@error('right_url'){{$message}}@enderror</span>
                                </div>


                                <button type="submit" class="btn btn-primary">Edit</button>
                                <a href="{{route('home_intro.index')}}" class="btn btn-primary">Back</a>
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