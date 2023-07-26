<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Club Charges') }}
            </h2>
        </x-slot>
    <!-- component -->
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-wrap -m-4">
                <div class="p-4 md:w-1/3">
                    <div class="h-full rounded-xl shadow-cla-violate bg-gradient-to-r from-pink-50 to-red-50 overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Membership Fees</span>
                            </div>
                            <p class="leading-relaxed mb-3">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
                            <ul class="list-inside space-y-2">
                                @foreach($membershipfees as $fee)
                                    <li class="grid grid-cols-2">
                                        <div class="text-teal-600">{{$fee->name}}</div>
                                        <div class="text-gray-500">{{'₦'.number_format($fee->amount, 2)}}</div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <!-- Experience and education -->
                        <div class="bg-white p-3 shadow-sm rounded-sm">
                            <div class="grid grid-cols-2">
                                <div class="">
                                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                        <span clas="text-green-500">
                                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </span>
                                        <span class="tracking-wide">Membership Fees</span>
                                    </div>

                                    <ul class="list-inside space-y-2">
                                        @foreach($membershipfees as $fee)
                                            <li class="grid grid-cols-2">
                                                <div class="text-teal-600">{{$fee->name}}</div>
                                                <div class="text-gray-500">{{'₦'.number_format($fee->amount, 2)}}</div>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>

                                <div class="">
                                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </span>
                                        <span class="tracking-wide">Subscription Fees</span>
                                    </div>
                                    <ul class="list-inside space-y-2">
                                        @foreach($subscription as $fee)
                                            <li class="grid grid-cols-2">
                                                <div class="text-teal-600">{{$fee->name}}</div>
                                                <div class="text-gray-500">{{'₦'.number_format($fee->amount, 2)}}</div>
                                            </li>
                                      @endforeach
                                    </ul>
                                </div>

                                <div>
                                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </span>
                                        <span class="tracking-wide">Penalty Fees</span>
                                    </div>
                                    <ul class="list-inside space-y-2">
                                        @foreach($penalty as $fee)
                                            <li class="grid grid-cols-2">
                                                <div class="text-teal-600">{{$fee->name}}</div>
                                                <div class="text-gray-500">{{'₦'.number_format($fee->amount, 2)}}</div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div>
                                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </span>
                                        <span class="tracking-wide">Stable Fees</span>
                                    </div>
                                    @foreach($stable as $fee)
                                        <ul class="list-inside space-y-2">
                                            <li class="grid grid-cols-2">
                                                <div class="text-teal-600">Box Fee</div>
                                                <div class="text-gray-500 text-xs">{{'₦'.number_format($fee->box_fee,2)}}</div>
                                            </li>
                                            <li class="grid grid-cols-2">
                                                <div class="text-teal-600">Room Fee</div>
                                                <div class="text-gray-500 text-xs">{{'₦'.number_format($fee->room_fee,2)}}</div>
                                            </li>
                                            <li class="grid grid-cols-2">
                                                <div class="text-teal-600 grid-flow-dense">Lounge Fee</div>
                                                <div class="text-gray-500 text-xs">{{'₦'.number_format($fee->lounge_fee,2)}}</div>
                                            </li>
                                            <li class="grid grid-cols-2">
                                                <div class="text-teal-600">Store Fee</div>
                                                <div class="text-gray-500 text-xs">{{'₦'.number_format($fee->store_fee,2)}}</div>
                                            </li>
                                    @endforeach
                                </div>
                            </div>
                            <!-- End of Experience and education grid -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- component -->

    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</x-app-layout>

