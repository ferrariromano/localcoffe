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
        <h1>Checkout</h1>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>{{ $cart[$product->id]['quantity'] }}</td>
                        <td>Rp {{ number_format($product->price * $cart[$product->id]['quantity'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-right">Biaya Pengiriman:</td>
                    <td>Rp {{ number_format($shippingCost, 0, ',', '.') }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Pembayaran:</th>
                    <td>Rp {{ number_format($grandTotal, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <h2>Informasi Pemesan</h2>
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Nomor Telepon</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <h2>Informasi Pengiriman</h2>
                    <div class="form-group">
                        <label for="address">Alamat Lengkap</label>
                        <textarea class="form-control" name="address" id="address" rows="3" required>{{ old('address') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="city">Kota/Kabupaten</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="province">Provinsi</label>
                        <input type="text" class="form-control" id="province" name="province" value="{{ old('province') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Kode Pos</label>
                        <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code') }}" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Buat Pesanan</button>
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
