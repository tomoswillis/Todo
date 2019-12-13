@extends('layouts/app')

@section('content')

    <form action="/task/edit/{{ $task['id'] }}" method="POST">
       @method('PUT')
        @csrf 
        <input
        type="text"
        name="title"
        class=
        "
            e-input
            tasks
            tasks--transparent-bg
            rounded
            tasks--shadow
            border-none
            mt-5
        "
    value="{{ $task['title'] }}"
            >
      {{-- <a href="/tasks/edit/{{ $task['id'] }}">   --}}
        <input type="submit" class="e-button" value="submit">
    {{-- </a> --}}
    </form>
@endsection
