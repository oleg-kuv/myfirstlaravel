@extends('layout')

@section('title')Отзывы@endsection

@section('main_content')
   @if($errors->any())
      <div class="alert alert-danger">
         <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div>
   @endif
   <div></div>
   <form method="post" action="/review/check">
      @csrf
      <input type="email" name="email" id="email" placeholder="Введите email" class="form-control" />
      <input type="text" name="subject" id="subject" placeholder="Введите отзыв" class="form-control" /> 
      <textarea name="message" id="message" placeholder="Сообщение" class="form-control"></textarea><br>
      <button type="submit" class="btn btn-succes">Отправить</button>
   </form>
@endsection
