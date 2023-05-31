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
        <h1>Ubah Status Pesanan</h1>
        <form action="{{ route('orders.update', $order) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                    <option value="Belum Dibayar" {{ $order->status == 'Belum Dibayar' ? 'selected' : '' }}>Belum Dibayar</option>
                    <option value="Dalam Proses" {{ $order->status == 'Dalam Proses' ? 'selected' : '' }}>Dalam Proses</option>
                    <option value="Pesanan Selesai" {{ $order->status == 'Pesanan Selesai' ? 'selected' : '' }}>Pesanan Selesai</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
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
