<x-guest-layout>
  <form method="POST" action="{{ route('register') }}">
    @csrf
    <!-- Image Register -->
    <div class="img-register">
      <div class="flex justify-center">
        <img src="{{ asset("image/register.png") }}" alt="register">
      </div>
      <div class="text-center font-semibold text-lg uppercase p-2">registration form</div>
      <div class="border border-gray-800 my-5 mx-3"></div>
    </div>

    <!-- Name -->
    <div>
      <div class="text-sm font-semibold text-gray-700">
        <i class="fa-solid fa-user"></i>
        <span>Name</span>
      </div>
      <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="John Doe" />
      <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
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
      <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="********" />
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
      <div class="text-sm font-semibold text-gray-700">
        <i class="fa-solid fa-check"></i>
        <span>Confirm Password</span>
      </div>
      <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="********" />
      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>
    <div class="flex items-center justify-end pt-6 py-4">
      <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
        {{ __('Already registered?') }}
      </a>
      <x-primary-button class="ml-4">
        <i class="fa-solid fa-user-plus mr-1"></i>
        {{ __('Submit') }}
      </x-primary-button>
    </div>
  </form>
</x-guest-layout>
