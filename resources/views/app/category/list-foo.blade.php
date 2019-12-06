@extends('layouts/app')

@section('content')

    @foreach($model['foos'] as $foo)
        <ul>
            <li>
                {{ $foo['title'] }}
            </li>
        </ul>
    @endforeach
@endsection
