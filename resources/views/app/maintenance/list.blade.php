@extends('layouts/app')

@section('content')
    <task
        :initial-list='@json($model['tasks'])'
    />
@endsection
