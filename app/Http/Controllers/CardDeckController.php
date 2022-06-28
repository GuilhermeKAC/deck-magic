<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardDeckRequest;
use App\Models\Card;
use App\Models\Deck;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use GuzzleHttp\Client;

class CardDeckController extends Controller
{
    public function create(Deck $deck): Renderable
    {
        return view('card.create', compact('deck'));
    }

    public function store(CardDeckRequest $request, Deck $deck): RedirectResponse
    {
        $client = new Client([
            'base_uri' => 'https://api.magicthegathering.io/v1/cards'
        ]);

        $response = $client->request('GET', '?name=Counter');
        dd($response);
        return redirect()->route('deck.index');
    }

    public function destroy(Deck $deck, Card $card): RedirectResponse
    {
        $deck->deatch();

        return redirect()->route('deck.index')->with('toast', [['type' => 'success', 'message' => __('Deck delete')]]);
    }
}
