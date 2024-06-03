@extends('frontend.layouts.main')

@section('content')


<body>
  <main class="internal-pages programs-slide">
    <!-- ======= About Section ======= -->
    <!-- ======= Portfolio Section ======= -->
 <section class="internal-banner-slide">
          <div class="container">
      <h1>{{$title}}</h1>
           </div>
     </section>
    <section id="portfolio" class="portfolio training-slide">
    <?php
    foreach($data as $row){
    ?>  


      <div class="container">
       
        <h4>{{$row->title}}</h4>
      </div>

    <?php
    if(check_gallery_images($row->id)>0){
    ?>
      <div class="container-fluid">
        <div class="row gy-3 portfolio-container" data-aos="fade-up">
         <?php
         $gallery_data=get_gallery_images_data($row->id);
         foreach($gallery_data as $img){
         ?>
            <div class="col-lg-3 col-md-3 portfolio-item">
              <div class="portfolio-wrap">
                <img src="{{ URL::asset('/public/admin/uploads/gallery_image/'.$img->image)}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <div class="portfolio-links">
                    <a href="{{ URL::asset('/public/admin/uploads/gallery_image/'.$img->image)}}"
                      data-gallery="portfolioGallery" class="portfolio-lightbox"><i class="bi bi-plus"></i></a>
                  </div>
                </div>
              </div>
            </div>
      <?php }?>
        </div>
      </div>
      <?php }?>

      <?php }?>

    </section><!-- End Portfolio Section -->

    </main>
</body> 

@endsection