<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHARMA COLLEAGUE | Dashboard</title>


    <link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet" />
    <link href="https://unpkg.com/@videojs/themes@1/dist/city/index.css" rel="stylesheet">
    <style>
        .vjs-playback-rate .vjs-playback-rate-value {
            pointer-events: none;
            font-size: 1.5em;
            line-height: 3;
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('admin/css/vertical-layout-light/style.css') }}">

</head>

<body oncontextmenu="return false">
    <header>
        <nav class="navbar navbar-dark bg-dark justify-content-between">
            <a class="navbar-brand">PHARMA COLLEAGUE</a>
            <form class="form-inline" method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </nav>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h3 class="text-center">Welcome {{ Auth::user()->name }}..</h1>
                    <a class="btn btn-primary mt-3" href="{{ route('dashboard') }}">All Lessons</a>
            </div>
        </div>
        @if ($lessons->count() > 0)
        @php $i = 1; @endphp
        <div class="row">
            @foreach ($lessons as $lesson)
                <div class="col-sm-4 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> {{ $lesson->Course->course_name }} | Chapter
                                {{ $lesson->Chapter->chapter_num }} @if ($lessons->count() > 1)
                                    | Part {{ $i++ }}
                                @endif
                            </h5>
                            <p class="card-text">
                                <video id="my-video" class="video-js vjs-theme-city" oncontextmenu="return false;"
                                    data-setup='{ "playbackRates": [0.5, 1, 1.5, 2] }' controls preload="auto"
                                    width="300" height="264" poster="{{ asset('user/imgs/ch9p1.png') }}">
                                    <source src="{{ asset('uploads/' . $lesson->lesson_link) }}" type="video/mp4" />
                                </video>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="row">
                <div class="col-12 mt-5">
                    <h3 class="text-center">No Lessons Available</h1>
                </div>
            </div>
        @endif

        </div>
        <script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
</body>

</html>
