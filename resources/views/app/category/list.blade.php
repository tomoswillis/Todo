@extends('layouts/app')

@section('content')

    @foreach($model['categories'] as $category)
        <ul>
            <li>
                {{ $category['category'] }}
            </li>
        </ul>
    @endforeach

@endsection
