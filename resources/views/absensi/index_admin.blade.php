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
								<div x-data="{ open: false}" class="py-4 px-4 w-full border border-gray-800 rounded-md">
                  @foreach($absensi as $absen)
                  <div class="grid grid-cols-2 w-full">
                    <div class="col-span-1 text-start">{{ $absen->absensi->tanggal }}</div>
                    <div class="col-span-1 text-center flex place-content-end duration-200">
                      <div x-on:click=" open = !open" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 text-sm rounded-lg">View</div>
                    </div>

                    <div x-show="open" class="col-span-full grid grid-cols-12 w-full">
                      <div class="col-start-1 text-center font-semibold">Id</div>
                      <div class="col-start-2 col-end-6 text-center font-semibold">Name</div>
                      <div class="col-start-7 col-end-10 text-center font-semibold">status</div>
                      <div class="col-start-11 col-end-12 text-center font-semibold">Action</div>

                      <div class="col-start-1 text-center">{{ $absen->id }}</div>
                      <div class="col-start-2 col-end-6 text-center">{{ $absen->user->name }}</div>
                      <div class="col-start-7 col-end-10 text-center">status</div>
                      <div class="col-start-11 col-end-12 text-center">Action</div>
                    </div>
                  </div>
                  @endforeach
                  {{-- @foreach ($absensi as $absen)
																<div class="grid grid-cols-2 py-2">
																				<div class="col-span-1 text-start">{{ $absen->absensi->tanggal }}</div>
																				<div class="col-span-1 text-end">
																								<a @click="open = !open" href="#"
																												class="bg-green-500 py-2 px-4 text-white text-sm rounded hover:bg-green-600 duration-200">View</a>
																				</div>
																</div>
																<div class="cols-span-full w-full py-2" x-transition x-show="open">
                                  <table class="w-full">
                                    <thead class="border-b border-gray-800 py-2">
                                      <th>Id</th>
                                      <th>Name</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </thead>
                                    <tbody class="py-2">
                                      <td class="text-center ">
                                        {{ $absen->id }}
                                      </td>
                                      <td class="text-center">{{ $absen->user->name }}</td>
                                      <td class="text-center">
                                        @if ($absen->status != null)
                                        <form action="{{ route('absensi.update', $absen->id) }}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" id="status" class="rounded border border-gray-800" required>
                                                        <option value="hadir" {{ $absen->status == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                                        <option value="izin" {{ $absen->status == 'izin' ? 'selected' : '' }}>Izin</option>
                                                        <option value="telat" {{ $absen->status == 'telat' ? 'selected' : '' }}>Telat</option>
                                                </select>
                                              </td>
                                            </form>
                                            @else
                                            <div class="text-rose-500">No Attendance Yet</div>
                                            @endif
                                          </td>
                                          <td class="text-center">
                                            <button type="submit" class="bg-gray-800 text-white py-2 px-4 rounded-md hover:bg-gray-600 duration-300">Kirim</button>
                                          </td>
                                    </tbody>
                                  </table>
																</div>
                                @endforeach --}}
								</div>
				</div>
</x-app-layout>
