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
        <h1>Detail Panen</h1>
        <p>Nama Tanaman: {{ $panen->nama_tanaman }}</p>
        <p>Tanggal Panen: {{ $panen->tanggal_panen }}</p>
        <p>Jumlah Panen: {{ $panen->jumlah_panen }}</p>

        <h2>Pascapanen</h2>
        @foreach ($panen->pascapanen as $pascapanen)
            <p>Nama Produk: {{ $pascapanen->nama_produk }}</p>
            <p>Tanggal Kemasan: {{ $pascapanen->tanggal_kemasan }}</p>
            <!-- Tampilkan informasi pascapanen lainnya -->
        @endforeach

        <a href="{{ route('panen/edit', $panen->id) }}" class="btn btn-success">Edit</a>
        <form action="{{ route('panen/destroy', $panen->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
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
