<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <script src="https://hammerjs.github.io/dist/hammer.min.js"></script>
    <script defer src="//unpkg.com/alpinejs"></script>

    <div class="relative min-h-screen flex flex-col">
        @include('livewire.layout.navigation')
        <div class="h-screen items-center grid">
            <livewire:swiper.swiper />
        </div>
    </div>
</x-app-layout>
