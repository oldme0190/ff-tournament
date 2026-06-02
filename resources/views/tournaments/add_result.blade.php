<h2>🏆 Add Match Result - {{ $tournament->title }}</h2>

<form method="POST" action="/admin/result/store">
    <?php echo csrf_field(); ?>

    <input type="hidden" name="tournament_id" value="{{ $tournament->id }}">

    @foreach($players as $p)
        <div style="margin:10px;">
            User ID: {{ $p->user_id }}
            <input type="number" name="kills[{{ $p->user_id }}]" placeholder="Kills">
        </div>
    @endforeach

    <button type="submit">Publish Result</button>
</form>
