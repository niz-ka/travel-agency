<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="travel.io - inspiracje podróżami z całego świata">

        <title>{{ config("app.name") }} - Biuro Podróży</title>

        <!-- Styles -->
        {{-- <link rel="stylesheet" href="{{ asset("css/utilities.css") }}">
        <link rel="stylesheet" href="{{ asset("css/app.css") }}"> --}}
        <link rel="stylesheet" href="{{ asset("css/tailwind.css") }}">

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
    <header class="py-2 sticky top-0 left-0 lg:static w-full bg-white z-50 border-b-2">
        <div class="lg:my-3 flex items-center lg:block relative h-12 lg:h-auto">
            <button id="nav-button" class="lg:hidden pl-3" aria-label="Przycisk nawigacji"><i class="fas fa-bars fa-2x"></i></button>
            <a href="{{ route("index") }}">
                <img src="{{ asset("img/logo.png") }}" alt="Logo travel.io" class="mx-auto h-12 w-auto lg:h-auto absolute top-0 left-1/2 transform -translate-x-1/2 lg:static lg:transform-none" />
            </a>
        </div>
        <nav class="lg:my-4 hidden lg:block relative z-30 bg-white">
            <ul class="pb-2 lg:pb-0 absolute top-0 left-0 w-full lg:static bg-white pt-4 lg:pt-0 pl-3 lg:pl-0 uppercase flex flex-col lg:flex-row gap-4 justify-center font-secondary tracking-widest text-gray-600">
                <li class="hover:text-black hover:underline"><a href="{{ route("index") . "#dlaczego-my" }}">Dlaczego my?</a></li>
                <li class="hover:text-black hover:underline"><a href="{{ route("index") . "#nasz-koncept" }}">Koncept</a></li>
                <li class="hover:text-black hover:underline"><a href="{{ route("index") . "#aktualnosci" }}">Aktualności</a></li>
                <li class="hover:text-black hover:underline"><a href="{{ route("index") . "#kontakt" }}">Kontakt</a></li>
                <li class="hover:text-black hover:underline"><a href="{{ route("index") . "#kontakt" }}">Blog</a></li>
            </ul>
        </nav>
    </header>

    <!-- Content -->
    {{ $slot }}

    <!-- Footer -->
    <footer class="bg-dark">
        <div class="container mx-auto text-white flex justify-between items-center p-3">
            <small>&copy; {{ date("Y") }} - Wszelkie prawa zastrzeżone </small>
            <div class="flex gap-3">
                <i class="fab fa-facebook-square fa-2x"></i>
                <i class="fab fa-instagram fa-2x"></i>
            </div>
        </div>
    </footer>

    <button id="top-button" class="fixed text-accent right-4 bottom-4 text-3xl" title="Idź do góry"><i class="fas fa-arrow-circle-up"></i></button>

    <!-- JavaScript -->
    <script>
        const topButton = document.querySelector("#top-button");

        document.querySelector("#nav-button").addEventListener("click", () => {
            document.querySelector("header nav").classList.toggle("hidden");
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

    {{ $javascript ?? '' }}
</body>
</html>
