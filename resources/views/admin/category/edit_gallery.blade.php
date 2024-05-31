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
              <form action="{{route('gallery.update',$data->id)}}" method="post" enctype="multipart/form-data" >
              @csrf
              @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <span>*</span>
                    <input type="text" class="form-control" name="title" value="{{$data->title}}" placeholder="Enter Title">
                    <span class="text-danger"> @error('title'){{$message}} @enderror</span>
                  </div>
                  <div id="txtPDF" >
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Gallery Image:</label>
                                        <span class="star">*</span>
                                    </div>
                                </div>
                                
                            </div>
                        <table class="table table-striped" id="img_table">
                            <thead>
                                <tr class="warning">
                                    <th>Sr.No.</th>
                                    <th>Images</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                <tbody id="tbl_row">
                                <?php 
                                
                                if($gimg)
                                {
                                    $i=1;
                                   foreach($gimg as $val)
                                {
                                ?>
                                    <tr>
                                        <td><?=$i++?></td>
                                        <td> 
                                            <img src="{{ URL::asset('/admin/uploads/gallery_image/'.$val->image)}}"
                                                    style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                                    <input class="form-control" name="oldid[]" value="{{$val->id}} " type="hidden">
                                                    <input class="form-control" name="oldimag[]" value="{{$val->image}} " type="hidden">
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">

                                        </td>
                        <td><a  class="btn btn-danger delete-row btn btn-danger"  onclick="removeImg('{{$val->image}}, <?php echo $val->id; ?>')" >Delete</a></td>                          
                                    </tr>
                                   <?php 
                                }
                                }?>
                                </tbody>
                            </table>
                           
                            </div>
                            <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <h6>Maximum 15 image upload at a time</h6>
                                <a class="btn btn-success add-row" href="javascript:void(0);"> <i class="bi bi-plus-square-fill"></i>add
                                                                </a>
                                
                                </div>
                             </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                <input type="file" value="" style="display: none;" multiple name="image[]"  onchange="onlytxtuplodeimage(this);"  class="input_class w-50 imagesnew inline-block" id="txtimage" />
                                   </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xm-12">
                                <div class="pull-right">
                               
                                    <input name="cmdsubmit" type="submit" class="btn btn-success" id="cmdsubmit" value="Submit" />&nbsp;
                                   <a href="{{ url('/admin/photoGallery')}}" class="btn btn-primary" >Back</a>
                                    <input type="hidden" name="random" value="" />
                                </div>
                            </div>
                        </div>
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
    <script>
    
$(document).ready(function () {
    $(".add-row").click(function(){
        $('.imagesnew').toggle();
    });
      
    $('.table-striped').on('click', '.delete-row', function () {
            $(this).closest('tr').remove();
    })
    new DataTable('#img_table');

});
      function removeImg(img, id){
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    var linkurl = "{{ url('admin/delete_gallery_images/')}}";
   // alert(linkurl);
    var imgname=img;
    
	$('span.img-removed').remove();
	$.ajax({
		'url' : linkurl,
		'type' : 'POST',
		'data' : { 'rowid' : imgname},
         beforeSend:function(){
                return confirm("Are you sure want to delete image?");
        },
		'success' : function(data){
			var obj = data;
			if(obj){
               
                location.reload();
			}
		}
		
	});
	
}
      </script>
@endsection