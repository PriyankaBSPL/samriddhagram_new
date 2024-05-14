@extends('admin.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Slider List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th>Title</th>
                    <th>View</th>
                    <th>Order</th>
                    <th>Banner Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php $i=1; @endphp
                    @foreach ($data as $row)
                   
                    <tr>
                    <td>{{$i++}}</td>
                    <td>{{$row->title}}</td>
                    <td>
                @if(check_menu($row->id) > 0)
                <strong><a href="{{route('menu.show', $row->id)}}">View</a></strong><br/>
                @else
                _____
                @endif
                </td> 
                <td>{{$row->position}}</td>
                <td>
                                                @if(!empty($row->banner_image))
                                                <img src="{{ URL::asset('/admin/uploads/banner_image/'.$row->banner_image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                                @else
                                                _____
                                                @endif
                                            </td>
                <form action="{{ route('menu.destroy',$row->id) }}" method="POST">
                    <td>
                        <a class="btn btn-primary"
                            href="{{ route('menu.edit',$row->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure want to delete this menu?')">Delete</button>
                    </td>
                 </form>
                  </tr>
                    @endforeach
                  
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
@endsection