@extends('layouts/app')

@section('content')

    @foreach($model['categories'] as $category)
        <ul>
            <li>
                {{ $category['category'] }}
                <ul> 
                    @foreach ($category->tasks as $task)
                        <li>
                            {{ $task['title'] }}
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    @endforeach

@endsection
