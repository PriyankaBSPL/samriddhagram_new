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
                                <a href="{{ route('category.create') }}" class="btn btn-success">Add Category</a>
                            </div>
                            <!-- /.card-header -->
                            <table id="menu_table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Images</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($data) > 0)
                                    @php $i=1; @endphp
                                    <?php 
                                    foreach ($data as $row)
                                     {
                                        $get_menu_data=get_menu_name($row->type);
                                        
                                        ?>
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$row->title}}</td>
                                        <td>{{$get_menu_data->menu_name}}</td>
                                        <td>
                                            @if(check_category_image($row->id))
                                            <strong><a
                                                    href="{{route('category.show', $row->id)}}">View</a></strong><br />
                                            @else
                                            _____
                                            @endif
                                        </td>
                                        <form action="{{ route('category.destroy', $row->id) }}" method="POST">
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="{{ route('category.edit', $row->id) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure want to delete this category?')">Delete</button>
                                            </td>
                                        </form>
                                    </tr>
                                 <?php }?>
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