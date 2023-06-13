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

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga per Unit</th>
                    <th>Kuantitas</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            @foreach ($userCart as $item)
        <tr>
            <td>{{ $item->product->name }}</td>
            <td>Rp {{ number_format($item->product->price, 0, ',', '.') }}</td>
            <td>
                <form action="{{ route('cart.update', $item) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="input-group">
                        <input type="number" name="quantity" value="{{ $item->quantity }}" class="form-control">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </td>
            <td>Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</td>
            <td>
                <form action="{{ route('cart.destroy', $item) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>

            <tfoot>
                <tr>
                    <td colspan="3"><strong>Subtotal</strong></td>
                    <td><strong>Rp {{ number_format($subtotal, 0, ',', '.') }}</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3"><strong>Ongkos Kirim</strong></td>
                    <td><strong>Rp {{ number_format(10000, 0, ',', '.') }}</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3"><strong>Total Harga</strong></td>
                    <td><strong>Rp {{ number_format($subtotal + 10000, 0, ',', '.') }}</strong></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('buyer.products.index') }}" class="btn btn-secondary">Lanjut Belanja</a>
            </div>

            <div class="col-md-6 text-right">
                <form action="{{ route('checkout.index') }}" method="get">
                    <button type="submit" class="btn btn-primary">Checkout</button>
                </form>
            </div>
        </div>
    </div>


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
