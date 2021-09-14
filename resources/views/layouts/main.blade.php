<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="travel.io - inspiracje podróżami z całego świata">

        <title>{{ config("app.name") }} - Biuro Podróży</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset("css/utilities.css") }}">
        <link rel="stylesheet" href="{{ asset("css/app.css") }}">

        <!-- Font awesome -->
        <link rel="stylesheet" href="{{ asset("css/font-awesome.css") }}">

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="57x57" href="{{asset("favicon/apple-icon-57x57.png")}}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{asset("favicon/apple-icon-60x60.png")}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset("favicon/apple-icon-72x72.png")}}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset("favicon/apple-icon-76x76.png")}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset("favicon/apple-icon-114x114.png")}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{asset("favicon/apple-icon-120x120.png")}}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{asset("favicon/apple-icon-144x144.png")}}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{asset("favicon/apple-icon-152x152.png")}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset("favicon/apple-icon-180x180.png")}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset("favicon/android-icon-192x192.png")}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset("favicon/favicon-32x32.png")}}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{asset("favicon/favicon-96x96.png")}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset("favicon/favicon-16x16.png")}}">
        <link rel="manifest" href="{{asset("favicon/manifest.json")}}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{asset("favicon/ms-icon-144x144.png")}}">
        <meta name="theme-color" content="#ffffff">
    </head>

<body class="font-primary">

    <!-- Header -->
    <header class="header border-bottom py-md">
        <div class="container position-relative">
            <div class="flex align-items-center justify-content-between">
                <button class="nav-button" aria-label="Przycisk nawigacji"><i class="fas fa-bars fa-2x"></i></button>
                <div class="logo my-md mx-auto">
                    <a href="{{ route("index") }}">
                        <img src="{{ asset("img/logo.png") }}" alt="Logo travel.io" width="300" height="80" class="mx-auto">
                    </a>
                </div>
            </div>
            <nav class="my-lg">
                <ul class="text-uppercase font-secondary flex justify-content-center gap-md text-muted letter-spacing">
                    <li><a href="{{ route("index") . "#dlaczego-my" }}">Dlaczego my?</a></li>
                    <li><a href="{{ route("index") . "#nasz-koncept" }}">Koncept</a></li>
                    <li><a href="{{ route("index") . "#aktualnosci" }}">Aktualności</a></li>
                    <li><a href="{{ route("index") . "#kontakt" }}">Kontakt</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Content -->
    {{ $slot }}

    <!-- Footer -->
    <footer class="bg-dark">
        <div class="container flex justify-content-between align-items-center text-white py-lg">
            <small>&copy; {{ date("Y") }} - Wszelkie prawa zastrzeżone </small>
            <div class="flex gap-sm">
                <i class="fab fa-facebook-square fa-2x"></i>
                <i class="fab fa-instagram fa-2x"></i>
            </div>
        </div>
    </footer>

    <button class="top-button" title="Idź do góry"><i class="fas fa-arrow-circle-up fa-3x"></i></button>

    <script>
        const topButton = document.querySelector(".top-button");

        document.querySelector(".nav-button").addEventListener("click", () => {
            document.querySelector(".header nav").classList.toggle("show");
        });

        topButton.addEventListener("click", () => {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        })

        window.addEventListener("scroll", () => {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                topButton.style.display = "block";
            } else {
                topButton.style.display = "none";
            }
        });

    </script>

    <!-- JavaScript -->
    {{ $javascript ?? '' }}
</body>
</html>
