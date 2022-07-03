@extends('layouts.app')

@section('content')
    <div class="container-xl p-5">
        <div class="card card-raised">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="card-title">{{ __('Deck Name') }}</div>
                        <div class="card-subtitle mb-4">{{ $deck->name }}</div>
                    </div>
                    <div class="col-md-2">
                        <div class="card-title">{{ __('Deck Type') }}</div>
                        <div class="card-subtitle mb-4">{{ $deck->type }}</div>
                    </div>
                    <div class="col-md-2">
                        <div class="card-title">{{ __('Deck Format') }}</div>
                        <div class="card-subtitle mb-4">{{ $deck->format }}</div>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('deck.card.create', $deck) }}" class="btn btn-primary">{{ __('Create') }}</a>
                    </div>
                </div>
            </div>
        </div> 
    </div>
@endsection
