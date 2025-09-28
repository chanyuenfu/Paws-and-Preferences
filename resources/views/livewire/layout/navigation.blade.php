<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }"
    class="sm:sticky top-0 left-0 right-0 w-full bg-gradient-to-b from-black/90 to-black/0 pt-2/">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex w-full">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" wire:navigate>
                        <svg id="Layer_1" data-name="Layer 1" class="w-10 h-10 text-black"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <title>pawprint4-glyph</title>
                            <path
                                d="M59,325.39c5.93,21.09-2,41.76-17.77,46.22S7.91,362.57,2,341.47s2-41.78,17.77-46.22S53.08,304.28,59,325.39Z"
                                fill="#ffffff" />
                            <path
                                d="M98.72,257c5.83,20.66-1.74,40.84-16.9,45.15s-32.19-9-38-29.65,1.77-40.83,16.93-45.13S92.89,236.42,98.72,257Z"
                                fill="#ffffff" />
                            <path
                                d="M168.85,245.89c5.93,21.09-1.37,41.62-16.35,45.84s-31.9-9.47-37.89-30.53S116,219.61,131,215.36,162.89,224.81,168.85,245.89Z"
                                fill="#ffffff" />
                            <path
                                d="M236.9,291.43c5.62,20-2.56,39.76-18.27,44.19s-33-8.16-38.68-28.11,2.53-39.76,18.27-44.2S231.26,271.46,236.9,291.43Z"
                                fill="#ffffff" />
                            <path
                                d="M97.58,447.24s-49,15-46.33-48A179.93,179.93,0,0,1,76.65,357.8s13.58-21.75,16-29.58c0,0,16.19-41.5,53.79-11.57,0,0,31.56,30.39,43.66,33.64,0,0,41.05,25,20.67,62.26,0,0-20,22.66-38,13C172.78,425.54,128.33,405.36,97.58,447.24Z"
                                fill="#ffffff" />
                            <path
                                d="M336.91,150.43c-4.11,21.52-20.49,36.48-36.6,33.38s-25.73-23-21.62-44.53,20.49-36.45,36.57-33.37S341,128.92,336.91,150.43Z"
                                fill="#ffffff" />
                            <path
                                d="M403,107.1c-4,21.08-19.85,35.75-35.33,32.79S342.9,117.44,347,96.37s19.83-35.75,35.3-32.8S407,86,403,107.1Z"
                                fill="#ffffff" />
                            <path
                                d="M470.7,128.54c-4.14,21.5-19.85,36.57-35.15,33.64s-24.31-22.74-20.17-44.24,19.83-36.61,35.12-33.68S474.81,107,470.7,128.54Z"
                                fill="#ffffff" />
                            <path
                                d="M511.15,199.67c-3.9,20.41-20,34.42-36.12,31.36S449.13,209,453,188.56s20.09-34.39,36.15-31.32S515,179.32,511.15,199.67Z"
                                fill="#ffffff" />
                            <path
                                d="M316.82,276.66s-50.47-8.48-19.93-63.65a179.79,179.79,0,0,1,41.26-25.71S360,173.94,365.73,168c0,0,33-29.85,53.29,13.74,0,0,14.61,41.32,24,49.65,0,0,25.5,40.75-9.39,64.93,0,0-28.05,11.3-39.84-5.4C393.79,290.92,363,253,316.82,276.66Z"
                                fill="#ffffff" />
                        </svg>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 md:flex">
                    <x-nav-link class="text-xl font-bold text-white hover:text-white/95" :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link class="text-xl font-bold text-white hover:text-white/95" :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Cat') }}
                    </x-nav-link>
                    <x-nav-link class="text-xl font-bold text-white hover:text-white/95" :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Test') }}
                    </x-nav-link>
                </div>

                <!-- Actions -->
                <div class="ml-auto items-center hidden lg:flex">
                    <button class="font-bold text-white text-xl">
                        Test
                    </button>
                </div>

            </div>
            <!-- Hamburger -->
            <div class="-me-2 flex items-center md:hidden">
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

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">

        <!-- Responsive Settings Options -->
        <div class="mt-3 space-y-1 flex flex-col gap-5 p-2 pt-2 pb-3">
            <x-nav-link class="text-xl font-bold text-white hover:text-white/95" :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link class="text-xl font-bold text-white hover:text-white/95" :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Cat') }}
                    </x-nav-link>
                    <x-nav-link class="text-xl font-bold text-white hover:text-white/95" :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Test') }}
                    </x-nav-link>
        </div>
    </div>
</nav>
