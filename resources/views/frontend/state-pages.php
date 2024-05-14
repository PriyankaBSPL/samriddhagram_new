<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>State</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/favicon.webp" rel="icon">
  <style>
    #map svg {
      height: 700px !important;
      width: 800px;
      margin: 0 auto;
    }

    rect {
      display: none;
    }
  </style>
</head>

<body>

  <?php require_once('header.php') ?>

  <main class="internal-pages">
    <section class="internal-banner-slide">
      <div class="container">
        <h1>State Pages</h1>
      </div>
    </section>
    <section class="map-slide">

      <div class="container">
        <h3>Our rhythmic approach to prosperity</h3>
        <p>Samriddha Gram is steadily serving our nation inch by inch. Since its inception, the NRO has brought
          self-reliance to the rural areas of Assam, Himachal Pradesh, Madhya Pradesh, Meghalaya, Uttarakhand, and
          Punjab. It is systematically polishing the untouched potential of Indian villages where Women-led SHGs have
          blossomed into dynamically organized institutions.</p>
        <p>We are undertaking several projects to help every person foster dreams of progress. With this in mind, many
          other states are our next destination to ensure new heights of socio-economic development.</p>

        <div id="map" style="text-align:center;"></div>
    </section>
    <script src="assets/js/mapdata.js"></script>
    <script src="assets/js/countrymap.js"></script>
  </main>

  <?php require_once('footer.php') ?>
  <!-- ======= Footer ======= -->

</body>

</html>