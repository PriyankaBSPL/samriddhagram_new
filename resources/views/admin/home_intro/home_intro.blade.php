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
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif

                            @if(Session::has('error'))
                            <div class="alert alert-danger">{{Session::get('error')}}</div>
                            @endif

                            <div class="float-right mb-3">
                                <a href="{{ route('home_intro.create') }}" class="btn btn-success">Add Home Intro</a>
                            </div>

                            <table id="homeintrotable" name="homeintrotable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Description</th>
                                        <th>Left Iamge</th>
                                        <th>Left URL</th>
                                        <th>Right Iamge</th>
                                        <th>Right URL</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($home_intros) > 0)
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($home_intros as $home_intro)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{strip_tags(html_entity_decode($home_intro->description))}}</td>
                                        <td> @if(!empty($home_intro->left_image))
                                            <a href="{{ URL::asset('/admin/upload/HomeIntro/LeftImage/'.$home_intro->left_image) }}" target="_blank">
                                                <img src="{{ URL::asset('/admin/upload/HomeIntro/LeftImage/'.$home_intro->left_image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                            </a>
                                            @endif
                                        </td>
                                        <td>{{ $home_intro->left_url }}</td>
                                        <td> @if(!empty($home_intro->right_image))
                                            <a href="{{ URL::asset('/admin/upload/HomeIntro/RightImage/'.$home_intro->right_image) }}" target="_blank">
                                                <img src="{{ URL::asset('/admin/upload/HomeIntro/RightImage/'.$home_intro->right_image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                            </a>
                                            @endif
                                        </td>
                                        <td>{{ $home_intro->right_url }}</td>
                                        <td>
                                            <a href="{{ route('home_intro.edit', $home_intro->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('home_intro.destroy',$home_intro->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this home intro?')">Delete</button>
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
        new DataTable('#homeintrotable');
    });
</script>
@endsection