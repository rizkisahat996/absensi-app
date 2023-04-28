<x-app-layout>
				<x-slot name="header">
								<h2 class="font-semibold text-xl text-gray-800 leading-tight uppercase">
												{{ __('Absensi') }}
								</h2>
				</x-slot>
				<div class="container mx-auto py-4 px-1">
								<div class="py-4 px-4 bg-white border border-gray-800 rounded-lg mt-8 shadow-2xl w-full">
												<div class="text-center font-semibold py-4 uppercase text-lg">Daftar Absensi</div>
												<table class="table-striped gap-4 w-full">
																<thead class="border-b border-gray-800">
																				<tr class="">
																								<th class="p-2">Tanggal</th>
																								<th class="p-2">Keterangan</th>
																								<th class="p-2">Status</th>
																								<th class="p-2">Aksi</th>
																				</tr>
																</thead>
																<tbody>
																				@foreach ($absensi as $absen)
																								<tr>
																												<td class="p-2 text-center">{{ $absen->tanggal }}</td>
																												<td class="p-2 text-center">{{ $absen->keterangan }}</td>
																												<td class="p-2 text-center">
																																<form action="{{ route('absensi.update_user', $absen->absensi_id) }}" method="post">
																																				@csrf
																																				@method('PATCH')
																																				@if ($absen->status)
																																								<div class="text-center capitalize">{{ $absen->status }}</div>
																																				@else
																																								<select name="status" id="status" class="rounded border border-gray-800"
																																												required>
																																												<option value="hadir">Hadir</option>
																																												<option value="izin">Izin</option>
																																												<option value="telat">Telat</option>
																																								</select>
																																				@endif
																												</td>
																												<td>
																																<div class="py-4 grid place">
																																				@if ($absen->status ? 'disabled' : '')
																																								<div class="text-center text-blue-600">submitted</div>
																																				@else
																																								<button type="submit"
																																												class="bg-gray-800 text-white py-2 px-4 rounded-md hover:bg-gray-600 duration-300">Kirim</button>
																																				@endif
																																</div>
																												</td>
																												</form>
																								</tr>
																				@endforeach
																</tbody>
												</table>
								</div>
				</div>
</x-app-layout>
