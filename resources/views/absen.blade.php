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
  <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
  <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-main">
<!-- START VIEW -->
  <div id="desktop-view" class="bg-image" style="background-image: url('{{ asset('/image/bg-2.png') }}')">
    <div class="min-h-screen min-w-full md:flex md:flex-col md:justify-center md:items-center md:px-12 md:py-12 py-5">
      <div class="md:hidden px-10 w-full md:max-w-sm pb-5">
        <div class="time-content">
          <div>Location</div>
          <div class="text-5xl font-thin">12:12</div>
          <div>12 September 2022</div>
        </div>
      </div>
      <div class="grid grid-cols-2 card-content">
        <div class="hidden md:grid col-span-1 card-welcome">
          <div class="w-full md:max-w-sm pb-10">
            <div class="time-content">
              <div>Location</div>
              <div class="text-5xl font-thin">12:12</div>
              <div>12 September 2022</div>
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

        <div class="card-form col-span-full md:col-span-1 ">
          <div class="title-form">Form Absensi</div>
          <form action="{{ route('absen.store') }}" method="POST">
            @csrf
            <div id="field-1" class="mb-3">
              <label class="label-name" for="nama">
                <i class="fa-solid fa-user"></i>
                <span>Nama Lengkap</span>
              </label>
              <input name="nama" class="input-field" type="text" placeholder="John Doe" required>
            </div>

            <div id="field-2" class="mb-3 field hidden">
              <label class="label-name" for="skema">
                <i class="fa-solid fa-building"></i>
                <span>Skema</span>
              </label>
              <select class="select-option" name="skema" required>
                @foreach ($skema as $skema)
                  @if (old('skema_id') == $skema->id)
                      <option value="{{ $skema->id }}" selected>{{ $skema->skema }}</option>
                  @else
                      <option value="{{ $skema->id }}">{{ $skema->skema }}</option>
                  @endif
                @endforeach
              </select>
            </div>

            <div id="field-3" class="mb-3 field hidden">
              <label class="label-name" for="status">
                <i class="fa-solid fa-bell"></i>
                <span>Status</span>
              </label>
              <select id="status" name="status" class="select-option" type="text" placeholder="JohnDoe@gmail.com" required>
                <option value="">-Pilih Status-</option>
                <option value="hadir">Hadir</option>
                <option value="izin">Izin</option>
                <option value="sakit">Sakit</option>
              </select>
            </div>

            <div id="field-4" class="mb-3 field hidden">
              <label class="label-name" for="nama">
                <i class="fa-solid fa-pen"></i>
                <span>Keterangan</span>
              </label>
              <select id="keterangan" name="keterangan" class="select-option" type="text" placeholder="John Doe" required>
                <option value="">-Pilih Keterangan-</option>
                <option value="Administrasi Umum dan Keuangan">Administrasi Umum dan Keuangan</option>
                <option value="Mutu">Mutu</option>
                <option value="Sistem">Sistem</option>
                <option value="Sertifikasi">Sertifikasi</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>

            <div id="field-5" class="mb-3 field">
              <label class="label-name" for="signature">
                <i class="fa-solid fa-signature"></i>
                <span>Tanda Tangan</span>
              </label>
              <div id="sig"></div>
              <button id="clear" class="reset-btn">Reset</button>
              <textarea id="signature64" name="signed" style="display: none"></textarea>
            </div>
            <button id="prev-btn" class="submit-btn hidden">Previous</button>
            <button id="next-btn" class="submit-btn">Next</button>
            <button id="submit-btn" class="submit-btn hidden" type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- END VIEW -->

  <script type="text/javascript">
    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });
</script>
<script>
    let currentField = 1;
    const fieldCount = 5;
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');

    function showField(fieldNum) {
        const prevField = document.getElementById('field-' + currentField);
        const nextField = document.getElementById('field-' + fieldNum);

        prevField.classList.add('hidden');
        nextField.classList.remove('hidden');
        currentField = fieldNum;

        if (currentField === 1) {
            prevBtn.classList.add('hidden');
        } else {
            prevBtn.classList.remove('hidden');
        }

        if (currentField === fieldCount) {
            nextBtn.classList.add('hidden');
            document.getElementById('submit-btn').classList.remove('hidden');
        } else {
            nextBtn.classList.remove('hidden');
            document.getElementById('submit-btn').classList.add('hidden');
        }
    }

    prevBtn.addEventListener('click', function() {
        showField(currentField - 1);
    });

    nextBtn.addEventListener('click', function() {
        showField(currentField + 1);
    });
</script>
</body>
</html>
