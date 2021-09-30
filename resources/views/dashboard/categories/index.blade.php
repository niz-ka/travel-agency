<x-app-layout>
    <div class="mx-auto mt-12 max-w-4xl px-3">
        <!-- New category button -->
        <x-dashboard.top-bar route="dashboard.categories.create" classList="mr-3" searchRoute="dashboard.categories.index" />
        <!-- Success message -->
        @include("components.dashboard.status-message")
        <!-- Categories -->
        @forelse($categories as $category)
            <x-dashboard.category-card :category="$category" />
        @empty
            <x-dashboard.no-resource-message text="Nie znaleziono żadnych kategorii" />
        @endforelse
         <!-- Pagination -->
        <div class="pb-8">
            {{ $categories->links() }}
        </div>
    </div>
</x-app-layout>
