<x-app-layout>
    <x-slot name="dependencies">
         <!-- Font awesome -->
        <link rel="stylesheet" href="{{ asset("css/font-awesome.css") }}">
    </x-slot>

    <div class="mx-auto mt-12 max-w-4xl">
        <!-- New blog entry button -->
        <div class="mx-4 my-8 text-right">
            <a href="{{ route("dashboard.posts.create") }}" class="dashboard-button bg-green-500  hover:bg-green-600 mr-4 w-full md:w-auto">
                Dodaj
            </a>
        </div>
        <!-- Success message -->
        @if(session("status"))
            <div class="mx-4 mb-12 bg-green-300 p-4 rounded-xl text-green-900 font-bold">
                <i class="fas fa-check"></i>
                {{ session("status") }}
            </div>
        @endif
        <!-- Blog entry cards -->
        @forelse($posts as $post)
            <x-dashboard.blog-card :image="$post->image" :title="$post->title" :content="clean(strip_tags(Str::limit($post->content, 200, '...')))" :date="$post->created_at->diffForHumans()" :post="$post" />
        @empty
            <div class="mx-4 bg-white shadow-md p-4 rounded-xl flex items-center">
                <i class="far fa-frown-open mr-2 fa-2x"></i>
                <span>Aktualnie nie posiadasz żadnych wpisów.</span>
            </div>
        @endforelse
        <!-- Pagination -->
        <div class="pb-8">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
