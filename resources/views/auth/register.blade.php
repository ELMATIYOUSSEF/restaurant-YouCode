
@extends('layout')

@section('title', 'Login')

@section('content')
<div class="post-item">
  <div class="post-content">
    <h2>Register :</h2>
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="mb-3">
        <label for="name" class="col-form-label">Name:</label>
        <input type="text" class="form-control @error('name') error-border @enderror" id="name" value="{{ old('name') }}" name="name" placeholder="ELMATI">
        @error('name')
        <div class="error">
          {{ $message }}
        </div>
      @enderror
      </div>
  
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
      
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
    If you already have an account <a href="{{ route('login') }}">login</a>.
  </form>
  </div>
</div>
 
@endsection
