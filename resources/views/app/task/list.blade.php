@extends('layouts/app')

@section('content')

    @include('app.task.today')

    {{-- Input Form --}}
    @include('app.task.form')

    <div class="e-container width-holder center tasks tasks--bg tasks--shadow text-white rounded-xl pb-2 relative">
            <div class="font-semibold inline-block px-6 py-2 tasks tasks--tab-title  tasks--tab-title--form text-lg w-40">
                <h6>Your Tasks</h6>
            </div>
        <div class="flex pb-10 pt-10">
            <div>
                <select name="" id="" class=" tasks tasks--transparent-bg py-2 px-5">
                    <option value="#">Ascending</option>
                    <option value="#">Descending</option>
                </select>
            </div>

            <div class="">
                <select name="" id="" class=" tasks tasks--transparent-bg py-2 px-5 ml-2">
                    <option value="#">Filter</option>
                    <option value="#">Descending</option>
                </select>
            </div>

            <div class="">
                <select name="" id="" class=" tasks tasks--transparent-bg py-2 px-5 ml-2">
                    <option value="#">Filter</option>
                    <option value="#">Descending</option>
                </select>
            </div>
        </div>

        {{-- @dd($model, $model['tasks']) --}}
        <form method="POST" action="/task/delete">
        @csrf
        @foreach($model['tasks'] as $task)
            <div class="">
                <div class="flex">
                    <div class="max-w-sm flex-auto items-center">
                        <div class="flex items-center">
                            <h2 class="tasks tasks--title text-2xl">{{ ucfirst($task['title']) }}</h2>
                        </div>

                        <div class="tasks tasks--department--bg  rounded-lg my-2 inline-block tasks--shadow">
                            <h3 class="tasks tasks--department px-2 text-sm">
                                <strong>Asigned By:</strong> 
                                Tomos
                            </h3>
                        </div>

                        <div>
                            <p class="mb-2 tasks tasks--description">
                                {{ $task['description'] }}
                            </p>
                        </div>
                    </div>
                    <div class="">
                        <div class="h-20 relative tasks tasks--transparent-bg rounded-xl pr-2 pl-10 tasks--shadow">
                            <div>
                                <p class="tasks tasks--day text-right text-3xl">
                                    {{ Carbon\Carbon::parse($task['due_date'])->format('d') }}
                                </p>
                            </div>

                            <div class="flex flex-col-reverse justify-around relitive">
                                <div class="mb-1 py-1 rounded-lg tasks tasks--department ux w-24">
                                    <p>
                                        {{ $task['department']['title'] }}
                                    </p>
                                </div>

                                <div>
                                    <p class="tasks tasks--month text-right">
                                            {{ Carbon\Carbon::parse($task['due_date'])->format('F') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h4 
                                class="
                                    tasks
                                    tasks--department
                                    tasks--department--bg
                                    rounded-lg
                                    pl-2
                                    mt-3
                                    tasks--shadow
                                    text-sm
                                    inline-block
                                    uppercase
                                    ">
                                <strong>Status:</strong> 
                                <select name="" id="" class="e-select w-20">
                                    @foreach($model['progress_flags'] as $flag)
                                        @if($task['progress'] == $flag)
                                            <option value="{{$task['id']}}" selected>{{ ucfirst($flag) }}</option>
                                        @else
                                            <option value="{{$task['id']}}">{{ ucfirst($flag) }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="flex mb-5">
                    <a href="/tasks/edit/{{ $task['id'] }}" class="text-white"><i class="fa fa-edit w3-large"></i></a>

                    <a href="/tasks/delete/{{ $task['id'] }}" class="text-white"><i class="fa fa-trash w3-large mx-3"></i></a>
                </div>
            </div>
        @endforeach
        </form>
    </div>
@endsection

<style>
    .ux{
    text-align: center;
    position: absolute;
    left: -70px;
    background-color: rgba(97,77,140,0.78);
    }

</style>

