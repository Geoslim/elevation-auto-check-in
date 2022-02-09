@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <div class="jumbotron">
                    <h1 class="display-4">Good day!</h1>
                    <p class="lead">Welcome to our Members auto check-in platform.</p>
                    <hr class="my-4">
                    <p>Browse through our events page to view the upcoming events</p>
                    <a class="btn btn-dark btn-md" href="{{ route('events') }}" role="button">View Events</a>
                </div>
            </div>
        </div>
    </div>
@endsection
