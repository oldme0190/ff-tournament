<h2>🎮 Tournament List</h2>

@foreach($tournaments as $t)
    <div style="border:1px solid #fff; margin:10px; padding:10px;">
        <h3>{{ $t->title }}</h3>
        <p>{{ $t->type }}</p>
        <p>Entry: {{ $t->entry_fee }}</p>
        <p>Prize: {{ $t->prize }}</p>

        <p>Room ID: {{ $t->room_id }}</p>
        <p>Password: {{ $t->password }}</p>

        <a href="/tournament/join/{{ $t->id }}">
            <button>Join</button>
        </a>
    </div>
@endforeach
