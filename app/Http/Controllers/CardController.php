<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeckRequest;
use App\Models\Deck;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    public function index(Request $request): Renderable
    {
        $user = Auth::user();

        $decks = $user->decks()->get();

        return view('deck.index', compact('decks'));
    }

    public function show(Request $request): Renderable
    {
        return view('deck.show');
    }
}
