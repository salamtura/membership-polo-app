<x-app-layout>
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">--}}
{{--            {{ __('Dashboard') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 text-gray-900 dark:text-gray-100">--}}
{{--                    {{ __("You're logged in!") }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- component -->
    <style>
        :root {
            --main-color: #4a76a8;
        }

        .bg-main-color {
            background-color: var(--main-color);
        }

        .text-main-color {
            color: var(--main-color);
        }

        .border-main-color {
            border-color: var(--main-color);
        }
    </style>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>



    <div class="bg-gray-200">

        <div class="container mx-auto p-5">
            <div class="md:flex no-wrap md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="bg-white p-3 border-t-4 border-green-400">
                        <div class="image overflow-hidden">
                            <img class="h-auto w-full mx-auto "
                                 src="{{ $user->membership->profile_photo != null ?  'storage/'.$user->membership->profile_photo : 'images/profile.png'}}"
                                 alt="">
                        </div>
                        <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$user->name}}</h1>
                        <h3 class="text-gray-600 font-lg text-semibold leading-6">{{$user->membership->name_of_organization}}</h3>
{{--                        <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">Lorem ipsum dolor sit amet--}}
{{--                            consectetur adipisicing elit.--}}
{{--                            Reprehenderit, eligendi dolorum sequi illum qui unde aspernatur non deserunt</p>--}}
                        <ul
                            class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                            <li class="flex items-center py-3">
                                <span>Player Handicap</span>
                                <span class="ml-auto"><span
                                        class="bg-gray-500 py-1 px-2 rounded-xl text-white text-sm">{{$user->membership->player_handicap}}</span></span>
                            </li>
                            <li class="flex items-center py-3">
                                <span>Membership Status</span>
                                <span class="ml-auto"><span
                                        class="{{$user->membership->membership_status == 'active' ? 'bg-green-500' : 'bg-red-500'}} py-1 px-2 rounded text-white text-sm">{{\Illuminate\Support\Str::upper($user->membership->membership_status)}}</span></span>
                            </li>
                            <li class="flex items-center py-3">
                                <span>Subscription Status</span>
                                <span class="ml-auto"><span
                                        class="{{$user->membership->subscription_status == 'active' ? 'bg-green-500' : 'bg-red-500'}} py-1 px-2 rounded text-white text-sm">{{\Illuminate\Support\Str::upper($user->membership->subscription_status)}}</span></span>
                            </li>
                            <li class="flex items-center py-3">
                                <span>Member since</span>
                                <span class="ml-auto">{{date('Y', strtotime($user->membership->membership_since))}}</span>
                            </li>
                        </ul>
                    </div>
                    <!-- End of profile card -->
                    <div class="my-4"></div>

                </div>
                <!-- Right Side -->
                <div class="w-full md:w-9/12 mx-2 ">
                    @if($invoices->count() > 0 || $penalties->count() > 0 || $user->membership->subscription_status != 'active')
                        <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-teal-900 px-4 py-3 shadow-md " role="alert">
                            <div class="flex">
                                <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                <div>
                                    <p class="font-bold">Profile Restricted</p>
                                    <p class="text-sm mt-2">
                                        Dear Member,<br><br>
                                        Your profile has been restricted due to unpaid invoices or penalties associated with your profile.
                                        Therefor you are unable to view pitch status or book for chukkers.
                                        Kindly make payment for any outstanding invoices to unrestrict your profile.<br><br>
                                        Thank you for understanding.<br>
                                        Management.
                                    </p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class=" grid md:grid-cols-2 sm:grid-cols-1">
                            @if( \Carbon\Carbon::now()->greaterThan($pitch->to_date))
                                @php $pitch->status = 'closed'; @endphp
                            @endif
                            <div class="w-full max-w-md p-4 {{$pitch->status =='open' ? 'bg-green-500' : 'bg-red-500'}} border border-gray-200 rounded-lg shadow sm:p-8">
                                <h5 class="text-xl font-medium text-black">Pitch Status</h5>
                                <div class="flex items-baseline {{$pitch->status =='open' ? 'text-green-900' : 'text-red-900'}}">
                                    <span class="text-5xl font-extrabold tracking-tight">{{\Illuminate\Support\Str::upper($pitch->status)}}</span>
                                    {{--                                <span class="ml-1 text-xl font-normal text-gray-500 dark:text-gray-400">/month</span>--}}
                                </div>
                                <ul role="list" class="space-y-5 my-7">
                                    <li class="flex space-x-3 items-center">
                                        <svg class="flex-shrink-0 w-4 h-4 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                        </svg>
                                        <span class="text-base font-normal leading-tight text-white">{{\Illuminate\Support\Str::upper($pitch->description)}}</span>
                                    </li>
                                    @if($pitch->status =='open')
                                        <li class="flex space-x-3 items-center">
                                            <svg class="flex-shrink-0 w-4 h-4 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                            </svg>
                                            <span class="text-base font-normal leading-tight text-white">{{'From ' . date('l, M d - H:ia', strtotime($pitch->from_date)) . ' to ' . date('l, M d H:ia', strtotime($pitch->to_date))}}</span>
                                        </li>
                                    @endif
                                </ul>
                            </div>

                            @if( \Carbon\Carbon::now()->greaterThan($chukker->closing_time) || $pitch->status =='closed' )
                                @php $chukker->status = 'closed'; @endphp
                            @endif
                            <div class="w-full max-w-md p-4 {{$chukker->status == 'open' ? 'bg-green-500' : 'bg-red-500'}} border border-gray-200 rounded-lg shadow sm:p-8 ">
                                <h5 class="text-xl font-medium text-black">Chukker Booking</h5>
                                <div class="flex items-baseline {{$chukker->status == 'open' ? 'text-green-900' : 'text-red-900'}}">
                                    <span class="text-5xl font-extrabold tracking-tight">{{\Illuminate\Support\Str::upper($chukker->status)}}</span>
                                    {{--                                <span class="ml-1 text-xl font-normal text-white">15:34:23</span>--}}
                                </div>
                                <ul role="list" class="space-y-5 my-7">
                                    <li class="flex space-x-3 items-center">
                                        <svg class="flex-shrink-0 w-4 h-4 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                        </svg>
                                        <span class="text-base font-normal leading-tight text-white dark:text-gray-400">{{\Illuminate\Support\Str::upper($chukker->chukker_no)}}</span>
                                    </li>
                                    <li class="flex space-x-3 items-center">
                                        <svg class="flex-shrink-0 w-4 h-4 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                        </svg>
                                        <span class="text-base font-normal leading-tight text-white dark:text-gray-400">{{Carbon\Carbon::parse($chukker->chukker_date)->format('l d F Y')}}</span>
                                    </li>
                                </ul>
                                @if($chukker->status == 'open')
                                    @if($booking == null)
                                        <button type="button" onclick="modalHandler(true)" class="text-white w-full bg-green-900 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-200 font-large rounded-lg text-lg mt-5 px-5 py-2 justify-center  text-center">Book Now</button>
                                    @else
                                        <livewire:cancel-booking :booking="$booking" />
                                        {{--                                    <button type="button" wire:click="cancelBooking({{$booking->id}})" class="text-white w-full bg-red-900 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-200 font-large rounded-lg text-lg mt-5 px-5 py-2 justify-center  text-center">Cancel</button>--}}
                                    @endif
                                    <span class="ml-1 text-xl font-normal text-white">
                                    <div class="wrap-countdown mercado-countdown" data-expire="{{ Carbon\Carbon::parse($chukker->closing_time)->format('Y/m/d H:i:s') }}"></div>
                                </span>
                                @else
                                    @if($booking != null)
                                        <button type="button" disabled class="text-white w-full bg-{{$booking->status == 'confirmed' ? 'green' : 'yellow'}}-500 focus:ring-4 focus:outline-none focus:ring-blue-200 font-large rounded-lg text-lg mt-5 px-5 py-2 justify-center  text-center">{{\Illuminate\Support\Str::upper($booking->status)}}</button>
                                    @endif
                                @endif
                            </div>
                        </div>
                    @endif




                    <div class="my-4"></div>

                    <div class="">
                        <div class="grid md:grid-cols-4 sm:grid-cols-2">
                            <div class="bg-white m-3 p-3 shadow-sm rounded-sm text-center">
                                <div class="items-center space-x-2 font-semibold text-gray-900 leading-8">
                                <span class="text-green-500">
{{--                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">--}}
{{--                                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />--}}
{{--                                    </svg>--}}
                                </span>
                                    <span class="tracking-wide">Invoices</span>
                                </div>
                                <div class="text-center">
                                    <div class="text-teal-600 text-xl font-bold">{{$invoices->count()}}</div>
                                    <div class="text-gray-500 text-xs">Unpaid</div>
                                    <div class="text-green-500 text-xs"><a href="{{route('invoices')}}">view more</a></div>
                                </div>
                            </div>

                            <div class="bg-white m-3 p-3 shadow-sm rounded-sm text-center">
                                <div class="items-center space-x-2 font-semibold text-gray-900 leading-8">
                                <span class="text-green-500">
{{--                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">--}}
                                    {{--                                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />--}}
                                    {{--                                    </svg>--}}
                                </span>
                                    <span class="tracking-wide">Subscription</span>
                                </div>
                                <div class="text-center">
                                    <div class="text-teal-600 text-xl font-bold">{{$user->membership->subscriptions->count()}}</div>
                                    <div class="text-gray-500 text-xs">Unpaid</div>
                                    <div class="text-green-500 text-xs"><a href="{{route('subscriptions')}}">view more</a></div>
                                </div>
                            </div>
                            <div class="bg-white m-3 p-3 shadow-sm rounded-sm text-center">
                                <div class="items-center space-x-2 font-semibold text-gray-900 leading-8">
                                <span class="text-green-500">
{{--                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">--}}
                                    {{--                                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />--}}
                                    {{--                                    </svg>--}}
                                </span>
                                    <span class="tracking-wide">Penalties</span>
                                </div>
                                <div class="text-center">
                                    <div class="text-teal-600 text-xl font-bold">{{$penalties->count()}}</div>
                                    <div class="text-gray-500 text-xs">Pending</div>
                                    <div class="text-green-500 text-xs"><a href="{{route('penalties')}}">view more</a></div>
                                </div>
                            </div>
                            <div class="bg-white m-3 p-3 shadow-sm rounded-sm text-center">
                                <div class="items-center space-x-2 font-semibold text-gray-900 leading-8">
                                <span class="text-green-500">
{{--                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">--}}
                                    {{--                                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />--}}
                                    {{--                                    </svg>--}}
                                </span>
                                    <span class="tracking-wide">Chukkers</span>
                                </div>
                                <div class="text-center">
                                    <div class="text-teal-600 text-xl font-bold">0</div>
                                    <div class="text-gray-500 text-xs">Chukkers played</div>
                                    <div class="text-green-500 text-xs"><a href="{{route('chukkers')}}">view more</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class="my-4"></div>
                        <!-- Experience and education -->
                        <div class="bg-white p-3 shadow-sm rounded-sm">
                            <div class="grid md:grid-cols-2 sm:grid-cols-1">
                                <div class="grid-col m-3">
                                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span class="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                        <path fill="#fff"
                                              d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                    </svg>
                                </span>
                                        <span class="tracking-wide">Notice Board</span>
                                    </div>
                                    <ul class="list-inside space-y-2">
                                        @foreach($notices as $notice)
                                            <li>
                                                <div class="text-teal-600">{{$notice->title}}</div>
                                                <div class="text-gray-500 text-xs">{{$notice->created_at}}</div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="grid-col m-3">
                                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                        <span class="text-green-500">
                                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </span>
                                        <span class="tracking-wide">Stable Information</span>
                                    </div>
                                    @if($user->membership->stables->count() > 0)
                                        @foreach($user->membership->stables as $stable)
                                            <ul class="list-inside space-y-2 pl-3">
                                                <li class="grid grid-cols-2">
                                                    <div class="text-teal-600">Description</div>
                                                    <div class="text-gray-500">{{$stable->description}}</div>
                                                </li>
                                                <li class="grid grid-cols-2">
                                                    <div class="text-teal-600">Number of Boxes</div>
                                                    <div class="text-gray-500 ">{{$stable->number_of_boxes}}</div>
                                                </li>
                                                <li class="grid grid-cols-2">
                                                    <div class="text-teal-600">Number of Rooms</div>
                                                    <div class="text-gray-500 ">{{$stable->number_of_rooms}}</div>
                                                </li>
                                                <li class="grid grid-cols-2">
                                                    <div class="text-teal-600 grid-flow-dense">Number of Lounges</div>
                                                    <div class="text-gray-500 ">{{$stable->number_of_lounges}}</div>
                                                </li>
                                                <li class="grid grid-cols-2">
                                                    <div class="text-teal-600">Number of Stores</div>
                                                    <div class="text-gray-500 ">{{$stable->number_of_stores}}</div>
                                                </li>
                                            </ul>
                                        @endforeach
                                    @else
                                        none
                                    @endif
                                </div>
                            </div>
                            <!-- End of Experience and education grid -->
                        </div>
                        <!-- End of profile tab -->

                    <div class="my-4"></div>
                    <!-- About Section -->
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span class="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                            <span class="tracking-wide">About</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">First Name</div>
                                    <div class="px-4 py-2">{{$user->membership->first_name}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Last Name</div>
                                    <div class="px-4 py-2">{{$user->membership->surname}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Gender</div>
                                    <div class="px-4 py-2">{{$user->membership->gender}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Contact No.</div>
                                    <div class="px-4 py-2">{{$user->membership->mobile}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Current Address</div>
                                    <div class="px-4 py-2">{{$user->membership->address}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Alternate Mobile</div>
                                    <div class="px-4 py-2">{{$user->membership->alt_mobile}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Email.</div>
                                    <div class="px-4 py-2">
                                        <a class="text-blue-800" href="">{{$user->email}}</a>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Birthday</div>
                                    <div class="px-4 py-2">{{date('d F', strtotime($user->membership->date_of_birth))}}</div>
                                </div>
                            </div>
                        </div>
                        <a href="/profile-details"
                            class="text-center border block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Show
                            Full Information</a>
                    </div>
                    <!-- End of about section -->

                    <div class="my-4"></div>

                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div class="grid grid-cols-1">
                            <!-- Friends card -->
                            <div class="bg-white p-3 ">
                                <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                    <span class="text-green-500">
                                        <svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </span>
                                    <span>Members</span>
                                </div>
                                <div class="grid md:grid-cols-6  grid-cols-2">
                                    @foreach($members as $member)
                                        <div class="text-center my-2">
                                            <img class="h-16 w-16 rounded-full mx-auto"
                                                 src="{{ $member->profile_photo != null ?  'storage/'.$member->profile_photo : 'images/profile.png'}}"
                                                 alt="">
                                            <a href="#" class="text-main-color">{{$member->user->name}}</a>
                                        </div>
                                    @endforeach
                                </div>
                                <a href="/members"
                                    class="text-center block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                                    Show All Members</a>
                            </div>
                            <!-- End of friends card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <livewire:chukker-booking />


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
    <script>
        (function($) {

            var MERCADO_JS = {
                init: function(){
                    this.mercado_countdown();
                },
                mercado_countdown: function() {
                    if($(".mercado-countdown").length > 0){
                        $(".mercado-countdown").each( function(index, el){
                            var _this = $(this),
                                _expire = _this.data('expire');
                            _this.countdown(_expire, function(event) {
                                $(this).html( event.strftime('<span><b>%D</b> Days</span> <span><b>%-H</b> Hrs</span> <span><b>%M</b> Mins</span> <span><b>%S</b> Secs</span>'));
                            });
                        });
                    }
                },

            }

            window.onload = function () {
                MERCADO_JS.init();
            }

        })(window.Zepto || window.jQuery, window, document);
    </script>

    <script>
        let modal = document.getElementById("modal");
        function modalHandler(val) {
            if (val) {
                fadeIn(modal);
            } else {
                fadeOut(modal);
            }
        }
        function fadeOut(el) {
            el.style.opacity = 1;
            (function fade() {
                if ((el.style.opacity -= 0.1) < 0) {
                    el.style.display = "none";
                } else {
                    requestAnimationFrame(fade);
                }
            })();
        }
        function fadeIn(el, display) {
            el.style.opacity = 0;
            el.style.display = display || "flex";
            (function fade() {
                let val = parseFloat(el.style.opacity);
                if (!((val += 0.2) > 1)) {
                    el.style.opacity = val;
                    requestAnimationFrame(fade);
                }
            })();
        }
    </script>

</x-app-layout>
