<div class="bg-white rounded-xl p-4 shadow-md flex flex-col md:flex-row items-center justify-between gap-8 mb-12 mx-4">
    <!-- Image -->
    <div class="md:w-32 md:h-32 md:mx-0 max-w-xs mx-auto">
        <img src="{{ asset("storage") ."/". $image }}" alt="" class="max-w-full h-auto md:w-full md:h-full object-cover rounded-xl" />
    </div>
    <!-- Text data -->
    <div class="w-full md:w-auto flex-1">
        <h3 class="font-bold text-xl">{{ $title }}</h3>
        <div class="mt-2 text-justify">{!! $content !!}</div>
        <small class="text-gray-600 block mt-2">{{ $date }}</small>
    </div>
    <!-- Buttons -->
    <div class="w-full md:w-auto flex flex-col gap-4">
        <!-- Edit button -->
        <a href="{{ route("dashboard.posts.edit", $post) }}" class="dashboard-button bg-indigo-500 hover:bg-indigo-600 w-full">Edytuj</a>
        <!-- Delete button -->
        <form action="{{ route("dashboard.posts.destroy", $post) }}" method="POST">
            @method("DELETE")
            @csrf
            <input type="submit" class="dashboard-button bg-red-500 hover:bg-red-600 w-full" value="Usuń">
        </form>
    </div>
</div>
