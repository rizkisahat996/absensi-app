<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-20 sm:py-32 px-4">
    <div class="grid grid-cols-2">
      <div class="col-span-full sm:col-span-1 flex justify-center sm:justify-end items-center">
        <img src="{{ asset('image/dashboard.png') }}" alt="">
      </div>
      <div class="col-span-full sm:col-span-1 flex px-5 justify-center items-center">
        <div>
          <span class="font-semibold">Hello {{ Auth::user()->name }}...</span>
          <div>Welcome to the Absensi App please click the button below to go to absensi page</div>
          @if (Auth::user()->level == 3)
          <a href="{{ route('absensi.index_admin') }}">
            <button class="bg-blue-500 text-white px-2 py-1 my-2 rounded shadow-xl hover:bg-blue-400 duration-200">Click Here!</button>
          </a>
          @else
          <a href="{{ route('absensi.index') }}">
            <button class="bg-blue-500 text-white px-2 py-1 my-2 rounded shadow-xl hover:bg-blue-400 duration-200">Click Here!</button>
          </a>
          @endif
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

{{-- @if (Auth::user()->level == 3)
																								<x-nav-link :href="route('absensi.index_admin')" :active="request()->routeIs('absensi.index_admin')">
																												{{ __('Absensi') }}
																								</x-nav-link>
																				@else
																								<x-nav-link :href="route('absensi.index')" :active="request()->routeIs('absensi.index')">
																												{{ __('Absensi') }}
																								</x-nav-link>
																				@endif --}}
