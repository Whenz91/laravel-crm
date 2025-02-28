<x-app-layout>
    <x-pages.header :title="'Edit ' . $client->company_name" :backUrl="route('client')" />

    <form action="{{ route('client.update', $client) }}" method="post" class="max-w-full md:max-w-4xl mx-auto mt-12">
        @method('PUT')
        @csrf

        <div class="max-w-full mb-5">
            <label for="contact_name" class="block text-sm font-medium mb-2 dark:text-white">Contact name*</label>
            <input type="text" id="contact_name" name="contact_name" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Wile E. Coyote" value="{{ old('contact_name') ? old('contact_name') : $client->contact_name }}">
            @error('contact_name')
                <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="max-w-full mb-5">
            <label for="contact_email" class="block text-sm font-medium mb-2 dark:text-white">Contact email*</label>
            <input type="email" id="contact_email" name="contact_email" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="wile.coyote@acme-co.com" value="{{ old('contact_email') ? old('contact_email') : $client->contact_email }}">
            @error('contact_email')
                <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="max-w-full mb-5">
            <label for="contact_phone_number" class="block text-sm font-medium mb-2 dark:text-white">Contact phone*</label>
            <input type="text" id="contact_phone_number" name="contact_phone_number" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="123-456" value="{{ old('contact_phone_number') ? old('contact_phone_number') : $client->contact_phone_number }}">
            @error('contact_phone_number')
                <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-2 gap-5">
            <div class="max-w-full mb-5">
                <label for="company_name" class="block text-sm font-medium mb-2 dark:text-white">Company name*</label>
                <input type="text" id="company_name" name="company_name" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Acme Corporation" value="{{ old('company_name') ? old('company_name') : $client->company_name }}">
                @error('company_name')
                    <p class="text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="max-w-full mb-5">
                <label for="company_vat" class="block text-sm font-medium mb-2 dark:text-white">Company vat</label>
                <input type="text" id="company_vat" name="company_vat" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="12345678" value="{{ old('company_vat') ? old('company_vat') : $client->company_vat }}">
                @error('company_vat')
                    <p class="text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-2 gap-5">
            <div class="max-w-full mb-5">
                <label for="company_zip" class="block text-sm font-medium mb-2 dark:text-white">Company zip</label>
                <input type="text" id="company_zip" name="company_zip" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="123456" value="{{ old('company_zip') ? old('company_zip') : $client->company_zip }}">
                @error('company_zip')
                    <p class="text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="max-w-full mb-5">
                <label for="company_city" class="block text-sm font-medium mb-2 dark:text-white">Company city</label>
                <input type="text" id="company_city" name="company_city" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Budapest" value="{{ old('company_city') ? old('company_city') : $client->company_city }}">
                @error('company_city')
                    <p class="text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-span-2 max-w-full mb-5">
                <label for="company_address" class="block text-sm font-medium mb-2 dark:text-white">Company address</label>
                <input type="text" id="company_address" name="company_address" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="M Street 145" value="{{ old('company_address') ? old('company_address') : $client->company_address }}">
                @error('company_address')
                    <p class="text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <button type="submit" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
            Update
        </button>

    </form>

</x-app-layout>