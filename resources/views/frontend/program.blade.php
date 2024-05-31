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
                <h1>{{ $programs->first()->menu->title }}</h1>
            </div>
        </section>

        <section class="dharti-ka-doctor">
            <div class="container">
                <div class="row align-items-center">
                    @foreach($programs as $program)
                    @if($program->design_type == 2)

                    <div class="col-lg-12" style="margin-top:20px;">
                        <p>{!! $program->top_description !!}</p>
                    </div>

                    @if(!empty($program->image))
                    <div class="col-lg-5">
                        <img src="{{URL::asset('/admin/upload/Program/' .$program->image)}}">
                    </div>
                    @endif

                    @if(!empty($program->side_description))
                    <div class="col-lg-7 dkd-machine">
                        {!! $program->side_description !!}
                    </div>
                    @endif

                    @else

                    <div class="col-lg-12">
                        <p>{!! $program->full_description !!}</p>
                    </div>

                    @endif
                    @endforeach
                </div>
            </div>
        </section>
        @else
        <p>No programs found.</p>
        @endif
    </main>
</body>



@endsection