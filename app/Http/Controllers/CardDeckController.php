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
            'base_uri' => 'https://api.magicthegathering.io'
        ]);

        $response = $client->request('GET', '/v1/cards?name=' . $request->input('name'));
       
        $array = json_decode($response->getBody()->getContents());

        $collection = collect($array->cards);

        if ($response->getStatusCode() !== 200 || !$collection->count()) {
            // TODO: Criar regra caso não encontre carta
            dd('morri');
        }

        $card = Card::firstOrCreate([
            'name' => $collection->first()->name,
            'image' => $collection->first()->imageUrl,
            'description' => $collection->first()->text,
        ]);
        
        $deck->cards()->attach($card);

        return redirect()->route('deck.show', $deck);
    }

    public function destroy(Deck $deck, Card $card): RedirectResponse
    {
        $deck->deatch();

        return redirect()->route('deck.index')->with('toast', [['type' => 'success', 'message' => __('Deck delete')]]);
    }
}
