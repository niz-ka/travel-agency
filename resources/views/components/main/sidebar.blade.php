<aside class="lg:w-1/4 flex flex-col gap-12 lg:items-start my-12 lg:mt-0">
    <!-- Categories -->
    <div>
        <h2 class="aside-heading">Kategorie wpisów</h2>
        <div>
            <ul class="uppercase inline-block">
                @forelse ($categories as $category)
                    <li class="border-2 my-2 p-1 cursor-pointer hover:border-black transition-colors">{{ $category->name }}</li>
                @empty
                    <li>Brak kategorii</li>
                @endforelse
            </ul>
        </div>
    </div>
    <!-- Search -->
    <div>
        <h2 class="aside-heading">Wyszukaj</h2>
        <div class="flex items-center mt-2">
            <x-main.form-input name="search" type="text" label="Wyszukaj" classList="outline-none focus:ring-0 ring-0 focus:border-accent" maxlength="80" />
            <i class="fas fa-search text-lg bg-black p-3 text-white"></i>
        </div>
    </div>
    <!-- See also -->
    <div>
        <h2 class="aside-heading">Zobacz również</h2>
        <div>
            <ul>
                @forelse ($posts as $post)
                    <li class="my-2">
                        <a href="{{ route('posts.show', $post) }}" class="hover:underline hover:text-black">
                            {{ $post->title }}
                        </a>
                    </li>
                @empty
                    <li>Brak postów do wyświetlenia</li>
                @endforelse
            </ul>
        </div>
    </div>
</aside>
