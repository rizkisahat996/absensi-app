<!DOCTYPE html>
<html lang="en">

<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta name="csrf-token" content="{{ csrf_token() }}">
				<title>{{ config('app.name', 'Absensi App') }}</title>

				<!-- Fonts -->
				<link rel="preconnect" href="https://fonts.bunny.net">
				<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
				<script src="https://kit.fontawesome.com/cf4dce0a52.js" crossorigin="anonymous"></script>
				<!-- Scripts -->
				@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
				class="bg-gradient-to-br from-[#510A32] from-10% via-[#C72C41] via-30% to-[#C72C41] to-90% min-h-screen min-w-full">
				<div id="desktop-view" class="min-h-screen min-w-full bg-center bg-cover md:flex hidden"
								style="background-image: url('{{ asset('/image/bg-2.png') }}')">
								<div
												class="grid place-content-center min-h-screen min-w-full md:flex md:flex-col md:justify-center md:items-center md:px-12 md:py-12">
												<div class="mb-4 w-full md:max-w-sm text-center">
																<div class="bg-white border-2 border-[#510A32] py-2 rounded-sm">
																				<div class="font-semibold">Location</div>
																				<div class="text-5xl">12:12</div>
																				<div class="font-semibold">12 September 2022</div>
																</div>
												</div>
												<div class="grid grid-cols-2 border border-[#510A32] rounded-lg w-full md:max-w-5xl">
																<div class="col-span-1 bg-[#C72C41] w-full p-4 rounded-l-lg px-20 py-10 grid place-content-center">
																				<div class="flex justify-center items-center mb-6">
																								<img src="{{ asset('image/desktop.png') }}" alt="">
																				</div>
																				<div class="text-white">
																								<div class="text-2xl">Welcome To Absensi App</div>
																								<div class="">Silahkan masukan data diri dan tanda tangan untuk mengisi absen...</div>
																				</div>
																</div>
																<div class="col-span-1 bg-white p-4 bg-opacity-30 rounded-r-lg px-16 py-8">
																				<div class="text-3xl text-center py-4 font-semibold text-white">Form Absensi</div>
																				<form action="">
																								<div class="mb-3">
																												<label class="block text-white text-sm" for="">
																																<i class="fa-solid fa-user"></i>
																																<span>Nama Lengkap</span>
																												</label>
																												<input class="rounded-md border-2 border-[#510A32] text-[#510A32] w-full shadow-xl"
																																type="text" placeholder="John Doe">
																								</div>
																								<div class="mb-3">
																												<label class="block text-white text-sm" for="">
																																<i class="fa-solid fa-envelope"></i>
																																<span>Email</span>
																												</label>
																												<input class="rounded-md border-2 border-[#510A32] text-[#510A32] w-full shadow-xl"
																																type="text" placeholder="JohnDoe@gmail.com">
																								</div>
																								<div class="mb-3">
																												<label class="block text-white" for="">
																																<i class="fa-solid fa-building"></i>
																																<span>Skema</span>
																												</label>
																												<input class="rounded-md border-2 border-[#510A32] text-[#510A32] w-full shadow-xl"
																																type="text">
																								</div>
																								<div class="mb-3">
																												<label class="block text-white" for="">
																																<i class="fa-solid fa-signature"></i>
																																<span>Tanda Tangan</span>
																												</label>
																												<canvas
																																class="bg-white w-full h-32 border-2 border-[#510A32] shadow-xl rounded-md"></canvas>
																												{{-- <input class="rounded-md border-2 border-[#510A32] text-[#510A32] w-full shadow-xl"
																																type="text"> --}}
																												<button
																																class="bg-white mt-2 py-1 px-2 text-sm rounded-md border-2 border-[#510A32] hover:bg-white/10 duration-200 hover:text-white">Reset</button>
																								</div>
																								<div class="flex justify-end items-center">
																												<button
																																class="bg-[#510A32] text-white py-2 px-4 rounded-lg hover:bg-[#510A32]/80 duration-200 shadow-lg">Submit</button>
																								</div>
																				</form>
																</div>
												</div>
								</div>
				</div>

				<div id="mobile-view" class="min-h-screen min-w-full bg-center bg-cover md:hidden flex"
								style="background-image: url('{{ asset('/image/bg-2.png') }}')">
								<div>HALO</div>
				</div>

</body>

</html>