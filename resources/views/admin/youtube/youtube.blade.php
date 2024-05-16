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
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif

                            @if(Session::has('error'))
                            <div class="alert alert-danger">{{Session::get('error')}}</div>
                            @endif

                            <div class="float-right mb-3">
                                <a href="{{ route('youtube.create') }}" class="btn btn-success">Add Youtube Link</a>
                            </div>

                            <table id="youtubelinktable" name="youtubelinktable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Title</th>
                                        <th>Youtube Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($youtubes) > 0)
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($youtubes as $youtube)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{$youtube->title}}</td>
                                        <td>{{$youtube->youtube_link}}</td>
                                        <td>
                                            <a href="{{ route('youtube.edit', $youtube->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('youtube.destroy',$youtube->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                 <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this training program?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                    $count++;
                                    @endphp
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
        new DataTable('#youtubelinktable');
    });
</script>
@endsection