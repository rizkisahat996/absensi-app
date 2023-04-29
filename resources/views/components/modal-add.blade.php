<div class="fixed z-20 inset-0 overflow-y-auto min-h-screen bg-gray-900/60 w-full" x-transition x-show="isAdd">
  <div class="grid place-content-center min-h-screen sm:flex sm:flex-col sm:justify-center sm:items-center">
    <div class="bg-white rounded shadow-xl w-full sm:max-w-md">
      <div class="grid grid-col-3 bg-gray-800 text-white py-2 px-4 rounded-t">
        <div class="col-start-2 text-center">Add Absensi</div>
        <div @click="isAdd = false" class="col-start-3 text-end">X</div>
      </div>
      <form class="py-4 px-4" action="{{ route('absensi.store') }}" method="post">
        @csrf
        <div class="mb-4 text-gray-900">
          <label class="font-semibold" for="tanggal" class="block">Tanggal:</label>
          <input type="date" name="tanggal" id="tanggal" class="w-full rounded border border-gray-800" required>
        </div>
        <div class="text-gray-900">
          <label class="font-semibold" for="keterangan" class="block">Keterangan:</label>
          <input name="keterangan" id="keterangan" class="w-full py-4 px-4 rounded border border-gray-800" placeholder="Please Input Keterangan" required>
        </div>
        <div class="py-4 grid place-content-end">
          <button type="submit" class="bg-gray-800 text-white py-2 px-4 rounded-md hover:bg-gray-600 duration-300">
            <i class="fa-solid fa-paper-plane mr-1"></i>
            <span>Kirim</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>