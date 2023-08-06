<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Club Members') }}
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-wrap -m-4">
            @foreach($members as $member)
                <div class="p-4 md:w-1/4">
                    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow ">
                        <div class="flex flex-col items-center py-5">
                            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ $member->profile_photo != null ?  'storage/'.$member->profile_photo : 'images/profile.png'}}" alt="Bonnie image"/>
                            <h5 class="mb-1 text-l font-medium text-gray-900 ">{{$member->user->name}}</h5>
                            <span class="text-sm text-gray-500 ">Player Handicap {{$member->player_handicap}}</span>
                        </div>
                    </div>
                </div>


            @endforeach
            </div>
        </div>
    </section>

    <script src="https://cdn.tailwindcss.com"></script>

{{--    <link rel="stylesheet" href="https://horizon-tailwind-react-git-tailwind-components-horizon-ui.vercel.app/static/css/main.ad49aa9b.css" />--}}
</x-app-layout>

