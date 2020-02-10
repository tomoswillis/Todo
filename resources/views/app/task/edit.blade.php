@extends('layouts/app')

@section('content')
{{-- {{dd($task['department'])}} --}}

<div 
    class="
        e-containter
        width-holder
        rounded-xl
        text-black
        mb-10
        mt-5
        py-5
        tasks
        relative
    ">
    <form action="/task/edit/{{ $task['id'] }}" method="POST">
       @method('PUT')
        @csrf 

    <input
        type="text"
        name="title"
        class=
        "
            e-input
            tasks
            tasks--transparent-bg
            rounded
            tasks--shadow
            border-none
            mt-5
        "
       value="{{ $task['title'] }}"
    >
    {{--Task Due Date--}}
    <div class="flex justify-between my-5">
        <div class="flex-1">
            <div class="mr-2">
                <h4>Due Date</h4>
                <input 
                    type="date"
                    name="due"
                    value="{{ $task['due_date'] }}"
                    class="
                        e-input
                        rounded
                        tasks
                        tasks--transparent-bg
                        tasks--shadow
                        border-none
                        h-10
                        w-full
                        p-2
                    ">
            </div>
        </div>
        {{--Task Status--}}
        <div class="flex-1">
            <div class="ml-2">
                <h4>Status</h4>
                <select
                    name="progress"
                    id=""
                    class="
                        tasks
                        tasks--transparent-bg
                        tasks--shadow
                        h-10
                        w-full
                    ">
                    <option value="{{$task['progress']}}">{{ucfirst($task['progress'])}} (Selected)</option>
                    <option value="planning">Planning</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
        </div>
    </div>
    {{--Task Department--}}
    <div class="flex justify-between my-5">
        <div class="flex-1">
            <div class="mr-2">
                <h4>Department</h4>
                <select
                    name="department"
                    id=""
                    class="
                        tasks
                        tasks--transparent-bg
                        tasks--shadow
                        h-10
                        w-full
                    ">
                    <option value=" {{$task['department']['id']}} ">{{ ucfirst($task['department']['title']) }} (Selected)</option>
                    <option value="1">UX</option>
                    <option value="2">Backend</option>
                </select>
            </div>
        </div>
        {{--Task Assigned To--}}
        <div class="flex-1">
            <div class="ml-2">
                <h4>Assign To</h4>
                <select 
                    name="assign"
                    id=""
                    class="
                        tasks
                        tasks--transparent-bg
                        tasks--shadow
                        h-10
                        w-full
                    ">
                    <option value="#">Tomos</option>
                    <option value="#">Who?</option>
                </select>
            </div>
        </div>
    </div>
    {{--Task Description Input--}}
    <div class="mt-8 flex flex-col items-center">
        <textarea 
            rows="2" 
            cols="50"
            class="
                e-input
                tasks
                tasks--transparent-bg
                rounded
                tasks--shadow
                border-none
            "
            name="description"
        >{{$task['description']}}
        </textarea>
        <input type="submit" class="e-button tasks uppercase mt-5 tasks--form--add-task rounded-lg" value="Update Task">
    </div>
    </form>

</div>
@endsection

