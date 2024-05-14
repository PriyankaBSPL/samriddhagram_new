<!--]'.<!DOCTYPE html>-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Punjab Farm Training Batch</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
 <link href="assets/img/favicon.webp" rel="icon">
</head>

<body>
  <?php require_once('header.php') ?>

  <main class="internal-pages programs-slide">
    <section class="internal-banner-slide">
      <div class="container">
        <h1>Punjab Farm Training Batch</h1>
      </div>
    </section>

    <section id="portfolio" class="portfolio training-slide">

      <div class="container">
        <h4>Day-1</h4>
      </div>

      <div class="container-fluid">
        <div class="row gy-3 portfolio-container" data-aos="fade-up" data-aos-delay="100">
          <?php for ($i = 1; $i <= 19; $i++) { ?>
            <div class="col-lg-3 col-md-3 portfolio-item">
              <div class="portfolio-wrap">
                <img src="assets/img/gallery/punjab t1 farm/day-1/<?= $i ?>.webp" class="img-fluid" alt="">
                <div class="portfolio-info">

                  <div class="portfolio-links">
                    <a href="assets/img/gallery/punjab t1 farm/day-1/<?= $i ?>.webp" data-gallery="portfolioGallery"
                      class="portfolio-lightbox"><i class="bi bi-plus"></i></a>

                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      </div>

      <div class="container">
        <h4>Day-2</h4>
      </div>

      <div class="container-fluid">
        <div class="row gy-3 portfolio-container" data-aos="fade-up" data-aos-delay="100">
          <?php for ($i = 1; $i <= 12; $i++) { ?>
            <div class="col-lg-3 col-md-3 portfolio-item">
              <div class="portfolio-wrap">
                <img src="assets/img/gallery/punjab t1 farm/day-2/<?= $i ?>.webp" class="img-fluid" alt="">
                <div class="portfolio-info">

                  <div class="portfolio-links">
                    <a href="assets/img/gallery/punjab t1 farm/day-2/<?= $i ?>.webp" data-gallery="portfolioGallery"
                      class="portfolio-lightbox"><i class="bi bi-plus"></i></a>

                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>
      </div>

      <div class="container">
        <h4>Day-3</h4>
      </div>

      <div class="container-fluid">
        <div class="row gy-3 portfolio-container" data-aos="fade-up" data-aos-delay="100">
          <?php for ($i = 1; $i <= 15; $i++) { ?>
            <div class="col-lg-3 col-md-3 portfolio-item">
              <div class="portfolio-wrap">
                <img src="assets/img/gallery/punjab t1 farm/day-3/<?= $i ?>.webp" class="img-fluid" alt="">
                <div class="portfolio-info">

                  <div class="portfolio-links">
                    <a href="assets/img/gallery/punjab t1 farm/day-3/<?= $i ?>.webp" data-gallery="portfolioGallery"
                      class="portfolio-lightbox"><i class="bi bi-plus"></i></a>

                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>

    </section><!-- End Portfolio Section -->

    <?php require_once('footer.php') ?>
</body>

</html>