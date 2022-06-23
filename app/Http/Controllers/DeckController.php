<?php

namespace App\Http\Controllers;

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

        return redirect('deck.index');
    }

    public function show(Request $request): Renderable
    {
        return view('index');
    }

    public function edit(Request $request): Renderable
    {
        return view('index');
    }

    public function update(Request $request): RedirectResponse
    {
        return redirect('index');
    }

    public function destroy(Request $request): RedirectResponse
    {
        return redirect('index');
    }
}
