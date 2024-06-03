@extends('frontend.layouts.main')
@section('content')


<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Samriddha Gram</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel='stylesheet' href='{{URL::asset("public/frontend/assets/css/slick-carousel@1.8.1_slick_slick.css")}}'>
  <link rel='stylesheet' href='{{URL::asset("public/frontend/assets/css/ajax_libs_slick-carousel_1.5.9_slick-theme.min.css")}}'>
  <link href="{{URL::asset('public/frontend/assets/img/favicon.webp')}}" rel="icon">
</head>

<body>
  <!-- on-load popup -->


  <div class="on-load">
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">


      @foreach($popups as $popup)
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel" style="text-align:center;width: 100%;margin-bottom: 10px;">{{$popup->title}}</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="height:auto!important;">
            <div class="row">
              <div class="col-md-12">

              @if($popup->design_type == 1)
                <p style="font-size:17px;line-height:27px;"> {!! $popup->description !!}</p>
               @else
               <img src="{{URL::asset('public/admin/upload/PopUp/' .$popup->image)}}"> 
                @endif

              </div>

            </div>
          </div>
        </div>
@endforeach
      </div>
    </div>
  </div>
 


  <!-- ======= Hero Section ======= -->

<?php
foreach($sliders as $slider2){
?>
  <div class="modal fade" id="exampleModal{{$slider2->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title"><?=$slider2->title?></h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        {!!$slider2->description!!}
        </div>

      </div>
    </div>
  </div>
<?php }?>

  <div class="home-banner">
    <div class="video-wrapper">
      @foreach($home_banners as $home_banner)
      <video autoplay muted loop playsinline preload="metadata" style="width:100%;">
        <source src="{{URL::asset('/public/admin/upload/HomeBanner/' .$home_banner->video)}}" type="video/mp4">
      </video>
      @endforeach
      <div class="container">
        <div class="video-slide">
          <h1>Helping</h1>
          <h2>Rural India</h2>
          <p>Progress Beyond Statistics</p>
        </div>
      </div>
    </div>
  </div>

  <!-- End Hero -->
  <main id="main">
    <section class="intro">
      @foreach($home_intros as $home_intro)
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
          

            <p>{!! $home_intro->description !!}</p>

          </div>
          <div class="col-lg-4 intro-ajavika-logo">
            <div class="row">
              <div class="col-lg-6 ajaveika-paragraph">
                <a href="{{$home_intro->left_url}}" target="_blank">
                  <img src="{{URL::asset('/public/admin/upload/HomeIntro/LeftImage/' .$home_intro->left_image)}}" class="natnal-img">
                </a>
              </div>
              <div class="col-lg-6">
                <a href="{{$home_intro->right_url}}" target="_blank"><img src="{{URL::asset('/public/admin/upload/HomeIntro/RightImage/' .$home_intro->right_image)}}"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </section>

    <!-- ======= Clients Section ======= -->
    <section class="end-to-end">
      <div class="container">

        <div class="custom-slider">
          <?php
           foreach($sliders as $slider){
          ?>
          <div class="custom-box">
            <img src="{{URL::asset('public/admin/uploads/slider_logo/'.$slider->logo)}}">
            <h5 style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal{{$slider->id}}">{{$slider->title}}</h5>
          </div>
          <?php }?>
          
        </div>

      </div>
    </section><!-- End Clients Section -->
    <div class="section-title program-titlt">
      <h2>Programs And Training</h2>
    </div>
    <section class="program-training">
      <div class="container">

        <div class="d-flex align-items-center program-inr">
          @foreach($program_and_trainings as $program_and_trainings)
          <div>
            <img class="img-fluid" src="{{URL::asset('/public/admin/upload/ProgramAndTraining/' .$program_and_trainings->image)}}" alt="" />
            <h5>{{$program_and_trainings->title}}</h5>
          </div>
          @endforeach
          
        </div>
      </div>
    </section>

    <section id="about" class="about">
      <div class="container">
        <div class="row content align-items-center">
          <div class="col-lg-7 training-slide">
            <div class="row">
              @foreach($latest_training_images as $latest_training_image)
              <div class="col-lg-7">
                <div class="img-border">
                  <img class="img-fluid rounded-3 mb-2" src="{{URL::asset('/public/admin/upload/LatestTrainingImage/MainImage/' .$latest_training_image->main_image)}}" alt="" />
                </div>
                <h5>{!! $latest_training_image->description !!}
                </h5>

              </div>
              <div class="col-lg-5">
                <img class="img-fluid rounded-3 mb-3" src="{{URL::asset('/public/admin/upload/LatestTrainingImage/UpperImage/' .$latest_training_image->upper_image)}}" alt="" />

                <img class="img-fluid rounded-3 mb-3" src="{{URL::asset('/public/admin/upload/LatestTrainingImage/LowerImage/' .$latest_training_image->lower_image)}}" alt="" />
              </div>
              @endforeach
              
            </div>
          </div>
          <div class="col-lg-5 welcome">
            <h3>Latest Training</h3>
            @foreach($latest_trainings as $latest_training)
            <ul>
              <li>{!! $latest_training->description !!}</li>
            
            </ul>
            @endforeach
          </div>
        </div>
      </div>
    </section><!-- End About Us Section -->




    <section class="calendar">
      <div class="container">
        <div class="row justify-content-start aos-init aos-animate" data-aos="fade-left">
          <div class="col-lg-3 calnder-column">
            <div class="calendar-head">
              <h3>TRAINING</h3>
              <h2>CALENDAR</h2>
              <h1>{{ date('F Y') }}</h1>
            </div>
          </div>

          @foreach($trainings as $training)
          <div class="col-lg-3 p-1">
            <div class="calendar-txt">
              <div class="card-body">
                <h4 class="text-center"> {{ date('d', strtotime($training->startdate)) }}-{{ date('d', strtotime($training->enddate)) }}
                  {{ date('M Y', strtotime($training->startdate)) }}
                </h4>
              </div>
              <div class="card-text p-2">
                <h6>Programme Title</h6>
                <p class="program-details">{{$training->title}}</p>
                <h6 class="pt-3 px-0"><i class='bi bi-clock px-1'></i>Duration</h6>
                <p class="px-3">{{$training->duration}}</p>
                <h6 class="pt-3">Target Beneficiaries</h6>
                <p>{{$training->beneficiaries}}</p>
              </div>
            </div>
          </div>
          @endforeach

        
        </div>
      </div>
    </section>

    <section class="testimonials-gram voics-slide-inr">

      <div>
        <div class="section-titles voice-grm">
          <h4>VOICE OF</h4>
          <h2>Samriddha Gram</h2>
        </div>

        <div class="container">
          <div class="voice-slide">
            @foreach($youtubes as $youtube)
            <div>
              <h3>{{$youtube->title}}</h3>
              <iframe width="100%" height="400" src="{{$youtube->youtube_link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            @endforeach

            
          </div>
        </div>
        <div class="container-fluid g-0">
          <div class="gallery-slider swiper">
            <div class="swiper-wrapper align-items-center">
              @foreach($home_gallerys as $home_gallery)
              <div class="swiper-slide"><img src="{{URL::asset('/public/admin/upload/HomeGallery/' .$home_gallery->image)}}" data-gallery="portfolioGallery" class="img-fluid portfolio-lightbox" alt=""></div>
              
              @endforeach
            </div>
            <div class="swiper-pagination"></div>
          </div>

        </div>
      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Clients Section ======= -->

    <section class="clients-pratners">
      <div class="container">

        <div class="section-title">
          <h2>Our Partners</h2>
        </div>

        <div class="wrapper">
          <div class="my-slider">
            @foreach($partners as $partner)
            <div><img src="{{URL::asset('/public/admin/upload/HomeGallery/' .$partner->image)}}" class="img-fluid" alt=""></div>
           
            @endforeach
          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->
    <!-- ======= Clients Section ======= -->
    <!-- End Clients Section -->

  </main><!-- End #main -->
  <script src='{{URL::asset("public/frontend/assets/js/ajax_libs_jquery_2.1.3_jquery.min.js")}}'></script>

  <script>
    $(document).ready(function() {
      $('.my-slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        speed: 200,
        infinite: true,
        autoplaySpeed: 2000,
        autoplay: true,
        responsive: [{
            breakpoint: 991,
            settings: {
              slidesToShow: 3,
            }
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 1,
            }
          }
        ]
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $('.voice-slide').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        speed: 200,
        infinite: true,
        autoplaySpeed: 2000,
        autoplay: true,
        responsive: [{
            breakpoint: 991,
            settings: {
              slidesToShow: 1,
            }
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 1,
            }
          }
        ]
      });
    });
  </script>


  <script>
    $(document).ready(function() {
      $('.my-video').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        speed: 100,
        infinite: true,
        autoplaySpeed: 5000,
        autoplay: true,
        responsive: [{
            breakpoint: 991,
            settings: {
              slidesToShow: 1,
            }
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 1,
            }
          }
        ]
      });
    });
  </script>

  <script>
    // Show the modal when the page is loaded
    window.onload = function() {
      var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
        keyboard: false
      });
      myModal.show();
    };
  </script>
  <!-- ======= Footer ======= -->

</body>
@endsection