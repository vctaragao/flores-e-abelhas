@extends('headers.main_header')
@section('title', 'Flores')

@section('main')
<main class="main_home_container">
  <p>Neste calendário encontram-se diversas flores. Podem ser agupada pelos meses que florescem e o pelo tipo de
    abelhaquepoliniza a flor.</p>

  <form>

    <p>Selecione as abelhas</p>
    <div class="bees">
      <div id="bees"></div>
      <span class="material-icons">arrow_drop_down</span>
    </div>
    <select id="select-bees" multiple name="bees[]">
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
</main>
@endsection

@section('footer')
<footer></footer>
@endsection