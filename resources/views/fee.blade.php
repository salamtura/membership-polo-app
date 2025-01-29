<x-app-layout>
    <x-page-body-container>
        <x-page-heading title="Club Fees" subtitle="Here are all our billing plans for the guards polo club" />
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($membershipfees as $fee)
                <x-club-fee-card :name="$fee->name" price="{{ '₦' . number_format($fee->amount, 2) }}" />
            @endforeach
        </div>
    </x-page-body-container>
    {{-- <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Club Charges') }}
            </h2>
        </x-slot> --}}
    <!-- component -->
    <section class="text-gray-600 body-font hidden">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-wrap -m-4">
                <div class="p-4 md:w-1/3">
                    <div class="h-full border rounded-xl bg-white overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span class="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Membership Fees</span>
                            </div>
                            <p class="leading-relaxed mb-3">Onetime fees for club membership registration</p>
                            <ul class="list-inside space-y-2">
                                @foreach ($membershipfees as $fee)
                                    <li class="grid grid-cols-2 border-b py-1.5">
                                        <div class="text-teal-600">{{ $fee->name }}</div>
                                        <div class="text-gray-500">{{ '₦' . number_format($fee->amount, 2) }}</div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="p-4 md:w-1/3">
                    <div class="h-full border rounded-xl bg-white overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span class="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Subscription Fees</span>
                            </div>
                            <p class="leading-relaxed mb-3">Annual subscription fees for membership categories</p>
                            <ul class="list-inside space-y-2">
                                @foreach ($subscription as $fee)
                                    <li class="grid grid-cols-2 border-b py-1.5">
                                        <div class="text-teal-600">{{ $fee->name }}</div>
                                        <div class="text-gray-500">{{ '₦' . number_format($fee->amount, 2) }}</div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="p-4 md:w-1/3">
                    <div class="h-full border rounded-xl bg-white overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span class="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Stable Fees</span>
                            </div>
                            <p class="leading-relaxed mb-3">Annual fees for stable allocation</p>
                            @foreach ($stable as $fee)
                                <ul class="list-inside space-y-2">
                                    <li class="grid grid-cols-2 border-b py-1.5">
                                        <div class="text-teal-600">Box Fee</div>
                                        <div class="text-gray-500 ">{{ '₦' . number_format($fee->box_fee, 2) }}</div>
                                    </li>
                                    <li class="grid grid-cols-2 border-b py-1.5">
                                        <div class="text-teal-600">Room Fee</div>
                                        <div class="text-gray-500 ">{{ '₦' . number_format($fee->room_fee, 2) }}</div>
                                    </li>
                                    <li class="grid grid-cols-2 border-b py-1.5">
                                        <div class="text-teal-600 grid-flow-dense">Lounge Fee</div>
                                        <div class="text-gray-500 ">{{ '₦' . number_format($fee->lounge_fee, 2) }}</div>
                                    </li>
                                    <li class="grid grid-cols-2 border-b py-1.5">
                                        <div class="text-teal-600">Store Fee</div>
                                        <div class="text-gray-500 ">{{ '₦' . number_format($fee->store_fee, 2) }}</div>
                                    </li>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="p-4 md:w-1/3">
                    <div class="h-full border rounded-xl bg-white overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span class="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Penalty Fees</span>
                            </div>
                            <p class="leading-relaxed mb-3">Fees for club penalties</p>
                            <ul class="list-inside space-y-2">
                                @foreach ($penalty as $fee)
                                    <li class="grid grid-cols-2 border-b py-1.5">
                                        <div class="text-teal-600">{{ $fee->name }}</div>
                                        <div class="text-gray-500">{{ '₦' . number_format($fee->amount, 2) }}</div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- component -->

    {{--    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> --}}
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    {{--    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}
</x-app-layout>
