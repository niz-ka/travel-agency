<div class="max-w-5xl bg-white shadow-md rounded-xl mx-auto my-12">
    <div class="bg-gray-300 rounded-t-xl px-4 py-2">
        {{ $type == "edit" ? "Edytowanie wpisu" : "Dodawanie wpisu" }}
    </div>

    <div class="p-4">
        <form action="{{
            $type == "edit"
            ? route("dashboard.posts.update", $post)
            : route("dashboard.posts.store")
            }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
            @if($type == "edit") @method("PUT") @endif
            @csrf
            <!-- Title -->
            <div>
                <label for="title" class="block mb-2">Tytuł</label>
                <input
                type="text"
                id="title"
                name="title"
                class="dashboard-input"
                value="{{ $type == "edit" ? $post->title : old("title") }}"
                required
                maxlength="300"
                >

                @error("title")
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>
            <!-- Category -->
            <div>
                <label for="category" class="block mb-2">Kategoria</label>
                <select name="category" id="category" class="dashboard-input cursor-pointer">
                    <option value="">Bez kategorii</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ ($type == "edit" && $category->id === $post->category_id) || ($type != "edit" && old("category") == $category->id) ? "selected" : "" }}>{{ $category->name }}</option>
                    @endforeach
                </select>

                @error("category")
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>
            <!-- Content -->
            <div>
                <label for="content" class="block mb-2">Treść</label>
                <div class="post">
                    <textarea id="content" name="content">
                        {{ $type == "edit" ? $post->content : old("content") }}
                    </textarea>
                <div>

                @error("content")
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>
            <!-- Image -->
            <div class="mt-6">
                <label for="image" class="inline-block mb-2 bg-indigo-600 text-white p-2 rounded-md cursor-pointer hover:bg-indigo-900 w-full md:w-auto">
                    <i class="fas fa-upload mr-1"></i>
                    Prześlij zdjęcie
                </label>
                <input type="file" name="image" id="image" class="hidden" accept=".jpg, .jpeg, .png, .svg, .webp, .gif, .bmp, .tiff">

                @if($type == "edit")
                    <img src="{{ asset("storage") . "/" . $post->image }}" alt="" class="w-36 h-36 object-cover rounded-md mb-4" id="imgSrc" />
                @else
                    <img src="{{ asset("storage/images/no_entry_image.jpg") }}" alt="" class="w-36 h-36 object-cover rounded-md mb-4" id="imgSrc" />
                @endif

                @error("image")
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>
            <!-- Submit -->
            <div class="text-center">
                <input id="submit" type="submit" value="{{ $type == "edit" ? "Edytuj" : "Dodaj" }}" class="bg-gray-800 text-white p-2 rounded-md cursor-pointer hover:bg-gray-900 w-full md:w-auto">
            </div>
        </form>
    </div>
</div>

<x-slot name="javascript">
    <script src="{{ asset("editor/build/ckeditor.js") }}"></script>
    <script>
        // Image preview
        document.querySelector("#image").addEventListener("change", function() {
            const [file] = this.files;
            if(file) {
                document.querySelector("#imgSrc").src = URL.createObjectURL(file);
            }
        });

        // CKEditor settings
        ClassicEditor.create(document.querySelector("#content"), {
            toolbar: {
                items: [
                    "heading",
                    "|",
                    "bold",
                    "italic",
                    "link",
                    "bulletedList",
                    "numberedList",
                    "|",
                    "outdent",
                    "indent",
                    "|",
                    "imageInsert",
                    "insertTable",
                    "undo",
                    "redo",
                ],
            },
            language: "pl",
            image: {
                toolbar: [
                    "imageTextAlternative",
                    "imageStyle:inline",
                    "imageStyle:block",
                    "imageStyle:side",
                ],
            },
            table: {
                contentToolbar: ["tableColumn", "tableRow", "mergeTableCells"],
            },
            licenseKey: "",
        })
            .then((editor) => {
                window.editor = editor;
            })
            .catch((error) => {
                console.log("Wystąpił błąd CKEditor");
    });
	</script>
</x-slot>


