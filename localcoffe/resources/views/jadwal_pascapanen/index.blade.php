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

    {!! Toastr::message() !!}


    <div class="container">
        <h1>Jadwal Pascapanen</h1>
        <a href="{{ route('jadwal_pascapanen.create') }}" class="btn btn-primary">Tambah Jadwal Pascapanen</a>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Tanaman</th>
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jadwalPascapanen as $jadwal)
                    <tr>
                        <td>{{ $jadwal->tanaman->nama }}</td>
                        <td>{{ $jadwal->tanggal }}</td>
                        <td>{{ $jadwal->deskripsi }}</td>
                        <td>
                            <a href="{{ route('jadwal_pascapanen.edit', $jadwal->id) }}" class="btn btn-primary">Edit</a>
                            {{-- <form action="{{ route('jadwal_pascapanen.destroy', $jadwal->id) }}" method="POST">
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



    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2023 &copy; Local Coffe</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                href="http://localcoffe.com">Local Coffe</a></p>
            </div>
        </div>
    </footer>
</div>
@endsection
