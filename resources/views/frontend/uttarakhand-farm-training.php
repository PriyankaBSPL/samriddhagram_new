<!--]'.<!DOCTYPE html>-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Uttarakhand Farm Training Batch</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/favicon.webp" rel="icon">
</head>

<body>
  <?php require_once('header.php') ?>

  <main class="internal-pages programs-slide">
    <section class="internal-banner-slide">
      <div class="container">
        <h1>Uttarakhand Farm Training Batch</h1>
      </div>
    </section>

    <section id="portfolio" class="portfolio training-slide">

      <div class="container">
        <h4>Day-1</h4>
      </div>

      <div class="container-fluid">
        <div class="row gy-3 portfolio-container" data-aos="fade-up" data-aos-delay="100">
          <?php for ($i = 1; $i <= 16; $i++) { ?>
            <div class="col-lg-3 col-md-3 portfolio-item">
              <div class="portfolio-wrap">
                <img src="assets/img/gallery/Uttrakhand FARM training 1/day-1/<?= $i ?>.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">

                  <div class="portfolio-links">
                    <a href="assets/img/gallery/Uttrakhand FARM training 1/day-1/<?= $i ?>.jpg"
                      data-gallery="portfolioGallery" class="portfolio-lightbox"><i class="bi bi-plus"></i></a>

                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>

      <div class="container">
        <h4>Day-2</h4>
      </div>

      <div class="container-fluid">
        <div class="row gy-3 portfolio-container" data-aos="fade-up" data-aos-delay="100">
          <?php for ($i = 1; $i <= 18; $i++) { ?>
            <div class="col-lg-3 col-md-3 portfolio-item">
              <div class="portfolio-wrap">
                <img src="assets/img/gallery/Uttrakhand FARM training 1/day-2/<?= $i ?>.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">

                  <div class="portfolio-links">
                    <a href="assets/img/gallery/Uttrakhand FARM training 1/day-2/<?= $i ?>.jpg"
                      data-gallery="portfolioGallery" class="portfolio-lightbox"><i class="bi bi-plus"></i></a>

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
          <?php for ($i = 1; $i <= 12; $i++) { ?>
            <div class="col-lg-3 col-md-3 portfolio-item">
              <div class="portfolio-wrap">
                <img src="assets/img/gallery/Uttrakhand FARM training 1/day-3/<?= $i ?>.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">

                  <div class="portfolio-links">
                    <a href="assets/img/gallery/Uttrakhand FARM training 1/day-3/<?= $i ?>.jpg"
                      data-gallery="portfolioGallery" class="portfolio-lightbox"><i class="bi bi-plus"></i></a>

                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>


    </section><!-- End Portfolio Section -->


  </main>


  <?php require_once('footer.php') ?>
</body>

</html>