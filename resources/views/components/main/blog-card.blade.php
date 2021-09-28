<a href="{{ $link }}" class="lg:w-1/3 bg-white shadow-md flex flex-col hover:scale-95 duration-300 transition transform">
    <div>
        <img class="w-full h-56 object-cover" src="{{ asset("storage") ."/". $img }}" alt="">
    </div>
    <div class="flex flex-col p-3 h-full">
         <div class="my-2">
            <span class="uppercase font-secondary tracking-widest border-b-accent">
                {{ $category }}
            </span>
        </div>
        <h3 class="section-subheading">{{ $title }}</h3>
        <div class="section-paragraph break-words">{!! $slot !!}</div>
        <div class="mt-4 flex justify-between h-full items-end">
            <small>{{ $date }}</small>
            <small>Przez {{ $author }}</small>
        </div>
    </div>
</a>
