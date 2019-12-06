@extends('layouts/app')

@section('content')

    @foreach($model['categories'] as $category)
        <ul>
            <li>
                {{ $category['title'] }}
            </li>
        </ul>
    @endforeach
@endsection
