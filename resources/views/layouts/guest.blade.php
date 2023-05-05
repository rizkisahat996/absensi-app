<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/cf4dce0a52.js" crossorigin="anonymous"></script>

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-800 antialiased">
  <div class="min-h-screen grid place-content-center sm:flex flex-col sm:justify-center items-center px-5 sm:px-0 sm:pt-0 bg-gray-900">
    <div class="w-full sm:max-w-md sm:px-6 px-10 py-4 mt-8 mb-8 bg-white border-gray-800 text-gray-900 shadow-xl overflow-hidden sm:rounded-lg rounded-lg border">
      {{ $slot }}
    </div>
  </div>
</body>

</html>
