<a href="{{ $link }}" class="flex-1 bg-white shadow-md flex flex-col hover:scale-95 duration-300 transition transform">
    <div>
        <img class="w-full h-56 object-cover" src="{{ asset("storage") ."/". $img }}" alt="">
    </div>
    <div class="flex flex-col p-3 h-full">
        <h3 class="section-subheading">{{ $title }}</h3>
        <p class="section-paragraph">{{ $slot }}</p>
        <div class="mt-4 flex justify-between h-full items-end">
            <small>{{ $date }}</small>
            <small>Przez {{ $author }}</small>
        </div>
    </div>
</a>
