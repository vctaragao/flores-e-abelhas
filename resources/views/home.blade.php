@extends('headers.main_header')
@section('title', 'Calendário Flores')

@section('main')

<main class="main_home_container">
  <p class="page_description">Neste calendário encontram-se diversas flores.<br />Podem ser agupada pelos meses que
    florescem e o pelo tipo de
    abelhaquepoliniza a flor.</p>

  <form>

    <p>Selecione as abelhas</p>
    <div class="bees">
      <div id="bees"></div>
      <span class="material-icons">arrow_drop_down</span>
    </div>
    <select id="select-bees">
      <option value="Nenhuma" selected>Nenhuma</option>
      @foreach ($bees as $bee)
      <option value="{{$bee->id}}">{{$bee->name}}</option>
      @endforeach
    </select>


    <p>Escolha os meses</p>
    <div class="months">
      @foreach ($months as $month)
      <div class="month">
        <input id="{{$month->name}}" type="checkbox" name="months[]" value="{{$month->id}}" hidden>
        <label class="z-depth-2" for="{{$month->name}}">{{$month->name}}</label>
      </div>
      @endforeach
    </div>

  </form>

  <div class="flowers" data-flowers="{{json_encode($flowers)}}"></div>
</main>
@endsection

@section('footer')
<footer class="home_footer_container">
  <div class="pagination_container">
    <span class="material-icons prev">navigate_before</span>
    <div class="pagination"></div>
    <span class="material-icons next">keyboard_arrow_right</span>
  </div>
  @if (@session('success'))
  <div class="toast_action" data-message="{{@session('success')}}"></div>
  @endif
</footer>

@if (@session('success'))
<script>
  window.onload = function (){
    const message = document.querySelector('.toast_action').getAttribute('data-message');
    M.toast({html: "" + message })} 
</script>
@endif
@endsection