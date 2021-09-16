<x-main-layout>
    <!-- Video section -->
    <section class="background-video">
            <div class="video-wrapper">
                <video class="background-video" playsinline autoplay muted loop poster="{{asset("img/video.jpg")}}" preload="none" role="presentation">
                    <source src="{{ asset("video/background_video.webm") }}" type="video/webm">
                    <source src="{{ asset("video/background_video.mp4") }}" type="video/mp4">
                </video>

                <div class="text-white position-absolute w-100 h-100 flex justify-content-center align-items-center flex-column gap-md">
                    <h2 class="h1 text-uppercase text-center">Biuro podróży</h2>
                    <span class="h3 my-md text-center">Twoja podróż jest wyjątkowa</span>
                    <a href="#" class="btn btn-light my-md">Odkryj nas</a>
                </div>
            </div>
    </section>

    <!-- Inspiring Sections [1] -->
    <section data-aos="fade-right" data-aos-duration="1000" class="py-lg" id="dlaczego-my">
        <div class="container">
            <div class="flex align-items-center inspiring-section gap-lg">
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
                    <img src="{{ asset("img/tr1.jpg") }}" alt="" width="1482" height="981">
                </div>
            </div>
        </div>
    </section>

    <!-- Inspiring Sections [2] -->
    <section data-aos="fade-right" data-aos-duration="1000" class="py-lg">
        <div class="container">
            <div class="flex align-items-center inspiring-section gap-lg">
                <!-- Image -->
                <div>
                    <img src="{{ asset("img/tr2.jpg") }}" alt="" width="1472" height="981">
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
        </div>
    </section>

    <!-- Concept -->
    <section class="concept bg-light text-dark" id="nasz-koncept">
        <div class="container text-center">
            <h2 class="h2 py-lg">Nasza koncepcja szyta na miarę</h2>
            <p class="container-sm">
                Luksus to nie kwestia gwiazd, ale tego, co najbardziej autentyczne, sekretne lub oryginalne. Niezależnie od tego, czy marzysz o ucieczce, ekstremalnej podróży, przygodzie czy relaksie, wyobrażamy sobie wyjazdy, które Ci odpowiadają.
            </p>
            <div class="flex justify-content-center align-items-center gap-lg py-lg">
                <x-concept-card>
                    <x-slot name="iconClass">fas fa-globe-europe fa-7x</x-slot>
                    <x-slot name="title">Wiedza</x-slot>
                    Dobrzy koneserzy tego świata, będziemy w stanie Ci doradzić i skierować Cię do miejsc, które naprawdę Ci odpowiadają.
                </x-concept-card>

                <x-concept-card>
                    <x-slot name="iconClass">fas fa-map-marked-alt fa-7x</x-slot>
                    <x-slot name="title">Dostosowywanie</x-slot>
                    Wspólnie budujemy trasę, która łączy Twoje pasje, pragnienia i możliwości oferowane przez miejsca docelowe. Poświęcenie czasu na wysłuchanie Cię i poznanie Cię jest naszym priorytetem.
                </x-concept-card>

                <x-concept-card>
                    <x-slot name="iconClass">fas fa-ticket-alt fa-7x</x-slot>
                    <x-slot name="title">Towarzyszenie</x-slot>
                    Jesteśmy po Twojej stronie wcześniej, aby rozwijać Twoją podróż, w trakcie, aby Cię poprowadzić, a po powrocie, aby podzielić się wspomnieniami.
                </x-concept-card>
            </div>
        </div>
    </section>

    <!-- Slider -->
    <section class="py-lg" role="presentation">
        <div class="container">
            <div class="slider" slider-duration="4000">
                <button aria-label="Poprzedni slajd" class="prev"><i class="fas fa-chevron-left fa-2x"></i></button>
                <button aria-label="Następny slajd" class="next"><i class="fas fa-chevron-right fa-2x"></i></button>
                <div class="slide current" style="background-image:url('{{asset("img/s1.jpg")}}')"></div>
                <div class="slide" style="background-image:url('{{asset("img/s2.jpg")}}')"></div>
                <div class="slide" style="background-image:url('{{asset("img/s3.jpg")}}')"></div>
                <div class="slide" style="background-image:url('{{asset("img/s4.jpg")}}')"></div>
            </div>
        </div>
    </section>

    <!-- Blog cards -->
    <section class="bg-light" id="aktualnosci">
        <div class="container text-center text-dark">
            <h2 class="h2 py-lg">Ostatnie wieści</h2>
            <p class="container-sm">Pomysły na podróże, wydarzenia, modne kierunki... na naszym blogu znajdziesz wszystkie nowości ze świata w ich oryginalnej wersji</p>
        </div>

        <div class="container py-lg">
            <div class="cards">
                @if (count($posts) > 0)
                    @foreach ($posts as $post)
                        <x-blog-card>
                            <x-slot name="img">{{ $post->image }}</x-slot>
                            <x-slot name="title">{{ $post->title }}</x-slot>
                            <x-slot name="date">{{ $post->created_at->diffForHumans() }}</x-slot>
                            <x-slot name="author">{{ $post->author->name }}</x-slot>
                            <x-slot name="link">{{ route("posts.show", $post->slug) }}</x-slot>
                            {{ strip_tags(Str::limit($post->content, 200, '...')) }}
                        </x-blog-card>
                    @endforeach
                @else
                    <div>Aktualnie brak nowych wpisów. Koniecznie wróć później!</div>
                 @endif
            </div>

            <!-- Read more -->
            <div class="text-center py-lg my-lg">
                <a href="#" class="btn btn-dark mx-auto">Odkryj nowości</a>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section class="bg-black contact-section" id="kontakt">
        <div class="container text-white">
            <h2 class="h2 text-white text-center py-lg mb-lg">Kontakt</h2>
            <div class="flex py-lg justify-content-around gap-lg">
                <!-- Contact info -->
                <div class="flex flex-column gap-lg">
                    <div class="flex align-items-center gap-md">
                            <i class="fas fa-phone-alt fa-2x"></i>
                        <div>
                            <div class="h4 text-gold text-uppercase">Telefon</div>
                            <div>600 400 300</div>
                        </div>
                    </div>

                    <div class="flex align-items-center gap-md">
                        <i class="fas fa-envelope fa-2x"></i>
                        <div>
                            <div class="h4 text-gold text-uppercase">E-mail</div>
                            <div><a href="mailto:biuro@travel.io">biuro@travel.io</a></div>
                        </div>
                    </div>

                    <div class="flex align-items-center gap-md">
                        <i class="fas fa-map-marker-alt fa-2x"></i>
                        <div>
                            <div class="h4 text-gold text-uppercase">Adres</div>
                            <address>
                                ul. Podróżna 2a<br />
                                00-009 Warszawa
                            </address>
                        </div>
                    </div>
                </div>
                <!-- Contact form -->
                <form action="#" method="POST" class="contact-form">
                    <div>
                        <label for="name">Imię i nazwisko</label>
                        <input type="text" name="name" id="name" placeholder="Imię i nazwisko">
                    </div>

                    <div>
                        <label for="email">E-mail</label>
                        <input type="text" name="email" id="email" placeholder="E-mail">
                    </div>

                    <div>
                        <label for="tel">Telefon</label>
                        <input type="text" name="tel" id="tel" placeholder="Telefon">
                    </div>

                    <div>
                        <label for="message">Twoja wiadomość</label>
                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Twoja wiadomość"></textarea>
                    </div>

                    <button class="btn btn-light mb-lg">Wyślij</button>

                </form>
            </div>
        </div>
    </section>

    <!-- JavaScript -->
    <x-slot name="javascript">
        <script src={{asset("js/anim.js")}}></script>
        <script src="{{ asset("js/slider.js") }}"></script>
    </x-slot>

</x-main-layout>
