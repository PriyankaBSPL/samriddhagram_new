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
                                <a href="{{ route('latest_training_image.create') }}" class="btn btn-success">Add Latest Training Image</a>
                            </div>

                            <table id="latesttrainingimage" name="latesttrainingimage" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Main Image</th>
                                        <th>Upper Image</th>
                                        <th>Lower Image</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($latest_training_images) > 0)
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($latest_training_images as $latest_training_image)
                                    <tr>
                                        <td>{{ $count }}</td>  
                                        <td>
                                            @if(!empty($latest_training_image->main_image))
                                            <a href="{{ URL::asset('/admin/upload/LatestTrainingImage/MainImage/'.$latest_training_image->main_image) }}" target="_blank">
                                                <img src="{{ URL::asset('/admin/upload/LatestTrainingImage/MainImage/'.$latest_training_image->main_image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!empty($latest_training_image->upper_image))
                                            <a href="{{ URL::asset('/admin/upload/LatestTrainingImage/UpperImage/'.$latest_training_image->upper_image) }}" target="_blank">
                                                <img src="{{ URL::asset('/admin/upload/LatestTrainingImage/UpperImage/'.$latest_training_image->upper_image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!empty($latest_training_image->lower_image))
                                            <a href="{{ URL::asset('/admin/upload/LatestTrainingImage/LowerImage/'.$latest_training_image->lower_image) }}" target="_blank">
                                                <img src="{{ URL::asset('/admin/upload/LatestTrainingImage/LowerImage/'.$latest_training_image->lower_image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                            </a>
                                            @endif
                                        </td>
                                        <td>{{strip_tags(html_entity_decode($latest_training_image->description))}}</td>
                                        <td>
                                            <a href="{{ route('latest_training_image.edit', $latest_training_image->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('latest_training_image.destroy',$latest_training_image->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this latest training image?')">Delete</button>
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
        new DataTable('#latesttrainingimage');
    });
</script>
@endsection