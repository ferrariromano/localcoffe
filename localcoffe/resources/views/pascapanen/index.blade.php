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
        <h1>Data Pascapanen</h1>
        <a href="{{ route('pascapanen/create', $panen->id) }}" class="btn btn-primary">Tambah Pascapanen</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Tanggal Kemasan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($panen->pascapanen as $pascapanen)
                    <tr>
                        <td>{{ $pascapanen->nama_produk }}</td>
                        <td>{{ $pascapanen->tanggal_kemasan }}</td>
                        <td>
                            <a href="{{ route('pascapanen/edit', [$panen->id, $pascapanen->id]) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('pascapanen/destroy', [$panen->id, $pascapanen->id]) }}" method="POST" style="display: inline-block;">
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
