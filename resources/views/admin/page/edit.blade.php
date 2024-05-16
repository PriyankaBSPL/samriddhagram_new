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
                        <form method="POST" action="{{ route('page.update',$pages->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <button type="button" class="btn btn-warning mb-5 addField">Add Fields</button>

                                <!-- <div class="form-group">
                                    <label for="type">Type</label>
                                    <span style="color: red;" class="star">*</span>
                                    <input type="text" name="type" class="form-control" id="type" value="{{old('type')}}">
                                    <span class="text-danger">@error('type'){{$message}}@enderror</span>
                                </div> -->

                                <div>
                                    <div class="firstRow">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <span style="color: red;" class="star">*</span>
                                            <textarea id="summernote" class="summernote" name="descriptions[]">{{ old('description', $pages->description) }}</textarea>
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
                                            @if($pages->image)
                                            <a href="{{ URL::asset('/admin/upload/Page/'.$pages->image)}}"><img src="{{ URL::asset('/admin/upload/Page/'.$pages->image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;"></a>
                                            @endif
                                            <input type="hidden" name="oldimage" class="input_class w-50 inline-block" value="{{ !empty($pages->image)?$pages->image:old('image')}}" />
                                            <span class="text-danger">@error('images.*'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Edit</button>
                                <a onclick="history.back()" class="btn btn-primary">Back</a>
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