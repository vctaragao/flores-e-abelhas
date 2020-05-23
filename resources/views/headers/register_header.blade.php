@extends('app')
@section('title')
@yield('title')
@endsection

<header class="register_header_container">
  <img src="http://127.0.0.1:8001/storage/background_header.png" alt="">
  <h1> @yield('title')</h1>
</header>

@yield('main')
@yield('footer')