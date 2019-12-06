@extends('layouts/app')

@section('content')

    @foreach($model['tasks'] as $task)
        <ul>
            <li>
                {{ $task['title'] }}
            </li>
        </ul>
    @endforeach
@endsection
