@extends('saphir::layout')

@section('content')
    <div class="container">
        <div class="card mw-32e mx-auto mt-5 border-0 shadow">
            <div class="card-body p-4">
                <h3 class="fw-normal text-uppercase text-center">Registration</h3>

                @if(session('status'))<div class="alert success">{{ session('status') }}</div>@endif
                @error('email')<div class="alert danger">{{ $message }}</div>@enderror

                <form action="{{route('registration.post')}}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                    </div>
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
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
