@extends('layouts/app')

@section('content')
    <maintenance
        :initial-list='@json($model)'
    />
@endsection
