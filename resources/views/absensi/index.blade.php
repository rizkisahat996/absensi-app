<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight uppercase">
      {{ __('Absensi') }}
    </h2>
  </x-slot>

  <div class="container mx-auto sm:px-6 grid place-content-center sm:justify-center sm:flex sm:flex-col sm:items-center">
    <div class="py-4 px-1 mt-8 w-full sm:max-w-2xl sm:px-6">
      <div class="text-center font-semibold py-6 uppercase text-2xl">Daftar Absensi</div>
      <table class="table-striped gap-4 w-full shadow-2xl">
        <thead class="border-b border-gray-800 bg-gray-800 text-white">
          <tr class="">
            <th class="p-2 rounded-tl-lg">Tanggal</th>
            <th class="p-2">Keterangan</th>
            <th class="p-2">Status</th>
            <th class="p-2 rounded-tr-lg">Aksi</th>
          </tr>
        </thead>
        <tbody class="border border-gray-400">
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
                    <select name="status" id="status" class="rounded border border-gray-800" required>
                      <option value="hadir">Hadir</option>
                      <option value="izin">Izin</option>
                      <option value="telat">Telat</option>
                    </select>
                  @endif
              </td>
              <td>
                <div class="py-4 text-center">
                  @if ($absen->status ? 'disabled' : '')
                    <div class="text-center text-blue-600">submitted</div>
                  @else
                    <button type="submit" class="bg-gray-800 text-sm text-white py-2 px-4 rounded-md hover:bg-gray-600 duration-300">
                      <i class="fa-solid fa-paper-plane mr-1"></i>
                      <span>Kirim</span>
                    </button>
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
