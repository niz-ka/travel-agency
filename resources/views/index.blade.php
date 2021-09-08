<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config("app.name") }} - Biuro Podróży</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset("css/utilities.css") }}">
        <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    </head>

<body>

    <!-- Header -->
    <header>
        <div class="container text-center">
            <div class="logo my-md">
                <img src="{{ asset("img/logo.png") }}" alt="Logo travel.io">
            </div>
            <nav class="my-md">
                <ul class="text-uppercase font-secondary flex justify-content-center gap-md text-muted">
                    <li><a href="#" class="text-black">Główna</a></li>
                    <li><a href="#">Koncept</a></li>
                    <li><a href="#">Nasze miejsca</a></li>
                    <li><a href="#">Aktualności</a></li>
                    <li><a href="#">Kontakt</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Video section -->
    <section class="background-video">
            <div class="video-wrapper">
                <video class="background-video" playsinline autoplay muted loop poster="{{asset("img/video.jpg")}}">
                    <source src="{{ asset("video/background_video.mp4") }}" type="video/mp4">
                </video>

                <div class="text-area text-white position-absolute w-100 h-100 flex justify-content-center align-items-center flex-column gap-md">
                    <h2 class="h1 text-uppercase">Biuro podróży</h2>
                    <span class="h3 my-md">Twoja podróż jest wyjątkowa</span>
                    <a href="#" class="btn btn-light my-md">Odkryj nas</a>
                </div>
            </div>
    </section>

</body>
</html>
