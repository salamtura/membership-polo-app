<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Profile Details') }}
            </h2>
        </x-slot>
    <!-- component -->
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-wrap -m-4">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="bg-white p-3 border-t-4 border-green-400">
                        <div class="image overflow-hidden">
                            <img class="h-auto w-full mx-auto"
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
                                        class="{{$user->membership->membership_status == 'active' ? 'bg-green-500' : 'bg-red-500'}} py-1 px-2 rounded text-white text-sm">{{$user->membership->membership_status}}</span></span>
                            </li>
                            <li class="flex items-center py-3">
                                <span>Subscription Status</span>
                                <span class="ml-auto"><span
                                        class="{{$user->membership->subscription_status == 'active' ? 'bg-green-500' : 'bg-red-500'}} py-1 px-2 rounded text-white text-sm">{{$user->membership->subscription_status}}</span></span>
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
                <!-- About Section -->
                <div class="w-full md:w-8/12 md:mx-2">
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span class="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                            <span class="tracking-wide">Bio Data</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Surname</div>
                                    <div class="px-4 py-2">{{$user->membership->surname}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">First Name</div>
                                    <div class="px-4 py-2">{{$user->membership->first_name}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Middle Name</div>
                                    <div class="px-4 py-2">{{$user->membership->middle_naem}}</div>
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
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Blood Group</div>
                                    <div class="px-4 py-2">{{$user->membership->blood_group}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Genotype</div>
                                    <div class="px-4 py-2">{{$user->membership->genotype}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of about section -->

                    <div class="my-4"></div>

                    <!-- Employment Section -->
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span class="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                            <span class="tracking-wide">Employment Details</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Organization</div>
                                    <div class="px-4 py-2">{{$user->membership->name_of_organization}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Type of Organization</div>
                                    <div class="px-4 py-2">{{$user->membership->type_of_organization}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Profession</div>
                                    <div class="px-4 py-2">{{$user->membership->profession->name}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Occupation</div>
                                    <div class="px-4 py-2">{{$user->membership->occupation->name}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Office Address</div>
                                    <div class="px-4 py-2">{{$user->membership->office_address}}</div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End of Employment section -->
                    <div class="my-4"></div>

                    <!-- Interest Section -->
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span class="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                            <span class="tracking-wide">Area of Interest</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Area of Interest</div>
                                    <div class="px-4 py-2">{{$user->membership->area_of_interest}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Type of Organization</div>
                                    <div class="px-4 py-2">{{$user->membership->type_of_organization}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Profession</div>
                                    <div class="px-4 py-2">{{$user->membership->profession->name}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Occupation</div>
                                    <div class="px-4 py-2">{{$user->membership->occupation->name}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Office Address</div>
                                    <div class="px-4 py-2">{{$user->membership->office_address}}</div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End of Interest section -->
                    <div class="my-4"></div>

                    <!-- Emergency Section -->
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span class="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                            <span class="tracking-wide">Emergency Contact</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Emergency Contact</div>
                                    <div class="px-4 py-2">{{$user->membership->emergency_contact_name}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Mobile</div>
                                    <div class="px-4 py-2">{{$user->membership->emergency_contact_mobile}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Relationship</div>
                                    <div class="px-4 py-2">{{$user->membership->emergency_contact_relatioship}}</div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End of Emergency section -->

                </div>


            </div>
        </div>
    </section>
    <!-- component -->

{{--    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">--}}
    <script src="https://cdn.tailwindcss.com"></script>
{{--    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>--}}
</x-app-layout>

