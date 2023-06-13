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
        <h1>{{ $product->name }}</h1>

        <div class="row">
            <div class="col-md-4 mb-3">
                @if ($product->image)
                    <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-100">
                @else
                    <span class="text-muted">No Image</span>
                @endif
            </div>
            <div class="col-md-8">
                <p>{{ $product->description }}</p>
                <p>Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus produk ini?')">Hapus</button>
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
