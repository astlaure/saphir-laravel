@extends('saphir::layout')

@section('content')
    <div class="container">
        <div class="card mw-32e mx-auto mt-5 border-0 shadow">
            <div class="card-body p-4">
                <h3 class="fw-normal text-uppercase text-center">Login</h3>

                @if(session('status'))<div class="alert success">{{ session('status') }}</div>@endif
                @error('email')<div class="alert danger">{{ $message }}</div>@enderror

                <form action="{{route('login.post')}}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label d-flex justify-content-between">
                            Password
                            <a href="{{route('forgot-password')}}" class="">Forgot your password?</a>
                        </label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-check mb-4">
                        <input type="checkbox" class="form-check-input" name="remember_me" id="remember_me">
                        <label for="remember_me" class="form-check-label">Remember me</label>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary w-50">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
