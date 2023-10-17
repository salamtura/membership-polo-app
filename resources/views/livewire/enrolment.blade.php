
<div>
    <h3 class="text-center" style="font-size: 1.75rem !important;">Membership Access</h3>
    <p class="text-center">Search and select by your name to begin enrollment</p>

    @if(!$showcode)
    <div class="search-box">
        <x-text-input id="search" class="block mt-1 w-full" type="text" wire:model="search" wire:keyup="searchResult"  />

        <!-- Search result list -->
        @if($showresult)
            <ul class="list-style">
                @if(!empty($records))
                    @foreach($records as $record)

                        <li class="mt-2 border-b" wire:click="fetchMemberDetail({{ $record->id }})">{{ $record->name}}</li>

                    @endforeach
                @endif
            </ul>
        @endif

        <div class="clear"></div>
        <div>
            @if(!empty($memberAccess))
                <div>
                    <div class="mt-1 mb-2">
                        <table class=" block w-full table-fixed ">
                            <thead>
                            <tr class="border-b-2">
                                <th class="px-4 py-2" colspan="2">Enrollment Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="border-b">
                                <td class="px-4 py-2">Name</td>
                                <td class="px-4 py-2">{{ $memberAccess->name }}</td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-4 py-2">Mobile</td>
                                <td class="px-4 py-2">{{ 'XXXXXXX'.\Illuminate\Support\Str::substr($memberAccess->mobile,7,4) }}</td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-4 py-2">Year of Registration</td>
                                <td class="px-4 py-2">{{ $memberAccess->reg_year }}</td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-4 py-2">Membership Category</td>
                                <td class="px-4 py-2">{{ $memberAccess->category }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <x-primary-button class="ml-3" wire:click="sendAccessCode({{ $memberAccess->id }})">
                            {{ __('Start Enrolment') }}
                        </x-primary-button>
                    </div>
                </div>
            @endif
        </div>
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mt-6" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                <div>
                    <p class="font-bold">Our access policy</p>
                    <p class="text-sm">Access to the Abuja Guards Polo membership portal is pre-approved by management.
                        If you cannot find you name or your details are incorrect, kindly contact management to
                        get it updated before you proceed.</p>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($showcode)

        <div>
            <div class="flex items-center bg-teal-100 border border-teal-500 text-teal-500 text-sm font-bold px-4 py-3" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                <p>Enter access code sent via sms on <span class="font-bold">{{'XXXXXXX'.\Illuminate\Support\Str::substr($memberAccess->mobile,7,4)}}</span></p>
            </div>
{{--            <x-input-label for="code" :value="__('Enter access code sent to you via sms on ').$memberAccess->mobile" />--}}
            <x-text-input id="code" class="block mt-1 w-full" type="number"  wire:model="code" required />
            @error('code') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
               href="#">
                {{ __('SMS not received? click to Resend') }}
            </a>
            <x-primary-button class="ml-3" wire:click="giveAccess({{ $memberAccess->id }})">
                {{ __('Get access') }}
            </x-primary-button>
        </div>
    @endif

</div>
