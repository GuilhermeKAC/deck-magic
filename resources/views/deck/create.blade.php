@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">{{ __('Create') }}</div>
                    <form method="POST" action="{{ route('deck.store') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 bmd-form-group">
                                    <label for="name" class="bmd-label-floating">{{ __('Deck Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 bmd-form-group">
                                    <label for="type" class="bmd-label-floating">{{ __('Deck Type') }}</label>
                                    <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type">
                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 bmd-form-group">
                                    <label for="format" class="bmd-label-floating">{{ __('Deck Format') }}</label>
                                    <input id="format" type="text" class="form-control @error('format') is-invalid @enderror" name="format">
                                    @error('format')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection