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
        <x-main.sidebar :categories="$categories" :posts="$postsWithCategory" />
    </div>
</x-main-layout>
