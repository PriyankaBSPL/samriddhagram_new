@extends('frontend.layouts.main')

@section('content')


<body>

   <main class="internal-pages programs-slide">
 <section class="internal-banner-slide">
          <div class="container">
       <h1>{{$title}}</h1>
           </div>
     </section>
      <section class="training-slide">
         <div class="container">
          
           <?php
           foreach($gallery as $row){
           ?>
            <div class="row gallery-training-slide">
               <h3>{{$row->title}}</h3>
             
<?php
if(check_category_image($row->id))
{
   $category_images=get_category_image($row->id);
   foreach($category_images as $img){
      if(check_gallery_data($row->id,$img->id)>0){
         $url="gallery/$img->id";
      }else{
         $url="#";
      }
?>
                   <div class="col-lg-4">
                  <div class="gallery-traing">
                     <a href="{{url($url)}}"> 
                     <img src="{{ URL::asset('/admin/uploads/category_image/'.$img->image)}}"  alt="">
                    
                          </a>
                  </div>
                  </div>

<?php
}
 }?>
               

            </div>
<?php }?>

      </section>
      </main>
</body> 

@endsection