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
        <h1>Detail Pesanan</h1>
        <table class="table table-striped">
            <tr>
                <th>No. Pesanan</th>
                <td>{{ $order->id }}</td>
            </tr>
            <tr>
                <th>Pembeli</th>
                <td>{{ $order->buyer_name }}</td>
            </tr>
            <tr>
                <th>Tanggal Pesan</th>
                <td>{{ $order->created_at->format('d/m/Y H:i:s') }}</td>
            </tr>
            <tr>
                <th>Produk</th>
                <td>{{ $order->product->name }}</td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>{{ $order->quantity }}</td>
            </tr>
            <tr>
                <th>Total Harga</th>
                <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $order->address }}</td>
            </tr>
            <tr>
                <th>Nomor Telepon</th>
                <td>{{ $order->phone_number }}</td>
            </tr>
            <tr>
                <th>Metode Pembayaran</th>
                <td>{{ $order->payment_method }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if ($order->status == 'Belum Dibayar')
                        <span class="badge badge-danger">{{ $order->status }}</span>
                    @elseif ($order->status == 'Dalam Proses')
                        <span class="badge badge-warning">{{ $order->status }}</span>
                    @else
                        <span class="badge badge-success">{{ $order->status }}</span>
                    @endif
                </td>
            </tr>
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
