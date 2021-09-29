<x-app-layout>
    <div class="mx-auto mt-12 max-w-4xl px-3">
        <!-- New category button -->
        <x-dashboard.new-resource-button route="dashboard.categories.create" classList="mr-3" />
        <!-- Success message -->
        @include("components.dashboard.status-message")
        <!-- Categories -->
        @forelse($categories as $category)
            <x-dashboard.category-card :category="$category" />
        @empty
            <x-dashboard.no-resource-message text="Aktualnie nie posiadasz żadnych kategorii" />
        @endforelse
         <!-- Pagination -->
        <div class="pb-8">
            {{ $categories->links() }}
        </div>
    </div>
</x-app-layout>
