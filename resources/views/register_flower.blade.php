@extends('headers.register_header')
@section('title', 'Cadastre flores')

@section('main')
<main class="register_flower_container">
  <p>Cadastre as flores de acordo com o mês em que ela florece</p>

  <form action="{{route('flower.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="input_container">
      <div class="input_container_text_fields">
        <div class="input-field">
          <input id="name" type="text" class="@error('name')error @enderror" name="name"
            placeholder="Qual o nome da flor" value="{{old('name')}}">
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
      </div>
      <div class="input_container_upload_field">
        <label for="file">
          <div class="file_upload"><span class="material-icons">backup</span></div>
          ESCOLHA UMA IMAGEM
          @error('file')
          <small>{{$errors->first('file')}}</small>
          @enderror
        </label>
        <input id="file" name="file" type="file">
      </div>
    </div>
    <div class="input-field">
      <textarea id="description" class="@error('description')error @enderror" type="text" name="description"
        placeholder="Escreva uma breve descrição sobre a flor" value="{{old('description')}}"></textarea>
      <label for="description">Descrição</label>
      @error('description')
      <small>{{$errors->first('description')}}</small>
      @enderror
    </div>
    <p>Quais os meses a flor irá florecer</p>
    <div class="months">
      @foreach ($months as $month)
      <div class="month">
        @if (old('months') and in_array($month->id, old('months')))
        <input id="{{$month->name}}" type="checkbox" name="months[]" value="{{$month->id}}" hidden checked>
        @else
        <input id="{{$month->name}}" type="checkbox" name="months[]" value="{{$month->id}}" hidden>
        @endif
        <label class="z-depth-2" for="{{$month->name}}">{{$month->name}}</label>
      </div>
      @endforeach
    </div>
    @error('months')
    <small>{{$errors->first('months')}}</small>
    @enderror
    <p>Insira as abelhas que polinizam essas flores</p>
    <div class="bees">
      <div id="bees"></div>
      <button class="button"><i class="material-icons">add</i></button>
    </div>
    <select id="select-bees" multiple name="bees[]">
      @foreach ($bees as $bee)
      @if (old('bees') and in_array($bee->id, old('bees')))
      <option value="{{$bee->id}}" selected>{{$bee->name}}</option>
      @else
      <option value="{{$bee->id}}">{{$bee->name}}</option>
      @endif
      @endforeach
    </select>

    @error('bees')
    <small>{{$errors->first('bees')}}</small>
    @enderror

    <div class="action_buttons">
      <a class="cancel_button">Cancelar</a>
      <button class="button" type="submit">Cadastrar flor</button>
    </div>
  </form>
</main>
@endsection

@section('footer')
<footer class="register_footer_container">
  <img src="http://127.0.0.1:8001/storage/flor_1.jpeg" alt="">
  <img src="http://127.0.0.1:8001/storage/flor_3.jpeg" alt="">
</footer>
@endsection