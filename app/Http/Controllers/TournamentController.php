<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\TournamentUser;
use Illuminate\Http\Request;
use App\Models\WalletTransaction;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    // LIST
    public function index()
    {
        $tournaments = Tournament::all();
        return view('tournaments.index', compact('tournaments'));
    }

    // CREATE PAGE
    public function create()
    {
        return view('tournaments.create');
    }

    // STORE TOURNAMENT
    public function store(Request $request)
    {
        Tournament::create([
            'title' => $request->title,
            'type' => $request->type,
            'entry_fee' => $request->entry_fee,
            'prize' => $request->prize,
            'room_id' => $request->room_id,
            'password' => $request->password,
            'start_time' => $request->start_time,
        ]);

        return redirect('/tournaments');
    }

    // JOIN SYSTEM
    public function join($id)
    {
        $user = auth()->user();
        $tournament = Tournament::find($id);

        $exists = TournamentUser::where('user_id', $user->id)
            ->where('tournament_id', $id)
            ->first();

        if ($exists) {
            return back()->with('error', 'Already Joined!');
        }

        if ($user->balance < $tournament->entry_fee) {
            return back()->with('error', 'Not enough balance!');
        }

        $user->balance -= $tournament->entry_fee;
        $user->save();

        TournamentUser::create([
            'user_id' => $user->id,
            'tournament_id' => $id,
        ]);

        return back()->with('success', 'Joined Successfully!');
    }
}

// 🏆 RESULT SYSTEM (NEW)
    public function result($id)
    {
        $results = Result::where('tournament_id', $id)
            ->orderBy('kills', 'desc')
            ->get();

        return view('tournaments.result', compact('results'));
    }
}

public function editResult($id)
{
    $tournament = \App\Models\Tournament::find($id);

    $players = \App\Models\TournamentUser::where('tournament_id', $id)->get();

    return view('tournaments.add_result', compact('tournament', 'players'));
}

public function storeResult(\Illuminate\Http\Request $request)
{
    $kills = $request->kills; // array

    $maxKills = max($kills);

    foreach ($kills as $userId => $kill) {

        \App\Models\Result::create([
            'tournament_id' => $request->tournament_id,
            'user_id' => $userId,
            'kills' => $kill,
            'is_winner' => ($kill == $maxKills),
        ]);
    }

    return redirect('/tournaments')->with('success', 'Result Published!');
}

public function liveMatch($id)
{
    $tournament = \App\Models\Tournament::find($id);

    $players = \App\Models\TournamentUser::where('tournament_id', $id)->get();

    return view('tournaments.live_match', compact('tournament', 'players'));
}

public function deposit(Request $request)
{
    $user = auth()->user();

    $user->balance += $request->amount;
    $user->save();

    WalletTransaction::create([
        'user_id' => $user->id,
        'type' => 'deposit',
        'amount' => $request->amount,
    ]);

    return back()->with('success', 'Money Added to Wallet!');
}
