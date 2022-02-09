@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-3">
                <div class="card">

                    <div class="nav flex-column nav-pills">
                        <a class="nav-link active" href="">Home</a>

                        @can('admin-only', auth()->user())

                            <a class="nav-link" href="{{ route('admin.events') }}">Events</a>
                            <a class="nav-link" href="{{ route('users') }}">Users</a>
                            <a class="nav-link" href="{{ route('events.registered') }}">Events Registration</a>
                        @endcan

                        @can('user-only', auth()->user())
                            <a class="nav-link" href="{{ route('events.attending') }}">My Events</a>
                        @endcan

                    </div>
                </div>
            </div>

            @yield('page')

        </div>
    </div>

@endsection()
