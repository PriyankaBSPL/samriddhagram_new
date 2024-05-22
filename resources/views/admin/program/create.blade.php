@extends('admin.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->


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
                        <form method="POST" action="{{ route('program.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="Sector">Sector Type</label>
                                    <span style="color: red;" class="star">*</span>
                                    <select name="sector_type" class="input_class form-control" id="sector_type" autocomplete="off">
                                        <option value="" selected="" disabled=""> Select </option>
                                        <?php
                                        $selectSectorArray = ["1" => "Farm Sector", "2" => "Non-Farm Sector"];
                                        foreach ($selectSectorArray as $key => $value) {
                                        ?>
                                            <option value="{{ $key }}" @if(old('sector_type')==$key) selected @endif>{{ $value }}</option>
                                        <?php  } ?>
                                    </select>
                                    <span class="text-danger">@error('sector_type'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="Sector">Page Title</label>
                                    <span style="color: red;" class="star">*</span>
                                    <select name="page_title" class="input_class form-control" id="page_title" autocomplete="off">
                                        <option value="" selected="" disabled=""> Select </option>
                                        @foreach ($SelectPages as $id => $title)
                                        <option value="{{ $id }}" @if(old('page_title')==$id) selected @endif>{{ $title }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('page_title'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="design_type">Design Type</label>
                                    <span style="color: red;" class="star">*</span>
                                    <select name="design_type" class="input_class form-control" id="design_type" autocomplete="off" onchange="handleSelectChange(this)">
                                        <option value="" selected="" disabled=""> Select </option>
                                        <?php
                                        $selectTypeArray = ["1" => "Description", "2" => "Description & Image"];
                                        foreach ($selectTypeArray as $key => $value) {
                                        ?>
                                            <option value="{{ $key }}" @if(old('design_type')==$key) selected @endif>{{ $value }}</option>
                                        <?php  } ?>
                                    </select>
                                    <span class="text-danger">@error('design_type'){{$message}}@enderror</span>
                                </div>

                                <div class="" id="DescriptionBlock" style="display: none;">
                                    <div class="form-group">
                                        <label for="full_description">Full Description</label>
                                        <span style="color: red;" class="star">*</span>
                                        <textarea id="summernote" class="summernote" name="full_description">{{ old('full_description') }}</textarea>

                                    </div>
                                </div>

                                <div class="" id="ImageBlock" style="display: none;">
                                    <div class="form-group">
                                        <label for="top_description">Top Description</label>
                                        <span style="color: red;" class="star">*</span>
                                        <textarea id="summernote" class="summernote" name="top_description">{{ old('top_description') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Side Description</label>
                                        <textarea id="summernote" class="summernote" name="side_description">{{ old('side_description') }}</textarea>
                                        <span class="text-danger">@error('side_descriptions'){{ $message }}@enderror</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <span style="color: red;" class="star">*</span>
                                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                                        <span class="text-danger">@error('image'){{ $message }}@enderror</span>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Create</button>
                                <a href="{{route('program.index')}}" class="btn btn-primary">Back</a>
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