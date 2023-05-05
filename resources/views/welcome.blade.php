<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Absensi App</title>
  <link rel="icon" href="{{ asset('ic/ic.png') }}">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/cf4dce0a52.js" crossorigin="anonymous"></script>

  <!-- Styles -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-gray-900">
  @if (Route::has('login'))
    @auth
    <div class="grid place-content-center min-h-screen text-center text-white text-2xl ">
      <img src="{{ asset("image/backto.png") }}" alt="welcome2">
      <span>Please Back to </span>
      <a href="{{ url('/dashboard') }}" class="font-semibold text-xl text-gray-400 hover:text-white animate-pulse">Dashboard</a>
    </div>
    @else
      <div class="container mx-auto grid place-content-center min-h-screen">
        <div class="flex justify-center">
          <img src="{{ asset("image/welcome.png") }}" alt="welcomce" srcset="">
        </div>
        <div class="text-center text-2xl sm:text-4xl text-white font-thin">Welcome to Absensi App</div>
        <div class="text-center  text-white font-thin mb-10">Please Login or Register to see more future</div>
        <div class="flex justify-center">
          <a href="{{ route('login') }}" class="bg-white py-2 px-4 rounded-lg hover:bg-white/50 duration-200">
            <i class="fa-solid fa-user"></i>
            <span>Log In</span>
          </a>
          @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 bg-white py-2 px-4 rounded-lg hover:bg-white/50 duration-200">
              <i class="fa-solid fa-user-plus"></i>
              <span>Register</span>
            </a>
          @endif
        </div>
      </div>
    @endauth
  @endif
</body>

</html>
