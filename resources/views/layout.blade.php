<!DOCTYPE html>
<html>
<head>
  <title>
    @yield('title', 'Blog')
  </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>

<ul class="nav">
    @guest
    <li><a class="{{ request()->routeIs('register') ? 'active' : '' }}" href="{{ route('register') }}">Register</a></li>
    <li><a class="{{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a></li>
    @endguest
    <li><a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">home</a></li>
    @auth
    <li><a class="{{request()->routeIs('plats.create')?'active' : ''}}" href="{{ route('plats.create')}}">Plats</a></li>
          <li><a class="{{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">Edit Profile</a></li>
           <li><a href="{{ route('logout') }}">Logout</a></li>
           <li class="username">Logged in as <b>{{Auth::user()->name}}</b></li>
    @endauth
</ul>

@includeWhen($errors->any(),'_errors')

@if (session('success'))
  <div class="flash-success">
      {{ session('success') }}
  </div>
@endif

<div class="main">
	@yield('content')
</div>
<script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
