 <form action="{{ route($route, $resource) }}" method="POST">
    @method("DELETE")
    @csrf
    <input type="submit" class="dashboard-button bg-red-500 hover:bg-red-600 w-full" value="Usuń">
</form>
