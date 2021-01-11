<tr class="@if ( $depth > 0 ) depth depth--{{ $depth }}
@else top-task
@endif">
<td class="task-id d-none d-md-table-cell">{{ $tasks->id }}</td>
<td class="taskTitle d-block d-md-table-cell">
   <a class="my-link" href="/task/{{ $tasks->title }}">{{ $tasks->title }}</a>
</td>
<td class="d-none d-md-table-cell">{{ $tasks->created_at }}</td>
<td class="d-none d-md-table-cell">{{ $tasks->finish_before }}</td>
</tr>

@if (count ($tasks->childItems) > 0)
   @foreach ( $tasks->childItems as $task )
      @include ( 'Task.subtasks', ['tasks' => $task, 'depth'=>++$depth] )
   @endforeach
@endif
