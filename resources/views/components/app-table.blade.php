@php $inputFieldClass = "py-3 border border-[#E5E7EB] rounded-3xl bg-[#F8F9F9]" @endphp

<div class="border rounded-lg p-8 sm:p-10">
    <div class="flex items-center gap-4 flex-wrap">
        <div class="relative w-fit h-fit ">
            <input class="{{ $inputFieldClass . ' pl-10 sm:w-[300px]' }}" placeholder="Search for anything" />
            <img src='/images/icons/search.svg' class="absolute top-[25%] left-3 text-black" />
        </div>
        <select class="{{ $inputFieldClass . ' pl-4' }}" id="invoice-status" name="invoice-status">
            <option value="all">All</option>
            <option value="paid">Paid</option>
            <option value="unpaid">Unpaid</option>
        </select>
    </div>

    <div class="py-12">
        <div class="">
            <div class="bg-white overflow-x-scroll shadow-sm sm:rounded-lg">
                <div class=" text-gray-900 ">
                    @if (!(Auth::user()->membership->invoices->count() > 0))
                        <table class="min-w-full divide-y divide-gray-200 table-fixed">
                            <thead class="bg-gray-100 border-b-2">
                                <tr>
                                    @foreach ($headerFields as $field)
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 ">
                                            {{ $field }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Auth::user()->membership->invoices as $invoice)
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
</div>
