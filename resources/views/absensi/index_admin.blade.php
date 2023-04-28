<x-app-layout>
				<x-slot name="header">
								<h2 class="font-semibold text-xl text-gray-800 leading-tight uppercase">
												{{ __('Absensi Admin') }}
								</h2>
				</x-slot>

				<div class="container mx-auto p-4 w-full ">
								<div x-data={open:false}>
												<div class="flex justify-end py-6">
																<div @click="open = true"
																				class="bg-gray-800 text-white py-2 px-4 text-sm rounded-md shadow-lg hover:bg-gray-700 duration-200">
																				Add
																				Absensi
																</div>
												</div>
												<x-modal-add />
								</div>
								<div x-data="{ open: false }" class="grid py-4 border-gray-800 border-t border-b px-4 max-w-sm sm:max-w-full">
												@foreach ($absensi as $absen)
																<div class="grid grid-cols-2 py-2">
																				<div class="col-span-1 text-start">{{ $absen->absensi->tanggal }}</div>
																				<div class="col-span-1 text-end">
																								<a @click="open = !open" href="#"
																												class="bg-green-500 py-2 px-4 text-white text-sm rounded hover:bg-green-600 duration-200">View</a>
																				</div>
																</div>
																{{ $absen->id }}
																<div class="cols-span-full grid grid-cols-12 w-full py-2" x-transition x-show="open">
																				<div class="col-start-1 col-end-4">{{ $absen->user->name }}</div>
																				@if ($absen->status !== null)
																								<form action="{{ route('absensi.update', $absen->id) }}" method="post">
																												@csrf
																												@method('PATCH')
																												<select name="status" id="status" class="rounded border border-gray-800" required>
																																<option value="hadir" {{ $absen->status == 'hadir' ? 'selected' : '' }}>Hadir</option>
																																<option value="izin" {{ $absen->status == 'izin' ? 'selected' : '' }}>Izin</option>
																																<option value="telat" {{ $absen->status == 'telat' ? 'selected' : '' }}>Telat</option>
																												</select>
																												</td>
																												<td>

																																<div class="py-4 grid place">
																																				<button type="submit"
																																								class="bg-gray-800 text-white py-2 px-4 rounded-md hover:bg-gray-600 duration-300">Kirim</button>
																																</div>
																												</td>
																								</form>
																				@else
																								<div class="col-start-5 col-end-7 text-rose-500">No Attendance Yet</div>
																				@endif
																</div>
												@endforeach
								</div>
				</div>
</x-app-layout>
