<x-app-layout>
    <x-pages.header :title="$task->title" :backUrl="route('task')" />

    <div class="grid grid-cols-3 gap-4 mt-12">
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-neutral-900 dark:border-neutral-700">
                <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
                Client & Project Infos
                </p>
            </div>
            <div class="p-4 md:p-5">
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    <strong>Client</strong>
                </p>
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    {{ $task->client->company_name }} <br>
                    {{ $task->client->contact_name }} <br>
                    <small>{{ $task->client->contact_email }}</small> <br>
                    <small>{{ $task->client->contact_phone_number }}</small>
                </p>
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    <strong>Project</strong>
                </p>
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    {{ $task->project->title }} <br>
                    {{ $task->project->deadline }} <br>
                    <a href="{{ route('project.show', $task->project) }}" class="underline text-blue-500">More info</a>
                </p>
            </div>
        </div>

        <div class="col-span-2 flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-neutral-900 dark:border-neutral-700">
                <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
                Task Infos
                </p>
            </div>
            <div class="p-4 md:p-5">
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    <strong>{{ $task->title }} for {{ $task->user->name }}</strong>
                </p>
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    @if($task->status == 'open')
                    <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-teal-500 text-white">Open</span>
                    @else
                    <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-gray-500 text-white">Close</span>
                    @endif
                    {{ $task->deadline }}
                </p>
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    {{ $task->description }}
                </p>
            </div>
        </div>
    </div>

</x-app-layout>