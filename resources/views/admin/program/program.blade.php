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
                                <a href="{{ route('program.create') }}" class="btn btn-success">Add Program</a>
                            </div>

                            <table id="programtable" name="programtable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Sector Type</th>
                                        <th>Page Title</th>
                                        <th>Design Type</th>
                                        <th>Full Description</th>
                                        <th>Top Description</th>
                                        <th>Side Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($programs) > 0)
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($programs as $program)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>@if ($program->sector_type == 1)Farm Sector @else Non-Farm Sector @endif</td>
                                        <!-- <td>{{ $program->page_title }}</td> -->
                                        <td>
                                            @foreach($SelectPage as $id => $title)
                                            @if($id == $program->page_title)
                                            {{ $title }}
                                            @endif
                                            @endforeach

                                        </td>
                                        <td>@if ($program->design_type == 1)Description @else Description & Image @endif</td>
                                        <td>{{ \Illuminate\Support\Str::limit(strip_tags(html_entity_decode($program->full_description)), 50) }} </td>
                                        <td>{{ \Illuminate\Support\Str::limit(strip_tags(html_entity_decode($program->top_description)), 50) }} </td>
                                        <td>{{ \Illuminate\Support\Str::limit(strip_tags(html_entity_decode($program->side_description)), 50) }} </td>
                                        <!-- <td>{{strip_tags(html_entity_decode($program->full_description))}}</td> -->
                                        <!-- <td>{{strip_tags(html_entity_decode($program->top_description))}}</td>
                                        <td>{{strip_tags(html_entity_decode($program->side_description))}}</td> -->
                                        <td> @if(!empty($program->image))
                                            <a href="{{ URL::asset('/admin/upload/Program/'.$program->image) }}" target="_blank">
                                                <img src="{{ URL::asset('/admin/upload/Program/'.$program->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('program.edit', $program->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('program.destroy',$program->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this program?')">Delete</button>
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
        new DataTable('#programtable');
    });
</script>

@endsection