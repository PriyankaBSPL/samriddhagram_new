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
                                <a href="{{ route('state_page.create') }}" class="btn btn-success">Add State Page</a>
                            </div>

                            <table id="statepagetable" name="statepagetable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>State Name</th>
                                        <th>Number Of Training</th>
                                        <th>Number Of Trainee</th>
                                        <th>Url</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($state_pages) > 0)
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($state_pages as $state_page)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $state_page->state_name }}</td>
                                        <td>{{ $state_page->number_of_training }}</td>
                                        <td>{{ $state_page->number_of_trainee }}</td>
                                        <td>{{ $state_page->url }}</td>
                                        <td>
                                            <a href="{{ route('state_page.edit', $state_page->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('state_page.destroy',$state_page->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this state page detail?')">Delete</button>
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
        new DataTable('#statepagetable');
    });
</script>
@endsection