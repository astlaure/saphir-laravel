@extends('saphir::auth-layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @if(session('status'))<p>{{ session('status') }}</p>@endif
                @error('email')<div class="alert alert-danger">{{ $message }}</div>@enderror

                <form action="{{route('forgot-password.post')}}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="{{route('login')}}">Back to login</a>
                        <button type="submit" class="btn btn-primary">Send reset link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
