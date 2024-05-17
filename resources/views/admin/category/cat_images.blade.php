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
                                                 </td>
                                        </form>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>

                            </table>
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