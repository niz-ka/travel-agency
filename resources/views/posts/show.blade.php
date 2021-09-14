<x-main-layout>
    <div class="container flex justify-content-between pt-lg mt-lg post-show">
        <!-- Left -->
        <main>
            <h1 class="h2 line-after">{{ $post->title }}</h1>
            <small class="text-muted block my-md">Opublikowano {{ $post->created_at->diffForHumans() }}</small>
            <div class="flex align-items-center">
                <i class="far fa-user-circle fa-2x text-muted"></i>
                <small class="px-md text-muted">Przez {{ $post->author->name }}</small>
            </div>
            <div class="mt-lg">
                <img src="{{ $post->image }}" alt="" class="mx-auto"/>
            </div>
            <div class="text-justify py-lg">
                <p>{{ $post->content }}</p>
            </div>
        </main>

        <!-- Right -->
        <aside class="min-width-30 text-right">
            {{-- TODO --}}
        </aside>
    </div>
</x-main-layout>
