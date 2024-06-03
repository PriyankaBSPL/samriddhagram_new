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
              <div class="card-body">
                            @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif

                            @if(Session::has('error'))
                            <div class="alert alert-danger">{{Session::get('error')}}</div>
                            @endif

                            <div class="float-right mb-3">
                                <a href="{{ route('menu.create') }}" class="btn btn-success">Add Menu</a>
                            </div>
              <!-- /.card-header -->
              
                <table id="menu_table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th>Title</th>
                    <th>View</th>
                    <th>Type</th>
                    <th>Order</th>
                    <th>Banner Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if(count($data) > 0)
                  @php $i=1; @endphp
                    @foreach ($data as $row)
                   
                    <tr>
                    <td>{{$i++}}</td>
                    <td>{{$row->title}}</td>
                    <td>
                @if(check_menu($row->id) > 0)
                <strong><a href="{{route('menu.show', $row->id)}}">View</a></strong><br/>
                @else
                _____
                @endif
                </td> 
                <td>
                
                {{$row->type}}
              
                </td>
                <td>
                <?php echo $row->position??0; ?> <i id="{{$row->id}}" onclick="editcatpos(this);"  class="far editbut fa-edit"></i>
                <span  id="position_{{$row->id}}" style="display:none" >
                <input class="w-26" type="number"
                onchange="savedata(this);" id="{{$row->id}}" name="position" value="" /></span>
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <p class="text-success" id="success_{{$row->id}}"></p>
                </td>
                <!-- <td>{{$row->position}}</td> -->
                <td>
                                                @if(!empty($row->banner_image))
                                                <img src="{{ URL::asset('/admin/uploads/banner_image/'.$row->banner_image)}}" style="width:50px;height:50px;border-radius:50%;border:1px solid#ddd;">
                                                @else
                                                _____
                                                @endif
                                            </td>
                <form action="{{ route('menu.destroy',$row->id) }}" method="POST">
                    <td>
                        <a class="btn btn-primary"
                            href="{{ route('menu.edit',$row->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure want to delete this menu?')">Delete</button>
                    </td>
                 </form>
                  </tr>
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
        new DataTable('#menu_table');
    });
    function editcatpos(data) {
       // alert(data);
        $("#position_"+data.id).toggle();
     }
     function savedata(data) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var position =  data.value;
        var id =  data.id;
        var linkurl = "{{ url('/admin/update_menu_orders')}}";
        jQuery.ajax({
            url: linkurl,
            type: "POST",
            data: {id: id,position:position,update_menu_orders:'update_menu_orders'},
            cache: false,
            success: function (html) {
                setTimeout(function(){
                    location.reload();
                },); 
                $("#position_"+data.id).hide();
                $("#success_"+data.id).html('This Postion is Updated');
            },
        });
     }
</script>
@endsection