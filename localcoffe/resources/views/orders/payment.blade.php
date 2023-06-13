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

    <h1 class="mb-4">Konfirmasi Pembayaran - No. Order: {{ $order->id }}</h1>

    @if ($order->status === 'pending')
        <div class="alert alert-info mb-4" role="alert">
            Silahkan melakukan pembayaran melalui transfer ke rekening <strong>1234567890 (a.n. PT Toko Online)</strong> sejumlah <strong>Rp{{ number_format($order->total_price, 0, ',', '.') }}</strong>. Setelah itu, harap mengisi form konfirmasi pembayaran di bawah ini.
        </div>

        <form action="{{ route('orders.processPayment', $order) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="payment_method">Metode Pembayaran</label>
                <select id="payment_method" name="payment_method" class="form-control{{ $errors->has('payment_method') ? ' is-invalid' : '' }}">
                    <option value="">-- Pilih Metode Pembayaran --</option>
                    <option value="bank" {{ old('payment_method') === 'bank' ? 'selected' : '' }}>Transfer Bank</option>
                    <option value="ewallet" {{ old('payment_method') === 'ewallet' ? 'selected' : '' }}>E-Wallet</option>
                </select>
                @if ($errors->has('payment_method'))
                    <span class="invalid-feedback">{{ $errors->first('payment_method') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="transfer_amount">Jumlah Transfer</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" id="transfer_amount" name="transfer_amount" class="form-control{{ $errors->has('transfer_amount') ? ' is-invalid' : '' }}" value="{{ old('transfer_amount') }}">
                </div>
                @if ($errors->has('transfer_amount'))
                    <span class="invalid-feedback">{{ $errors->first('transfer_amount') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="transfer_account">Rekening Tujuan</label>
                <input type="text" id="transfer_account" name="transfer_account" class="form-control{{ $errors->has('transfer_account') ? ' is-invalid' : '' }}" value="{{ old('transfer_account') }}">
                @if ($errors->has('transfer_account'))
                    <span class="invalid-feedback">{{ $errors->first('transfer_account') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="receipt_image">Bukti Transfer</label>
                <input type="file" id="receipt_image" name="receipt_image" class="form-control-file{{ $errors->has('receipt_image') ? ' is-invalid' : '' }}">
                @if ($errors->has('receipt_image'))
                    <span class="invalid-feedback">{{ $errors->first('receipt_image') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Kirim Bukti Pembayaran</button>
        </form>
    @else
        <p>Status pesanan ini sudah tidak dapat dikonfirmasi pembayarannya.</p>
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
