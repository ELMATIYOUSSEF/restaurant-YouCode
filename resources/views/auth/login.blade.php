@extends('layout')

@section('title', 'Login')

@section('content')
<div class="post-item">
  <div class="post-content">
    <h2>Login :</h2>
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control @error('email') error-border @enderror" name="email" value="{{ old('email') }}" id="email" placeholder="email@example.com">
        @error('email')
        <div class="error">
          {{ $message }}
        </div>
      @enderror
      </div>
  
      <div class="mb-3">
        <label for="passwoed" class="form-label">Password</label>
        <input type="password" name="password" class="form-control @error('password') error-border @enderror" id="password" placeholder="Password">
        @error('password')
          <div class="error">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="dropdownCheck2">
          <label class="form-check-label" for="dropdownCheck2">
            Remember me
          </label>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
</div>
@endsection
