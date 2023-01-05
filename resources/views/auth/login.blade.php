@extends('saphir::layout')

@section('content')
    <div class="container">
        <div class="card mw-3 mx-auto mt-9">
            <div class="card-body">
                <h3 class="uppercase text-center">Login</h3>

                @if(session('status'))<div class="alert success">{{ session('status') }}</div>@endif
                @error('email')<div class="alert danger">{{ $message }}</div>@enderror

                <form action="{{route('login.post')}}" method="post">
                    @csrf
                    <div class="mb-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
                    </div>
                    <div class="mb-6">
                        <label for="password" class="form-label d-flex justify-space-between">
                            Password
                            <a href="{{route('forgot-password')}}" class="">Forgot your password?</a>
                        </label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-checkbox mb-6">
                        <input type="checkbox" class="form-checkbox-input" name="remember_me" id="remember_me">
                        <label for="remember_me" class="form-checkbox-label">Remember me</label>
                    </div>
                    <div class="d-flex justify-center">
                        <button type="submit" class="button primary min-width-50">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
