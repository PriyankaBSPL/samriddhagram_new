<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">


  <!-- Favicons -->


  <!-- Google Fonts -->
  <script type="module" src="{{URL::asset('frontend/assets/js/ionicons.esm.js')}}"></script>
  <script nomodule src="{{URL::asset('frontend/assets/js/ionicons.js')}}"></script>
  <!-- Vendor CSS Files -->
  <link href="{{URL::asset('frontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{URL::asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{URL::asset('frontend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('frontend/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('frontend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{URL::asset('frontend/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <!-- <link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css'> -->
  <!-- Template Main CSS File -->

  <link href="{{URL::asset('frontend/assets/css/style.css?v=1.1')}}" rel="stylesheet">
  <link href="{{URL::asset('frontend/assets/css/font-family.css')}}" rel="stylesheet">
  <script src="{{URL::asset('frontend/assets/js/jquery-3.6.4.min.js')}}"></script>
  <script>
    $(document).ready(function() {
      $('#navbar .nav-link').on('click', function() {
        $('#navbar .nav-link').removeClass('active'); // Remove active class from all links
        $(this).addClass('active'); // Add active class to the clicked link
        // $('#navbar .nav-link[href="' + currentUrl + '"]').addClass('active');
      });
    });
  </script>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZB2X45G9DK"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-ZB2X45G9DK');
  </script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.php"><img src="{{URL::asset('frontend/assets/img/Samridh-Gram-LOGO.webp')}}" class="img-fluid animated" alt=""></a></h1>
      </div>

      <nav id="navigation1" class="navigation">
        <div class="nav-toggle"></div>
        <div class="nav-search">
          <div class="nav-search-button"><i class="nav-search-icon"></i></div>
          <form>
            <div class="nav-search-inner">
              <input type="search" name="search" placeholder="Search..." />
            </div>
          </form>
        </div>


        <div class="nav-menus-wrapper">
          <ul class="nav-menu align-to-right">
            @foreach (getMenuData(0) as $menuItem)
            @if($menuItem->subMenu && $menuItem->subMenu->count() > 0)
            <li>
             <a href="#"> {{ $menuItem->title }}</a>
              <ul class="nav-dropdown">
                @foreach (getMenuData($menuItem->id) as $child)
               
                <li>
              @if($menuItem->title == 'Gallery')
              <a href="{{ url('category/'.$child->slug.'/'.$child->id) }}">{{ $child->title }}</a>
              @elseif($menuItem->title == 'Program')
              <a href="{{ url('program/'.$child->slug.'/'.$child->id) }}">{{ $child->title }}</a>
              @elseif($menuItem->title == 'Other')
              <a href="{{ url('pages/'.$child->slug) }}">{{ $child->title }}</a>
              @endif
                 
                  @if($child->subMenu && $child->subMenu->count() > 0)
                  <ul class="nav-dropdown">
                    @foreach (getMenuData($child->id) as $subChild)
                  
                    <li>
                @if($menuItem->title == 'Gallery')
                <a href="{{ url('category/'.$subChild->slug.'/'.$subChild->id) }}">{{ $subChild->title }}</a>
                @elseif($menuItem->title == 'Program')
                <a href="{{ url('program/'.$subChild->slug.'/'.$subChild->id) }}">{{ $subChild->title }}</a>
                @elseif($menuItem->title == 'Other')
                <a href="{{ url('pages/'.$subChild->slug) }}">{{ $subChild->title }}</a>
                @endif

                     

                      @if($subChild->subMenu && $subChild->subMenu->count() > 0)
                      <ul class="nav-dropdown">
                        @foreach (getMenuData($subChild->id) as $lastChild)
                        <li>
                        <li>
                    @if($menuItem->title == 'Gallery')
                    <a href="{{ url('category/'.$lastChild->slug.'/'.$lastChild->id) }}">{{ $lastChild->title }}</a>
                    @elseif($menuItem->title == 'Program')
                    <a href="{{ url('program/'.$lastChild->slug.'/'.$lastChild->id) }}">{{ $lastChild->title }}</a>
                    @elseif($menuItem->title == 'Other')
                    <a href="{{ url('pages/'.$lastChild->slug) }}">{{ $lastChild->title }}</a>
                    @endif

                        </li>
                        @endforeach
                      </ul>
                      @endif
                    </li>
                    @endforeach
                  </ul>
                  @endif
                </li>
                @endforeach
              </ul>
            </li>
            @else
            <li>
              <a class="nav-link {{ Request::is($menuItem->slug) ? 'active' : '' }}" href="{{ url($menuItem->slug) }}">{{ $menuItem->title }}</a>
            </li>
            @endif
            @endforeach
          </ul>
        </div>


        <?php
        // Get the current page URL
        $currentUrl = $_SERVER['REQUEST_URI'];

        ?>
        <!-- <div class="nav-menus-wrapper">
          <ul class="nav-menu align-to-right">
            <li><a class="nav-link <?= strpos($currentUrl, 'index.php') !== false ? 'active' : '' ?>" href="index.php">Home</a></li>
            <li><a class="nav-link <?= strpos($currentUrl, 'about-us.php') !== false ? 'active' : '' ?>" href="about-us.php">About</a></li>
            
            <li>
              <a href="#">Program</a>
              <ul class="nav-dropdown">
                <li>
                  <a href="#">Farm Sector</a>
                  <ul class="nav-dropdown">

                    <li><a href="agro-entrepreneurship-training-program.php">Agro Entrepreneurship Training Program</a>
                    </li>
                    <li><a href="beekeeping-honey-traceability-mechanism.php">Bee Keeping & Honey Traceability
                        Mechanism</a></li>
                    <li><a href="drone-technology-on-crop-acreage-mapping.php">Drone Technology on Crop Acreage
                        Mapping</a></li>
                    <li><a href="millets-training-program.php">Millets Training Program</a></li>
                    <li><a href="medicinal-plant-cultivation-marketing.php">Medicinal Plants Cultivation & Marketing</a>
                    </li>
                    <li><a href="milk-adulterant-mapping.php">Milk Adulterant Mapping</a></li>
                    <li><a href="natural-farming.php">Natural Farming</a></li>
                    <li><a href="organic-farming.php">Organic Farming</a></li>
                    <li><a href="pesticide-residue-mapping.php">Pesticide Residue Mapping</a></li>
                    <li><a href="self-sustainable-model-of-gaushala.php">Self-Sustainable Model of Gaushala</a></li>
                    <li><a href="soil-testing-fertilizer-recommendation-dkd.php"> Soil Testing & Fertilizer
                        Recommendation (DKD)</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#">Non-Farm Sector</a>
                  <ul class="nav-dropdown">
                    <li><a href="ayurveda-and-primary-health-care-training-program.php">Ayurveda & Primary Healthcare
                        Training Program</a></li>
                    <li><a href="agro-eco-wellness-tourism-program.php">Agro Eco Wellness Tourism Program</a></li>

                    <li>
                      <a href="#">QA and QC Training Program</a>
                      <ul class="nav-dropdown">
                        <li><a href="qa-and-qc-training-program-fmcg.php"> QA & QC Training Program: FMCG</a></li>
                        <li><a href="qa-and-training-program-handloom.php">QA & QC Training Program: Handloom</a></li>
                        <li><a href="qa-and-training-program-handicraft.php">QA & QC Training Program: Handicraft</a>
                        </li>
                      </ul>
                    </li>
                    <li><a href="end-to-end-business-support-system.php">End-to-End Business Support System</a> </li>
                    <li><a href="electronic-marketing-and-digital-marketing-hyperlocal-marketing.php">E-Marketing & Digital
                        Marketing</a></li>
                    <li><a href="rural-entrepreneurship-and-digital-marketing-program.php">Rural Entrepreneurship &
                        Digital Marketing Program</a></li>
                    <li><a href="stock-inventory-management-bpos.php">Stock & Inventory Management System (B-POS)</a>
                    </li>
                    <li><a href="yoga-training-program.php">Yoga Training Program</a></li>

                  </ul>
                </li>


              </ul>
            </li>
            <li>
              <a href="#">Gallery</a>
              <ul class="nav-dropdown">
                <li><a href="training-program-assam.php">Training Program Assam</a></li>
                <li><a href="training-program-hp.php">Training Program Himachal Pradesh</a></li>
                <li><a href="training-program-meghalya.php">Training Program Meghalaya</a></li>
                <li><a href="training-program-mp.php">Training Program Madhya Pradesh</a></li>
                <li><a href="training-program-punjab.php">Training Program Punjab</a></li>
                <li><a href="training-program-uttarakhand.php">Training Program Uttarakhand</a></li>
                <li><a href="samridha-gram-training-center.php">Samriddha Gram Patanjali Training Center</a></li>
              </ul>
            </li>

            <li><a class="nav-link" href="#">Media</a></li>
            <li><a class="nav-link <?= strpos($currentUrl, 'state-pages.php') !== false ? 'active' : '' ?>" href="state-pages.php">State Pages</a></li>
            <li><a class="nav-link <?= strpos($currentUrl, 'contact-us.php') !== false ? 'active' : '' ?>" href="contact-us.php">Contact</a></li>
          </ul>
        </div> -->


      </nav>

      <?php
      // Get the current page URL
      $currentUrl = $_SERVER['REQUEST_URI'];

      ?>
      <div class="searchBox" style="display:none;">
        <div class="search">
          <ion-icon name="search"></ion-icon>
        </div>
        <div class="searchInput">
          <input type="text" placeholder="Search Here">
        </div>
        <div class="close">
          <ion-icon name="close"></ion-icon>
        </div>
      </div>
    </div>
  </header><!-- End Header -->


  @yield('content')

  <footer id="footer" class="footer">

    <div class="footer-content position-relative">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 col-12 white-bg pt-3 fotter-left">
            <a class="footer-logo" href="index.php">
              <img class="img-fluid" src="{{URL::asset('frontend/assets/img/Samridh-Gram-LOGO.webp')}}">
            </a>
            <p class="my-2">At the Samriddha Gram Patanjali Training Centre, we empower Self-Help Groups (SHGs) across India through training programs under the National Rural Livelihoods Mission (NRLM). Our comprehensive courses equip SHGs with essential skills, fostering economic independence and sustainable livelihoods, thereby contributing to the socio-economic development of rural communities nationwide.</p>

          </div>

          <div class="col-lg-8 col-12 p-4 p-md-3 footer-right">
            <div class="row">


              <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <h4 class="mb-2">Our Affiliations</h4>
                <ul class="list-unstyled footer-list">
                  <li><a href="https://www.universityofpatanjali.com/" target="_blank"> University of Patanjali</a></li>
                  <li><a href="http://pac.divyayoga.com/" target="_blank">Patanjali Bhartiya Ayurvigyan Evam Anusandhan Sansthan</a></li>
                  <li><a href="http://www.acharyakulam.org/" target="_blank"> Acharyakulam</a></li>
                  <li><a href="https://patanjaligurukulam.org.in/" target="_blank"> Patanjali Gurukulam</a></li>
                  <li><a href="https://patanjaliwellness.com/" target="_blank"> Patanjali Wellness</a></li>
                  <li><a href="https://yoggram.divyayoga.com/" target="_blank"> Yoggram</a></li>
                  <li><a href="https://www.vedalife.in/" target="_blank"> Vedalife</a></li>

                </ul>
              </div>

              <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <h4 class="mb-2">Our Affiliations</h4>
                <ul class="list-unstyled footer-list">
                  <li><a href="http://bharatswabhimantrust.org/" target="_blank">Bharat SwambhimanTrust</a></li>
                  <li><a href="https://niramayam.divyayoga.com/" target="_blank"> Niramayam</a></li>
                  <li><a href="https://divyayoga.com/" target="_blank"> Divya Yoga</a></li>
                  <li><a href="https://www.patanjaliayurved.net/" target="_blank">Patanjali Ayurved Limited</a></li>
                  <li><a href="https://patanjaliayurved.org/" target="_blank"> Patanjali Food and Herbal Park</a></li>
                  <li><a href="http://patanjaligramodhyognyas.com/" target="_blank"> Patanjali Gramodhyog Nyas</a></li>
                  <li><a href="https://acharyabalkrishna.com/" target="_blank">Acharya Balkrishna website</a></li>
                  <li><a href="https://divyaprakashan.com/" target="_blank">Divya Prakashan</a></li>
                </ul>
              </div>

              <div class="col-lg-4 col-md-6 col-12 mt-6 mt-md-0">
                <div class="footer-info">
                  <h4>Follow Us On</h4>
                  <p><i class="bi bi-geo-alt-fill"></i>
                    Samriddha Gram Patanjali Training Center Near Sanskriti Filling Station, Laksar Rd., Padartha Urf Dhanpura, Nasir Pur Kalan, Uttarakhand 247663</p>
                  <p><i class="bi bi-phone"></i> +91 95209 84215<br>
                    <i class="bi bi-envelope"></i>info@samriddhagram.com<br />
                    <i class="bi bi-clock"></i> Mon-Sat: 9.00am To 5.30pm
                  </p>

                  <div class="social-links d-flex mt-3">
                    <a href="https://twitter.com/SamriddhaGram" class="d-flex align-items-center justify-content-center" target="_blank"><i class="bi bi-twitter"></i></a>
                    <a href="https://www.facebook.com/samriddhagram" class="d-flex align-items-center justify-content-center" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/samriddha_gram/" class="d-flex align-items-center justify-content-center" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.linkedin.com/company/samriddhagram/?viewAsMember=true" class="d-flex align-items-center justify-content-center"><i class="bi bi-linkedin" target="_blank"></i></a>
                    <a href="https://www.youtube.com/channel/UCoYTNRIIel0WDHOZ4HfbArQ" class="d-flex align-items-center justify-content-center"><i class="bi bi-youtube" target="_blank"></i></a>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

    </div>
    </div>

  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{URL::asset('frontend/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{URL::asset('frontend/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{URL::asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{URL::asset('frontend/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{URL::asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{URL::asset('frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{URL::asset('frontend/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{URL::asset('frontend/assets/js/main.js')}}"></script>

  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js'></script>
  <script>
    $('.custom-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      responsive: [{
          breakpoint: 1200,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 900,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 550,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        }
      ]
    });
  </script>
  <script>
    const searchBox = document.querySelector(".searchBox");
    const searchBtn = document.querySelector(".search");
    const closeBtn = document.querySelector(".close");

    searchBtn.addEventListener("click", () => {
      searchBox.classList.add("active");
    });
    closeBtn.addEventListener("click", () => {
      searchBox.classList.remove("active");
    });
  </script>


  <script>
    !(function(n, i, e, a) {
      ;
      (n.navigation = function(t, s) {
        var o = {
            responsive: !0,
            mobileBreakpoint: 991,
            showDuration: 200,
            hideDuration: 200,
            showDelayDuration: 0,
            hideDelayDuration: 0,
            submenuTrigger: "hover",
            effect: "fadeIn",
            submenuIndicator: !0,
            submenuIndicatorTrigger: !1,
            hideSubWhenGoOut: !0,
            visibleSubmenusOnMobile: !1,
            fixed: !1,
            overlay: !0,
            overlayColor: "rgba(0, 0, 0, 0.5)",
            hidden: !1,
            hiddenOnMobile: !1,
            offCanvasSide: "left",
            offCanvasCloseButton: !0,
            animationOnShow: "",
            animationOnHide: "",
            onInit: function() {},
            onLandscape: function() {},
            onPortrait: function() {},
            onShowOffCanvas: function() {},
            onHideOffCanvas: function() {}
          },
          r = this,
          u = Number.MAX_VALUE,
          d = 1,
          l = "click.nav touchstart.nav",
          f = "mouseenter focusin",
          c = "mouseleave focusout"
        r.settings = {}
        var t = (n(t), t)
        n(t).find(".nav-search").length > 0 &&
          n(t)
          .find(".nav-search")
          .find("form")
          .prepend(
            "<span class='nav-search-close-button' tabindex='0'>&#10005;</span>"
          ),
          (r.init = function() {
            ;
            (r.settings = n.extend({}, o, s)),
            r.settings.offCanvasCloseButton &&
              n(t)
              .find(".nav-menus-wrapper")
              .prepend(
                "<span class='nav-menus-wrapper-close-button'>&#10005;</span>"
              ),
              "right" == r.settings.offCanvasSide &&
              n(t)
              .find(".nav-menus-wrapper")
              .addClass("nav-menus-wrapper-right"),
              r.settings.hidden &&
              (n(t).addClass("navigation-hidden"),
                (r.settings.mobileBreakpoint = 99999)),
              v(),
              r.settings.fixed && n(t).addClass("navigation-fixed"),
              n(t)
              .find(".nav-toggle")
              .on("click touchstart", function(n) {
                n.stopPropagation(),
                  n.preventDefault(),
                  r.showOffcanvas(),
                  s !== a && r.callback("onShowOffCanvas")
              }),
              n(t)
              .find(".nav-menus-wrapper-close-button")
              .on("click touchstart", function() {
                r.hideOffcanvas(), s !== a && r.callback("onHideOffCanvas")
              }),
              n(t)
              .find(".nav-search-button, .nav-search-close-button")
              .on("click touchstart keydown", function(i) {
                i.stopPropagation(), i.preventDefault()
                //  var e = i.keyCode || i.which "click" === i.type ||
                "touchstart" === i.type ||
                  ("keydown" === i.type && 13 == e) ?
                  r.toggleSearch() :
                  9 == e && n(i.target).blur()
              }),

              n(t).find(".megamenu-tabs").length > 0 && y(),
              n(i).resize(function() {
                r.initNavigationMode(C()), O(), r.settings.hiddenOnMobile && m()
              }),
              r.initNavigationMode(C()),
              r.settings.hiddenOnMobile && m(),
              s !== a && r.callback("onInit")
          })
        var h = function() {
            n(t)
              .find(".nav-submenu")
              .hide(0),
              n(t)
              .find("li")
              .removeClass("focus")
          },
          v = function() {
            n(t)
              .find("li")
              .each(function() {
                n(this).children(".nav-dropdown,.megamenu-panel").length > 0 &&
                  (n(this)
                    .children(".nav-dropdown,.megamenu-panel")
                    .addClass("nav-submenu"),
                    r.settings.submenuIndicator &&
                    n(this)
                    .children("a")
                    .append(
                      "<span class='submenu-indicator'><span class='submenu-indicator-chevron'></span></span>"
                    ))
              })
          },
          m = function() {
            n(t).hasClass("navigation-portrait") ?
              n(t).addClass("navigation-hidden") :
              n(t).removeClass("navigation-hidden")
          };
        (r.showSubmenu = function(i, e) {
          C() > r.settings.mobileBreakpoint &&
            n(t)
            .find(".nav-search")
            .find("form")
            .fadeOut(),
            "fade" == e ?
            n(i)
            .children(".nav-submenu")
            .stop(!0, !0)
            .delay(r.settings.showDelayDuration)
            .fadeIn(r.settings.showDuration)
            .removeClass(r.settings.animationOnHide)
            .addClass(r.settings.animationOnShow) :
            n(i)
            .children(".nav-submenu")
            .stop(!0, !0)
            .delay(r.settings.showDelayDuration)
            .slideDown(r.settings.showDuration)
            .removeClass(r.settings.animationOnHide)
            .addClass(r.settings.animationOnShow),
            n(i).addClass("focus")
        }),
        (r.hideSubmenu = function(i, e) {
          "fade" == e
            ?
            n(i)
            .find(".nav-submenu")
            .stop(!0, !0)
            .delay(r.settings.hideDelayDuration)
            .fadeOut(r.settings.hideDuration)
            .removeClass(r.settings.animationOnShow)
            .addClass(r.settings.animationOnHide) :
            n(i)
            .find(".nav-submenu")
            .stop(!0, !0)
            .delay(r.settings.hideDelayDuration)
            .slideUp(r.settings.hideDuration)
            .removeClass(r.settings.animationOnShow)
            .addClass(r.settings.animationOnHide),
            n(i)
            .removeClass("focus")
            .find(".focus")
            .removeClass("focus")
        })
        var p = function() {
            n("body").addClass("no-scroll"),
              r.settings.overlay &&
              (n(t).append("<div class='nav-overlay-panel'></div>"),
                n(t)
                .find(".nav-overlay-panel")
                .css("background-color", r.settings.overlayColor)
                .fadeIn(300)
                .on("click touchstart", function(n) {
                  r.hideOffcanvas()
                }))
          },
          g = function() {
            n("body").removeClass("no-scroll"),
              r.settings.overlay &&
              n(t)
              .find(".nav-overlay-panel")
              .fadeOut(400, function() {
                n(this).remove()
              })
          };
        (r.showOffcanvas = function() {
          p(),
            "left" == r.settings.offCanvasSide ?
            n(t)
            .find(".nav-menus-wrapper")
            .css("transition-property", "left")
            .addClass("nav-menus-wrapper-open") :
            n(t)
            .find(".nav-menus-wrapper")
            .css("transition-property", "right")
            .addClass("nav-menus-wrapper-open")
        }),
        (r.hideOffcanvas = function() {
          n(t)
            .find(".nav-menus-wrapper")
            .removeClass("nav-menus-wrapper-open")
            .on(
              "webkitTransitionEnd moztransitionend transitionend oTransitionEnd",
              function() {
                n(t)
                  .find(".nav-menus-wrapper")
                  .css("transition-property", "none")
                  .off()
              }
            ),
            g()
        }),
        (r.toggleOffcanvas = function() {
          C() <= r.settings.mobileBreakpoint &&
            (n(t)
              .find(".nav-menus-wrapper")
              .hasClass("nav-menus-wrapper-open") ?
              (r.hideOffcanvas(), s !== a && r.callback("onHideOffCanvas")) :
              (r.showOffcanvas(), s !== a && r.callback("onShowOffCanvas")))
        }),
        (r.toggleSearch = function() {
          "none" ==
          n(t)
            .find(".nav-search")
            .find("form")
            .css("display") ?
            (n(t)
              .find(".nav-search")
              .find("form")
              .fadeIn(200),
              n(t)
              .find(".nav-search")
              .find("input")
              .focus()) :
            (n(t)
              .find(".nav-search")
              .find("form")
              .fadeOut(200),
              n(t)
              .find(".nav-search")
              .find("input")
              .blur())
        }),
        (r.initNavigationMode = function(i) {
          r.settings.responsive ?
            (i <= r.settings.mobileBreakpoint &&
              u > r.settings.mobileBreakpoint &&
              (n(t)
                .addClass("navigation-portrait")
                .removeClass("navigation-landscape"),
                S(),
                s !== a && r.callback("onPortrait")),
              i > r.settings.mobileBreakpoint &&
              d <= r.settings.mobileBreakpoint &&
              (n(t)
                .addClass("navigation-landscape")
                .removeClass("navigation-portrait"),
                k(),
                g(),
                r.hideOffcanvas(),
                s !== a && r.callback("onLandscape")),
              (u = i),
              (d = i)) :
            (n(t).addClass("navigation-landscape"),
              k(),
              s !== a && r.callback("onLandscape"))
        })
        var b = function() {
            n("html").on("click.body touchstart.body", function(i) {
              0 === n(i.target).closest(".navigation").length &&
                (n(t)
                  .find(".nav-submenu")
                  .fadeOut(),
                  n(t)
                  .find(".focus")
                  .removeClass("focus"),
                  n(t)
                  .find(".nav-search")
                  .find("form")
                  .fadeOut())
            })
          },
          C = function() {
            return (
              i.innerWidth || e.documentElement.clientWidth || e.body.clientWidth
            )
          },
          w = function() {
            n(t)
              .find(".nav-menu")
              .find("li, a")
              .off(l)
              .off(f)
              .off(c)
          },
          O = function() {
            if (C() > r.settings.mobileBreakpoint) {
              var i = n(t).outerWidth(!0)
              n(t)
                .find(".nav-menu")
                .children("li")
                .children(".nav-submenu")
                .each(function() {
                  n(this)
                    .parent()
                    .position().left +
                    n(this).outerWidth() >
                    i ?
                    n(this).css("right", 0) :
                    n(this).css("right", "auto")
                })
            }
          },
          y = function() {
            function i(i) {
              var e = n(i)
                .children(".megamenu-tabs-nav")
                .children("li"),
                a = n(i).children(".megamenu-tabs-pane")
              n(e).on("click.tabs touchstart.tabs", function(i) {
                i.stopPropagation(),
                  i.preventDefault(),
                  n(e).removeClass("active"),
                  n(this).addClass("active"),
                  n(a)
                  .hide(0)
                  .removeClass("active"),
                  n(a[n(this).index()])
                  .show(0)
                  .addClass("active")
              })
            }
            if (n(t).find(".megamenu-tabs").length > 0)
              for (var e = n(t).find(".megamenu-tabs"), a = 0; a < e.length; a++)
                i(e[a])
          },
          k = function() {
            w(),
              h(),
              navigator.userAgent.match(/Mobi/i) ||
              navigator.maxTouchPoints > 0 ||
              "click" == r.settings.submenuTrigger ?
              n(t)
              .find(".nav-menu, .nav-dropdown")
              .children("li")
              .children("a")
              .on(l, function(e) {
                if (
                  (r.hideSubmenu(
                      n(this)
                      .parent("li")
                      .siblings("li"),
                      r.settings.effect
                    ),
                    n(this)
                    .closest(".nav-menu")
                    .siblings(".nav-menu")
                    .find(".nav-submenu")
                    .fadeOut(r.settings.hideDuration),
                    n(this).siblings(".nav-submenu").length > 0)
                ) {
                  if (
                    (e.stopPropagation(),
                      e.preventDefault(),
                      "none" ==
                      n(this)
                      .siblings(".nav-submenu")
                      .css("display"))
                  )
                    return (
                      r.showSubmenu(
                        n(this).parent("li"),
                        r.settings.effect
                      ),
                      O(),
                      !1
                    )
                  if (
                    (r.hideSubmenu(n(this).parent("li"), r.settings.effect),
                      "_blank" === n(this).attr("target") ||
                      "blank" === n(this).attr("target"))
                  )
                    i.open(n(this).attr("href"))
                  else {
                    if (
                      "#" === n(this).attr("href") ||
                      "" === n(this).attr("href") ||
                      "javascript:void(0)" === n(this).attr("href")
                    )
                      return !1
                    i.location.href = n(this).attr("href")
                  }
                }
              }) :
              n(t)
              .find(".nav-menu")
              .find("li")
              .on(f, function() {
                r.showSubmenu(this, r.settings.effect), O()
              })
              .on(c, function() {
                r.hideSubmenu(this, r.settings.effect)
              }),
              r.settings.hideSubWhenGoOut && b()
          },
          S = function() {
            w(),
              h(),
              r.settings.visibleSubmenusOnMobile ?
              n(t)
              .find(".nav-submenu")
              .show(0) :
              (n(t)
                .find(".submenu-indicator")
                .removeClass("submenu-indicator-up"),
                r.settings.submenuIndicator &&
                r.settings.submenuIndicatorTrigger ?
                n(t)
                .find(".submenu-indicator")
                .on(l, function(i) {
                  return (
                    i.stopPropagation(),
                    i.preventDefault(),
                    r.hideSubmenu(
                      n(this)
                      .parent("a")
                      .parent("li")
                      .siblings("li"),
                      "slide"
                    ),
                    r.hideSubmenu(
                      n(this)
                      .closest(".nav-menu")
                      .siblings(".nav-menu")
                      .children("li"),
                      "slide"
                    ),
                    "none" ==
                    n(this)
                    .parent("a")
                    .siblings(".nav-submenu")
                    .css("display") ?
                    (n(this).addClass("submenu-indicator-up"),
                      n(this)
                      .parent("a")
                      .parent("li")
                      .siblings("li")
                      .find(".submenu-indicator")
                      .removeClass("submenu-indicator-up"),
                      n(this)
                      .closest(".nav-menu")
                      .siblings(".nav-menu")
                      .find(".submenu-indicator")
                      .removeClass("submenu-indicator-up"),
                      r.showSubmenu(
                        n(this)
                        .parent("a")
                        .parent("li"),
                        "slide"
                      ),
                      !1) :
                    (n(this)
                      .parent("a")
                      .parent("li")
                      .find(".submenu-indicator")
                      .removeClass("submenu-indicator-up"),
                      void r.hideSubmenu(
                        n(this)
                        .parent("a")
                        .parent("li"),
                        "slide"
                      ))
                  )
                }) :
                n(t)
                .find(".nav-menu, .nav-dropdown")
                .children("li")
                .children("a")
                .on(l, function(e) {
                  if (
                    (e.stopPropagation(),
                      e.preventDefault(),
                      r.hideSubmenu(
                        n(this)
                        .parent("li")
                        .siblings("li"),
                        r.settings.effect
                      ),
                      r.hideSubmenu(
                        n(this)
                        .closest(".nav-menu")
                        .siblings(".nav-menu")
                        .children("li"),
                        "slide"
                      ),
                      "none" ==
                      n(this)
                      .siblings(".nav-submenu")
                      .css("display"))
                  )
                    return (
                      n(this)
                      .children(".submenu-indicator")
                      .addClass("submenu-indicator-up"),
                      n(this)
                      .parent("li")
                      .siblings("li")
                      .find(".submenu-indicator")
                      .removeClass("submenu-indicator-up"),
                      n(this)
                      .closest(".nav-menu")
                      .siblings(".nav-menu")
                      .find(".submenu-indicator")
                      .removeClass("submenu-indicator-up"),
                      r.showSubmenu(n(this).parent("li"), "slide"),
                      !1
                    )
                  if (
                    (n(this)
                      .parent("li")
                      .find(".submenu-indicator")
                      .removeClass("submenu-indicator-up"),
                      r.hideSubmenu(n(this).parent("li"), "slide"),
                      "_blank" === n(this).attr("target") ||
                      "blank" === n(this).attr("target"))
                  )
                    i.open(n(this).attr("href"))
                  else {
                    if (
                      "#" === n(this).attr("href") ||
                      "" === n(this).attr("href") ||
                      "javascript:void(0)" === n(this).attr("href")
                    )
                      return !1
                    i.location.href = n(this).attr("href")
                  }
                }))
          };
        (r.callback = function(n) {
          s[n] !== a && s[n].call(t)
        }),
        r.init()
      }),
      (n.fn.navigation = function(i) {
        return this.each(function() {
          if (a === n(this).data("navigation")) {
            var e = new n.navigation(this, i)
            n(this).data("navigation", e)
          }
        })
      })
    })(jQuery, window, document)

    ;
    (function($) {
      "use strict"

      var $window = $(window)

      if ($.fn.navigation) {
        $("#navigation1").navigation()
        $("#always-hidden-nav").navigation({
          hidden: true
        })
      }

      $window.on("load", function() {
        $("#preloader").fadeOut("slow", function() {
          $(this).remove()
        })
      })
    })(jQuery)
  </script>