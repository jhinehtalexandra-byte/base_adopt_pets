<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('css/welcomedash.css') }}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="welcome">
        <x-welcome />
    </div>

</x-app-layout>