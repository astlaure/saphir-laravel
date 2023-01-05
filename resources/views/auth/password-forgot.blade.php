@extends('saphir::layout')

@section('content')
    <div class="container">
        <div class="card mw-3 mx-auto mt-9">
            <div class="card-body">
                <h3 class="uppercase text-center">Forgot password</h3>

                @if(session('status'))<div class="alert success">{{ session('status') }}</div>@endif
                @error('email')<div class="alert danger">{{ $message }}</div>@enderror

                <form action="{{route('forgot-password.post')}}" method="post">
                    @csrf
                    <div class="mb-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
                    </div>
                    <div class="d-flex justify-end">
                        <a href="{{route('login')}}" class="button link">Back to login</a>
                        <button type="submit" class="button primary">Send reset link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
