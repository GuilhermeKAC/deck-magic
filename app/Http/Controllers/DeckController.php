<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeckRequest;
use App\Models\Deck;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeckController extends Controller
{
    public function index(Request $request): Renderable
    {
        $user = Auth::user();

        $decks = $user->decks()->get();

        return view('deck.index', compact('decks'));
    }

    public function create(Request $request): Renderable
    {
        return view('deck.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $user->decks()->create($request->all());

        return redirect()->route('deck.index');
    }

    public function show(Deck $deck): Renderable
    {
        $cards = $deck->cards()->paginate();

        return view('deck.show', compact('cards', 'deck'));
    }

    public function edit(Deck $deck): Renderable
    {
        return view('deck.edit', compact('deck'));
    }

    public function update(DeckRequest $request, Deck $deck): RedirectResponse
    {
        $deck->update($request->all());
        
        return redirect()->route('deck.index')->with('toast', [['type' => 'success', 'message' => __('Deck updated')]]);
    }

    public function destroy(Deck $deck): RedirectResponse
    {
        $deck->delete();

        return redirect()->route('deck.index')->with('toast', [['type' => 'success', 'message' => __('Deck delete')]]);
    }
}
