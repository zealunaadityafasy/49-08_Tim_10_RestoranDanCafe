@extends('layouts.app')

@section('title', 'Login')
@section('heading', 'Login')
@section('deskripsi', 'Masuk untuk mengakses sistem Restoran & Cafe.')

@section('content')
  <form method="POST" action="{{ url('/login') }}">
    @csrf

    <div>
      <label for="email">Email</label>
      <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
    </div>

    <div>
      <label for="password">Password</label>
      <input type="password" name="password" id="password" required>
    </div>

    <button type="submit">Login</button>
  </form>
@endsection