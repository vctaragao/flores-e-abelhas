@extends('headers.register_header')
@section('title', 'Cadastre abelhas')

@section('main')
<main class="register_bee_container">
  <p>Cadastre as abelhas</p>

  <form action="{{route('bee.store')}}" method="POST">
    @csrf
    <div class="input-field">
      <input id="name" type="text" class="@error('name')error @enderror" name="name" placeholder="Qual o nome da abelha"
        value="{{old('name')}}">
      <label for="name">Nome</label>
      @error('name')
      <small>{{$errors->first('name')}}</small>
      @enderror
    </div>
    <div class="input-field">
      <input id="species" type="text" class="@error('species')error @enderror" name="species"
        placeholder="Qual a espécie ou nome científico" value="{{old('species')}}">
      <label for="species">Espécie</label>
      @error('species')
      <small>{{$errors->first('species')}}</small>
      @enderror
    </div>
    <div class="action_buttons">
      <a href="{{route('home')}}" class="cancel_button">Cancelar</a>
      <button class="button" type="submit">Cadastrar abelha</button>
    </div>
  </form>
</main>
@endsection

@section('footer')
<footer class="register_footer_container register_bee_footer_container">
  <img src="http://127.0.0.1:8001/storage/flor_1.jpeg" alt="">
  <img src="http://127.0.0.1:8001/storage/flor_3.jpeg" alt="">
</footer>
@endsection