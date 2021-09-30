<div class="my-8 flex items-center justify-between">
    <!-- Search -->
    <div class="max-w-xs">
        <form action="{{ route($searchRoute) }}" method="GET">
            @csrf
            <div class="flex items-center">
                <input type="search" name="search" id="search" placeholder="Szukaj" aria-label="Wyszukaj zasób do edycji" class="border-white ring-0 outline-none shadow-sm rounded-tl-lg rounded-bl-lg focus:ring-0" />
                <button>
                    <i class="fas fa-search text-lg bg-blue-500 p-3 text-white rounded-tr-lg rounded-br-lg shadow-sm"></i>
                </button>
            </div>
        </form>
    </div>
    <!-- Add resource -->
    <a href="{{ route($route) }}" class="dashboard-button bg-green-500  hover:bg-green-600 w-full md:w-auto {{ $classList ?? ''}}">
        Dodaj
    </a>
</div>
