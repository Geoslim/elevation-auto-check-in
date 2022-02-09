@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


                <div class="col-md-5 mt-3">

                    <div class="card">

                        <div class="card-body">
                            <img src="{{ asset('photo/event/'. $event->image) }}" class="card-img-top" alt="...">
                        </div>
                    </div>

                </div>

            <div class="col-md-7 mt-3">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ $event->description }}</p>
                        <p class="card-text">Date: {{ Carbon\Carbon::parse($event->event_date)->format('D jS, M Y | h:i a') }}</p>
                        <p class="card-text">Duration: {{ $event->duration }}mins</p>
                        <a class="btn btn-primary btn-sm" href="{{ route('event.attend',  $event->slug) }}" role="button">Attend</a>
                    </div>
                </div>

            </div>


        </div>
    </div>
@endsection
