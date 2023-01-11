@extends('saphir::layout')

@section('content')
    <div class="container">
        <div class="card mw-32e mx-auto mt-5 border-0 shadow">
            <div class="card-body p-4">
                <h3 class="fw-normal text-uppercase text-center">Reset password</h3>

                @error('email')<div class="alert danger">{{ $message }}</div>@enderror

                <form action="{{route('reset-password.post')}}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Password Confirmation</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{route('login')}}" class="btn btn-link">Back to login</a>
                        <button type="submit" class="btn btn-primary">Reset password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
