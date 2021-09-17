<x-main-layout>

    <section class="relative w-full h-screen">
        <div class="w-full h-full">
            <video playsinline autoplay muted loop poster="{{asset("img/video.jpg")}}" preload="none" role="presentation" class="w-full h-full object-cover">
                <source src="{{ asset("video/background_video.webm") }}" type="video/webm">
                <source src="{{ asset("video/background_video.mp4") }}" type="video/mp4">
            </video>

            <div class="absolute top-0 left-0 text-white w-full h-full justify-center items-center flex flex-col text-center gap-12 bg-black bg-opacity-20">
                <h2 class="text-3xl sm:text-5xl md:text-7xl font-secondary uppercase font-medium tracking-widest">Biuro podróży</h2>
                <div class="md:text-xl font-secondary uppercase tracking-widest font-medium">Twoja podróż jest wyjątkowa</div>
                <a href="#" class="btn-white">Odkryj nas</a>
            </div>
        </div>
    </section>

    <x-inspiring-section id="dlaczego-my">
        <x-slot name="textFlexOrder">order-0</x-slot>
        <x-slot name="heading">Twórca doświadczeń</x-slot>
        <x-slot name="imagePath">{{ asset("img/tr1.jpg") }}</x-slot>
            Wierzymy w bardziej autentyczny i w pełni spersonalizowany sposób podróżowania. Podróż zbudowana wokół Twoich pasji i pragnień, od najprostszych do najbardziej niezwykłych. Niezależnie od tego, czy jest to prosta inspiracja, czy prawdziwy plan podróży, wspólnie opracowujemy trasę, która naprawdę spełni Twoje oczekiwania.
    </x-inspiring-section>

    <x-inspiring-section>
        <x-slot name="textFlexOrder">order-1</x-slot>
        <x-slot name="heading">Blisko Ciebie</x-slot>
         <x-slot name="imagePath">{{ asset("img/tr2.jpg") }}</x-slot>
            Nasze biura podróży spotykają się z Tobą zgodnie z Twoją dostępnością, czasem i miejscem, które Ci odpowiada, aby porozmawiać w uprzywilejowanej i miłej chwili. Naszym pragnieniem jest doradzanie i towarzyszenie w tworzeniu Twojej podróży i aby każdy zachował wyjątkową pamięć o tym doświadczeniu.
    </x-inspiring-section>

    <section class="bg-gray-100 p-2 mt-6">
        <div class="container text-dark mx-auto">
            <h2 class="section-heading text-center mt-6">Nasza koncepcja szyta na miarę</h2>
            <p class="max-w-xl mx-auto text-center section-paragraph">
                Luksus to nie kwestia gwiazd, ale tego, co najbardziej autentyczne, sekretne lub oryginalne. Niezależnie od tego, czy marzysz o ucieczce, ekstremalnej podróży, przygodzie czy relaksie, wyobrażamy sobie wyjazdy, które Ci odpowiadają.
            </p>
            <!-- Concept cards -->
            <div class="lg:flex text-center mt-6 gap-8">
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

    <section role="presentation" class="mt-6">
        <div class="container mx-auto">
            <div class="slider relative w-full h-screen" slider-duration="4000">
                <button aria-label="Poprzedni slajd"
                class="prev absolute top-1/2 left-4 text-white z-10 transform -translate-y-1/2">
                    <i class="fas fa-chevron-left fa-2x"></i>
                </button>
                <button aria-label="Następny slajd" class="next absolute top-1/2 right-4 text-white z-10 transform -translate-y-1/2">
                    <i class="fas fa-chevron-right fa-2x"></i>
                </button>

                @for ($i = 1; $i <= 4; $i++)
                    <x-slider-slide>
                        <x-slot name="imagePath">{{ asset("img/s$i.jpg") }}</x-slot>
                        @if ($i === 1)
                            <x-slot name="currentClass">current</x-slot>
                        @endif
                    </x-slider-slide>
                @endfor

            </div>
        </div>
    </section>

    <!-- Blog cards -->
    <section class="bg-gray-100 p-2 mt-6 text-dark">
        <div class="container mx-auto text-center">
            <h2 class="section-heading text-center mt-6">Ostatnie wieści</h2>
            <p class="section-paragraph max-w-xl mx-auto">
                Pomysły na podróże, wydarzenia, modne kierunki... na naszym blogu znajdziesz wszystkie nowości ze świata w ich oryginalnej wersji
            </p>
        </div>

        <div class="container mt-6 mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                @if (count($posts) > 0)
                    @foreach ($posts as $post)
                        <x-blog-card>
                            <x-slot name="img">{{ $post->image }}</x-slot>
                            <x-slot name="title">{{ $post->title }}</x-slot>
                            <x-slot name="date">{{ $post->created_at->diffForHumans() }}</x-slot>
                            <x-slot name="author">{{ $post->author->name }}</x-slot>
                            <x-slot name="link">{{ route("posts.show", $post->slug) }}</x-slot>
                            {!! clean(strip_tags(Str::limit($post->content, 200, '...'))) !!}
                        </x-blog-card>
                    @endforeach
                @else
                    <div class="mx-auto">Aktualnie brak nowych wpisów. Koniecznie wróć później!</div>
                 @endif
            </div>

            <!-- Read more -->
            <div class="text-center my-12">
                <a href="#" class="btn-black">Odkryj nowości</a>
            </div>
        </div>
    </section>

    <section class="bg-black pb-6">
        <div class="container mx-auto text-white">
            <h2 class="section-heading text-center py-8">Kontakt</h2>
            <div class="flex flex-col items-center lg:flex-row lg:items-start justify-around gap-8">
                <!-- Contact info -->
                <div class="flex flex-col gap-8">
                    <div class="flex items-center gap-4">
                        <i class="fas fa-phone-alt fa-2x"></i>
                        <div>
                            <h3 class="uppercase text-accent font-medium font-secondary tracking-widest text-xl mb-2">Telefon</h3>
                            <strong>600 400 300</strong>
                        </div>
                    </div>

                     <div class="flex items-center gap-4">
                        <i class="fas fa-envelope fa-2x"></i>
                        <div>
                            <h3 class="uppercase text-accent font-medium font-secondary tracking-widest text-xl mb-2">E-mail</h3>
                            <strong><a href="mailto:biuro@travel.io">biuro@travel.io</a></strong>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <i class="fas fa-phone-alt fa-2x"></i>
                        <div>
                            <h3 class="uppercase text-accent font-medium font-secondary tracking-widest text-xl mb-2">Adres</h3>
                            <address class="not-italic font-bold">
                                ul. Podróżna 2a<br />
                                00-009 Warszawa
                            </address>
                        </div>
                    </div>
                </div>
                <!-- Contact form -->
                <div class=" max-w-sm flex-1">
                    <form action="#" method="POST" class="flex flex-col gap-4 w-full">
                        @csrf
                        <div>
                            <label for="name" class="hidden">Imię i nazwisko</label>
                            <input type="text" name="name" id="name" placeholder="Imię i nazwisko" class="form-input">
                        </div>

                        <div>
                            <label for="email" class="hidden">E-mail</label>
                            <input type="text" name="email" id="email" placeholder="E-mail" class="form-input">
                        </div>

                        <div>
                            <label for="tel" class="hidden">Telefon</label>
                            <input type="text" name="tel" id="tel" placeholder="Telefon" class="form-input">
                        </div>

                        <div>
                            <label for="message" class="hidden">Twoja wiadomość</label>
                            <textarea name="message" id="message" cols="30" rows="10" placeholder="Twoja wiadomość" class="form-input"></textarea>
                        </div>

                        <button class="btn-white w-full">Wyślij</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- <!-- Contact -->
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
    </section> --}}

    <x-slot name="javascript">
        <script src={{asset("js/anim.js")}}></script>
        <script src="{{ asset("js/slider.js") }}"></script>
    </x-slot>

</x-main-layout>
