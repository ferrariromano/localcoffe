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

    <h1 class="mb-4">Detail Pesanan - No. Order: {{ $order->id }}</h1>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Informasi Pesanan</h5>
            <hr>
            <div class="row">
                <div class="col-md-3 font-weight-bold">No. Order:</div>
                <div class="col-md-9">{{ $order->id }}</div>
            </div>
            <div class="row">
                <div class="col-md-3 font-weight-bold">Tanggal Pesan:</div>
                <div class="col-md-9">{{ $order->created_at->format('d M Y H:i') }}</div>
            </div>
            <div class="row">
                <div class="col-md-3 font-weight-bold">Total Harga:</div>
                <div class="col-md-9">Rp{{ number_format($order->total_price, 0, ',', '.') }}</div>
            </div>
            <div class="row">
                <div class="col-md-3 font-weight-bold">Status:</div>
                <div class="col-md-9">{{ ucfirst($order->status) }}</div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Rincian Produk</h5>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Harga Satuan</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderItems as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>Rp{{ number_format($item->unit_price, 0, ',', '.') }}</td>
                                <td>Rp{{ number_format($item->total_price, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-right">Total Harga:</td>
                            <td>Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    @if ($order->status === 'pending')
        <form action="{{ route('orders.update', $order) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="status">Ubah Status Pesanan</label>
                <select id="status" name="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}">
                    <option value="">-- Pilih Status Pesanan --</option>
                    <option value="processing"{{ old('status', $order->status) === 'processing' ? ' selected' : '' }}>Sedang Diproses</option>
                    <option value="shipped"{{ old('status', $order->status) === 'shipped' ? ' selected' : '' }}>Dikirim</option>
                    <option value="delivered"{{ old('status', $order->status) === 'delivered' ? ' selected' : '' }}>Sudah Diterima</option>
                    <option value="canceled"{{ old('status', $order->status) === 'canceled' ? ' selected' : '' }}>Dibatalkan</option>
                </select>
                @if ($errors->has('status'))
                    <span class="invalid-feedback">{{ $errors->first('status') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Ubah Status Pesanan</button>
        </form>
    @else
        <p>Status pesanan ini sudah tidak dapat diubah.</p>
        @if ($order->payment && $order->payment->status === 'pending')
            <div class="alert alert-warning mt-4" role="alert">
                <strong>Perhatian!</strong> Anda belum melakukan konfirmasi pembayaran. Mohon untuk segera mengirimkan bukti pembayaran melalui form konfirmasi pembayaran.
            </div>
            <a href="{{ route('orders.payment', $order) }}" class="btn btn-warning">Konfirmasi Pembayaran</a>
        @endif
    @endif

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
