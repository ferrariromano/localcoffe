@extends('layouts.master')
@section('menu')
@extends('sidebar.form_karyawan')
@endsection
@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Konfirmasi Pesanan</div>

                    <div class="card-body">
                        <p>Pesanan dengan kode {{ $order->id }} sudah berhasil dibuat.</p>
                        <p>Silakan transfer total pembayaran sebesar Rp {{ number_format($order->total_price + $shippingCost, 0, ',', '.') }} ke rekening berikut:</p>
                        <ul>
                            <li>Bank Mandiri: 123456789 a/n CV Toko Online</li>
                            <li>BCA: 987654321 a/n CV Toko Online</li>
                        </ul>
                        <p>Jangan lupa untuk mencantumkan nama dan nomor pesanan pada saat melakukan transfer.</p>
                        <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
        </div>
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
