<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardDeckRequest;
use App\Models\Card;
use App\Models\Deck;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardDeckController extends Controller
{
    public function create(Deck $deck): Renderable
    {
        return view('card.create', compact('deck'));
    }

    public function store(CardDeckRequest $request, Deck $deck): RedirectResponse
    {
        dd($deck);
        return redirect()->route('deck.index');
    }

    public function destroy(Deck $deck, Card $card): RedirectResponse
    {
        $deck->deatch();

        return redirect()->route('deck.index')->with('toast', [['type' => 'success', 'message' => __('Deck delete')]]);
    }
}
