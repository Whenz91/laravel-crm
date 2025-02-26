<x-app-layout>
    <x-pages.header :title="$client->company_name" />

    <div class="grid grid-cols-2 gap-4 mt-12">
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-neutral-900 dark:border-neutral-700">
                <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
                Company Infos
                </p>
            </div>
            <div class="p-4 md:p-5">
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    <strong>Address</strong>
                </p>
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    {{ $client->company_zip }} {{ $client->company_city }}
                </p>
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    {{ $client->company_address }}
                </p>
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    <strong>VAT number</strong>
                </p>
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    {{ $client->company_vat }}
                </p>
               
            </div>
        </div>

        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-neutral-900 dark:border-neutral-700">
                <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
                Contact Infos
                </p>
            </div>
            <div class="p-4 md:p-5">
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    {{ $client->contact_name }}
                </p>
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                    {{ $client->contact_email }}
                </p>
                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                </svg>

                    {{ $client->contact_phone_number }}
                </p>
               
            </div>
        </div>

    </div>
</x-app-layout>