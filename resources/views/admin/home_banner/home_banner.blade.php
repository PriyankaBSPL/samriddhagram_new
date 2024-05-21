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
                                <a href="{{ route('home_banner.create') }}" class="btn btn-success">Add Home Banner</a>
                            </div>

                            <table id="homebannertable" name="homebannertable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Video</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($home_banners) > 0)
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($home_banners as $home_banner)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td> @if(!empty($home_banner->video))
                                            <a href="{{ URL::asset('/admin/upload/HomeBanner/'.$home_banner->video) }}" target="_blank">
                                                <video width="320" height="240" controls>
                                                    <source src="{{ asset('/admin/upload/HomeBanner/'.$home_banner->video) }}" type="video/mp4">
                                                </video></a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('home_banner.edit', $home_banner->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('home_banner.destroy',$home_banner->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this home banner?')">Delete</button>
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
        new DataTable('#homebannertable');
    });
</script>
@endsection