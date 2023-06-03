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
        <h1>Checkout</h1>
        <p>You are about to purchase {{ $product->name }} for RM{{ $product->price }}</p>
        <form action="{{ route('products.beli', ['id' => $product->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="address">Delivery Address:</label>
                <textarea class="form-control" id="address" name="address" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Purchase</button>
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
