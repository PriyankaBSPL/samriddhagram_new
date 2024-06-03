@extends('admin.layouts.app')
@section('content')

<script>
    function handleSelectChange(select) {
        if (select.value === '1') {
            document.getElementById('DescriptionBlock').style.display = "block";
            document.getElementById('ImageBlock').style.display = "none";
        } else if (select.value === '2') {
            document.getElementById('DescriptionBlock').style.display = "none";
            document.getElementById('ImageBlock').style.display = "block";
        } else {
            document.getElementById('DescriptionBlock').style.display = "none";
            document.getElementById('ImageBlock').style.display = "none";
        }
    }
</script>
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
                        <form method="POST" action="{{ route('popup.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">

                            
                            <div class="form-group">
                                    <label for="title">Title</label>
                                    <span style="color: red;" class="star">*</span>
                                    <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}">
                                    <span class="text-danger">@error('title'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="design_type">Design Type</label>
                                    <span style="color: red;" class="star">*</span>
                                    <select name="design_type" class="input_class form-control" id="design_type" autocomplete="off" onchange="handleSelectChange(this)">
                                        <option value="" selected="" disabled=""> Select </option>
                                        <?php
                                        $selectTypeArray = ["1" => "Description", "2" => "Image"];
                                        foreach ($selectTypeArray as $key => $value) {
                                        ?>
                                            <option value="{{ $key }}" @if(old('design_type')==$key) selected @endif>{{ $value }}</option>
                                        <?php  } ?>
                                    </select>
                                    <span class="text-danger">@error('design_type'){{$message}}@enderror</span>
                                </div>

                                <div class="" id="DescriptionBlock" style="display: none;">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <span style="color: red;" class="star">*</span>
                                        <textarea id="summernote" class="summernote" name="description">{{ old('description') }}</textarea>
                                        <span class="text-danger">@error('description'){{ $message }}@enderror</span>
                                    </div>
                                </div>

                                <div class="" id="ImageBlock" style="display: none;">

                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <span style="color: red;" class="star">*</span>
                                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                                        <span class="text-danger">@error('image'){{ $message }}@enderror</span>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Create</button>
                                <a href="{{route('popup.index')}}" class="btn btn-primary">Back</a>
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
<!-- Bootstrap CSS -->

<script>
    $(document).ready(function() {
        var oldSelectTypetype = "{{ old('design_type') }}";
        document.getElementById('DescriptionBlock').style.display = 'none';
        document.getElementById('ImageBlock').style.display = 'none';

        if (oldSelectTypetype == '1') {
            document.getElementById('DescriptionBlock').style.display = "block";
            document.getElementById('ImageBlock').style.display = "none";
        } else if (oldSelectTypetype == '2') {
            document.getElementById('DescriptionBlock').style.display = "none";
            document.getElementById('ImageBlock').style.display = "block";
        } else {
            document.getElementById('DescriptionBlock').style.display = "none";
            document.getElementById('ImageBlock').style.display = "none";
        }
    });
</script>

@endsection