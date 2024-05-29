@extends('frontend.layouts.main')
@section('content')


<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Samriddha Gram</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel='stylesheet' href='{{URL::asset("frontend/assets/css/slick-carousel@1.8.1_slick_slick.css")}}'>
  <link rel='stylesheet' href='{{URL::asset("frontend/assets/css/ajax_libs_slick-carousel_1.5.9_slick-theme.min.css")}}'>
  <link href="{{URL::asset('frontend/assets/img/favicon.webp')}}" rel="icon">
</head>

<body>
  <!-- on-load popup -->
  <div class="on-load">
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">


        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel" style="text-align:center;width: 100%;margin-bottom: 10px;">One Day National Workshop on the Occasion of Santatisrijanam</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="height:auto!important;">
            <div class="row">
              <div class="col-md-12">

                <p style="font-size:17px;line-height:27px;">Join us for an enlightening One Day National Workshop organised by the Patanjali Ayurveda College in collaboration with Patanjali Research Foundation and University of Patanjali, Sponsored by Ministry Of AYUSH!
                  Embrace the journey of parenthood from the very beginning! Join us for a transformative day at 'SANTATISRIJANAM' – A national workshop on Garbha Sanskar. </p>
                <p style="font-size:17px;line-height:27px;">Let's nurture the future generation with love, wisdom, and positivity. <br />
                  Kindly connect with us to reserve your spot!</p>
                <p style="font-size:17px;line-height:27px;">Registration link: <a href="https://forms.gle/ao4ZSijidLaLHu2t8" target="_blank">https://forms.gle/ao4ZSijidLaLHu2t8</a></p>

              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>


  <!-- ======= Hero Section ======= -->

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Comprehensive support to women-led SHGs</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Samriddha Gram has been supporting women-led SHGs since its inception. Under the National Rural Development
            Mission, it has connected with numerous SHGs in different states of India and catered to their empowerment
            needs. It understands the importance of restructuring self-help groups at their core so they embrace
            entrepreneurship. The NRO (National Resource Organization) wants women to lead this positive change in rural
            India. Thus, women-led SHGs are its top priority, and their growth is its goal.</p>

          <h4>How do SHGs work?</h4>
          <p>SHGs are grassroots-level organizations aiming to nurture their members' collective socio-economic status.
            They are either focused on eradicating common problems or improving their living standards. These voluntary
            groups comprise 18-25 women who help the organization function. SHGs greatly help rural communities as their
            members are the direct beneficiaries of their efforts.</p>
          <h4>How does Samriddha Gram help?</h4>
          <p>Samriddha Gram follows a clinical strategy in helping women-led SHGs. It provides them with the correct
            tools, resources, and information to achieve their targets. Moreover, it focuses on developing an
            enterprising system where individuals are more inclined towards doing business. It is helping SHGs connect
            with distant markets where they find the right customers and earn regular profits. The NRO is not only
            creating skilled workers but entrepreneurs who drive the economic success of their community.</p>
          <p>Its contribution can be analyzed by all the training and programs taking care of the upliftment of
            women-led SHGs. Samriddha Gram is the precursor of sustainability and strength among SHGs while being a
            friendly reminder of the capabilities of rural India.</p>
        </div>

      </div>
    </div>
  </div>


  <div class="modal fade" id="exampleModal-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Skill development on scientific grounds</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Samriddha Gram is focused on using science as the foundation for skill development among women-led SHGs. It
            acknowledges the unique requirements of rural regions in creating productive individuals. Being true to the
            nature of the village lifestyle, it understands the need to educate the masses through the essence of
            familiarity. Therefore, it works for skill development in organic farming, animal husbandry, food and dairy,
            soil testing, yoga, and rural tourism.</p>
          <h4>Our functions</h4>
          <p>The NRO undertakes the arduous task of enlightening communities about the best practices in various
            economic fields. It teaches individuals the science behind “why something works?” and “how can it work
            better?”. For instance, the act of soil testing is helping farmers understand their soil’s actual
            personality. It provides exact data so they can make informed decisions for the best possible outcomes. This
            otherwise ignored aspect of farming has helped people develop a scientific attitude instead of leaving
            harvest on ignorant speculation.</p>
          <h4>Our contribution</h4>
          <p>It is not rocket science, but it matters! Samriddha Gram envisions training rural individuals in various
            fields closely connected to village life. It has launched strategic programs in food and dairy training,
            organic farming, soil testing, etc. while decoding the science behind its optimal practices. The “Dharti ka
            Doctor” is one such initiative that imparts self-sufficiency among farmers with the help of science and
            technology. Notably, the focus on Yogic science, highest quality dairy production, sustainable agriculture,
            and animal husbandry also impacts the outlook of rural SHGs.</p>
          <p>Samriddha Gram is working tirelessly to connect Indian villages with modern scientific literature so they
            understand the cause-and-effect relationship of their activities.</p>
        </div>

      </div>
    </div>
  </div>


  <div class="home-banner">
    <div class="video-wrapper">
      @foreach($home_banners as $home_banner)
      <video autoplay muted loop playsinline preload="metadata" style="width:100%;">
        <source src="{{URL::asset('/admin/upload/HomeBanner/' .$home_banner->video)}}" type="video/mp4">
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
            <!-- <p>Our nation thrives on the prosperity of its villages. </p>
            <p>India is the home of extensive rural heritage. A place where existence is deeply rooted in the texture of
              its soil, the complexion of its agriculture, and the innocent blush on the face of its people. Samriddha
              Gram envisions saving and supporting this unique identity through its socio-economic development
              activities. </p>
            <p>We empower, enrich and engage the agrarian economy toward new dimensions of endless financial
              possibilities. </p> -->

            <p>{!! $home_intro->description !!}</p>

          </div>
          <div class="col-lg-4 intro-ajavika-logo">
            <div class="row">
              <div class="col-lg-6 ajaveika-paragraph">
                <a href="{{$home_intro->left_url}}" target="_blank">
                  <img src="{{URL::asset('/admin/upload/HomeIntro/LeftImage/' .$home_intro->left_image)}}" class="natnal-img">
                </a>
              </div>
              <div class="col-lg-6">
                <a href="{{$home_intro->right_url}}" target="_blank"><img src="{{URL::asset('/admin/upload/HomeIntro/RightImage/' .$home_intro->right_image)}}"></a>
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
          <div class="custom-box">
            <img src="{{URL::asset('frontend/assets/img/comprehensive-support.webp')}}">
            <h5 style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal">Comprehensive support to
              women-led SHGs </h5>
          </div>
          <div class="custom-box">
            <img src="{{URL::asset('frontend/assets/img/skill-development.webp')}}">
            <h5 style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal-1">Skill development on
              scientific grounds</h5>
          </div>
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
            <img class="img-fluid" src="{{URL::asset('/admin/upload/ProgramAndTraining/' .$program_and_trainings->image)}}" alt="" />
            <h5>{{$program_and_trainings->title}}</h5>
          </div>
          @endforeach
          <!-- <div>
            <img class="img-fluid" src="{{URL::asset('frontend/assets/img/program-A.png')}}" alt="" />
            <h5>Krishi Sakhi</h5>
          </div>
          <div>
            <img class="img-fluid" src="{{URL::asset('frontend/assets/img/bee-keeping-icon.webp')}}" alt="" />
            <h5>Bee Keeping</h5>
          </div>
          <div>
            <img class="img-fluid" src="{{URL::asset('frontend/assets/img/dkd-icon.webp')}}" alt="" />
            <h5>Dharti Ka Doctor</h5>
          </div>
          <div>
            <img class="img-fluid" src="{{URL::asset('frontend/assets/img/program-C.png')}}" alt="" />
            <h5>POS</h5>
          </div>
          <div>
            <img class="img-fluid" src="{{URL::asset('frontend/assets/img/hyper-local-icon.webp')}}" alt="" />
            <h5>Hyperlocal</h5>
          </div>
          <div>
            <img class="img-fluid" src="{{URL::asset('frontend/assets/img/program-E.png')}}" alt="" />
            <h5>Enterpreneurship</h5>
          </div> -->
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
                  <img class="img-fluid rounded-3 mb-2" src="{{URL::asset('/admin/upload/LatestTrainingImage/MainImage/' .$latest_training_image->main_image)}}" alt="" />
                </div>
                <h5>{!! $latest_training_image->description !!}
                </h5>

              </div>
              <div class="col-lg-5">
                <img class="img-fluid rounded-3 mb-3" src="{{URL::asset('/admin/upload/LatestTrainingImage/UpperImage/' .$latest_training_image->upper_image)}}" alt="" />

                <img class="img-fluid rounded-3 mb-3" src="{{URL::asset('/admin/upload/LatestTrainingImage/LowerImage/' .$latest_training_image->lower_image)}}" alt="" />
              </div>
              @endforeach
              <!-- <div class="col-lg-7">
                <div class="img-border">
                  <img class="img-fluid rounded-3 mb-2" src="{{URL::asset('frontend/assets/img/latest-tarining-img.webp')}}" alt="" />
                </div>
                <h5><strong>"Udyam Sakhi"</strong> received <strong>Traditional Eco-Art Training</strong> under the
                  <strong>National Rural Livelihood Mission</strong> at Samriddha Gram Patanjali Training Centre,
                  Haridwar.
                </h5>

              </div>
              <div class="col-lg-5">
                <img class="img-fluid rounded-3 mb-3" src="{{URL::asset('frontend/assets/img/latest-tarining-img-D.webp')}}" alt="" />

                <img class="img-fluid rounded-3 mb-3" src="{{URL::asset('frontend/assets/img/latest-tarining-img-E.webp')}}" alt="" />
              </div> -->
            </div>
          </div>
          <div class="col-lg-5 welcome">
            <h3>Latest Training</h3>
            @foreach($latest_trainings as $latest_training)
            <ul>
              <li>{!! $latest_training->description !!}</li>
              <!-- <li>Salutations and inauguration of the Traditional eco art lab.</li>
              <li>An overview of the handicraft sector and a display of Aipan artwork.</li>
              <li>Quality Control session on handicrafts sector.</li>
              <li>A hands-on workshop for painting walls, stone, fabric, and creating art.</li>
              <li>A briefing on the legal framework and a session on the role of digital marketing in handicrafts.</li>
              <li>Practical instruction in painting sarees, jewelry, coasters, and keychains.</li>
              <li>Acharya Balkrishna Ji distributed certificates, and the occasion was considered a success.</li> -->
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

          <!-- <div class="col-lg-3 p-1">
            <div class="calendar-txt">
              <div class="card-body">
                <h4 class="text-center">06-11 May 2024</h4>
              </div>
              <div class="card-text p-2">
                <h6>Programme Title</h6>
                <p class="program-details">Training Programme on Prasuti Tantra & Stree-Roga</p>
                <h6 class="pt-3 px-0"><i class='bi bi-clock px-1'></i>Duration</h6>
                <p class="px-3">30 hours</p>
                <h6 class="pt-3">Target Beneficiaries</h6>
                <p>BAMS (Bachelor of Ayurvedic Medicine and Surgery), PG Diploma Candidates and Other interested candidates</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 p-1">
            <div class="calendar-txt">
              <div class="card-body">
                <h4 class="text-center">14-18 May 2024</h4>
              </div>
              <div class="card-text p-2">
                <h6>Programme Title</h6>
                <p class="program-details">Aquaculture Training Program Exploring Aquatic Biology, Economics, and Fisheries Traceability System</p>
                <h6 class="pt-3 px-0"><i class='bi bi-clock px-1'></i>Duration</h6>
                <p class="px-3">30 hours</p>
                <h6 class="pt-3">Target Beneficiaries</h6>
                <p>Graduates and Post Graduates of Fisheries and Aquaculture, Botany, and Life Sciences</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 p-1">
            <div class="calendar-txt">
              <div class="card-body">
                <h4 class="text-center">22-27 May 2024</h4>
              </div>
              <div class="card-text p-2">
                <h6>Programme Title</h6>
                <p class="program-details">Farm-Based Sustainable Livelihood Opportunities for Rural Youth</p>
                <h6 class="pt-3 px-0"><i class='bi bi-clock px-1'></i>Duration</h6>
                <p class="px-3">30 hours</p>
                <h6 class="pt-3">Target Beneficiaries</h6>
                <p>Rural Youth & Development Professionals, Farmers and SHGs members</p>
              </div>
            </div>

          </div> -->
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

            <!-- <div>
              <h3>Bakery Training</h3>
              <iframe width="100%" height="400" src="https://www.youtube.com/embed/nWhEbeZOQGM" title="From wheat fields to warm pastries, it&#39;s a recipe for rural prosperity! 🌟 | Samriddha Gram |" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <div>
              <h3>Bakery Training</h3>
              <iframe width="100%" height="400" src="https://www.youtube.com/embed/2O4umSC2FXM" title="commencing our Advanced Training on the Art of Baking for Rural Entrepreneurs with Uttarakhand SHGs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <div>
              <h3>Beekeeping & Honey Traceability Training</h3>
              <iframe width="100%" height="400" src="https://www.youtube.com/embed/pjvnANtfpAs" title="Ms. Rani Saini shares her transformative experience of Beekeeping Training Program #patanjali" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <div>
              <h3>Beekeeping & Honey Traceability Training</h3>
              <iframe width="100%" height="400" src="https://www.youtube.com/embed/Q6v8kYfVyOw" title="Unwrap the essential skills and knowledge gained from SAMRIDDHA GRAM&#39;s honey beekeeping training 🍯" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <div>
              <h3>DKD Training</h3>
              <iframe width="100%" height="400" src="https://www.youtube.com/embed/Ra0GpUi3RDg" title="Kamlesh Kumari from Sirmaur, shares her journey after undergoing DKD training with SAMRIDDHA GRAM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <div>
              <h3>DKD Training</h3>
              <iframe width="100%" height="400" src="https://www.youtube.com/embed/lF1pxOcsgpg" title="Assam&#39;s Krishi Sakhi reviews on Dharti ka Doctor kit TRAINING" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <div>
              <h3>POS Machine Training</h3>
              <iframe width="100%" height="400" src="https://www.youtube.com/embed/bnMgEFvk7f4" title="Samriddha Gram leads the way by providing training on B-POS to Self-Help Groups (SHGs)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <div>
              <h3>POS Machine Training</h3>
              <iframe width="100%" height="400" src="https://www.youtube.com/embed/K7k54Nn8Ld0" title="Transforming Futures: Inspiring Samriddha Gram&#39;s Training Testimonials in Bhopal" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div>
              <h3>Traditional Eco-Art Training</h3>
              <iframe width="100%" height="400" src="https://www.youtube.com/embed/8kD-f6SeNgQ" title="Balvinder Kaur Virk from Nainital. Uttarakhand shares her Eco-art training experience 👩🏽‍🎨🖌" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <div>
              <h3>Empowering Self-Help Groups</h3>
              <iframe width="100%" height="400" src="https://www.youtube.com/embed/PA5eN64N45U" title="Patanjali Empowers Self Help Groups: Transforming Lives and Livelihoods! 🌱💼" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div> -->
          </div>
        </div>
        <div class="container-fluid g-0">
          <div class="gallery-slider swiper">
            <div class="swiper-wrapper align-items-center">
              @foreach($home_gallerys as $home_gallery)
              <div class="swiper-slide"><img src="{{URL::asset('/admin/upload/HomeGallery/' .$home_gallery->image)}}" data-gallery="portfolioGallery" class="img-fluid portfolio-lightbox" alt=""></div>
              <!-- <div class="swiper-slide"><img src="{{URL::asset('frontend/assets/img/photo-gallery-slider/assam-farm-training-batch-1.jpg')}}" data-gallery="portfolioGallery" class="img-fluid portfolio-lightbox" alt=""></div>
              <div class="swiper-slide"><img src="{{URL::asset('frontend/assets/img/photo-gallery-slider/assam-farm-training-batch-2.jpg')}}" data-gallery="portfolioGallery" class="img-fluid portfolio-lightbox" alt=""></div>
              <div class="swiper-slide"><img src="{{URL::asset('frontend/assets/img/photo-gallery-slider/hp-farm-training-batch-1.jpg')}}" data-gallery="portfolioGallery" class="img-fluid portfolio-lightbox" alt=""></div>
              <div class="swiper-slide"><img src="{{URL::asset('frontend/assets/img/photo-gallery-slider/hp-farm-training-batch-2.jpg')}}" data-gallery="portfolioGallery" class="img-fluid portfolio-lightbox" alt=""></div>
              <div class="swiper-slide"><img src="{{URL::asset('frontend/assets/img/photo-gallery-slider/hp-non-farm.jpg')}}" data-gallery="portfolioGallery" class="img-fluid portfolio-lightbox" alt=""></div>
              <div class="swiper-slide"><img src="{{URL::asset('frontend/assets/img/photo-gallery-slider/MP-Farm-Training-Batch-1.webp')}}" data-gallery="portfolioGallery" class="img-fluid portfolio-lightbox" alt=""></div>

              <div class="swiper-slide"><img src="{{URL::asset('frontend/assets/img/photo-gallery-slider/mp-non-farm.jpg')}}" data-gallery="portfolioGallery" class="img-fluid portfolio-lightbox" alt=""></div>
              <div class="swiper-slide"><img src="{{URL::asset('frontend/assets/img/photo-gallery-slider/meghalya-farm-non-farm.jpg')}}" data-gallery="portfolioGallery" class="img-fluid portfolio-lightbox" alt=""></div>
              <div class="swiper-slide"><img src="{{URL::asset('frontend/assets/img/photo-gallery-slider/meghalya-non-farm.jpg')}}" data-gallery="portfolioGallery" class="img-fluid portfolio-lightbox" alt=""></div>
              <div class="swiper-slide"><img src="{{URL::asset('frontend/assets/img/photo-gallery-slider/punjab-farm.jpg')}}" data-gallery="portfolioGallery" class="img-fluid portfolio-lightbox" alt=""></div>

              <div class="swiper-slide"><img src="{{URL::asset('frontend/assets/img/photo-gallery-slider/Uttrakhand-Beekeeping-honey-Tracebility-Training-gallery-B.webp')}}" data-gallery="portfolioGallery" class="img-fluid portfolio-lightbox" alt=""></div>
              <div class="swiper-slide"><img src="{{URL::asset('frontend/assets/img/photo-gallery-slider/Uttrakhand-Beekeeping-honey-Tracebility-Training-gallery-A.webp')}}" data-gallery="portfolioGallery" class="img-fluid portfolio-lightbox" alt=""></div>

              <div class="swiper-slide"><img src="{{URL::asset('frontend/assets/img/photo-gallery-slider/uttrakhand-farm.jpg')}}" data-gallery="portfolioGallery" class="img-fluid portfolio-lightbox" alt=""></div>
              <div class="swiper-slide"><img src="{{URL::asset('frontend/assets/img/photo-gallery-slider/uttrakhand-non-farm.jpg')}}" data-gallery="portfolioGallery" class="img-fluid portfolio-lightbox" alt=""></div>
              <div class="swiper-slide"><img src="{{URL::asset('frontend/assets/img/photo-gallery-slider/Uttarakhand-Bakery-Training-Batch-1.jpg')}}" data-gallery="portfolioGallery" class="img-fluid portfolio-lightbox" alt=""></div>
              <div class="swiper-slide"><img src="{{URL::asset('frontend/assets/img/gallery/traditional-eco-art-training/Uttarakhand-Traditional-Eco-art-Training-Batch-1.webp')}}" data-gallery="portfolioGallery" class="img-fluid portfolio-lightbox" alt=""></div> -->
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
            <div><img src="{{URL::asset('/admin/upload/HomeGallery/' .$partner->image)}}" class="img-fluid" alt=""></div>
            <!-- <div><img src="{{URL::asset('frontend/assets/img/usrlm-logo.webp')}}" class="img-fluid" alt=""></div>
            <div><img src="{{URL::asset('frontend/assets/img/partner-logo-B.webp')}}" class="img-fluid" alt=""></div>
            <div><img src="{{URL::asset('frontend/assets/img/partner-logo-C.webp')}}" class="img-fluid" alt=""></div>
            <div><img src="{{URL::asset('frontend/assets/img/partner-logo-D.webp')}}" class="img-fluid" alt=""></div>
            <div><img src="{{URL::asset('frontend/assets/img/partner-logo-E.webp')}}" class="img-fluid" alt=""></div>
            <div><img src="{{URL::asset('frontend/assets/img/partner-logo-F.webp')}}" class="img-fluid" alt=""></div>
            <div><img src="{{URL::asset('frontend/assets/img/clients/partner-logo-1.webp')}}" class="img-fluid" alt=""></div>
            <div><img src="{{URL::asset('frontend/assets/img/clients/partner-logo-2.webp')}}" class="img-fluid" alt=""></div>
            <div><img src="{{URL::asset('frontend/assets/img/clients/partner-logo-3.webp')}}" class="img-fluid" alt=""></div>
            <div><img src="{{URL::asset('frontend/assets/img/clients/partner-logo-4.webp')}}" class="img-fluid" alt=""></div>
            <div><img src="{{URL::asset('frontend/assets/img/clients/partner-logo-5.webp')}}" class="img-fluid" alt=""></div>
            <div><img src="{{URL::asset('frontend/assets/img/clients/partner-logo-6.webp')}}" class="img-fluid" alt=""></div>
            <div><img src="{{URL::asset('frontend/assets/img/clients/partner-logo-7.webp')}}" class="img-fluid" alt=""></div>
            <div><img src="{{URL::asset('frontend/assets/img/clients/partner-logo-8.webp')}}" class="img-fluid" alt=""></div>
            <div><img src="{{URL::asset('frontend/assets/img/clients/partner-logo-9.webp')}}" class="img-fluid" alt=""></div>
            <div><img src="{{URL::asset('frontend/assets/img/clients/agriscience-logo.webp')}}" class="img-fluid" alt=""></div>
            <div><img src="{{URL::asset('frontend/assets/img/clients/cream-bell-logo.webp')}}" class="img-fluid" alt=""></div>
            <div><img src="{{URL::asset('frontend/assets/img/clients/dkd-logo.webp')}}" class="img-fluid" alt=""></div>
            <div><img src="{{URL::asset('frontend/assets/img/clients/ni-msme-logo.webp')}}" class="img-fluid" alt=""></div>
            <div><img src="{{URL::asset('frontend/assets/img/clients/siaet-logo.webp')}}" class="img-fluid" alt=""></div>
            <div><img src="{{URL::asset('frontend/assets/img/clients/sumdhu-logo.webp')}}" class="img-fluid" alt=""></div> -->
            @endforeach
          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->
    <!-- ======= Clients Section ======= -->
    <!-- End Clients Section -->

  </main><!-- End #main -->
  <script src='{{URL::asset("frontend/assets/js/ajax_libs_jquery_2.1.3_jquery.min.js")}}'></script>

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