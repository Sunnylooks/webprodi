@extends('layouts.main')

@section('title', 'Login')

@section('content')
<section class="tm-container-outer py-5" style="background: white;">
    <div class="container" style="max-width: 560px;">
        <h3 class="mb-4">Masuk</h3>
        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <div class="form-group mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
@endsection

