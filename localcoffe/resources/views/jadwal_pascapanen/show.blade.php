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
        <h1>Detail Panen</h1>

        <h2>Nama Tanaman: {{ $panen->nama_tanaman }}</h2>
        <p>Tanggal Panen: {{ $panen->tanggal_panen }}</p>
        <p>Jumlah Panen: {{ $panen->jumlah_panen }}</p>

        <h3>Data Pascapanen</h3>
        @if ($pascapanen->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Tanggal Kemasan</th>
                        <th>Jumlah Produk</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pascapanen as $pascapanenItem)
                        <tr>
                            <td>{{ $pascapanenItem->nama_produk }}</td>
                            <td>{{ $pascapanenItem->tanggal_kemasan }}</td>
                            <td>{{ $pascapanenItem->jumlah_produk }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Tidak ada data pascapanen yang terkait.</p>
        @endif
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
