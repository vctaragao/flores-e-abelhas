@extends('app')

@section('title')
@yield('title')
@endsection

@section('page')

<header class="main_header_container">
  <div class="menu">
    <div class="mobile_menu">
      <span class="dropdown-trigger material-icons" data-target='mobile-menu'>menu</span>
      <!-- Dropdown Structure -->
      <ul id='mobile-menu' class='dropdown-content'>
        <li><a href="{{route('flower.create')}}">Cadastrar flores</a></li>
        <li class="divider" tabindex="-1"></li>
        <li><a href="{{route('bee.create')}}">Cadastrar Abelhas</a></li>

      </ul>
    </div>
  </div>
  <h1>@yield('title')</h1>
</header>

@yield('main')
@yield('footer')

@endsection