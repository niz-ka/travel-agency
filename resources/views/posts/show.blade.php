<x-main-layout>
    <div class="container mx-auto mt-12 text-dark lg:flex gap-24 p-4">
        <!-- Left -->
        <main class="lg:w-2/3">
            <!-- Title -->
            <h1 class="section-heading line-after">{{ $post->title }}</h1>
            <!-- Date -->
            <small>{{ $post->created_at->diffForHumans() }}</small>
            <!-- Category -->
            <div class = "flex items-center mt-2">
                <i class="fas fa-tags text-lg pr-2 w-8"></i>
                <small>{{ $post->category ? $post->category->name : "Bez kategorii" }}</small>
            </div>
            <!-- Author -->
            <div class="flex items-center mt-2">
                <i class="far fa-user-circle text-xl pr-2 w-8"></i>
                <small class="px-md">Przez {{ $post->author->name }}</small>
            </div>
            <!-- Image -->
            <div class="my-6">
                <img src="{{ asset("storage") ."/". $post->image }}" alt="" class="object-cover w-full" style="max-height: 30rem;" />
            </div>
            <!-- Content -->
            <div class="section-paragraph text-justify post">
                {!! clean($post->content) !!}
            </div>
        </main>

        <!-- Right -->
        <aside class="sticky top-24 h-full lg:w-1/4 flex flex-col gap-12 lg:items-start mt-4 lg:mt-0">
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
            <!-- See also -->
            <div>
                <h2 class="aside-heading">Zobacz również</h2>
                <div>
                    <ul>
                        @forelse ($postsWithCategory as $post)
                            <li class="underline cursor-pointer hover:text-black">{{ $post->title }}</li>
                        @empty
                            <li>Brak postów do wyświetlenia</li>
                        @endforelse
                    </ul>
                </div>
            </div>
            <!-- Search -->
            <div>
                <h2 class="aside-heading">Wyszukaj</h2>
                <div class="flex items-center mt-2">
                    <x-main.form-input name="search" type="text" label="Wyszukaj" classList="" maxlength="80" />
                    <i class="fas fa-search text-lg bg-black p-3 text-white"></i>
                </div>
            </div>
        </aside>
    </div>
</x-main-layout>
