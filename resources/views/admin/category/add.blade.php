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
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">

            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{URL::to('/admin/category')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <span style="color: red;" class="star">*</span>
                  <input type="text" class="form-control" name="title" placeholder="Enter Title">
                  <span class="text-danger"> @error('title'){{$message}} @enderror</span>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Select Type</label>
                  <span style="color: red;" class="star">*</span>
                  <select name="type" class="input_class form-control" id="status" autocomplete="off">
                    <option value=""> Select </option>

                    <?php
                    $typeArray = get_types();
                    foreach ($typeArray as $value) {
                    ?>
                      <option value="<?php echo $value->id; ?>" <?php if (old('status') == $value->title) echo "selected"; ?>><?php echo $value->title; ?></option>
                    <?php  } ?>
                  </select>

                  @if($errors->has('type'))
                  <span class="text-danger">{{ $errors->first('type') }}</span>
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
                  <label for="exampleInputPassword1">Multiple Image</label>
                  <span style="color: red;" class="star">*</span>
                  <input type="file" class="form-control" id="thumbnail_img" name="image[]" multiple onchange="multiple_maxfilesize(this)">
                  <span class="thumbnail_img_error" style="color:red;"></span>


<<<<<<< HEAD
=======
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Type</label>
                    <span style="color: red;" class="star">*</span>
                    <select name="type" class="input_class form-control" id="status" autocomplete="off">
                                    <option value=""> Select </option>
                                   
                                        <?php
                                        $typeArray = get_types();
                                        foreach($typeArray as $value) {
                                            ?>
                                            <option value="<?php echo $value->id; ?>" <?php if(old('status')==$value->title) echo "selected"; ?>><?php echo $value->title; ?></option>
                                        <?php  }?>
                                </select>
                                
                                        @if($errors->has('type'))
                                        <span class="text-danger">{{ $errors->first('type') }}</span>
                                        @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Status</label>
                    <span style="color: red;" class="star">*</span>
                    <select name="status" class="input_class form-control" id="status" autocomplete="off">
                                    <option value=""> Select </option>
                                        <?php
                                        $statusArray = get_status();
                                        foreach($statusArray as $key=>$value) {
                                            ?>
                                            <option value="<?php echo $key; ?>" <?php if(old('status')==$key) echo "selected"; ?>><?php echo $value; ?></option>
                                        <?php  }?>
                                </select>
                                        @if($errors->has('status'))
                                        <span class="text-danger">{{ $errors->first('status') }}</span>
                                        @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Multiple Image</label>
                    <span style="color: red;" class="star">*</span>
                    <br/>
                    <span class="star">Maximum 15 images are allowed at a time</span>
                    <input type="file" class="form-control" id="thumbnail_img"  name="image[]" multiple onchange="multiple_maxfilesize(this)"> 
                    <span class="thumbnail_img_error" style="color:red;"></span>
                   
                
>>>>>>> 644117bef0b050b8963663dd0ec6bd2868acd15f
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