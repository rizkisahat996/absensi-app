{{-- <!-- @extends('layouts.app') --}}

{{-- @section('content') --> --}}
    <div class="container">
        <h2>Absensi Admin</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($absensi as $absen)
                <tr>
                    <td>{{ $absen->user->username }}</td>
                    <td>{{ $absen->tanggal }}</td>
                    <td>{{ $absen->status }}</td>
                    <td>{{ $absen->keterangan }}</td>
                    <td>
                        {{-- <a href="{{ route('absensi.edit', $absen->id) }}" class="btn btn-primary">Edit</a> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
{{-- <!-- @endsection --> --}}
