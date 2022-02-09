@extends('layouts.sidebar')

@section('page')

    <div class="col-md-9">
        <div class="card">
            <div class="card-header bg-dark text-white">{{ __('Registered Users & Events') }}</div>

            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Event</th>
                        <th scope="col">Event Date</th>
                        <th scope="col">Registered</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $event->user->full_name }}</td>
                            <td>{{ $event->event->title }}</td>
                            <td>
                                {{ Carbon\Carbon::parse($event->event->event_date)->format('jS, M Y') }}
                                ({{ Carbon\Carbon::parse($event->event->event_date)->diffForHumans() }})
                            </td>
                            <td>{{ Carbon\Carbon::parse($event->event->created_at)->format('jS, M Y') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
