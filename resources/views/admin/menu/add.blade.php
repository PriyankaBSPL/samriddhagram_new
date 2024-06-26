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
            <form action="{{URL::to('/admin/menu')}}" method="post" enctype="multipart/form-data">
              @csrf

              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <span style="color: red;" class="star">*</span>
                  <input type="text" class="form-control" name="title" placeholder="Enter Title">
                  <span class="text-danger"> @error('title'){{$message}} @enderror</span>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Slug</label>
                  <span style="color: red;" class="star">*</span>
                  <input type="text" class="form-control" name="slug" placeholder="Enter Slug">
                  <span class="text-danger"> @error('slug'){{$message}} @enderror</span>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Select Category</label>
                  <?php if (!isset($cat_id)) {
                    $cat_id = ''; ?>
                    <?php echo primary_menu($cat_id) ?>
                  <?php } ?>
                  @if($errors->has('parent_id'))
                  <p class="text-danger">{{ $errors->first('parent_id') }}</p>
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
                  <label for="exampleInputEmail1">Menu Position</label>
                  <span style="color: red;" class="star">*</span>
                  <select name="menu_position" class="input_class form-control" id="menu_position" autocomplete="off">
                    <option value="" selected="" disabled=""> Select </option>
                    <?php
                    $menupositionArray = ["1" => "Header Menu", "2" => "Footer Menu"];
                    foreach ($menupositionArray as $key => $value) {
                    ?>
                      <option value="{{ $key }}"><?php if (old('menu_position') == $key) echo "selected" ?>{{ $value }}</option>
                    <?php  } ?>
                  </select>
                  @if($errors->has('menu_position'))
                  <span class="text-danger">{{ $errors->first('menu_position') }}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Select Type</label>
                  <span style="color: red;" class="star">*</span>
                  <select name="type" class="input_class form-control" id="type" autocomplete="off">
                    <option value="" selected="" disabled=""> Select </option>
                    <?php
                    $Array = ["1" => "Gallery", "2" => "Program", "3" => "Other"];
                    foreach ($Array as $key => $value) {
                    ?>
                      <option value="{{ $value }}"><?php if (old('type') == $key) echo "selected" ?>{{ $value }}</option>
                    <?php  } ?>
                  </select>
                  @if($errors->has('type'))
                  <span class="text-danger">{{ $errors->first('type') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Banner Image</label>
                  <input type="file" class="form-control" id="thumbnail_img" name="banner_image" onchange="maxfilesize(this)">
                  <span class="thumbnail_img_error" style="color:red;"></span>
                </div>


              </div>

              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create</button>
                <a onclick="history.back()" class="btn btn-primary">Back</a>
              </div>
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