<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Website</title>
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <style>
        section {
            background: url({{ asset('user/imgs/study.png') }}) no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size:cover;
        }
    </style>
</head>

<body>

    <section>
        <input type="checkbox" id="check">
        <header>
            </div>
            <h2><a href="/" class="logo">Share3</a></h2>
            <div class="navigation">
                
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>
                    @endauth
                @endif

            </div>
            <label for="check">
                <i class="fas fa-bars menu-btn"></i>
                <i class="fas fa-times close-btn"></i>
            </label>
        </header>
        <div class="content">
            <div class="info">
                <h2>Welcome<br><span>To My Website!</span></h2>
                <p>If you already have account you can login simply. if you don't, you can contact me directly by clicking the button below.  </p>
                    <a href="{{ route('login') }}" class="info-btn">Login</a>
                <a href="https://api.whatsapp.com/send/?phone=962779797307" class="info-btn">Contact me</a>
            </div>
        </div>
        <div class="media-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </section>

</body>

</html>
