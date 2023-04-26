<x-app-layout>
				<x-slot name="header">
								<h2 class="font-semibold text-xl text-gray-800 leading-tight">
												{{ __('Absensi Admin') }}
								</h2>
				</x-slot>

				<div class="container mx-auto p-4 w-full ">
								<div x-data="{ open: false }">
												<div class="flex justify-end py-6">
																<div @click="open = !open"
																				class="bg-gray-800 text-white py-2 px-4 text-sm rounded-md shadow-lg hover:bg-gray-700 duration-200">
																				Add
																				Absensi
																</div>
												</div>
												<div class="flex justify-end" x-show="open">
                                                    <form action="{{ route('absensi.store') }}" method="post">
                                                        @csrf
                                                        <label for="tanggal" class="block">Tanggal:</label>
                                                        <input type="date" name="tanggal" id="tanggal" class="w-full rounded border border-gray-800" required>
                                                        <label for="keterangan" class="block">Keterangan:</label>
                                                        <textarea name="keterangan" id="keterangan" class="w-full rounded border border-gray-800"></textarea>
                                                        <div class="py-4 grid place">
                                                            <button type="submit" class="bg-gray-800 text-white py-2 px-4 rounded-md hover:bg-gray-600 duration-300">Kirim</button>
                                                          </div>
                                                    </form>
                                                </div>
								</div>
								<div x-data="{ open: false }" class="grid py-4 border-gray-800 border-t border-b px-4 max-w-sm sm:max-w-full">
												<div class="grid grid-cols-2 py-2">
																<div class="col-span-1 text-start">12/12/2012</div>
																<div class="col-span-1 text-end">
																				<a @click="open = !open" href="#"
																								class="bg-green-500 py-2 px-4 text-white text-sm rounded hover:bg-green-600 duration-200">View</a>
																</div>
												</div>
												<div class="cols-span-full grid grid-cols-12 w-full py-2" x-transition x-show="open">
																<div class="col-start-1 col-end-4 font-semibold">User</div>
																<div class="col-start-5 col-end-7 font-semibold">Status</div>
																<div class="col-start-8 col-end-13 text-center font-semibold">Keterangan</div>
																{{-- @foreach ($absensi as $absen)
																				<div class="col-start-1 col-end-4">{{ $absen->user->name }}</div>
																				<div class="col-start-5 col-end-7">{{ $absen->status }}</div>
																				<div class="col-start-8 col-end-13 text-center">{{ $absen->keterangan }}</div>
																@endforeach --}}
												</div>
								</div>
				</div>
</x-app-layout>
