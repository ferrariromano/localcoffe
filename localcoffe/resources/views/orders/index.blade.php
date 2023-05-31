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
        <h1>Daftar Pesanan</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Pembeli</th>
                    <th>Tanggal Pesan</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $key => $order)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $order->buyer_name }}</td>
                    <td>{{ $order->created_at->format('d/m/Y H:i:s') }}</td>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td>
                        @if ($order->status == 'Belum Dibayar')
                            <span class="badge badge-danger">{{ $order->status }}</span>
                        @elseif ($order->status == 'Dalam Proses')
                            <span class="badge badge-warning">{{ $order->status }}</span>
                        @else
                            <span class="badge badge-success">{{ $order->status }}</span>
                        @endif
                    </td>
                    <td>
                        @if ($order->status == 'Belum Dibayar')
                            <a href="{{ route('orders.edit', $order) }}" class="btn btn-primary">Ubah Status</a>
                        @endif
                        <a href="{{ route('orders.show', $order) }}" class="btn btn-info">Detail Pesanan</a>
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
