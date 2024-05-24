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
                                <a href="{{ route('program_and_training.create') }}" class="btn btn-success">Add Program Training</a>
                            </div>

                            <table id="programandtrainingtable" name="programandtrainingtable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($program_and_trainings) > 0)
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($program_and_trainings as $program_and_training)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $program_and_training->title }}</td>
                                        <td>  @if(!empty($program_and_training->image))
                                                <a href="{{ URL::asset('/admin/upload/ProgramAndTraining/'.$program_and_training->image) }}" target="_blank">
                                                    <img src="{{ URL::asset('/admin/upload/ProgramAndTraining/'.$program_and_training->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                                </a>
                                                @endif
                                            </td>
                                        <td>
                                            <a href="{{ route('program_and_training.edit', $program_and_training->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('program_and_training.destroy',$program_and_training->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                 <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this program and training?')">Delete</button>
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
        new DataTable('#programandtrainingtable');
    });
</script>
@endsection