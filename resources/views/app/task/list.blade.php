@extends('layouts/app')

@section('content')
    <app :initial-list='@json($model['tasks'])'></app>
@endsection

<style>
    .ux{
    text-align: center;
    position: absolute;
    left: -70px;
    background-color: rgba(97,77,140,0.78);
    }

</style>
