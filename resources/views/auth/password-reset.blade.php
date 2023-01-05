@extends('saphir::layout')

@section('content')
    <div class="container">
        <div class="card mw-3 mx-auto mt-9">
            <div class="card-body">
                <h3 class="uppercase text-center">Reset password</h3>

                @error('email')<div class="alert danger">{{ $message }}</div>@enderror

                <form action="{{route('reset-password.post')}}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="mb-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
                    </div>
                    <div class="mb-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="mb-6">
                        <label for="password_confirmation" class="form-label">Password Confirmation</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                    </div>
                    <div class="d-flex justify-end">
                        <a href="{{route('login')}}" class="button link">Back to login</a>
                        <button type="submit" class="button primary">Reset password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
