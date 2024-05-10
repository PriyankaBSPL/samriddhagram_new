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
                <h3 class="card-title">Menu Add</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{URL::to('/menu')}}" method="post" enctype="multipart/form-data" >
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <span>*</span>
                    <input type="text" class="form-control" name="title"  placeholder="Enter Title">
                    <span class="text-danger"> @error('title'){{$message}} @enderror</span>
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Category</label>
                    <?php if(!isset($cat_id)){ $cat_id=''; ?>
										<?php echo primary_category($cat_id) ?>
									<?php } ?>
                                    @if($errors->has('parent_id'))
                                          <p class="text-danger">{{ $errors->first('parent_id') }}</p>
                                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Status</label>
                    <select class="form-control" name="status">
                        <option value="">--Select Status---</option>
                        <option value="3">Published</option>
                        <option value="0">Draft</option>
                        <option value="1">Approve</option>
                   </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Banner Image</label>
                    <input type="file" class="form-control" name="banner_image">
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