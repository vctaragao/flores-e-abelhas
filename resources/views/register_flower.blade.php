@extends('app')
@extends('headers.register_header')
@section('title', 'Cadastre flores')

@section('main')
<main class="register_flower_container">
  <p>Cadastre as flores de acordo com o mês em que ela florece</p>

  <form action="#">
    <label for="name">Nome</label>
    <input id="name" type="text" placeholder="Qual o nome da flor">
    <label for="spicies">Espécie</label>
    <input id="spicies" type="text" placeholder="Qual a espécie ou nome científico">
    <label for="spicies">Descrição</label>
    <textarea id="spicies" type="text" placeholder="Escreva uma breve descrição sobre a flor"></textarea>
    <p>Quais os meses a flor
      irá florecer</p>
    <div class="months">
      @foreach ($months as $month)
      <div class="month">
        <input id="{{$month->name}}" type="checkbox" name="months[]" value="{{$month->id}}" hidden>
        <label class="z-depth-2" for="{{$month->name}}">{{$month->name}}</label>
      </div>
      @endforeach
    </div>
    <p>Insira as abelhas que polinizam essas flores</p>
    <div id="bees"></div>
    <select id="select-bees" multiple name="bees">
      @foreach ($bees as $bee)
      <option value="{{$bee->id}}">{{$bee->name}}</option>
      @endforeach
    </select>
  </form>
</main>
@endsection

@section('footer')
<footer class="register_footer_container">
  <img src="http://127.0.0.1:8001/storage/flor_1.jpeg" alt="">
  <img src="http://127.0.0.1:8001/storage/flor_3.jpeg" alt="">
</footer>
@endsection