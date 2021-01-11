@extends('layout')

@section('title')Список задач@endsection
@section('main_content')

@if (count ($tasks) > 0)
<table class="table">
   <thead>
      <tr>
         <th class="d-none d-md-table-cell">id</th>
         <th class="taskTitle">Название</th>
         <th class="d-none d-md-table-cell">Создано</th>
         <th class="d-none d-md-table-cell">Завершить до</th>
      </tr>
   </thead>
   <tbody>
      @foreach ( $tasks as $task )
         @include ( 'Task.subtasks', ['tasks' => $task, 'depth'=>0] )
      @endforeach
   </tbody>
</table>
@endif
@endsection
