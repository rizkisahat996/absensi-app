<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl border border-gray-300 overflow-hidden rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>Hello {{ Auth::user()->name }}...</div>
                    {{ __(" Welcome to Dashboard Absensi App..") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
