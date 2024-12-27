<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 hidden">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        {{--                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" /> --}}
                        <img src="{{ asset('images/club_logo_2.png') }}" width="47" height="66" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('invoices')" :active="request()->routeIs('invoices')">
                        {{ __('Invoices') }}
                    </x-nav-link>
                    <x-nav-link :href="route('fees')" :active="request()->routeIs('fees')">
                        {{ __('Club Fees') }}
                    </x-nav-link>
                    <x-nav-link :href="route('members')" :active="request()->routeIs('members')">
                        {{ __('Club Members') }}
                    </x-nav-link>
                    <x-nav-link :href="route('notice-board')" :active="request()->routeIs('notice-board')">
                        {{ __('Notice Board') }}
                    </x-nav-link>
                    <x-nav-link :href="route('docs')" :active="request()->routeIs('docs')">
                        {{ __('Document Center') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- New navigation bar code -->
    <div class="relative z-10 mx-[30px] lg:mx-[60px] pt-10 sm:pt-2">
        <div class="flex items-center flex-wrap gap-4 lg:gap-4">
            <div class="hidden sm:block"><img src='/images/club_logo_2.png' height='76px' width='53px' /></div>
            <div class="main-user-pic-65 block sm:hidden"
                style="background-image: url({{ Auth::user()->membership->profile_photo != null ? 'storage/' . Auth::user()->membership->profile_photo : 'images/profile.png' }});">
            </div>
            <div class="flex-grow hidden md:flex justify-start ml-10">
                <div class="flex gap-4 md:gap-[50px]  text-white">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('invoices')" :active="request()->routeIs('invoices')">
                        {{ __('Invoices') }}
                    </x-nav-link>
                    <x-nav-link :href="route('fees')" :active="request()->routeIs('fees')">
                        {{ __('Club Fees') }}
                    </x-nav-link>
                    <x-nav-link :href="route('members')" :active="request()->routeIs('members')">
                        {{ __('Club Members') }}
                    </x-nav-link>
                    <x-nav-link :href="route('notice-board')" :active="request()->routeIs('notice-board')">
                        {{ __('Notice Board') }}
                    </x-nav-link>
                    <x-nav-link :href="route('docs')" :active="request()->routeIs('docs')">
                        {{ __('Document Center') }}
                    </x-nav-link>
                </div>
            </div>
            <div class="flex gap-[20px] items-center flex-grow justify-end">
                <div><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M21.5303 14.4697L19.5 12.4395V9.75C19.4977 7.89138 18.8063 6.09964 17.5595 4.72124C16.3127 3.34284 14.5991 2.4757 12.75 2.2875V0.75H11.25V2.2875C9.40093 2.4757 7.68732 3.34284 6.44053 4.72124C5.19373 6.09964 4.50233 7.89138 4.5 9.75V12.4395L2.46975 14.4697C2.32909 14.6104 2.25004 14.8011 2.25 15V17.25C2.25 17.4489 2.32902 17.6397 2.46967 17.7803C2.61032 17.921 2.80109 18 3 18H8.25V18.5828C8.23335 19.5343 8.5686 20.4585 9.19145 21.1781C9.81429 21.8977 10.6809 22.362 11.625 22.482C12.1464 22.5337 12.6728 22.4757 13.1704 22.3117C13.6681 22.1478 14.1259 21.8815 14.5144 21.53C14.9029 21.1785 15.2136 20.7495 15.4264 20.2707C15.6392 19.792 15.7494 19.2739 15.75 18.75V18H21C21.1989 18 21.3897 17.921 21.5303 17.7803C21.671 17.6397 21.75 17.4489 21.75 17.25V15C21.75 14.8011 21.6709 14.6104 21.5303 14.4697ZM14.25 18.75C14.25 19.3467 14.0129 19.919 13.591 20.341C13.169 20.7629 12.5967 21 12 21C11.4033 21 10.831 20.7629 10.409 20.341C9.98705 19.919 9.75 19.3467 9.75 18.75V18H14.25V18.75ZM20.25 16.5H3.75V15.3105L5.78025 13.2803C5.92091 13.1396 5.99996 12.9489 6 12.75V9.75C6 8.1587 6.63214 6.63258 7.75736 5.50736C8.88258 4.38214 10.4087 3.75 12 3.75C13.5913 3.75 15.1174 4.38214 16.2426 5.50736C17.3679 6.63258 18 8.1587 18 9.75V12.75C18 12.9489 18.0791 13.1396 18.2197 13.2803L20.25 15.3105V16.5Z"
                            fill="white" />
                    </svg>
                </div>
                <div class="flex gap-[20px] items-center">
                    <div class="main-user-pic hidden sm:block"
                        style="background-image: url({{ Auth::user()->membership->profile_photo != null ? 'storage/' . Auth::user()->membership->profile_photo : 'images/profile.png' }});">
                    </div>
                    <div class="hidden sm:flex sm:flex-col sm:justify-center gap-1 ">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md dark:text-gray-400 bg-transparent dark:bg-gray-800 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150 fill-white hover:text-gray-400 hover:fill-gray-400 text-white">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 10L12 15L17 10H7Z" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">

                                    <div class="flex items-center gap-2"> <img src="images/icons/gear.svg" />
                                        {{ __('Profile') }}</div>
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        <div class="flex items-center gap-2"> <img src="images/icons/logout.svg" />
                                            {{ __('Log Out') }}</div>
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                        <div class="pill-success-inverted self-start text-[12px]">Member</div>
                    </div>
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'fixed': open, 'hidden': !open }"
        class="hidden sm:hidden bg-white z-50 w-[80%] top-0 right-0 min-h-full pt-2">
        <div class="flex flex-col min-h-full">
            <div class="flex mx-6">
                <div class="flex-grow"><img src='/images/club_logo_2.png' height='76px' width='53px' /></div>
                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-black dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="pt-10 pb-3 space-y-1 flex-grow">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <hr />
                <x-responsive-nav-link :href="route('invoices')" :active="request()->routeIs('invoices')">
                    {{ __('Invoices') }}
                </x-responsive-nav-link>
                <hr />
                <x-responsive-nav-link :href="route('fees')" :active="request()->routeIs('fees')">
                    {{ __('Club Fees') }}
                </x-responsive-nav-link>
                <hr />
                <x-responsive-nav-link :href="route('members')" :active="request()->routeIs('members')">
                    {{ __('Club Members') }}
                </x-responsive-nav-link>
                <hr />
                <x-responsive-nav-link :href="route('notice-board')" :active="request()->routeIs('notice-board')">
                    {{ __('Notice Board') }}
                </x-responsive-nav-link>
                <hr />
                <x-responsive-nav-link :href="route('docs')" :active="request()->routeIs('docs')">
                    {{ __('Document Center') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 dark:border-gray-600">
                {{-- <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div> --}}

                <div class="mt-3 space-y-1">
                    <div class="flex items-center ml-6">
                        <img class="mr-[-16px]" src="images/icons/gear.svg" />
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>
                    </div>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <div class="flex items-center ml-6">
                            <img class="mr-[-16px]" src="images/icons/logout.svg" /> <x-responsive-nav-link
                                :href="route('logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
