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
?>
<?php
  if(check_gallery_data($row->id,$img->id)>0){
?>
                   <div class="col-lg-4">
                  <div class="gallery-traing">
                     <a href="{{url('gallery/'.$img->id)}}"> 
                     <img src="{{ URL::asset('/admin/uploads/category_image/'.$img->image)}}"  alt="">
                    
                          </a>
                  </div>
                  </div>
<?php }else{?>
   <div class="col-lg-3 col-md-3 portfolio-item">
                     <div class="portfolio-wrap">
                     <a href="#">
                        <img src="{{ URL::asset('/admin/uploads/category_image/'.$img->image)}}" class="img-fluid" alt="" data-pagespeed-url-hash="2411853377" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                        </a>
                        <div class="portfolio-info">
                           <div class="portfolio-links">
                              <a href="{{ URL::asset('/admin/uploads/category_image/'.$img->image)}}" data-gallery="portfolioGallery" class="portfolio-lightbox"><i class="bi bi-plus"></i></a>

                           </div>
                        </div>
                     </div>
                     </div>
   <?php }?>
<?php
}
 }?>
               

            </div>
<?php }?>

      </section>
      </main>
</body> 

@endsection