<x-app-layout>
    {{-- <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Invoices') }}
            </h2>
        </x-slot> --}}

    <x-page-body-container>
        <x-page-heading title="Invoices" subtitle="View all your invoices and make sure to pay them on time" />
        <x-app-table :headerFields="['Invoice No', 'Description', 'Type', 'Amount', 'Invoice Date', 'Due Date', 'Status', 'Action']" />
    </x-page-body-container>

    <div class="py-12 hidden">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    @if ($user->membership->invoices->count() > 0)
                        <table class="min-w-full divide-y divide-gray-200 table-fixed">
                            <thead class="bg-gray-100 border-b-2">
                                <tr>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                        Invoice No</th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                        Description</th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                        Type</th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                        Amount</th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                        Invoice Date</th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                        Due Date</th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                        Status</th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->membership->invoices as $invoice)
                                    <tr class="hover:bg-gray-100 border-b">
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            {{ $invoice->inv_number }}</td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            {{ $invoice->description }}</td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            {{ Str::upper($invoice->invoice_type) }}</td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            {{ '₦' . number_format($invoice->total_amount, 2) }}</td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            {{ date('d M Y', strtotime($invoice->invoice_date)) }}</td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            {{ date('d M Y', strtotime($invoice->invoice_due_date)) }}</td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap"><span
                                                class="{{ $invoice->status == 'paid' ? 'bg-green-500' : 'bg-red-500' }} py-1 px-2 rounded text-white text-sm">{{ $invoice->status }}</span>
                                        </td>
                                        <td class="py-4 px-6 ">
                                            <a href="/invoice-details/{{ $invoice->id }}">view invoice</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3>You have no invoices</h3>
                    @endif

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
