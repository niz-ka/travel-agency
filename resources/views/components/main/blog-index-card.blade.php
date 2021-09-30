<div class="border-b-2 mb-16">
    <!-- Image -->
    <img src="{{ asset("storage") ."/". $post->image }}" alt="" class="object-cover w-full max-h-96" />
    <!-- Title -->
    <h1 class="my-12 section-heading line-after"><a href="{{ route("posts.show", $post) }}" class="hover:underline">{{ $post->title }}</a></h1>
    <div class="flex pt-3 gap-2 sm:gap-6 flex-col sm:flex-row sm:items-center">
        <!-- Date -->
        <small>{{ $post->created_at->diffForHumans() }}</small>
        <!-- Category -->
        <div class = "flex items-center">
            <i class="fas fa-tags w-7"></i>
            <small>{{ $post->category ? $post->category->name : "Bez kategorii" }}</small>
        </div>
        <!-- Author -->
        <div class = "flex items-center">
            <i class="far fa-user-circle w-6"></i>
            <small>{{ $post->author->name }}</small>
        </div>
    </div>
    <!-- Short content -->
    <div class="mt-8 pb-6 break-words">
        {!! clean(strip_tags(Str::limit($post->content, 400, '...'))) !!}
    </div>
</div>
