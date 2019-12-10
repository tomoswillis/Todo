@extends('layouts/app')

@section('content')

{{-- 
    <form>
        <select>
            @foreach($model['tasks'] as $task)
                <option value="{{$task['id']}}">{{ $task['title'] }}</option>
            @endforeach
        </select>
      </form>

    @foreach($model['tasks'] as $task)
    
        <ul>
            <li>
                Link: <a href="{{ route('task.show', $task['id']) }}">{{ $task['title'] }}</a>
            </li>
            <li>
                Description: {{ $task['description'] }}
            </li>
            <li>
                Due: {{ $task['due_date'] }}
            </li>
            <li>
                Department: {{ $task['department_id'] }}
            </li>
        </ul>
    @endforeach --}}

    {{-- <div class="e-container width-holder">
        <h1 class="tasks tasks--title text-3xl">
            Due Today
        </h1>
        <div class="flex mb-10">
                <div class="max-w-sm flex-auto items-center">
                    <div class="flex items-center">
                        <h2 class="tasks tasks--title text-2xl">{{ $task['title'] }}</h2>
                        <input type="checkbox" class="ml-2">
                    </div>
    
                    <div class="tasks tasks--department--bg  rounded-lg my-2 inline-block tasks--shadow">
                        <h3 class="tasks tasks--department px-2 text-sm">
                            <strong>Asigned By:</strong> 
                            Tomos
                        </h3>
                    </div>
    
                    <div>
                        <p class="tasks tasks--description">
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
                                    {{ $task['department'] ['title'] }}
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
                                px-2
                                mt-3
                                tasks--shadow
                                text-sm
                                inline-block
                                uppercase
                                ">
                            <strong>Status:</strong> Planning
                        </h4>
                    </div>
                </div>
            </div>
    </div> --}}
    <div class="e-container width-holder center tasks tasks--bg text-white rounded-xl pb-2">
        <div class="flex pb-10 pt-10">
            <div>
                <select name="" id="" class="e-select tasks tasks--transparent-bg">
                    <option value="#">Asending</option>
                    <option value="#">Desending</option>
                </select>
            </div>

            <div>
                <select name="" id="" class="e-select tasks tasks--transparent-bg">
                    <option value="#">Filter</option>
                    <option value="#">Desending</option>
                </select>
            </div>
        </div>

        @foreach($model['tasks'] as $task)

        <div class="flex mb-10">
            <div class="max-w-sm flex-auto items-center">
                <div class="flex items-center">
                    <h2 class="tasks tasks--title text-2xl">{{ $task['title'] }}</h2>
                    <input type="checkbox" class="ml-2">
                </div>

                <div class="tasks tasks--department--bg  rounded-lg my-2 inline-block tasks--shadow">
                    <h3 class="tasks tasks--department px-2 text-sm">
                        <strong>Asigned By:</strong> 
                        Tomos
                    </h3>
                </div>

                <div>
                    <p class="tasks tasks--description">
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
                                {{ $task['department'] ['title'] }}
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
                                <option value="#">Planning</option>
                                <option value="#">Development</option>
                                <option value="#">Completed</option>
                            </select>
                    </h4>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

<style>
    .ux{
    text-align: center;
    position: absolute;
    left: -70px;
    background-color: rgba(97,77,140,0.78);

</style>

