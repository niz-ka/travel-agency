<div id="status-message">
    @if(session("status"))
        <div class="mb-12 bg-green-300 p-4 rounded-xl text-green-900 font-bold flex items-center">
            <i class="fas fa-check mr-2"></i>
            <div>{{ session("status") }}</div>
            <button aria-label="Zamknij" class="ml-auto" style="line-height: 0">
                <i class="fas fa-times text-lg" id="status-message-button"></i>
            </button>
        </div>
    @endif
</div>

<x-slot name="javascript">
    <script>
        // Hide/remove status message on click
        document.querySelector("#status-message").addEventListener("click", (e) => {
            if(e.target.id == "status-message-button") {
                document.querySelector("#status-message").firstElementChild.remove();
            }
        });
    </script>
</x-slot>
