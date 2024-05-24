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
              <form action="{{route('gallery.update',$data->id)}}" method="post" enctype="multipart/form-data" >
              @csrf
              @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <span>*</span>
                    <input type="text" class="form-control" name="title" value="{{$data->title}}" placeholder="Enter Title">
                    <span class="text-danger"> @error('title'){{$message}} @enderror</span>
                  </div>
                  <div id="txtPDF" >
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Gallery Image:</label>
                                        <span class="star">*</span>
                                    </div>
                                </div>
                                
                            </div>
                        <table class="table table-striped">
                            <thead>
                                <tr class="warning">
                                    <!-- <th>Title</th> -->
                                    <th>Sr.No.</th>
                                    <th>Images</th>
                                    <!-- <th>Order</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                                <tbody id="tbl_row">
                                <?php 
                                
                                if($gimg)
                                {
                                    $i=1;
                                   foreach($gimg as $val)
                                {

                                ?>
                                    <tr>
                                        <td><?=$i++?></td>
                                        <!-- <td><?php echo $val->title; ?></td> -->
                                        <td> 
                                            <img src="{{ URL::asset('/public/admin/upload/photoGallery/photo/'.$val->img)}}"
                                                    style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                                    <input class="form-control" name="oldid[]" value="{{$val->id}} " type="hidden">
                                                    <input class="form-control" name="oldimag[]" value="{{$val->img}} " type="hidden">
                                        </td>
                                     <!--   <td><?php echo $val->img_postion??0; ?> <i id="{{$val->id}}" onclick="editimgpos(this);"  class="far editbut fa-edit"></i>
                                                    <span  id="img_postion_{{$val->id}}" style="display:none" >
                                                    <input class="w-25" type="number"
                                                    onchange="savedata(this);" id="{{$val->id}}" name="img_postion" value="" /></span>
                                                    <p class="text-success" id="success_{{$val->id}}"></p>
                                               </td>-->
                                         <td>
                                            <a class="btn btn-danger delete-row"  onclick="removeImg('{{$val->img}}, <?php echo $val->id; ?>')" href="javascript:void(0);"><i class="bi bi-trash"></i>
                                                                </a>
                                                            </td> 
                                    </tr>
                                   <?php 
                                }
                                }?>
                                </tbody>
                            </table>
                            {!! $gimg->withQueryString()->links('pagination::bootstrap-5') !!}
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