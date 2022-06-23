@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">{{ __('Index') }}</div>
                    <div class="table-responsive">
                        <div class="table">
                            <thead class="text-primary">
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Type') }}</th>
                                    <th>{{ __('Format') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($decks as $deck)
                                    <tr>
                                        <td>{{ $deck->name }}</td>
                                        <td>{{ $deck->type }}</td>
                                        <td>{{ $deck->format }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </div>
                    </div>
                    <a href="{{ route('deck.create') }}" class="btn btn-primary">{{ __('Create') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection