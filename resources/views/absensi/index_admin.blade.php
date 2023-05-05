<x-app-layout>
				<x-slot name="header">
								<h2 class="font-semibold text-xl text-gray-800 leading-tight">
												{{ __('Absensi Admin') }}
								</h2>
				</x-slot>

				<div class="container mx-auto p-4 w-full pb-16">
								<div x-data="{ isAdd: false }">
												<div class="flex justify-end py-6">
																<div @click="isAdd = !isAdd"
																				class="bg-gray-800 text-white py-2 px-4 text-sm rounded-md shadow-lg hover:bg-gray-700 duration-200">
																				<i class="fa-solid fa-plus"></i>
																				<span>Add Absensi</span>
																</div>
																<x-modal-add />
												</div>
								</div>

								@foreach ($absensi as $tanggal => $absen)
												<div x-data="{ open: false }"
																class="grid py-4 border-gray-700 shadow-xl rounded-lg border px-4 max-w-sm sm:max-w-full mb-4">
																<div class="grid grid-cols-3 py-2">
																				<div class="col-span-1 flex items-center justify-start">{{ $tanggal }}</div>
																				<div class="col-span-1 flex items-center justify-start">Pertemuan 1</div>
																				<div class="col-span-1 text-end grid gap-2 sm:flex sm:justify-end items-center sm:gap-2">
																								<button @click="open = !open"
																												class="bg-green-600 py-1 px-2 text-white text-sm rounded hover:bg-green-500 duration-200">
																												<i class="fa-solid fa-eye"></i>
																												<span>View</span>
																								</button>
																				</div>
																</div>
																<div class="cols-span-full grid grid-cols-12 w-full pt-3" x-transition x-show="open">
																				<div class="col-start-1 col-end-4 font-bold">User</div>
																				<div class="col-start-5 col-end-7 font-bold sm:text-center text-start">Status</div>
																				<div class="col-start-8 col-end-13 font-bold text-center">Action</div>
																				@foreach ($absen as $absen)
																								@if ($absen->user->level !== '3')
																												<div class="col-start-1 col-end-4 py-2">{{ $absen->user->name }}</div>
																												@if ($absen->status == null)
																																<div class="col-start-5 col-end-7 text-red-500 sm:text-center text-start py-2">No
																																				Attendance Yet</div>
																												@else
																																<div class="col-start-5 col-end-7 text-green capitalize sm:text-center text-start py-2">
																																				{{ $absen->status }}</div>
																												@endif
																												<div class="col-start-8 col-end-13 font-semibold text-center py-2">
																																<form class="sm:flex justify-center grid gap-1"
																																				action="{{ route('absensi.update', $absen->id) }}" method="post">
																																				@csrf
																																				@method('PATCH')
																																				<select name="status" id="status" class="rounded border border-gray-800"
																																								required>
																																								<option value="hadir" {{ $absen->status == 'hadir' ? 'selected' : '' }}>Hadir
																																								</option>
																																								<option value="izin" {{ $absen->status == 'izin' ? 'selected' : '' }}>Izin
																																								</option>
																																								<option value="telat" {{ $absen->status == 'telat' ? 'selected' : '' }}>Telat
																																								</option>
																																				</select>
																																				<div class="">
																																								<button type="submit"
																																												class="bg-gray-800 text-white py-2 px-4 rounded-md hover:bg-gray-600 duration-300">
																																												<i class="fa-solid fa-paper-plane"></i>
																																												<span>Kirim</span>
																																								</button>
																																				</div>
																																</form>
																												</div>
																								@endif
																				@endforeach
																</div>
												</div>
								@endforeach
				</div>
</x-app-layout>
