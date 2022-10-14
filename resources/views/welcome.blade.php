<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharma Colleague | Home</title>
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <style>
        section {
            background: url({{ asset('user/imgs/untitled.jpg') }}) no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
        }

        @media (max-width: 560px) {
            section {
                background: url({{ asset('user/imgs/untitled.jpg') }}) no-repeat;
                background-attachment: fixed;
                background-position: center;
                background-size: 100% 100%;
            }

            
        }
    </style>
</head>

<body>

    <section>
        <input type="checkbox" id="check">
        <header>
            </div>
            <h2><a href="/" class="logo">Pharma Colleague</a></h2>
            <div class="navigation">
                <a href="https://drive.google.com/drive/folders/1g5PFWqD_EZgBoasla3CaFu5cC15OfU-m" target="_blank">تفاريغ المواد</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" >Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" >Log in</a>
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
                <h2>Pharma Colleague</h2>
                <p>For any inquiries, please contact me by pressing the button below. Thank you for visiting my website!</p>
                <a href="https://api.whatsapp.com/send/?phone=962779797307" class="info-btn">Contact me</a>
            </div>
        </div>
        <div class="media-icons">
            <a href="https://web.facebook.com/groups/441181056814119/" target="_blank"><i class="fab fa-facebook-f">acebook Group</i></a>
        </div>
    </section>

</body>

</html>
