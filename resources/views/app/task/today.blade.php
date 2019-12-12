 <div class="e-container width-holder mb-5 mt-12 rounded-xl grey-grad-bg pt-10 pb-16">
        <h1 class="tasks tasks--title text-3xl uppercase mb-3 text-medium">
            Due Today
        </h1>
        <div class="flex mb-10">
            @foreach($foo as $task)
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
                            <div class="mb-1 py-1 rounded-lg tasks tasks--department ux w-24 text-white">
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
                 @endforeach
            </div>
                {{-- <div class="pb-16" style="margin: 0 auto;">
                    <span class="bg-black w-2 h-2 rounded-full">0</span>
                    <span class="bg-black w-2 h-2 rounded-full">0</span>
                    <span class="bg-black w-2 h-2 rounded-full">0</span>
                </div> --}}
    </div>