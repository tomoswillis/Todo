@extends('layouts/app')

@section('content')

    <form>
        <select>
            @foreach($model['tasks'] as $task)
                <option value="{{$task['id']}}">{{ $task['title'] }}</option>
            @endforeach
        </select>
      </form>

    @foreach($model['tasks'] as $task)
    
        <ul>
            <li>
                Link: <a href="{{ route('task.show', $task['id']) }}">{{ $task['title'] }}</a>
            </li>
            <li>
                Description: {{ $task['description'] }}
            </li>
            <li>
                Due: {{ $task['due_date'] }}
            </li>
            <li>
                Department: {{ $task['department_id'] }}
            </li>
        </ul>
    @endforeach

@endsection
