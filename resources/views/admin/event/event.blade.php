@extends('layouts.sidebar')

@section('page')

    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-dark text-white">{{ __('Events') }}</div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->description }}</td>
                                <td>@mdo</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header bg-dark text-white">{{ __('Add Events') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('event.store') }}" enctype="multipart/form-data">
                @csrf
                    <div class="row mb-3">

                        <div class="col-md-12">
                            <label for="title" class="col-md-12 col-form-label">{{ __('Event Title') }}</label>
                            <input id="title" type="text" class="form-control @error('title')
                                is-invalid @enderror" name="title" value="{{ old('title') }}"
                                   required autocomplete="title" autofocus>

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mt-1">
                            <label for="description" class="col-md-12 col-form-label">{{ __('Event Description') }}</label>
                            <input id="description" type="text" class="form-control @error('description')
                                is-invalid @enderror" name="description" value="{{ old('description') }}"
                                   required autocomplete="description" autofocus>

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mt-1">
                            <label for="event_date" class="col-md-12 col-form-label">{{ __('Event Date and Time') }}</label>
                            <input id="event_date" type="datetime-local" class="form-control @error('event_date')
                                is-invalid @enderror" name="event_date" value="{{ old('event_date') }}"
                                   required autocomplete="event_date" autofocus>

                            @error('event_date')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mt-1">
                            <label for="event_duration" class="col-md-12 col-form-label">{{ __('Event Duration In Minutes') }}</label>
                            <input id="event_duration" type="number" class="form-control @error('event_duration')
                                is-invalid @enderror" name="event_duration" value="{{ old('event_duration') }}"
                                   required autocomplete="event_duration" autofocus>

                            @error('event_duration')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mt-1">
                            <label for="event_image" class="col-md-12 col-form-label">{{ __('Event Image') }}</label>
                            <input id="event_image" type="file" class="form-control @error('event_image')
                                is-invalid @enderror" name="event_image" value="{{ old('event_image') }}"
                                   required autocomplete="event_image" autofocus>

                            @error('event_image')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
