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
        </div>
        <!--/.container-fluid  -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            @if(Session::has('error'))
                            <div class="alert alert-danger">{{Session::get('error')}}</div>
                            @endif
                            <div class="float-right mb-3">
                                <a onclick="history.back()" class="btn btn-success">Back</a>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
Add
</button>
                            </div>

                            <!-- /.card-header -->
                            <table id="menu_table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Images</th>
                                        <th>View Image</th>
                                        <th>Update Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($data) > 0)
                                    @php $i=1; @endphp
                                    @foreach ($data as $row)
                                    <tr>
                                        <in>
                                        <td>{{$i++}}</td>
                                        <td>
                                        <img src="{{ URL::asset('/admin/uploads/category_image/'.$row->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                        </td>
                                            <td><a  target="_blank"  href="{{ URL::asset('/admin/uploads/category_image/'.$row->image)}}" ><i class="fas fa-eye"></i></a></td>
                                                
                                            <td>
                                                <!-- Add form for updating image -->
                                                <form id="updateImageForm" action="{{ url('/category_image/update_image/') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf          
                                                    <input type="file" id="thumbnail_img" name="new_image" accept="image/*" onchange="maxfilesize(this)">
                                                    <input type="hidden" name="image_id" value="{{$row->id}}">
                                                    <span class="thumbnail_img_error" style="color:red;"></span>
                                                    <button type="submit" class="btn btn-primary">Update Image</button>
                                                </form>
                                            </td>
                                            <td> 
                                            <a  class="btn btn-danger" href="{{url('category_image/delete/'.$row->id)}}"
                                              onclick="return confirm('Are you sure want to delete image?')"><i class="fas fa-trash-alt" style="font-size: 15px;"></i></a>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2"><i class="fas fa-plus" style="font-size: 15px;"></i></button>
                          
                                                 </td>
                                        </form>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>

                            </table>
                            <!-- Button trigger modal -->


<!-- Modal Start-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Images</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  action="{{ url('/category_image/add_image/') }}" method="POST" enctype="multipart/form-data">
       <input type="hidden" class="form-control"  name="category_id" value="{{$id}}" >
      @csrf         
      <div class="modal-body">
                    <div class="form-group">
                    <h5>Maximum 15 image upload at a time</h5>
                    <label for="exampleInputPassword1">Multiple Image</label>
                    <span style="color: red;" class="star">*</span>
                    <input type="file" class="form-control" id="img" name="image[]" multiple onchange="multiple_maxfilesize(this)">
                    <span class="img_error" style="color:red;"></span>

                    </div>    
                  </div>
                  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--Modal End--->
<!-- Modal Start-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Add Gallery Images</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  action="{{URL::to('/admin/gallery')}}"  method="POST" enctype="multipart/form-data">
       <input type="hidden" class="form-control"  name="cat_id" value="{{$id}}" >
      @csrf         
      <div class="modal-body">
      <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <span style="color: red;" class="star">*</span>
                  <input type="text" class="form-control" name="title" placeholder="Enter Title">
                  <span class="text-danger"> @error('title'){{$message}} @enderror</span>
                </div>

                    <div class="form-group">
                    <h5>Maximum 15 image upload at a time</h5>
                    <label for="exampleInputPassword1">Multiple Image</label>
                    <span style="color: red;" class="star">*</span>
                    <input type="file" class="form-control" id="img" name="gallery_image[]" multiple onchange="multiple_maxfilesize(this)">
                    <span class="img_error" style="color:red;"></span>

                    </div>    
                  </div>
                  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--Modal End--->

                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content -->

<script>
$(document).ready(function() {
    new DataTable('#menu_table');
});
</script>
@endsection