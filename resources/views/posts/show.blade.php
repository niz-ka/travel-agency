<x-main-layout>
    <div class="container mx-auto mt-12 text-dark lg:flex gap-4 p-4">
        <!-- Left -->
        <main class="lg:w-2/3">
            <h1 class="section-heading line-after">{{ $post->title }}</h1>
            <small>Opublikowano {{ $post->created_at->diffForHumans() }}</small>
            <div class="flex items-center mt-2">
                <i class="far fa-user-circle fa-2x pr-2"></i>
                <small class="px-md text-muted">Przez {{ $post->author->name }}</small>
            </div>
            <div class="my-6">
                <img src="{{ asset("storage") ."/". $post->image }}" alt="" class="object-cover w-full" style="max-height: 30rem;" />
            </div>
            <div class="section-paragraph text-justify post">
                {!! clean($post->content) !!}
            </div>
        </main>

        <!-- Right -->
        <aside class="lg:w-1/3 flex flex-col lg:items-end mt-4 lg:mt-0">
            {{-- TODO --}}
            gregrew
        </aside>
    </div>
</x-main-layout>
