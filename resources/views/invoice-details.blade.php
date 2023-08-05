@php
    use Illuminate\Support\Facades\Auth;
 @endphp

<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Invoice Details') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="py-6 md:px-20 sm:px-1 text-gray-900 ">
                        <div class="">
                            <!-- component -->

                            <div class="">
                                <header class="flex flex-col items-center px-8 pt-20 text-lg text-center bg-white border-t-8 border-green-700 md:block lg:block xl:block print:block md:items-start lg:items-start xl:items-start print:items-start md:text-left lg:text-left xl:text-left print:text-left print:pt-8 print:px-2 md:relative lg:relative xl:relative print:relative">
{{--                                    <img class=" items-center lg:ml-12 xl:ml-12 print:px-0 print:py-0"--}}
{{--                                         src="{{ asset('images/club_logo_2.png') }}"  width="94" height="135" />--}}
{{--                                    <img src="{{ asset('images/club_logo_2.png') }}" width="94" height="135" />--}}
                                    <div class="flex flex-row mt-12 mb-2 ml-0 text-2xl font-bold md:text-3xl lg:text-4xl xl:text-4xl print:text-2xl lg:ml-12 xl:ml-12">INVOICE
                                        <div class="text-green-700">
                                            <span class="mr-4 text-sm">■ </span> #
                                        </div>
                                        <span id="invoice_id" class="text-gray-500">{{$invoice['inv_number']}}</span>
                                    </div>
                                    <div class="flex flex-col lg:ml-12 xl:ml-12 print:text-sm">
                                        <span>Issue date: {{date('d M Y', strtotime($invoice->invoice_date))}}</span>
{{--                                        <span>Paid date: {{$invoice->updated_at}}</span>--}}
                                        <span>Due date: {{date('d M Y', strtotime($invoice->invoice_due_date))}}</span>
                                    </div>
                                    <div class="px-8 py-2 mt-8 text-3xl font-bold {{$invoice->status == "paid" ? 'text-green-700 border-4 border-green-700' : 'text-red-700 border-4 border-red-700'}} border-dotted md:absolute md:right-0 md:top-0 md:mr-12 lg:absolute lg:right-0 lg:top-0 xl:absolute xl:right-0 xl:top-0 print:absolute print:right-0 print:top-0 lg:mr-20 xl:mr-20 print:mr-2 print:mt-8">
                                        {{\Illuminate\Support\Str::upper($invoice->status)}}</div>
                                    @if($invoice->status == "unpaid")
                                        <form id="paymentForms" method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="" role="form">
                                            <input type="hidden" name="metadata" value="{{ json_encode($array = ['invoiceId' => $invoice->id,'invnum'=>$invoice->inv_number]) }}" >
                                            <input type="hidden" name="email" value="{{Auth::user()->email}}"> {{-- required --}}
                                            <input type="hidden" name="orderID" value="{{$invoice->inv_number}}">
                                            <input type="hidden" name="amount" value="{{$invoice->total_amount*100}}"> {{-- required in kobo --}}
                                            <input type="hidden" name="currency" value="NGN">
                                            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                                            {{ csrf_field() }}
                                            <button type="submit" class="border border-green-500 bg-green-500 text-xl  text-white rounded-md px-8 py-4 mt-8 md:ml-16 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline md:absolute md:left-0 md:top-0 md:mr-12 lg:absolute lg:left-0 lg:top-0 xl:absolute xl:left-0 xl:top-0 print:absolute print:left-0 print:top-0 lg:mr-20 xl:mr-20 print:mr-2 print:mt-8" {{$invoice->status == 'paid' ? 'disabled':''}}>Click here to pay online</button>
                                        </form>
                                    @endif

                                    <contract class="flex flex-col m-12 text-center lg:m-12 md:flex-none md:text-left md:relative md:m-0 md:mt-16 lg:flex-none lg:text-left lg:relative xl:flex-none xl:text-left xl:relative print:flex-none print:text-left print:relative print:m-0 print:mt-6 print:text-sm">
                                        <span class="font-extrabold md:hidden lg:hidden xl:hidden print:hidden">FROM</span>
                                        <from class="flex flex-col">
                                            <span id="company-name" class="font-medium">Guards Polo Club</span>
                                            <span id="company-address">Asokoro</span>
                                            <span id="company-country">Abuja <span class="flag-icon flag-icon-ng"></span> </span>
                                            <span id="company-phone">+12124567777</span>
                                            <span id="company-mail">info@abujaguardspolo.com</span>
                                        </from>
                                        <span class="mt-12 font-extrabold md:hidden lg:hidden xl:hidden print:hidden">TO</span>
                                        <to class="flex flex-col md:absolute md:right-0 md:text-right lg:absolute lg:right-0 lg:text-right print:absolute print:right-0 print:text-right">
                                            <span id="person-name" class="font-medium">{{Auth::user()->name}}</span>
{{--                                            <span id="person-country"><span class="flag-icon flag-icon-ng"></span> Abuja</span>--}}
{{--                                            <div class="flex-row">--}}
{{--                                                <span id="p-postal">3100</span>--}}
{{--                                                <span id="p-city">Salgótarján</span>,--}}
{{--                                            </div>--}}
                                            <span id="person-address">{{Auth::user()->membership->address}}</span>
                                            <span id="person-phone">{{Auth::user()->mobile}}</span>
                                            <span id="person-mail">{{Auth::user()->email}}</span>
                                        </to>
                                    </contract>
                                </header>
                                <hr class="border-gray-300 print:hidden">
                                <content>
                                    <div id="content" class="flex justify-center py-5 md:px-8 lg:px-20 xl:px-20 print:p-2">
                                        <table class="w-full text-left table-auto print:text-sm" id="table-items">
                                            <thead>
                                            <tr class="text-white bg-gray-700 print:bg-gray-300 print:text-black">
                                                <th class="px-4 py-2">Description</th>
                                                <th class="px-4 py-2 text-right">Amount</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="px-4 py-2 border">{{$invoice->description}}</td>
                                                <td class="px-4 py-2 text-right border tabular-nums slashed-zero">{{'₦'.number_format($invoice->total_amount, 2)}}</td>
                                            </tr>
                                            <tr class="text-white bg-gray-700 print:bg-gray-300 print:text-black">

                                                <td class="px-4 py-2 font-extrabold text-right border">Total</td>
                                                <td class="px-4 py-2 text-right border tabular-nums slashed-zero">{{'₦'.number_format($invoice->total_amount, 2)}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </content>
                                <payment-history>
                                    <div class="mt-20 mb-20 print:mb-2 print:mt-2">
{{--                                        <h2 class="text-xl font-semibold text-center print:text-sm">Payment History</h2>--}}
                                        <div class="flex flex-col items-center text-center print:text-sm">
{{--                                            <p class="font-medium">  2020/09/06 06:43PM CET <span class="font-light"><i class="lab la-cc-mastercard la-lg"></i> Credit Card Payment: $685.66 (Mastercard XXXX-XXXX-XXXX-0122)</span></p>--}}
                                        </div>

                                    </div>
                                </payment-history>
                                <div class="flex flex-col items-center mb-24 leading-relaxed print:mt-0 print:mb-0">
                                    <span class="w-64 text-4xl text-center text-black border-b-2 border-black border-dotted opacity-75 sign print:text-lg">Abdullahi Ibrahim</span>
                                    <span class="text-center">President</span>
                                </div>
                                <footer class="flex flex-col items-center justify-center pb-20 leading-loose text-white bg-gray-700 print:bg-white print:pb-0">
                                    <span class="mt-4 text-xs print:mt-0">Invoice generated on {{$invoice->created_at}}</span>
                                    <span class="mt-4 text-base print:text-xs">© {{\Carbon\Carbon::today()->year}} Abuja Guards Polo Club.  All rights reserved.</span>
                                    <span class="print:text-xs">Murtala Mohammed Way, Asokoro, Abuja.</span>
                                </footer>
                            </div>
                            <div class="lg:w-1/12 xl:w-1/4"></div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    <!-- component -->
    <style>
        @import url('https://rsms.me/inter/inter.css');
        .sf { font-family: 'Inter', sans-serif; }
        .sign { font-family: 'Homemade Apple', cursive; }
    </style>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Homemade+Apple&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" integrity="sha512-Cv93isQdFwaKBV+Z4X8kaVBYWHST58Xb/jVOcV9aRsGSArZsgAnFIhMpDoMDcFNoUtday1hdjn0nGp3+KZyyFw==" crossorigin="anonymous" />
    <script src="https://js.paystack.co/v2/inline.js"></script>
    <script>
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);

        function payWithPaystack(e) {
            e.preventDefault();

            let handler = PaystackPop.setup({
                key: 'pk_test_dc580fae25f4eadc7a90a0359487d9f98c19dff0', // Replace with your public key
                email: '{{Auth::user()->email}}',
                amount: {{$invoice->total_amount}} * 100,
                ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                // label: "Optional string that replaces customer email"
                onClose: function(){
                    alert('Window closed.');
                },
                callback: function(response){
                    let message = 'Payment complete! Reference: ' + response.reference;
                    alert(message);
                    // window.location = "http://www.yoururl.com/verify_transaction.php?reference=" + response.reference;
                }
            });

            handler.openIframe();
        }

    </script>
</x-app-layout>

