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
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('page.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">

                                <button type="button" class="btn btn-warning mb-5 addField">Add Fields</button>

                                <div class="form-group">
                                    <label for="page_title">Page Title</label>
                                    <span style="color: red;" class="star">*</span>
                                    <input type="text" name="page_title" class="form-control" id="page_title" value="{{old('page_title')}}">
                                    <span class="text-danger">@error('page_title'){{$message}}@enderror</span>
                                </div>


                                <div>
                                    <div class="firstRow">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <span style="color: red;" class="star">*</span>
                                            <textarea id="summernote" class="summernote" name="descriptions[]">{{ old('description') }}</textarea>
                                            <span class="text-danger">@error('descriptions.*'){{ $message }}@enderror</span>
                                        </div>
                                        <!-- 
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <span style="color: red;" class="star">*</span>
                                            <input type="file" name="images[]" class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}" id="image">
                                            <span class="text-danger">@error('images[]'){{$message}}@enderror</span>
                                            <span class="text-danger">@error('images.*'){{ $message }}@enderror</span>
                                        </div> -->

                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <span style="color: red;" class="star">*</span>
                                            <input type="file" name="images[]" class="form-control @error('images.*') is-invalid @enderror" id="image">
                                            <span class="text-danger">@error('images.*'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Create</button>
                                <a href="{{route('page.index')}}" class="btn btn-primary">Back</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- Bootstrap CSS -->


<script>
    $(document).ready(function() {
        // Counter for the number of added rows
        var rowCount = 1;

        //FOR ADD ROWS
        $('.addField').click(function() {
            // Check if the maximum limit is reached
            if (rowCount < 5) {
                // Increment the row count
                rowCount++;

                // Append a new row
                $('.firstRow').parent().append(`
                     <div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <span style="color: red;" class="star">*</span>
                            <textarea id="summernote" class="summernote" name="descriptions[]">{{ old('description') }}</textarea>
                            <span class="text-danger">@error('descriptions.*'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <span style="color: red;" class="star">*</span>
                            <input type="file" name="images[]" class="form-control @error('images.*') is-invalid @enderror" id="image">
                            <span class="text-danger">@error('images.*'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-danger deleteRow">Remove</button>
                        </div>
                    </div>
                `);
                // Initialize Summernote for the newly added textarea
                $('.summernote').summernote();
            } else {
                alert('Maximum limit reached. You cannot add more rows.');
            }
        });

        //FOR DELETE ROWS
        $(document).on('click', '.deleteRow', function() {
            // Decrement the row count
            rowCount--;

            // Remove the row
            $(this).parent().parent().remove();
        });
    });
</script>


@endsection