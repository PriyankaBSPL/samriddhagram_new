<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">


  <!-- Favicons -->


  <!-- Google Fonts -->
  <script type="module" src="assets/js/ionicons.esm.js"></script>
  <script nomodule src="assets/js/ionicons.js"></script>
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- <link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css'>
  <!-- Template Main CSS File -->

  <link href="assets/css/style.css?v=1.1" rel="stylesheet">
  <link href="assets/css/font-family.css" rel="stylesheet">
  <script src="assets/js/jquery-3.6.4.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#navbar .nav-link').on('click', function() {
        $('#navbar .nav-link').removeClass('active'); // Remove active class from all links
         $(this).addClass('active'); // Add active class to the clicked link
        // $('#navbar .nav-link[href="' + currentUrl + '"]').addClass('active');
      });
    });
  </script>

<!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZB2X45G9DK"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-ZB2X45G9DK'); </script>


</head>

<body>


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.php"><img src="assets/img/Samridh-Gram-LOGO.webp" class="img-fluid animated" alt=""></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
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
      
        <?php
      // Get the current page URL
      $currentUrl = $_SERVER['REQUEST_URI'];

      ?>
        <div class="nav-menus-wrapper">
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
            <!--  <li>
              <a href="#">Mega Menu 2</a>
              <div class="megamenu-panel">
                <div class="megamenu-lists">
                  <ul class="megamenu-list list-col-4">
                    <li class="megamenu-list-title"><a href="#">Title Name</a></li>
                    <li><a href="#" target="_blank">Link 1</a></li>
                    <li><a href="#" target="_blank">Link 2</a></li>
                    <li><a href="#" target="_blank">Link 3</a></li>
                    <li><a href="#" target="_blank">Link 4</a></li>
                    <li><a href="#" target="_blank">Link 5</a></li>
                  </ul>
                  <ul class="megamenu-list list-col-4">
                    <li class="megamenu-list-title"><a href="#">Title Name</a></li>
                    <li><a href="#" target="_blank">Link 1</a></li>
                    <li><a href="#" target="_blank">Link 2</a></li>
                    <li><a href="#" target="_blank">Link 3</a></li>
                    <li><a href="#" target="_blank">Link 4</a></li>
                    <li><a href="#" target="_blank">Link 5</a></li>
                  </ul>
                  <ul class="megamenu-list list-col-4">
                    <li class="megamenu-list-title"><a href="#">Title Name</a></li>
                    <li><a href="#" target="_blank">Link 1</a></li>
                    <li><a href="#" target="_blank">Link 2</a></li>
                    <li><a href="#" target="_blank">Link 3</a></li>
                    <li><a href="#" target="_blank">Link 4</a></li>
                    <li><a href="#" target="_blank">Link 5</a></li>
                  </ul>
                  <ul class="megamenu-list list-col-4">
                    <li class="megamenu-list-title"><a href="#">Title Name</a></li>
                    <li><a href="#" target="_blank">Link 1</a></li>
                    <li><a href="#" target="_blank">Link 2</a></li>
                    <li><a href="#" target="_blank">Link 3</a></li>
                    <li><a href="#" target="_blank">Link 4</a></li>
                    <li><a href="#" target="_blank">Link 5</a></li>
                  </ul>
                </div>
              </div>
            </li>-->
            <li><a class="nav-link" href="#">Media</a></li>
            <li><a class="nav-link <?= strpos($currentUrl, 'state-pages.php') !== false ? 'active' : '' ?>" href="state-pages.php">State Pages</a></li>
            <li><a class="nav-link <?= strpos($currentUrl, 'contact-us.php') !== false ? 'active' : '' ?>" href="contact-us.php">Contact</a></li>
          </ul>
        </div>


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

