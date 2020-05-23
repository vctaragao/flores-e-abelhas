@extends('app')

@section('title')
@yield('title')
@endsection

@section('page')

<header class="main_header_container">
  <div class="menu">
    <div class="mobile_menu">
      <span class="material-icons">menu</span>
    </div>
  </div>
  <h1>@yield('title')</h1>
</header>

@yield('main')
@yield('footer')

@endsection