@extends('frontend.layouts.main')
@section('content')

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Samriddhagram: About Us</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="{{URL::asset('frontend/assets/img/favicon.webp')}}" rel="icon">

</head>

<body>

  <main class="internal-pages">
    @foreach($abouts as $about)
    <section class="about-us">
      <div class="container">
        <div class="row align-items-center">

          <div class="col-lg-6">
          <img src="{{ URL::asset('/admin/uploads/banner_image/' . $banner_image) }}">
          </div>

          <div class="col-lg-6">
            {!! $about->banner_description !!}
          </div>
        </div>
      </div>
    </section>


    <section class="why-samriddh">
      <div class="container">

        <div class="row align-items-center">

          <div class="col-lg-7">
            {!! $about->side_description !!}
          </div>

          <div class="col-lg-5">
            <img src="{{URL::asset('/admin/upload/About/' .$about->image)}}">
          </div>
        </div>

        <div class="row align-items-center">
          <div class="col-lg-12 rural-business">
            {!! $about->description !!}
          </div>

        </div>

    </section>
    @endforeach
  </main>

</body>

@endsection