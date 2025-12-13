@extends('layouts.main')

@section('title', 'Login')
@section('body_class', 'page-login')

@section('content')
<div class="login-page">
  <div class="login-card">

    <div class="login-left">
      <h2>WEB PRODI</h2>
      <p>
        Sistem Informasi Program Studi<br>
        Akses akademik terintegrasi dan aman
      </p>
    </div>

    <div class="login-right">
      <h3>Masuk</h3>

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" value="{{ old('email') }}"
                 class="form-control login-input" placeholder="email@kampus.ac.id" required>
          @error('email')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password"
                 class="form-control login-input" placeholder="••••••••" required>
          @error('password')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <button class="btn btn-primary w-100 login-btn">Login</button>
      </form>
    </div>

  </div>
</div>
@endsection
