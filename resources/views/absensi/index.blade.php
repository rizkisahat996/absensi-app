<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Absensi') }}
    </h2>
  </x-slot>
  <div class="md:col-span-1 md:flex justify-center">
    <div class="py-4 px-4 bg-white border border-gray-800 rounded-lg mt-8 shadow-xl w-full sm:max-w-md">
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
          @foreach($absensi as $absen)
            <tr>
              <td class="p-2 text-center">{{ $absen->tanggal }}</td>
              <td class="p-2 text-center">{{ $absen->keterangan }}</td>
              <td class="p-2 text-center">
                <form action="{{ route('absensi.update_user', $absen->absensi_id) }}" method="post">
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
                  <button type="submit" class="bg-gray-800 text-white py-2 px-4 rounded-md hover:bg-gray-600 duration-300"  {{ $absen->status ? 'disabled' : '' }} >Kirim</button>
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
