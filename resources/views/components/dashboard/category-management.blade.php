<div class="max-w-3xl bg-white shadow-md rounded-xl mx-auto my-12">
    <div class="bg-gray-300 rounded-t-xl px-4 py-2">
        {{ $type == "edit" ? "Edytowanie kategorii" : "Dodawanie kategorii" }}
    </div>

    <div class="p-4">
        <form action="{{
            $type == "edit"
            ? route("dashboard.categories.update", $category)
            : route("dashboard.categories.store")
            }}" method="POST" class="flex flex-col gap-6">
            @if($type == "edit") @method("PUT") @endif
            @csrf
            <!-- Name -->
            <div>
                <label for="name" class="block mb-2">Nazwa</label>
                <input
                type="text"
                id="name"
                name="name"
                class="dashboard-input @error("name") border-red-500 @enderror"
                value="{{ $type == "edit" ? $category->name : old("name") }}"
                required
                maxlength="50"
                >

                @error("name")
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

