    <div 
        class="
            e-containter
            width-holder
            input-tab
            input-tab--bg
            rounded-xl
            text-white
            my-10
            py-5
            tasks
            relative
        ">
        <form class="e-container" method="POST" action="/task/store">
            @csrf
            <div class="font-semibold inline-block px-6 py-2 rounded-lg tasks tasks--tab-title text-lg w-40 input-tab--color">
                <h6>Add Task</h6>
            </div>
            {{--Task Title Input--}}
            <input
                type="text"
                name="task"
                class=
                "
                    e-input
                    tasks
                    tasks--transparent-bg
                    rounded
                    tasks--shadow
                    border-none
                    text-white
                    mt-5
                "
                placeholder="Next Todo"
            >
            @error('task')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{--Task Due Date--}}
            <div class="flex justify-between my-5">
                <div class="flex-1">
                    <div class="mr-2">
                        <h4>Due Date</h4>
                        <input 
                            type="date"
                            name="due"
                            class="
                                e-input
                                rounded
                                tasks
                                tasks--transparent-bg
                                border-none
                                h-10
                                w-full
                                text-white
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
                            name="task-department"
                            id=""
                            class="
                                tasks
                                tasks--transparent-bg
                                tasks--shadow
                                h-10
                                w-full
                            ">
                            <option value="1">UX</option>
                            <option value="2">Development</option>
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
            <div class="mt-8">
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
                        text-white
                    "
                    placeholder="Description"
                    name="description"
                >
                </textarea>

                <input type="submit" value="Submit" class="e-button">
            </div>
        </form>
    </div>