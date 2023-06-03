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
        <h1>Keranjang Belanja</h1>
        @if (count($cart) > 0)
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>{{ $cart[$product->id]['quantity'] }}</td>
                            <td>Rp {{ number_format($product->price * $cart[$product->id]['quantity'], 0, ',', '.') }}</td>
                            {{-- <td>
                                <form action="{{ route('cart.remove', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-right">Biaya Layanan:</td>
                        <td colspan="2">Rp {{ number_format($shippingCost, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Total Belanja:</th>
                        <td colspan="2">Rp {{ number_format($total + $shippingCost, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
            <a href="{{ route('checkout.index') }}" class="btn btn-primary">Checkout</a>
        @else
            <p>Keranjang belanja kosong.</p>
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
