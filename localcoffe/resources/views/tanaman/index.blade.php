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
        <h1>Daftar Tanaman</h1>
        <a href="{{ route('tanaman.create') }}" class="btn btn-primary">Tambah Tanaman</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tanaman as $t)
                    <tr>
                        <td>{{ $t->nama }}</td>
                        <td>{{ $t->jenis }}</td>
                        <td>{{ $t->deskripsi }}</td>
                        <td>
                            <a href="{{ route('tanaman.edit', $t->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('tanaman.destroy', $t->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
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
