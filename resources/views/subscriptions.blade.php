<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Subscription History') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 ">

                        <table class="w-full divide-y divide-gray-200 table-fixed">
                            <thead class="bg-gray-100 border-b-2">
                                <tr>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">Subscription Category</th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">Year</th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">Amount</th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">Payment Status</th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">Payment Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->membership->subscriptions as $sub)
                                    <tr class="hover:bg-gray-100 border-b">
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$sub->subscriptionCategory->name}}</td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{Str::upper($sub->year)}}</td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{'₦'.number_format($sub->amount, 2)}}</td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap"><span class="{{$sub->payment_status == 'paid' ? 'bg-green-500' : 'bg-red-500'}} py-1 px-2 rounded text-white text-sm">{{$sub->payment_status}}</span></td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{date('d M Y', strtotime($sub->payment_date))}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <!-- component -->

</x-app-layout>

