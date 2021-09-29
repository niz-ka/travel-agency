<div class="bg-white rounded-xl p-4 shadow-md flex flex-col md:flex-row items-center justify-between gap-8 mb-12">
    <!-- Image -->
    <div class="md:w-32 md:h-32 md:mx-0 max-w-xs mx-auto">
        <img src="{{ asset("storage") ."/". $post->image }}" alt="" class="max-w-full h-auto md:w-full md:h-full object-cover rounded-xl" />
    </div>
    <!-- Text data -->
    <div class="w-full md:w-auto flex-1">
        <h3 class="font-medium text-xl font-secondary uppercase tracking-wider">{{ $post->title }}</h3>
        <div class="mt-2 break-words">{!! clean(strip_tags(Str::limit($post->content, 200, '...'))) !!}</div>
        <div class="flex gap-4 items-center mt-2">
            <small class="text-gray-600">{{ $post->created_at->diffForHumans() }}</small>
            <div class="flex items-center gap-2">
                <i class="fas fa-tags text-sm"></i>
                <small class="text-gray-600">{{ $post->category ? $post->category->name : "Bez kategorii"}}</small>
            </div>
        </div>
    </div>
    <!-- Buttons -->
    <div class="w-full md:w-auto flex flex-col gap-4">
        <!-- Edit button -->
        <x-dashboard.edit-button route="dashboard.posts.edit" :resource="$post" />
        <!-- Delete button -->
        <x-dashboard.delete-button route="dashboard.posts.destroy" :resource="$post" />
    </div>
</div>
