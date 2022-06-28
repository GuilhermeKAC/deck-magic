@extends('layouts.app')

@section('content')
    <div class="container-xl p-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Deck:' . ' ' . $deck->name) }}</div>
                    <div class="card-body">
                        <a href="{{ route('deck.card.create', $deck) }}" class="btn btn-primary">{{ __('Create') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection