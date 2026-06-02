<!DOCTYPE html>
<html>
<head>
    <title>Live Match</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="background:#0b0b0b; color:white; font-family:Arial; padding:15px;">

<h2>🔥 LIVE MATCH LOBBY</h2>

<h3>{{ $tournament->title }}</h3>

<p>🎮 Type: {{ $tournament->type }}</p>
<p>💰 Entry Fee: {{ $tournament->entry_fee }}</p>
<p>🏆 Prize: {{ $tournament->prize }}</p>

<hr>

<h3>🔑 Room Info</h3>
<p>Room ID: {{ $tournament->room_id }}</p>
<p>Password: {{ $tournament->password }}</p>

<hr>

<h3>👥 Players Joined</h3>

@foreach($players as $p)
    <div style="padding:5px; border-bottom:1px solid #333;">
        Player ID: {{ $p->user_id }}
    </div>
@endforeach

<hr>

<a href="/admin/match/{{ $tournament->id }}">
    <button style="padding:10px; background:green; color:white;">
        🔧 Admin Control Panel
    </button>
</a>

</body>
</html>
