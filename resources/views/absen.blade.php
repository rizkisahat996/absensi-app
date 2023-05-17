<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Absensi App</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/cf4dce0a52.js" crossorigin="anonymous"></script>
  <!-- Scripts -->
  <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
  <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
  <script type="text/javascript" src="js/excanvas.js"></script>

  @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-main">
<!-- START VIEW -->
  <div id="desktop-view" class="bg-image" style="background-image: url('{{ asset('/image/bg-2.png') }}')">

    <div class="main-content">
      <!-- Time Card Mobile -->
      <div class="md:hidden px-10 w-full md:max-w-sm py-14">
        <div class="time-content">
          <div id="time-1" class="text-5xl font-thin"></div>
          <div id="date-1"></div>
        </div>
      </div>

      <!-- Time Card & Welcome Desktop -->
      <div class="grid grid-cols-2 card-content">
        <div class="hidden md:grid col-span-1 card-welcome">
          <div class="w-full md:max-w-sm pb-10">
            <div class="time-content">
              <div id="time-2" class="text-5xl font-thin"></div>
              <div id="date-2"></div>
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

        <div class="card-form col-span-full md:col-span-1">
          <div class="title-form">Form Absensi</div>
          <div id="indicators-carousel" class="relative w-full" data-carousel="static">
              <!-- Carousel wrapper -->
              <div class="relative h-60 overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->
                <form action="{{ route('absen.store') }}" method="POST">
                      @csrf
                  <div class="hidden pt-10 md:pt-20 duration-700 ease-in-out" data-carousel-item="active">
                    <div class="px-16">
                      <label class="label-name">
                        <i class="fa-solid fa-user"></i>
                        <span>Nama Lengkap</span>
                      </label>
                      <input name="nama" class="input-field" type="text" placeholder="Masukan Nama Lengkap Anda" required>
                    </div>
                  </div>
                  <!-- Item 2 -->
                  <div class="hidden pt-10 md:pt-20 duration-700 ease-in-out" data-carousel-item>
                    <div class="px-16 field">
                        <label class="label-name">
                          <i class="fa-solid fa-building"></i>
                          <span>Skema</span>
                        </label>
                        <select class="select-option" name="skema" required>
                          <option value="">-Pilih Skema-</option>
                          @foreach ($skema as $skema)
                            @if (old('skema_id') == $skema->id)
                                <option value="{{ $skema->id }}" selected>{{ $skema->skema }}</option>
                            @else
                                <option value="{{ $skema->id }}">{{ $skema->skema }}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                  </div>
                  <!-- Item 3 -->
                  <div class="hidden pt-10 md:pt-20 duration-700 ease-in-out" data-carousel-item>
                    <div class="px-16">
                        <label class="label-name">
                          <i class="fa-solid fa-bell"></i>
                          <span>Status</span>
                        </label>
                        <select name="status" class="select-option" placeholder="JohnDoe@gmail.com" required>
                          <option value="">-Pilih Status-</option>
                          <option value="Hadir">Hadir</option>
                          <option value="Izin">Izin</option>
                          <option value="Sakit">Sakit</option>
                        </select>
                      </div>
                  </div>
                  <!-- Item 4 -->
                  <div class="hidden pt-10 md:pt-20 duration-700 ease-in-out" data-carousel-item>
                    <div class="px-16">
                      <label class="label-name">
                        <i class="fa-solid fa-pen"></i>
                        <span>Keterangan</span>
                      </label>
                      <select name="keterangan" class="select-option" required>
                        <option value="">-Pilih Keterangan-</option>
                        <option value="Administrasi Umum dan Keuangan">Administrasi Umum dan Keuangan</option>
                        <option value="Mutu">Mutu</option>
                        <option value="Sistem">Sistem</option>
                        <option value="Sertifikasi">Sertifikasi</option>
                        <option value="Lainya">Lainya</option>
                      </select>
                    </div>
                  </div>
                  <!-- Item 5 -->
                  <div class="duration-700 md:pt-20 ease-in-out" data-carousel-item>
                    <div class="px-16 field">
                      <label class="label-name">
                        <i class="fa-solid fa-signature"></i>
                        <span>Tanda Tangan</span>
                      </label>
                      <div id="sig"></div>
                      <div class="grid grid-cols-2 pt-2">
                        <div class="col-span-1 flex justify-start items-center">
                          <button id="clear" class="reset-btn">Reset</button>
                        </div>
                        <div class="col-span-1 flex justify-end items-center">
                          <button id="submit-btn" class="submit-btn" type="submit">Submit</button>
                        </div>
                      </div>
                      <textarea id="signature64" name="signed" style="display: none"></textarea>
                    </div>
                  </div>
              </div>
            </form>
              <!-- Slider indicators -->
              <div class="absolute z-30 flex space-x-3 -translate-x-1/2 left-1/2">
                  <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                  <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                  <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                  <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                  <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
              </div>
              <!-- Slider controls -->
              <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                  <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                      <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                      <span class="sr-only">Previous</span>
                  </span>
              </button>
              <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                  <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                      <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                      <span class="sr-only">Next</span>
                  </span>
              </button>
          </div>
        </div>
      </div>
    </div>

    {{-- <div class="main-content">


      <!-- Time Card Mobile -->
      <div class="md:hidden px-16 w-full md:max-w-sm py-14">
        <div class="time-content">
          <div id="time-1" class="text-5xl font-thin"></div>
          <div id="date-1"></div>
        </div>
      </div>

      <!-- Time Card & Welcome Desktop -->
      <div class="grid grid-cols-2 card-content">
        <div class="hidden md:grid col-span-1 card-welcome">
          <div class="w-full md:max-w-sm pb-10">
            <div class="time-content">
              <div id="time-2" class="text-5xl font-thin"></div>
              <div id="date-2"></div>
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

        <div class="card-form col-span-full md:col-span-1">
          <div class="title-form">Form Absensi</div>
          <form action="{{ route('absen.store') }}" method="POST">
            @csrf

            <!-- Form Nama Lengkap -->
              <div id="field-1" class="py-5 field">
                <label class="label-name">
                  <i class="fa-solid fa-user"></i>
                  <span>Nama Lengkap</span>
                </label>
                <input name="nama" class="input-field" type="text" placeholder="Masukan Nama Lengkap Anda" required>
              </div>

            <!-- Form Skema -->
            <div id="field-2" class="py-5 field hidden">
              <label class="label-name">
                <i class="fa-solid fa-building"></i>
                <span>Skema</span>
              </label>
              <select class="select-option" name="skema" required>
                <option value="">-Pilih Skema-</option>
                @foreach ($skema as $skema)
                  @if (old('skema_id') == $skema->id)
                      <option value="{{ $skema->id }}" selected>{{ $skema->skema }}</option>
                  @else
                      <option value="{{ $skema->id }}">{{ $skema->skema }}</option>
                  @endif
                @endforeach
              </select>
            </div>

            <!-- Form Status -->
            <div id="field-3" class="py-5 field hidden">
              <label class="label-name">
                <i class="fa-solid fa-bell"></i>
                <span>Status</span>
              </label>
              <select name="status" class="select-option" placeholder="JohnDoe@gmail.com" required>
                <option value="">-Pilih Status-</option>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
              </select>
            </div>

            <!-- Form Keterangan -->
            <div id="field-4" class="py-5 field hidden">
              <label class="label-name">
                <i class="fa-solid fa-pen"></i>
                <span>Keterangan</span>
              </label>
              <select name="keterangan" class="select-option" required>
                <option value="">-Pilih Keterangan-</option>
                <option value="Administrasi Umum dan Keuangan">Administrasi Umum dan Keuangan</option>
                <option value="Mutu">Mutu</option>
                <option value="Sistem">Sistem</option>
                <option value="Sertifikasi">Sertifikasi</option>
                <option value="Lainya">Lainya</option>
              </select>
            </div>

            <!-- Form Tanda Tangan -->
            <div id="field-5" class="py-5 field hidden">
              <label class="label-name">
                <i class="fa-solid fa-signature"></i>
                <span>Tanda Tangan</span>
              </label>
              <div id="sig"></div>
              <button id="clear" class="reset-btn">Reset</button>
              <textarea id="signature64" name="signed" style="display: none"></textarea>
            </div>

            <!-- Form Button -->
            <div class="grid grid-cols-2">
              <div class="col-span-1 flex justify-start items-center">
                <button id="prev-btn" class="submit-btn hidden" type="button">Previous</button>
              </div>
              <div class="col-span-1 flex justify-end items-center">
                <button id="next-btn" class="submit-btn" type="button">Next</button>
                <button id="submit-btn" class="submit-btn hidden" type="submit">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div> --}}
  </div>
  @include('sweetalert::alert')

<!-- END VIEW -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
  <script src="{{ asset('js/script.js') }}" type="text/javascript"></script>

</body>
</html>
