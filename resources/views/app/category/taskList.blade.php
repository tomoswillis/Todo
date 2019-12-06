@extends('layouts/app')

@section('content')

    @foreach($test['test'] as $task
        <ul>
            <li>
                {{ $task['task'] }}
            </li>
        </ul>
    @endforeach
@endsection
