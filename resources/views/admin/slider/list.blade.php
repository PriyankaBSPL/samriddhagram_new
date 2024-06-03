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
                <a href="{{ route('slider.create') }}" class="btn btn-success">Add Slider</a>
              </div>
              <!-- /.card-header -->

              <table id="slider_table" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Logo</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($data) > 0)
                  @php $i=1; @endphp
                  @foreach ($data as $row)

                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$row->title}}</td>
                    <td>{{$row->description}}</td>
                    </td>
                    <!-- <td>{{$row->position}}</td> -->
                    <td>
                      @if(!empty($row->logo))
                      <img src="{{ URL::asset('/admin/uploads/slider_logo/'.$row->logo)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                      @else
                      _____
                      @endif
                    </td>
                    <form action="{{ route('slider.destroy',$row->id) }}" method="POST">
                      <td>
                        <a class="btn btn-primary" href="{{ route('slider.edit',$row->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this slider?')">Delete</button>
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
    new DataTable('#slider_table');
  });
</script>
@endsection