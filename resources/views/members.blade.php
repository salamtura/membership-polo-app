<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Club Members') }}
        </h2>
    </x-slot> --}}
    <x-page-body-container>
        <x-page-heading title="Club Members" subtitle="Search and meet with our great members of the guard polo club" />
        <div class="border rounded-lg p-8 sm:p-10">
            <div class="flex items-center gap-4 flex-wrap">
                <div class="relative w-fit h-fit ">
                    <input class="{{ 'py-3 border border-[#E5E7EB] rounded-3xl bg-[#F8F9F9]' . ' pl-10 sm:w-[300px]' }}"
                        placeholder="Search for members" />
                    <img src='/images/icons/search.svg' class="absolute top-[25%] left-3 text-black" />
                </div>
                <select class="{{ 'py-3 border border-[#E5E7EB] rounded-3xl bg-[#F8F9F9]' . ' pl-4' }}"
                    id="invoice-status" name="invoice-status">
                    <option value="all">Handicap</option>
                    <option value="paid">Name</option>
                    <option value="unpaid">Email</option>
                </select>
                <select class="{{ 'py-3 border border-[#E5E7EB] rounded-3xl bg-[#F8F9F9]' . ' pl-4' }}"
                    id="invoice-status" name="invoice-status">
                    <option value="all">0</option>
                    <option value="paid">1</option>
                    <option value="unpaid">2</option>
                </select>
            </div>
            <div class="grid grid-cols-4 mt-12">
                @foreach ($members as $member)
                    <x-member-card :name="$member->user->name" :photo="$member->profile_photo != null
                        ? 'storage/' . $member->profile_photo
                        : 'images/profile.png'" :handicap="$member->player_handicap" />
                @endforeach
            </div>
        </div>
    </x-page-body-container>
    <section class="text-gray-600 body-font hidden">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-wrap -m-4">
                @foreach ($members as $member)
                    <div class="p-4 md:w-1/4">
                        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow ">
                            <div class="flex flex-col items-center py-5">
                                <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                                    src="{{ $member->profile_photo != null ? 'storage/' . $member->profile_photo : 'images/profile.png' }}"
                                    alt="Bonnie image" />
                                <h5 class="mb-1 text-l font-medium text-gray-900 ">{{ $member->user->name }}</h5>
                                <span class="text-sm text-gray-500 ">Player Handicap
                                    {{ $member->player_handicap }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    {{--    <link rel="stylesheet" href="https://horizon-tailwind-react-git-tailwind-components-horizon-ui.vercel.app/static/css/main.ad49aa9b.css" /> --}}
</x-app-layout>
