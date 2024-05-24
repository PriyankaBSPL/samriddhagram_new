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
                        <form method="POST" action="{{ route('home_gallery.update',$home_galleries->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="type">Select Type</label>
                                    <span style="color: red;" class="star">*</span>
                                    <select name="type" id="type" class="form-control">
                                        <option value="" selected disabled>Select type</option>
                                        @php
                                        $SelectTypeArray = ["1" => "Voice Of Samriddha Gram", "2" => "Our Partners"];
                                        @endphp
                                        @foreach($SelectTypeArray as $key => $row)
                                        <option value="{{ $key }}" @if((!empty($home_galleries->type)?$home_galleries->type:old('type'))==$key)selected @endif >{{ $row }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('type'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image', $home_galleries->image) }}" id="image">
                                    @if($home_galleries->image)
                                    <a href="{{ URL::asset('/admin/upload/HomeGallery/'.$home_galleries->image)}}"><img src="{{ URL::asset('/admin/upload/HomeGallery/'.$home_galleries->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;"></a>
                                    @endif
                                    <input type="hidden" name="oldimage" class="input_class w-50 inline-block" value="{{ !empty($home_galleries->image)?$home_galleries->image:old('image')}}" />
                                    <span class="text-danger">@error('image'){{$message}}@enderror</span>
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