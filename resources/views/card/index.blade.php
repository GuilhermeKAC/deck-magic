@extends('layouts.app')

@section('content')
    <div class="container-xl p-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Index') }}</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Type') }}</th>
                                        <th>{{ __('Format') }}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($decks as $deck)
                                        <tr>
                                            <td>{{ $deck->name }}</td>
                                            <td>{{ $deck->type }}</td>
                                            <td>{{ $deck->format }}</td>
                                            <td class="text-end">
                                                <div class="btn-group">
                                                    <a href="{{ route('deck.show', $deck) }}" class="btn btn-light">
                                                        <i class="material-icons">visibility</i>
                                                    </a>
                                                    <a href="{{ route('deck.edit', $deck->id) }}" class="btn btn-primary">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <a href="{{ route('deck.destroy', $deck->id) }}" class="btn btn-danger"
                                                        onclick="event.preventDefault();modalConfirmation('{{ __('Delete Deck') }}', '{{ __('Are you sure?') }}', 'deck-delete-{{ $deck->id }}')">
                                                        <i class="material-icons">delete</i>
                                                    </a>
                                                </div>
                                                <form method="POST" action="{{ route('deck.destroy', $deck) }}"
                                                    id="deck-delete-{{ $deck->id }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('deck.create') }}" class="btn btn-primary">{{ __('Create') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('components.modal-confirmation')