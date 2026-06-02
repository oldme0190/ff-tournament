public function storeResult(\Illuminate\Http\Request $request)
{
    $kills = $request->kills;

    $maxKills = max($kills);

    foreach ($kills as $userId => $kill) {

        $isWinner = ($kill == $maxKills);

        \App\Models\Result::create([
            'tournament_id' => $request->tournament_id,
            'user_id' => $userId,
            'kills' => $kill,
            'is_winner' => $isWinner,
        ]);

        // 🟢 WINNER PRIZE ADD (Wallet)
        if ($isWinner) {
            $user = \App\Models\User::find($userId);

            $tournament = \App\Models\Tournament::find($request->tournament_id);

            $user->balance += $tournament->prize;
            $user->save();
        }
    }

    return redirect('/tournaments')->with('success', 'Result Published & Prize Sent!');
}
