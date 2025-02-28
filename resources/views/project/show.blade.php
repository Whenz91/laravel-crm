<x-app-layout>
    <x-pages.header :title="$project->title" :backUrl="route('project')" />

    <div class="grid grid-cols-3 gap-4 mt-12">
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-neutral-900 dark:border-neutral-700">
                <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
                Client Infos
                </p>
            </div>
            <div class="p-4 md:p-5">
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    <strong>Address</strong>
                </p>
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    {{ $project->client->address }}
                </p>
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    <strong>Contact</strong>
                </p>
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    {{ $project->client->contact_name }} <br>
                    <small>{{ $project->client->contact_email }}</small> <br>
                    <small>{{ $project->client->contact_phone_number }}</small>
                </p>
               
            </div>
        </div>

        <div class="col-span-2 flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-neutral-900 dark:border-neutral-700">
                <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
                Project Infos
                </p>
            </div>
            <div class="p-4 md:p-5">
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    <strong>{{ $project->title }}</strong>
                </p>
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    @if($project->status == 'open')
                    <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-teal-500 text-white">Open</span>
                    @else
                    <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-gray-500 text-white">Close</span>
                    @endif
                    {{ $project->deadline }}
                </p>
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    {{ $project->description }}
                </p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-4 gap-5 mt-10">
        @foreach($project->tasks as $task)
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="@if($task->deadline > now()) bg-teal-100 @else bg-red-100 @endif border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-neutral-900 dark:border-neutral-700">
                <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
                    {{ $task->deadline }}
                </p>
            </div>
            <div class="grow p-4 md:p-5">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                    {{ $task->title }}
                </h3>
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    {{ $task->description }}
                </p>
            </div>
            <div class="bg-gray-100 border-t rounded-b-xl py-3 px-4 md:py-4 md:px-5 dark:bg-neutral-900 dark:border-neutral-700">
                <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
                    Last updated 5 mins ago
                </p>
            </div>
        </div>
        @endforeach
    </div>

</x-app-layout>