@extends('layouts.sidebar')

@section('page')

    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-dark text-white">{{ __('Users') }}</div>

            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->email }}</td>
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
            <div class="card-header bg-dark text-white">{{ __('Add User') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('user.store') }}">
                    @csrf
                    <div class="row mb-3">

                        <div class="col-md-12">
                            <label for="first_name" class="col-md-12 col-form-label">{{ __('First Name') }}</label>
                            <input id="first_name" type="text" class="form-control @error('first_name')
                                is-invalid @enderror" name="first_name" value="{{ old('first_name') }}"
                                   required autocomplete="first_name" autofocus>

                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mt-1">
                            <label for="last_name" class="col-md-12 col-form-label">{{ __('Last Name') }}</label>
                            <input id="description" type="text" class="form-control @error('last_name')
                                is-invalid @enderror" name="last_name" value="{{ old('last_name') }}"
                                   required autocomplete="last_name" autofocus>

                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mt-1">
                            <label for="email" class="col-md-12 col-form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email')
                                is-invalid @enderror" name="email" value="{{ old('email') }}"
                                   required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mt-1">
                            <label for="password" class="col-md-12 col-form-label">{{ __('Password (optional)') }}</label>
                            <input id="password" type="password" class="form-control @error('password')
                                is-invalid @enderror" name="password" value="{{ old('password') }}"
                                   autocomplete="password" autofocus>

                            @error('password')
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
