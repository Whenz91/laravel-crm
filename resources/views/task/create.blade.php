<x-app-layout>
    <x-pages.header :title="'Add New Task'" :backUrl="route('task')" />

    <form action="{{ route('task.store') }}" method="post" class="max-w-full md:max-w-4xl mx-auto mt-12">
        @csrf

        <div class="max-w-full mb-5">
            <label for="title" class="block text-sm font-medium mb-2 dark:text-white">Title*</label>
            <input type="text" id="title" name="title" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Super important project" value="{{ old('title') }}">
            @error('title')
                <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="max-w-full mb-5">
            <label for="description" class="block text-sm font-medium mb-2 dark:text-white">Description</label>
            <textarea name="description" id="description" rows="20" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Some useful information about the project">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="max-w-full mb-5">
            <label for="user" class="block text-sm font-medium mb-2 dark:text-white">User*</label>
            <select name="user_id" id="user" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <option {{ old('user_id') ? '' : 'selected' }}>Select user</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{  old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
                <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="max-w-full mb-5">
            <label for="client" class="block text-sm font-medium mb-2 dark:text-white">Client*</label>
            <select name="client_id" id="client" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <option {{ old('client_id') ? '' : 'selected' }}>Select client</option>
                @foreach($clients as $client)
                <option value="{{ $client->id }}" {{  old('client_id') == $client->id ? 'selected' : '' }}>{{ $client->company_name }}</option>
                @endforeach
            </select>
            @error('client_id')
                <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="max-w-full mb-5">
            <label for="project" class="block text-sm font-medium mb-2 dark:text-white">Project*</label>
            <select name="project_id" id="project" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <option {{ old('project_id') ? '' : 'selected' }}>Select project</option>
                @foreach($projects as $project)
                <option value="{{ $project->id }}" {{  old('project_id') == $project->id ? 'selected' : '' }}>{{ $project->title }}</option>
                @endforeach
            </select>
            @error('project_id')
                <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="max-w-full mb-5">
            <label for="deadline" class="block text-sm font-medium mb-2 dark:text-white">Deadline*</label>
            <input type="date" id="deadline" name="deadline" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" value="{{ old('deadline') }}">
            @error('deadline')
                <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <fieldset class="flex items-center mb-5">
            <legend class="block text-sm font-medium mb-2 dark:text-white">Status</legend>
            <label for="status" class="text-sm text-gray-500 me-3 dark:text-neutral-400">Closed</label>
            <input type="checkbox" id="status" name="status" checked class="relative w-[3.25rem] h-7 p-px bg-gray-100 border-transparent text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600

            before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-200">
            <label for="status" class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Open</label>
        </fieldset>

        <button type="submit" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
            Save
        </button>
    </form>
</x-app-layout>