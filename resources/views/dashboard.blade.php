<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="font-family:Arial; background:#0f0f0f; color:white; padding:20px;">

<h2>🏠 Admin Dashboard</h2>

<div style="margin-top:20px;">

    <a href="/admin/tournaments/create">
        <button style="padding:10px 20px; margin:5px; background:green; color:white; border:none;">
            ➕ Create Tournament
        </button>
    </a>

    <a href="/tournaments">
        <button style="padding:10px 20px; margin:5px; background:blue; color:white; border:none;">
            🎮 View Tournaments
        </button>
    </a>

</div>

<hr style="margin:20px 0;">

<h3>⚡ Quick Info</h3>
<p>✔ Tournament System Active</p>
<p>✔ Join System Active</p>
<p>✔ Wallet System Active</p>

</body>
</html>

<h3>💰 Deposit Wallet</h3>

<form method="POST" action="/wallet/deposit">
    <?php echo csrf_field(); ?>

    <input type="number" name="amount" placeholder="Enter Amount">
    <button type="submit">Deposit</button>
</form>
