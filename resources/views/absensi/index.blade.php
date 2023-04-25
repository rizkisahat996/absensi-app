<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Absensi') }}
    </h2>
  </x-slot>

  <div class="container mx-auto p-8 sm:pt-5 pt-10 w-full">
    <div class="grid place-content-center">
      <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white border-gray-800 text-gray-900 shadow-xl overflow-hidden sm:rounded-lg rounded-md border">
        <form action="{{ route('absensi.store_user') }}" method="post">
          @csrf
          <div class="form-group mb-4">
            <label for="tanggal" class="block">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" class="w-full rounded border border-gray-800" required>
          </div>
          <div class="form-group mb-4">
            <label for="status" class="block">Status:</label>
            <select name="status" id="status" class="w-full rounded border border-gray-800" required>
              <option value="hadir">Hadir</option>
              <option value="izin">Izin</option>
              <option value="telat">Telat</option>
              <option value="absen">Absen</option>
            </select>
          </div>
          <div class="form-group">
            <label for="keterangan" class="block">Keterangan:</label>
            <textarea name="keterangan" id="keterangan" class="w-full rounded border border-gray-800"></textarea>
          </div>
          <div class="py-4 grid place">
            <button type="submit" class="bg-gray-800 text-white py-2 px-4 rounded-md hover:bg-gray-600 duration-300">Kirim</button>
          </div>
          </form>
        </div>

      <div class="grid place-content-center py-4 px-4 w-full bg-white border border-gray-800 rounded-lg mt-8 shadow-xl">
        <div class="text-center font-semibold py-4">Daftar Absensi</div>
        <table class="table-striped grid place-content-center gap-4">
            <thead class="border-b border-gray-800">
                <tr class="">
                    <th class="p-2">Tanggal</th>
                    <th class="p-2">Status</th>
                    <th class="p-2">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($absensi as $absen)
                <tr>
                    <td class="p-2">{{ $absen->tanggal }}</td>
                    <td class="p-2">{{ $absen->status }}</td>
                    <td class="p-2">{{ $absen->keterangan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>
</x-app-layout>
