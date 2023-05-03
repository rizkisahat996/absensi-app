<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Absensi App') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/cf4dce0a52.js" crossorigin="anonymous"></script>
  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
  <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">

  <style>
      .kbw-signature {
        width: 100%;
        height: 150px;
        border-radius: 10px;
      }
      #sig canvas{
          width: 100% !important;
          height: 150px;
          border-radius: 10px;

      }
  </style>
</head>

<body class="bg-gradient-to-br from-[#510A32] from-10% via-[#C72C41] via-30% to-[#C72C41] to-90% min-h-screen min-w-full">
<!-- START DESKTOP VIEW -->
  <div id="desktop-view" class="min-h-screen md:min-h-screen min-w-full bg-center bg-cover md:flex hidden" style="background-image: url('{{ asset('/image/bg-2.png') }}')">
    <div class="grid place-content-center min-h-screen min-w-full md:flex md:flex-col md:justify-center md:items-center md:px-12 md:py-12">
      <div class="grid grid-cols-2 border border-[#510A32] rounded-lg w-full md:max-w-5xl">
        <div class="col-span-1 bg-[#C72C41] w-full rounded-l-lg px-14 py-20">
          <div class="pb-10 w-full md:max-w-sm text-center text-[#510A32]">
            <div class="bg-white border-2 border-[#510A32] py-2 rounded-sm">
              <div class="font-semibold">Location</div>
              <div class="text-5xl">12:12</div>
              <div class="font-semibold">12 September 2022</div>
            </div>
          </div>
          <div class="flex justify-center items-center mb-6">
            <img src="{{ asset('image/desktop.png') }}" alt="">
          </div>
          <div class="text-white">
            <div class="text-2xl">Welcome To Absensi App</div>
            <div class="">Silahkan masukan data diri dan tanda tangan untuk mengisi absen...</div>
          </div>
        </div>
        <div class="col-span-1 bg-white p-4 bg-opacity-30 rounded-r-lg px-16 py-8">
          <div class="text-3xl text-center py-4 font-semibold text-white">Form Absensi</div>
          <form action="">
            <div class="mb-3">
              <label class="block text-white text-sm" for="nama">
                <i class="fa-solid fa-user"></i>
                <span>Nama Lengkap</span>
              </label>
              <input id="" name="nama" class="rounded-md border-2 border-[#510A32] text-[#510A32] w-full shadow-xl" type="text" placeholder="John Doe" required>
            </div>

            <div class="mb-3">
              <label class="block text-white" for="skema">
                <i class="fa-solid fa-building"></i>
                <span>Skema</span>
              </label>
              <select class="rounded-md border-2 border-[#510A32] text-[#510A32] w-full shadow-xl" name="skema" id="" required>
                @foreach ($skema as $skema)
                  @if (old('skema_id') == $skema->id)
                      <option value="{{ $skema->id }}" selected>{{ $skema->skema }}</option>
                  @else
                      <option value="{{ $skema->id }}">{{ $skema->skema }}</option>
                  @endif
                @endforeach
              </select>
            </div>

            <div class="grid grid-cols-2 mb-3 gap-2">
              <div class="col-span-1">
                <label class="block text-white text-sm" for="status">
                  <i class="fa-solid fa-bell"></i>
                  <span>Status</span>
                </label>
                <select id="status" name="status" class="rounded-md border-2 border-[#510A32] text-[#510A32] w-full shadow-xl" type="text" placeholder="JohnDoe@gmail.com" required>
                  <option value="">-Pilih Status-</option>
                  <option value="">Hadir</option>
                  <option value="">Izin</option>
                  <option value="">Sakit</option>
                </select>
              </div>
              <div class="col-span-1">
                <label class="block text-white text-sm" for="nama">
                  <i class="fa-solid fa-pen"></i>
                  <span>Keterangan</span>
                </label>
                <select id="keterangan" name="keterangan" class="rounded-md border-2 border-[#510A32] text-[#510A32] w-full shadow-xl" type="text" placeholder="John Doe" required>
                  <option value="">-Pilih Keterangan-</option>
                  <option value="">Administrasi Umum dan Keuangan</option>
                  <option value="">Mutu</option>
                  <option value="">Sistem</option>
                  <option value="">Sertifikasi</option>
                  <option value="">Lainya</option>
                </select>
              </div>
            </div>

            <div class="mb-3">
              <label class="block text-white" for="signature">
                <i class="fa-solid fa-signature"></i>
                <span>Tanda Tangan</span>
              </label>
              <div id="sig" ></div>
              <button id="clear" class="bg-white mt-2 py-1 px-2 text-sm rounded-md border-2 border-[#510A32] hover:bg-white/10 duration-200 hover:text-white">Reset</button>
              <textarea id="signature64" name="signed" style="display: none"></textarea>
            </div>

            <div id="btn-submit" class="flex justify-end items-center">
              <button class="bg-[#510A32] text-white py-2 px-4 rounded-lg hover:bg-[#510A32]/80 duration-200 shadow-lg">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- END DESKTOP VIEW -->

