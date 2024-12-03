<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use App\Models\Gamer;
use App\Models\Score;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function startGame(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:gamers,email',
        ]);

        $user = Gamer::firstOrCreate(
            ['email' => $validated['email']],
            ['name' => $validated['name']]
        );

        $game = Game::create(['gamer_id' => $user->id,'name'=>'Game']);

        return response()->json(['game_id' => $game->id, 'gamer_id' => $user->id], 201);
    }

    public function endGame(Request $request)
    {
        $validated = $request->validate([
            'game_id' => 'required|exists:games,id',
            'gamer_id' => 'required|exists:gamers,id',
            'score' => 'required|integer|min:0|max:1000',
        ]);

        $game = Game::find($validated['game_id']);
        $game->update(['score' => $validated['score']]);

        $bestScore = Score::updateOrCreate(
            ['gamer_id' => $validated['gamer_id'], 'date' => now()->toDateString()],
            ['best_score' => max($validated['score'], optional(Score::where('gamer_id', $validated['gamer_id'])->first())->best_score ?? 0)]
        );

        $dailyRank = Score::where('date', now()->toDateString())
            ->orderByDesc('best_score')
            ->get()
            ->pluck('gamer_id')
            ->search($validated['gamer_id']) + 1;

        return response()->json(['daily_rank' => $dailyRank, 'best_score' => $bestScore->best_score], 200);
    }

    public function topTen()
    {
        $top10 = Score::where('score_date', now()->toDateString())
            ->orderByDesc('best_score')
            ->limit(10)
            ->with('gamer:id,name')
            ->get();

        return response()->json($top10, 200);
    }
}
