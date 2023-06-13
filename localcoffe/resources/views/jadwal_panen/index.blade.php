@extends('layouts.master')
@section('menu')
@extends('sidebar.form_staff')
@endsection
@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="container">
        <h1>Jadwal Panen</h1>

        <a href="{{ route('jadwal_panen.create') }}" class="btn btn-primary">Tambah Jadwal Panen</a>



        {!! Toastr::message() !!}

        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Tanaman</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwalPanen as $jadwal)
                        <tr>
                            <td>{{ $jadwal->tanaman->nama }}</td>
                            <td>{{ $jadwal->tanggal }}</td>
                            <td>{{ $jadwal->deskripsi }}</td>
                            <td>
                                <a href="{{ route('jadwal_panen.edit', $jadwal->id) }}" class="btn btn-primary">Edit</a>
                                {{-- <form action="{{ route('jadwal_panen.destroy', $jadwal->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2023 &copy; Local Coffe</p>
            </div>
            <div class="float-end">
                <p>Dibuat sepenuh <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                href="http://localcoffe.com">Local Coffe</a></p>
            </div>
        </div>
    </footer>
</div>
@endsection