<!-- START MOBILE VIEW -->
  <div id="mobile-view" class="min-h-screen min-w-full bg-center bg-cover md:hidden flex" style="background-image: url('{{ asset('/image/bg-2.png') }}')">

    <div class="min-w-full min-h-screen">
      <div class="w-full md:max-w-sm text-center text-[#510A32] px-14 py-5">
        <div class="bg-white border-2 border-[#510A32] py-2 rounded-sm w-full">
          <div class="font-semibold">Location</div>
          <div class="text-5xl">12:12</div>
          <div class="font-semibold">12 September 2022</div>
        </div>
      </div>

      <div class="bg-white bg-opacity-30 min-w-full rounded-t-3xl px-10 pb-5">
        <div class="text-3xl text-center py-6 font-semibold text-white">Form Absensi</div>
          <form action="">
            <div class="mb-3">
              <label class="block text-white text-sm" for="nama">
                <i class="fa-solid fa-user"></i>
                <span>Nama Lengkap</span>
              </label>
              <input id="" name="nama" class="rounded-md border-2 border-[#510A32] text-[#510A32] w-full shadow-xl" type="text" placeholder="John Doe" required>
            </div>

            <div class="mb-3">
              <label class="block text-white" for="skema">
                <i class="fa-solid fa-building"></i>
                <span>Skema</span>
              </label>
              <select class="rounded-md border-2 border-[#510A32] text-[#510A32] w-full shadow-xl" name="skema" id="" required>
                {{-- @foreach ($skema as $skema)
                  @if (old('skema_id') == $skema->id)
                      <option value="{{ $skema->id }}" selected>{{ $skema->skema }}</option>
                  @else
                      <option value="{{ $skema->id }}">{{ $skema->skema }}</option>
                  @endif
                @endforeach --}}
              </select>
            </div>

            <div class="grid grid-cols-2 mb-3 gap-2">
              <div class="col-span-1">
                <label class="block text-white text-sm" for="status">
                  <i class="fa-solid fa-bell"></i>
                  <span>Status</span>
                </label>
                <select id="status" name="status" class="rounded-md border-2 border-[#510A32] text-[#510A32] w-full shadow-xl" type="text" placeholder="JohnDoe@gmail.com" required>
                  <option value="">-Pilih Status-</option>
                  <option value="">Hadir</option>
                  <option value="">Izin</option>
                  <option value="">Sakit</option>
                </select>
              </div>
              <div class="col-span-1">
                <label class="block text-white text-sm" for="nama">
                  <i class="fa-solid fa-pen"></i>
                  <span>Keterangan</span>
                </label>
                <select id="keterangan" name="keterangan" class="rounded-md border-2 border-[#510A32] text-[#510A32] w-full shadow-xl" type="text" placeholder="John Doe" required>
                  <option value="">-Pilih Keterangan-</option>
                  <option value="">Administrasi Umum dan Keuangan</option>
                  <option value="">Mutu</option>
                  <option value="">Sistem</option>
                  <option value="">Sertifikasi</option>
                  <option value="">Lainya</option>
                </select>
              </div>
            </div>

            <div class="mb-3">
              <label class="block text-white" for="signature">
                <i class="fa-solid fa-signature"></i>
                <span>Tanda Tangan</span>
              </label>
              <div id="sig" ></div>
              <button id="clear" class="bg-white mt-2 py-1 px-2 text-sm rounded-md border-2 border-[#510A32] hover:bg-white/10 duration-200 hover:text-white">Reset</button>
              <textarea id="signature64" name="signed" style="display: none"></textarea>
            </div>

            <div id="btn-submit" class="flex justify-end items-center">
              <button class="bg-[#510A32] text-white py-2 px-4 rounded-lg hover:bg-[#510A32]/80 duration-200 shadow-lg">Submit</button>
            </div>
          </form>
      </div>
    </div>
  </div>
<!-- END MOBILE VIEW -->

  <script type="text/javascript">
    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });
</script>
</body>
</html>
