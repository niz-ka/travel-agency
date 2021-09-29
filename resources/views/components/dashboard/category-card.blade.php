<div class="bg-white rounded-xl p-4 shadow-md flex flex-col md:flex-row items-center justify-between gap-8 mb-12">
    <div class="flex flex-col gap-4">
        <div class="font-secondary uppercase text-xl">{{ $category->name }}</div>
        <div>Liczba postów: {{ $category->posts_count }}</div>
    </div>
    <div class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
        <!-- Edit button -->
        <x-dashboard.edit-button route="dashboard.categories.edit" :resource="$category" />
        <!-- Delete button -->
        <x-dashboard.delete-button route="dashboard.categories.destroy" :resource="$category" />
    </div>
</div>
