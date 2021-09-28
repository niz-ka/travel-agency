<x-main-layout>
    <div class="container mx-auto mt-12 text-dark lg:flex gap-24 p-4">
        <!-- Left -->
        <main class="lg:w-2/3">
            <!-- Posts -->
            @forelse ($posts as $post)
                <x-main.blog-index-card :post="$post" />
            @empty
                <div>Brak postów do wyświetlenia</div>
            @endforelse
            <!-- Pagination -->
            {{ $posts->links() }}
        </main>
        <!-- Right -->
        <x-main.sidebar :categories="$categories" :posts="$latest" />
    </div>
</x-main-layout>
