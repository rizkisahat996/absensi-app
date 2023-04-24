{{-- @extends('layouts.app')

@section('content') --}}
    <div class="container">
        <h2>Absensi</h2>

        <form action="{{ route('absensi.store_user') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="hadir">Hadir</option>
                    <option value="izin">Izin</option>
                    <option value="telat">Telat</option>
                    <option value="absen">Absen</option>
                </select>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>

        <h3>Daftar Absensi</h3>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($absensi as $absen)
                <tr>
                    <td>{{ $absen->tanggal }}</td>
                    <td>{{ $absen->status }}</td>
                    <td>{{ $absen->keterangan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
{{-- @endsection --}}
