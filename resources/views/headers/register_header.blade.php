@extends('app')
@section('title')
@yield('title')
@endsection

@section('page')

<header class="register_header_container">
  <img src="{{ asset('/storage/background_header.png')}}" alt="">
  <h1> @yield('title')</h1>
</header>

@yield('main')
@yield('footer')

@endsection