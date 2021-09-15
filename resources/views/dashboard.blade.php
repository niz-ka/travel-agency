<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-slot name="dependencies">
         <!-- Font awesome -->
        <link rel="stylesheet" href="{{ asset("css/font-awesome.css") }}">
    </x-slot>

    <div class="mx-auto mt-12 max-w-4xl">

        @if(session("status"))
            <div class="mb-12 bg-green-300 p-4 rounded-xl text-green-900 font-bold">
                <i class="fas fa-check"></i>
                {{ session("status") }}
            </div>
        @endif

        @if(count($posts) > 0)
                @foreach ($posts as $post)
                    <div class="bg-white rounded-xl p-4 shadow-md flex items-center justify-between gap-8 mb-12">
                        <div class="w-64 h-32">
                            <img src="{{ $post->image }}" alt="" class="w-full h-full object-cover rounded-xl" />
                        </div>
                        <div>
                            <h3 class="font-bold text-xl">{{ $post->title }}</h3>
                            <p class="mt-5 text-justify">{{ Str::limit($post->content, 200, '...') }}</p>
                            <small class="text-gray-600 block mt-2">Opublikowano {{ $post->created_at->diffForHumans() }}</small>
                        </div>
                        <div>
                            <a href="#" class="bg-indigo-500 text-white p-3 rounded-lg hover:bg-indigo-600 block mb-6 text-center">Edytuj</a>
                            <form action="{{ route("posts.destroy", $post) }}" method="POST">
                                @method("DELETE")
                                @csrf
                                <input type="submit" class="bg-red-500 text-white p-3 rounded-lg hover:bg-red-600 block w-full text-center cursor-pointer" value="Usuń">
                            </form>
                        </div>
                    </div>
                @endforeach
                <div class="pb-8">
                    {{ $posts->links() }}
                </div>
        @else
            <div class="bg-white shadow-md p-4 rounded-xl flex items-center">
                <i class="far fa-frown-open mr-2 fa-2x"></i>
                <span>Aktualnie nie posiadasz żadnych wpisów.</span>
                <a href="{{ route("posts.create") }}" class="bg-green-500 text-white p-2 rounded-lg hover:bg-green-600 block text-center ml-auto">
                    Dodaj
                </a>
            </div>
        @endif
    </div>

</x-app-layout>
