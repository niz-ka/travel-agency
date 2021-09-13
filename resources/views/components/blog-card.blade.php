<a href="{{ $link }}">
    <div class="card">
        <div class="card-img">
            <img src="{{ $img }}" alt="">
        </div>
        <div class="card-text">
            <h3 class="h3 my-md">{{ $title }}</h3>
            <p>{{ $slot }}</p>
            <small class="date text-muted">{{ $date }}</small>
            <small class="author text-muted">Przez {{ $author }}</small>
        </div>
    </div>
</a>
