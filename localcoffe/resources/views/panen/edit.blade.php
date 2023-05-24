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
        <h1>Edit Pascapanen</h1>

        <form action="{{ route('pascapanen.update', [$panen->id, $pascapanen->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ $pascapanen->nama_produk }}">
            </div>
            <div class="form-group">
                <label for="tanggal_kemasan">Tanggal Kemasan</label>
                <input type="date" class="form-control" id="tanggal_kemasan" name="tanggal_kemasan" value="{{ $pascapanen->tanggal_kemasan }}">
            </div>
            <!-- Tambahkan inputan pascapanen lainnya -->

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
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
