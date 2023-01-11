@extends('saphir::layout')

@section('content')
    <div class="container">
        <div class="card mw-32e mx-auto mt-5 border-0 shadow">
            <div class="card-body p-4">
                <h3 class="fw-normal text-uppercase text-center">Forgot password</h3>

                @if(session('status'))<div class="alert success">{{ session('status') }}</div>@endif
                @error('email')<div class="alert danger">{{ $message }}</div>@enderror

                <form action="{{route('forgot-password.post')}}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{route('login')}}" class="btn btn-link">Back to login</a>
                        <button type="submit" class="btn btn-primary">Send reset link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
