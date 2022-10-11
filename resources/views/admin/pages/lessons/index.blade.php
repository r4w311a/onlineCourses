@extends('admin.admin_master')
@section('main')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
       
        @foreach ($lessons as $lesson)
            <div class="col-sm-4 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$lesson['Course']['course_name']}} | Chapter {{$lesson->chapter_num}}
                        </h5>
                        <p class="card-text">
                            <video id="my-video" class="video-js vjs-theme-city" oncontextmenu="return false;" data-setup='{ "playbackRates": [0.5, 1, 1.5, 2] }' controls preload="auto" width="320"
                                height="240" poster="MY_VIDEO_POSTER.jpg" >
                                <source
                                    src="{{ Storage::disk('s3')->url('lessons/' . $lesson->lesson_link) }}"
                                    type="video/mp4" />
                            </video>
                        <a href="#" class="btn btn-primary mt-3">Go somewhere</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
@endsection
