@extends('layouts.sidebar')

@section('page')

    <div class="col-md-9">
        <div class="card">
            <div class="card-header bg-dark text-white">{{ __('My Events') }}</div>

            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Event Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <th scope="row">1</th>
                            <td style="width: 10%;"><img src="{{ asset('photo/event/' . $event->event->image) }}" alt="" width="100%"></td>
                            <td>{{ $event->event->title }}</td>
                            <td>{{ Str::limit($event->event->description, 20) }}</td>
                            <td>
                                {{ Carbon\Carbon::parse($event->event->event_date)->format('jS, M Y') }}
                                ({{ Carbon\Carbon::parse($event->event->event_date)->diffForHumans() }})
                            </td>
                            <td><a class="btn btn-warning btn-sm" href="{{ route('event.decline',  $event->event->slug) }}" role="button">Decline</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
