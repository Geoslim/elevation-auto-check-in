@extends('layouts.sidebar')

@section('page')

    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-dark text-white">{{ __('Dashboard') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('Welcome!') }}
            </div>
        </div>
    </div>


@endsection
