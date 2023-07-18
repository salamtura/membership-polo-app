<div>
    <!-- CSS -->
{{--    <style type="text/css">--}}
{{--        .search-box .clear {--}}
{{--            clear: both;--}}
{{--            margin-top: 20px;--}}
{{--        }--}}

{{--        .search-box ul {--}}
{{--            list-style: none;--}}
{{--            padding: 0px;--}}
{{--            width: 250px;--}}
{{--            position: absolute;--}}
{{--            margin: 0;--}}
{{--            background: white;--}}
{{--        }--}}

{{--        .search-box ul li {--}}
{{--            background: lavender;--}}
{{--            padding: 4px;--}}
{{--            margin-bottom: 1px;--}}
{{--        }--}}

{{--        .search-box ul li:nth-child(even) {--}}
{{--            background: cadetblue;--}}
{{--            color: white;--}}
{{--        }--}}

{{--        .search-box ul li:hover {--}}
{{--            cursor: pointer;--}}
{{--        }--}}

{{--        .search-box input[type=text] {--}}
{{--            padding: 5px;--}}
{{--            width: 250px;--}}
{{--            letter-spacing: 1px;--}}
{{--        }--}}
{{--    </style>--}}

    @if(!$showcode)
    <div class="search-box">
        <x-text-input id="search" class="block mt-1 w-full" type="text" wire:model="search" wire:keyup="searchResult"  />
{{--        <input type='text' wire:model="search" wire:keyup="searchResult">--}}

        <!-- Search result list -->
        @if($showresult)
            <ul>
                @if(!empty($records))
                    @foreach($records as $record)

                        <li wire:click="fetchMemberDetail({{ $record->id }})">{{ $record->name}}</li>

                    @endforeach
                @endif
            </ul>
        @endif

        <div class="clear"></div>
        <div>
            @if(!empty($memberAccess))
                <div>
                    <div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="2">Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{ $memberAccess->name }}</td>
                            </tr>
                            <tr>
                                <td>Mobile</td>
                                <td>{{ $memberAccess->mobile }}</td>
                            </tr>
                            <tr>
                                <td>Year of Registration</td>
                                <td>{{ $memberAccess->reg_year }}</td>
                            </tr>
                            <tr>
                                <td>Membership Category</td>
                                <td>{{ $memberAccess->category }}</td>
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
    </div>
    @endif
    @if($showcode)

        <div>
            <x-input-label for="code" :value="__('Enter access code sent to you via sms on ').$memberAccess->mobile" />
            <x-text-input id="code" class="block mt-1 w-full" type="number"  wire:model="code" required />
            @error('code') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                {{ __('SMS not received? click to Resend') }}
            </a>
            <x-primary-button class="ml-3" wire:click="giveAccess({{ $memberAccess->id }})">
                {{ __('Get access') }}
            </x-primary-button>
        </div>
    @endif

</div>
