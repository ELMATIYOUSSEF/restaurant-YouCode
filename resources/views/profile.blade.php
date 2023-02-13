@extends('layout')

@section('title', 'Profile')

@section('content')
<div class="post-item">
  <div class="post-content">
    <h2>Edit Profile :</h2>
    <form method="POST" action="{{ route('profile.update',Auth::user()->id)}}">
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
            <label for="passwoed" class="form-label">Last Password</label>
            <input type="password" name="lastpassword" class="form-control @error('password') error-border @enderror" id="passwoed" placeholder="Last Password">
            @error('lastpassword')
              <div class="error">
                {{ $message }}
              </div>
            @enderror
          </div>
    
        <div class="mb-3">
          <label for="password" class="form-label">New Password</label>
          <input type="password" name="newpassword" class="form-control @error('password') error-border @enderror" id="password" placeholder=" New Password">
          @error('newpassword')
            <div class="error">
              {{ $message }}
            </div>
          @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection
