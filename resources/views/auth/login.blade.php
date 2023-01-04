@extends('saphir::layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @if(session('status'))<p>{{ session('status') }}</p>@endif
                @error('email')<div class="alert alert-danger">{{ $message }}</div>@enderror

                <form action="{{route('login.post')}}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-check mb-4">
                        <input type="checkbox" class="form-check-input" name="remember_me" id="remember_me">
                        <label for="remember_me" class="form-check-label">Remember Me</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="{{route('forgot-password')}}">Forgot your password?</a>
                        <button type="submit" class="btn btn-primary">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
