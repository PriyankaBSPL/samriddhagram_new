@extends('frontend.layouts.main')

@section('content')

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Samriddhagram: Agro Entrepreneurship Training Program</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="{{ asset('assets/img/favicon.webp') }}" rel="icon">
</head>

<body>
    <main class="internal-pages">
        @if($programs->count() > 0)

        <section class="internal-banner-slide">
      <div class="container">
        <h1>{{ $programs->menu->title }}</h1>
      </div>
    </section>

        <section class="dharti-ka-doctor">
            <div class="container">
                @foreach($programs as $program)
                <p>{!! $program->full_description !!}</p>
                @endforeach
            </div>
        </section>

        @else
        <p>No programs found.</p>
        @endif
    </main>
</body> 

@endsection
