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
              <form action="{{route('category.update',$data->id)}}" method="post" enctype="multipart/form-data" >
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
                                  
                    <label for="exampleInputEmail1">Select Type</label>
                    <span style="color: red;" class="star">*</span>
                  <select name="type" class="input_class form-control" id="type" autocomplete="off">

                                    <option value="" selected="" disabled=""> Select </option>
                                    <?php
                                    $Array =get_types();
                                    foreach ($Array as  $value) {
                                    ?>
                                      <option value="<?php echo $value->id; ?>"
                                     <?php if((!empty($data->type)?$data->type:old('type'))==$value->id) echo "selected"; ?>>
                                            <?php echo $value->title; ?></option>
                                        
                                    <?php  } ?>
                                </select>
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
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
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
@endsection