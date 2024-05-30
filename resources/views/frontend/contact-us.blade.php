@extends('frontend.layouts.main')
@section('content')

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Contact Us</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="{{URL::asset('frontend/assets/img/favicon.webp')}}" rel="icon">
</head>

<body>


  <main class="internal-pages programs-slide">
    <section class="internal-banner-slide">
      <div class="container">
        <h1>Contact Us</h1>
      </div>
    </section>
    <section id="contact" class="contact">

      <div class="container">

        <div class="row align-items-center">

          <div class="col-lg-4">

            <div class="info">
              <div class="info-item d-flex">
                <i class="bi bi-geo-alt"></i>
                <div>
                  <h3>Location</h3>
                  <p style="text-align:left;">Samriddha Gram Patanjali Training<br /> Center Near Sanskriti Filling Station, <br />Laksar Rd., Padartha Urf Dhanpura, <br />Nasir Pur Kalan, Uttarakhand 247663</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-envelope"></i>
                <div>
                  <h3>Email</h3>
                  <p>info@samriddhagram.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-phone"></i>
                <div>
                  <h3>Call</h3>
                  <p>+91 95209 84215</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-clock"></i>
                <div>
                  <h3>Working Hours</h3>
                  <p>Mon-Sat: 9.00am To 5.30pm</p>
                </div>
              </div><!-- End Info Item -->

            </div>

          </div>

          <div class="col-lg-8">
            <h4>Any Question or Remarks ? Just Write Us a Message!</h4>
            @if ($errorMessage = Session::get('error'))
            <div class="alert alert-danger">
              <strong>Error!</strong> {{ $errorMessage }}
            </div>
            @endif

            @if ($successMessage = Session::get('success'))
            <div class="alert alert-success">
              {{ $successMessage }}
            </div>
            @endif
            <form class="needs-validation" novalidate="" action="{{ route('contactsave') }}" id="frmContact" name="frmContact" method="post" role="form">
              @csrf
              <div class="row">

                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" pattern="^[A-Za-z -]+$" title="Name should Only Contain Uppercase, Lowercase letters." value="{{ old('name') }}">
                  <span class="text-danger">@error('name'){{$message}} @enderror</span>
                </div>

                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="email" id="email" placeholder="Your Email" pattern="^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$" title="Please enter valid email address." value="{{ old('email') }}">
                  <span class="text-danger">@error('email'){{$message}} @enderror</span>
                </div>

                <div class="form-group mt-3 mt-md-0 col-md-12">
                  <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone number" pattern="[6-9]{1}[0-9]{9}" title="Please enter valid Mobile No." minlength="10" maxlength="10" value="{{ old('phone') }}">
                  <span class="text-danger">@error('phone'){{$message}} @enderror</span>
                </div>

                <div class="form-group mt-3 mt-md-0">
                  <textarea class="form-control" id="msg" name="msg" placeholder="Message" pattern="[a-zA-Z ]{1,15}" title="Please enter valid Message">{{ old('msg') }}</textarea>
                  <span class="text-danger">@error('msg'){{$message}} @enderror</span>
                </div>

                <div class="text-lg-left"><button type="submit" name="submit" class="btn btn-theme">Send Message</button></div>
              </div>

            </form>


          </div><!-- End Contact Form -->

        </div>

      </div>

    </section>
    <section>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3461.3470611653265!2d78.12501947456033!3d29.825402428917535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390945bb10e24d21%3A0xecd1a59b50dfbcf9!2sSamriddha%20Gram%20Patanjali%20Training%20Center!5e0!3m2!1sen!2sin!4v1709882517579!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

  </main>

  <!-- ======= Footer ======= -->

</body>
@endsection