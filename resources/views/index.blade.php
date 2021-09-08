<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config("app.name") }} - Biuro Podróży</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset("css/utilities.css") }}">
        <link rel="stylesheet" href="{{ asset("css/app.css") }}">

        <!-- Font awesome -->
        <link rel="stylesheet" href="{{ asset("css/font-awesome.css") }}">
    </head>

<body class="font-primary">
    <!-- Header -->
    <header class="my-lg">
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

                <div class="text-white position-absolute w-100 h-100 flex justify-content-center align-items-center flex-column gap-md">
                    <h2 class="h1 text-uppercase">Biuro podróży</h2>
                    <span class="h3 my-md">Twoja podróż jest wyjątkowa</span>
                    <a href="#" class="btn btn-light my-md">Odkryj nas</a>
                </div>
            </div>
    </section>

    <!-- Inspiring Sections -->
    <section data-aos="fade-right" data-aos-duration="1000" class="my-lg">
        <div class="flex align-items-center inspiring-section">
            <!-- Text -->
            <div class="text-center">
                <h2 class="h2">Twórca doświadczeń</h2>
                <p class="text-muted">
                    Wierzymy w bardziej autentyczny i w pełni spersonalizowany sposób podróżowania. Podróż zbudowana wokół Twoich pasji i pragnień, od najprostszych do najbardziej niezwykłych. Niezależnie od tego, czy jest to prosta inspiracja, czy prawdziwy plan podróży, wspólnie opracowujemy trasę, która naprawdę spełni Twoje oczekiwania.
                </p>
                <a href="#" class="btn btn-dark">Skomponujmy twoją podróż</a>
            </div>
            <!-- Image -->
            <div>
                <img src="{{ asset("img/tr1.jpg") }}" alt="Fotografia gór">
            </div>
        </div>
    </section>

    <section data-aos="fade-right" data-aos-duration="1000" class="my-lg">
        <div class="flex align-items-center inspiring-section">
            <!-- Image -->
            <div>
                <img src="{{ asset("img/tr2.jpg") }}" alt="Fotografia gór">
            </div>
            <!-- Text -->
            <div class="text-center">
                <h2 class="h2">Blisko Ciebie</h2>
                <p class="text-muted">
                    Nasze biura podróży spotykają się z Tobą zgodnie z Twoją dostępnością, czasem i miejscem, które Ci odpowiada, aby porozmawiać w uprzywilejowanej i miłej chwili. Naszym pragnieniem jest doradzanie i towarzyszenie w tworzeniu Twojej podróży i aby każdy zachował wyjątkową pamięć o tym doświadczeniu.
                </p>
                <a href="#" class="btn btn-dark">Spotkajmy się</a>
            </div>
        </div>
    </section>

    <!-- Concept -->
    <section class="bg-light text-dark">
        <div class="container text-center">
            <h2 class="h2 py-lg">Nasza koncepcja szyta na miarę</h2>
            <p class="container-sm">
                Luksus to nie kwestia gwiazd, ale tego, co najbardziej autentyczne, sekretne lub oryginalne. Niezależnie od tego, czy marzysz o ucieczce, ekstremalnej podróży, przygodzie czy relaksie, wyobrażamy sobie wyjazdy, które Ci odpowiadają.
            </p>
            <div class="flex justify-content-center align-items-center gap-lg py-lg">
                <div>
                    <i class="fas fa-globe-europe fa-7x"></i>
                    <h3 class="h3">Wiedza</h3>
                    <p>Dobrzy koneserzy tego świata, będziemy w stanie Ci doradzić i skierować Cię do miejsc, które naprawdę Ci odpowiadają.</p>
                </div>
                <div>
                    <i class="fas fa-map-marked-alt fa-7x"></i>
                    <h3 class="h3">Dostosowywanie</h3>
                    <p>Wspólnie budujemy trasę, która łączy Twoje pasje, pragnienia i możliwości oferowane przez miejsca docelowe. Poświęcenie czasu na wysłuchanie Cię i poznanie Cię jest naszym priorytetem. </p>
                </div>
                <div>
                    <i class="fas fa-ticket-alt fa-7x"></i>
                    <h3 class="h3">Towarzyszenie</h3>
                    <p>Jesteśmy po Twojej stronie wcześniej, aby rozwijać Twoją podróż, w trakcie, aby Cię poprowadzić, a po powrocie, aby podzielić się wspomnieniami.</p>
                </div>
            </div>
        </div>
    </section>

    <script src={{asset("js/anim.js")}}></script>
</body>
</html>
