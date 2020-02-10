@extends('layouts/app')

@section('content')

    @foreach($model['departments'] as $department)
        <ul>
            <li>
                {{$department['title']}}
            </li>
        </ul>
    @endforeach

@endsection
