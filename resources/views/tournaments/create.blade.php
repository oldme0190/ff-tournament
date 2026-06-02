<h2>Create Tournament 🏆</h2>

<form method="POST" action="/admin/tournaments/store">
    <?php echo csrf_field(); ?>

    <input name="title" placeholder="Title"><br><br>
    <input name="type" placeholder="BR / CS"><br><br>
    <input name="entry_fee" placeholder="Entry Fee"><br><br>
    <input name="prize" placeholder="Prize"><br><br>

    <input name="room_id" placeholder="Room ID"><br><br>
    <input name="password" placeholder="Password"><br><br>
    <input name="start_time" placeholder="Start Time"><br><br>

    <button>Create</button>
</form>
