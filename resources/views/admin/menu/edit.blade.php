@extends('admin.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Menu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Menu</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{$title}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('menu.update',$data->id)}}" method="post" enctype="multipart/form-data" >
              @csrf
              @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <span>*</span>
                    <input type="text" class="form-control" name="title" value="{{$data->title}}" placeholder="Enter Title">
                    <span class="text-danger"> @error('title'){{$message}} @enderror</span>
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Category</label>
                    <?php //if(!isset($data->parent_id)){  ?>
										<?php echo primary_menu($data->parent_id) ?>
									<?php //} ?>
                                    @if($errors->has('parent_id'))
                                    <p class="text-danger">{{ $errors->first('parent_id') }}</p>
                                    @endif 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Status</label>
                    <select name="status" class="input_class form-control" id="status"
                                        autocomplete="off">
                                        <option value=""> Select </option>
                                        <?php
                                        $statusArray = get_status();
                                        foreach($statusArray as $key=>$value) {
                                            ?>
                                        <option value="<?php echo $key; ?>"
                                            <?php if((!empty($data->status)?$data->status:old('status'))==$key) echo "selected"; ?>>
                                            <?php echo $value; ?></option>
                                        <?php  }?>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Banner Image</label>
                    <!-- <input type="file" class="form-control" name="banner_image"> -->
                    <input type="file" value="{{old('banner_image')}}" accept="image/png, image/gif, image/jpeg, image/jpg" name="banner_image" onchange="maxfilesize(this);"  class="input_class w-50 inline-block" id="image" />
                                    @if($data->banner_image)
                                    <img src="{{ URL::asset('/admin/uploads/banner_image/'.$data->banner_image)}}"
                                                    style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                    @endif
                                <input type="hidden" name="olduplode" class="input_class w-50 inline-block" value="<?php echo !empty($data->banner_image)?$data->banner_image:''; ?>" />
                                 <span class="txtimage_error" style="color:red;"></span>
                                 @if($errors->has('banner_image'))
                                    <p class="text-danger">{{ $errors->first('banner_image') }}</p>
                                    @endif
                  </div>
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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