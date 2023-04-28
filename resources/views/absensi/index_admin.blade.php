<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight uppercase">
      {{ __('Absensi Admin') }}
    </h2>
  </x-slot>

  <div class="container pb-6 pt-6 px-1 sm:px-6">

    <!-- Add Absensi -->
    <div x-data="{ isAdd:false }" class="flex justify-end">
      <div @click="isAdd = true" class="bg-gray-800 text-white py-2 px-4 text-sm rounded-md shadow-lg hover:bg-gray-700 duration-200">
        <i class="fa-solid fa-plus"></i>
        <span>{{ __('Add Absensi') }}</span>
      </div>
      <x-modal-add />
    </div>

    <div class="w-full my-6 sm:my-8">
      <!-- Absensi -->
      @foreach ($absensi as $absen)
      <div class="grid grid-cols-3 sm:px-10 px-1 border border-gray-400 rounded-lg shadow-lg py-2 mb-2">
        <div class="col-span-1 grid items-center justify-start">{{ $absen->absensi->tanggal }}</div>
        <div class="col-span-1 grid items-center justify-center">{{ $absen->keterangan }}</div>
        <div class="col-span-1 justify-end flex">

          <!-- Modal View & Modal Update -->
          <div x-data="{ isView : false }">
            <button @click="isView = true" class="bg-green-500 py-1 px-2 rounded-lg text-white hover:bg-green-400 shadow-md duration-200">
              <i class="fa-solid fa-eye"></i>
              <span>View</span>
            </button>
            <div class="fixed z-10 inset-0 overflow-y-auto min-h-screen bg-gray-900/60 w-full" x-transition x-show="isView">
              <div class="grid place-content-center min-h-screen sm:flex sm:flex-col sm:justify-center sm:items-center">
                <div class="bg-white rounded shadow-xl w-full sm:max-w-2xl text-gray-800">
                  <div class="grid grid-col-3 bg-gray-800 text-white py-2 px-4 rounded-t">
                    <div class="col-start-2 text-center">View Absensi</div>
                    <div @click="isView = false" class="col-start-3 text-end">
                      <i class="fa-solid fa-x"></i>
                    </div>
                  </div>
                  <form class="py-4 px-4 w-full" action="{{ route('absensi.update', $absen->id) }}" method="post">
                    @csrf
                    <table class="w-full">
                      <thead class="px-4">
                        <th>Id</th>
                        <th class="px-4">Name</th>
                        <th class="px-3">Status</th>
                        <th class="text-center px-6">Action</th>
                      </thead>
                      <tbody>
                        <td class="text-center">{{ $absen->user->id }}</td>
                        <td class="text-center">{{ $absen->user->name }}</td>
                        <td class="text-center">
                        @if ($absen->status != null)
                          <div class="capitalize">{{ $absen->status }}</div>
                        @else
                          <div class="text-rose-500">No Attendance Yet</div>
                        @endif
                        </td>
                        <td class="text-center sm:flex sm:justify-center sm:items-center grid">
                          @if ($absen->status == null)
                          <form class="text-sm" action="{{ route('absensi.update', $absen->id) }}" method="post">
                              @csrf
                              @method('PATCH')
                              <select name="status" id="status" class="rounded border border-gray-800 py-1" required>
                                <option value="hadir" {{ $absen->status == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                <option value="izin" {{ $absen->status == 'izin' ? 'selected' : '' }}>Izin</option>
                                <option value="telat" {{ $absen->status == 'telat' ? 'selected' : '' }}>Telat</option>
                              </select>
                              <button type="submit" class="bg-gray-800 text-white py-1 px-2 rounded-md hover:bg-gray-600 duration-300">
                                <i class="fa-solid fa-paper-plane"></i>
                                <span>Kirim</span>
                              </button>
                            </form>
                        @else
                          <div class="text-green-500">No Action</div>
                        @endif
                        </td>
                      </tbody>
                    </table>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal Warning -->
          <div x-data="{ isWarn:false}" x-cloak>
            <button @click=" isWarn = true " class="bg-rose-500 text-white py-1 px-2 rounded-lg hover:bg-rose-400 shadow-md duration-200 ml-2">
              <i class="fa-solid fa-trash"></i>
              <span>Delete</span>
            </button>
            <div class="fixed z-20 inset-0 overflow-y-auto min-h-screen bg-gray-900/60 w-full" x-transition x-show="isWarn">
              <div class="grid place-content-center min-h-screen sm:flex sm:flex-col sm:justify-center sm:items-center">
                <div class="bg-white rounded shadow-xl w-full sm:max-w-md px-6 py-4">
                  <div class="grid grid-col-3 text-gray-700 py-2 rounded-t">
                    <div class="col-start-2 text-xl uppercase text-center">Warning!!!</div>
                    <div @click="isWarn = false" class="col-start-3 text-end">
                      <i class="fa-solid fa-x"></i>
                    </div>
                  </div>
                  <div class="text-center mb-5">Are you sure want to delete this?</div>
                  <div class="flex justify-center">
                    <div class="bg-yellow-400 text-center py-1 px-2 rounded-lg hover:bg-yellow-300 duration-200 text-white">No, I don't</div>
                    <div>
                      <form action="{{ route('absensi.destroy', $absen->id) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button class="bg-rose-500 text-white py-1 px-2 rounded-lg hover:bg-rose-400 shadow-md duration-200 ml-2">
                          <i class="fa-solid fa-trash"></i>
                          <span>Delete</span>
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      @endforeach

    </div>

  </div>

				{{-- <div class="container mx-auto p-4 pb-6 w-full">
          <div x-data={open:false} class="w-full">
            <div class="flex justify-end py-6">

            </div>
            <x-modal-add />
          </div>
								<div x-data="{ open: falsea}" class="py-4 px-4 w-full border border-gray-800 rounded-md">
                  @foreach($absensi as $absen)
                  <div class="grid grid-cols-2 w-full">
                    <div class="col-span-1 text-start">{{ $absen->absensi->tanggal }}</div>
                    <div class="col-span-1 text-center flex place-content-end duration-200">
                      <div x-on:click=" open = !open" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 text-sm rounded-lg">View</div>
                    </div>

                    <div x-show="open" class="col-span-full grid grid-cols-12 w-full">
                      <div class="col-start-1 text-center font-semibold">Id</div>
                      <div class="col-start-2 col-end-4 text-center font-semibold">Name</div>
                      <div class="col-start-5 col-end-7 text-center font-semibold">status</div>
                      <div class="col-start-8 col-end-13 text-center font-semibold">Action</div>

                      <div class="col-start-1 text-center">{{ $absen->user->id }}</div>
                      <div class="col-start-2 col-end-4 text-center">{{ $absen->user->name }}</div>
                      <div class="col-start-5 col-end-7 text-center">
                        @if ($absen->status != null)
                          {{ $absen->status }}
                        @else
                          <div class="text-rose-500">No Attendance Yet</div>
                        @endif
                      </div>
                      <div class="col-start-8 col-end-13 text-center text-sm">
                        @if ($absen->status != null)
                        No Action
                        @else
                        <div x-data="{ open2:false }" class="flex gap-4 justify-center">
                          <div x-on:click="open2 = !open2">Edit</div>
                          <x-modal-edit>
                            <x-slot>
                              <form action="{{ route('absensi.update', $absen->id) }}" method="post">
                              @csrf
                              @method('PATCH')
                              <select name="status" id="status" class="rounded border border-gray-800" required>
                                <option value="hadir" {{ $absen->status == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                <option value="izin" {{ $absen->status == 'izin' ? 'selected' : '' }}>Izin</option>
                                <option value="telat" {{ $absen->status == 'telat' ? 'selected' : '' }}>Telat</option>
                              </select>
                              <button type="submit" class="bg-gray-800 text-white py-2 px-2 rounded-md hover:bg-gray-600 duration-300">Kirim</button>
                            </form>
                            </x-slot>
                          </x-modal-edit>
                          <form action="{{ route('absensi.update', $absen->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <select name="status" id="status" class="rounded border border-gray-800" required>
                              <option value="hadir" {{ $absen->status == 'hadir' ? 'selected' : '' }}>Hadir</option>
                              <option value="izin" {{ $absen->status == 'izin' ? 'selected' : '' }}>Izin</option>
                              <option value="telat" {{ $absen->status == 'telat' ? 'selected' : '' }}>Telat</option>
                            </select>
                            <button type="submit" class="bg-gray-800 text-white py-2 px-2 rounded-md hover:bg-gray-600 duration-300">Kirim</button>
                          </form>
                        </div>
                        @endif
                      </div>
                    </div>
                  </div>
                  @endforeach
                  @foreach ($absensi as $absen)
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
                                          </td>
                                    </tbody>
                                  </table>
																</div>
                                @endforeach
								</div>
				</div> --}}
</x-app-layout>
