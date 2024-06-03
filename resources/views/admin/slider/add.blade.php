@extends('admin.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
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
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">

            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{URL::to('/admin/slider')}}" method="post" enctype="multipart/form-data">
              @csrf

              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <span style="color: red;" class="star">*</span>
                  <input type="text" class="form-control" name="title" placeholder="Enter Title">
                  <span class="text-danger"> @error('title'){{$message}} @enderror</span>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <span style="color: red;" class="star">*</span>
                  <textarea id="summernote" name="description" class="summernote"></textarea>
                  @if($errors->has('description'))
                  <span class="text-danger">{{ $errors->first('description') }}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Select Status</label>
                  <span style="color: red;" class="star">*</span>
                  <select name="status" class="input_class form-control" id="status" autocomplete="off">
                    <option value=""> Select </option>
                    <?php
                    $statusArray = get_status();
                    foreach ($statusArray as $key => $value) {
                    ?>
                      <option value="<?php echo $key; ?>" <?php if (old('status') == $key) echo "selected"; ?>><?php echo $value; ?></option>
                    <?php  } ?>
                  </select>
                  @if($errors->has('status'))
                  <span class="text-danger">{{ $errors->first('status') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Logo</label>
                  <span style="color: red;" class="star">*</span>
                  <input type="file" class="form-control" id="thumbnail_img" name="logo" onchange="maxfilesize(this)">
                  <span class="thumbnail_img_error" style="color:red;"></span>
                  @if($errors->has('logo'))
                  <span class="text-danger">{{ $errors->first('logo') }}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <span style="color: red;" class="star">*</span>
                  <textarea id="summernote" class="summernote"></textarea>
                  @if($errors->has('welcomedescription'))
                  <span class="text-danger">{{ $errors->first('welcomedescription') }}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Select Status</label>
                  <select name="status" class="input_class form-control" id="status" autocomplete="off">
                    <option value=""> Select </option>
                    <?php
                    $statusArray = get_status();
                    foreach ($statusArray as $key => $value) {
                    ?>
                      <option value="<?php echo $key; ?>" <?php if (old('status') == $key) echo "selected"; ?>><?php echo $value; ?></option>
                    <?php  } ?>
                  </select>
                  @if($errors->has('status'))
                  <span class="text-danger">{{ $errors->first('status') }}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Logo</label>
                  <input type="file" class="form-control" id="thumbnail_img" name="logo" onchange="maxfilesize(this)">
                  <span class="thumbnail_img_error" style="color:red;"></span>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
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
  @endsection