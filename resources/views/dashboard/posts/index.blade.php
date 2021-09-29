<x-app-layout>
    <div class="mx-auto mt-12 max-w-4xl px-3">
        <!-- New blog entry button -->
         <x-dashboard.new-resource-button route="dashboard.posts.create" classList="mr-4" />
        <!-- Success message -->
        @include("components.dashboard.status-message")
        <!-- Blog entry cards -->
        @forelse($posts as $post)
            <x-dashboard.blog-card :post="$post" />
        @empty
            <x-dashboard.no-resource-message text="Aktualnie nie posiadasz żadnych wpisów" />
        @endforelse
        <!-- Pagination -->
        <div class="pb-8">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
