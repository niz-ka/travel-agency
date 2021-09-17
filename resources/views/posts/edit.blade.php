<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl bg-white shadow-md rounded-xl mx-auto my-12">
        <div class="bg-gray-300 rounded-t-xl px-4 py-2">
            Edytowanie wpisu
        </div>

        <div class="p-4">
            <form action="{{ route("posts.update", $post) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
                @method("PUT")
                @csrf

                <div>
                    <label for="title" class="block mb-2">Tytuł</label>
                    <input
                    type="text"
                    id="title"
                    name="title"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error("title") border-red-500 @enderror"
                    value="{{ $post->title }}">

                    @error("title")
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="content" class="block mb-2">Treść</label>
                    <div class="post">
                        <textarea id="content" name="content">
                            {{ $post->content }}
                        </textarea>
                    <div>

                    @error("content")
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-6">
                    <img src="{{ asset("storage") . "/" . $post->image }}" alt="" class="w-32 h-32 object-cover rounded-md mb-4" />
                    <label for="image" class="block mb-2">Zdjęcie</label>
                    <input type="file" name="image" id="image" class="cursor-pointer">

                    @error("image")
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <input id="submit" type="submit" value="Edytuj" class="bg-gray-800 text-white p-2 rounded-md cursor-pointer hover:bg-gray-900 w-full md:w-auto">
                </div>

            </form>
        </div>
    </div>

    <x-slot name="javascript">
        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
            ClassicEditor
            .create(document.querySelector('#content') )
            .catch(error => {
                console.error( error );
            } );
        </script>
    </x-slot>

</x-app-layout>
