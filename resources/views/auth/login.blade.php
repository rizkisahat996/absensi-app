<x-guest-layout>
  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />
  <form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
    <div>
      <div class="flex justify-center">
        <img src="{{ asset("image/login.png") }}" alt="">
      </div>
      <div class="text-lg text-center uppercase font-semibold">Login Form</div>
      <div class="border border-gray-800 mx-10 my-5"></div>

      <div class="text-sm font-semibold text-gray-700">
        <i class="fa-solid fa-envelope"></i>
        <span>Email</span>
      </div>
      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="JohnDoe@gmail.com" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <div class="text-sm font-semibold text-gray-700">
        <i class="fa-solid fa-lock"></i>
        <span>Password</span>
      </div>
      <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="********" />
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
      <label for="remember_me" class="inline-flex items-center">
        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
      </label>
    </div>

    <div class="flex items-center justify-end mt-4">
      @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
          {{ __('Forgot your password?') }}
        </a>
      @endif

      <x-primary-button class="ml-3">
        <i class="fa-solid fa-user"></i>
        <span>{{ __('Log In') }}</span>
      </x-primary-button>
    </div>

    <div class="flex items-center justify-center text-sm gap-1 py-4">
      Don't Have an Account?
      <a class="hover:text-gray-500 duration-300 font-semibold italic" href="{{ route('register') }}">Register Here!</a>
    </div>
  </form>
</x-guest-layout>
