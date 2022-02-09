@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @foreach($events as $event)
            <div class="col-md-4 mt-3">

                <div class="card">
                    <img src="{{ asset('photo/event/'. $event->image) }}" class="card-img-top"  alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ Str::limit($event->description, 50) }}</p>
                        <p class="card-text"><b>Date:</b> {{ Carbon\Carbon::parse($event->event_date)->format('D jS, M Y | h:i a') }}</p>
                        <p class="card-text"><b>Duration:</b> {{ $event->duration }}mins</p>
                        <a class="btn btn-primary btn-sm" href="{{ route('event.view',  $event->slug) }}" role="button">View Event</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('event.attend',  $event->slug) }}" role="button">Attend</a>
                    </div>
                </div>

            </div>
            @endforeach

        </div>
    </div>
@endsection
