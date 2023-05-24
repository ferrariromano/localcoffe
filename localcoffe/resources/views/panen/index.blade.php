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
        <h1>Data Panen</h1>
        <a href="{{ route('panen/create') }}" class="btn btn-primary">Tambah Panen</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nama Tanaman</th>
                    <th>Tanggal Panen</th>
                    <th>Jumlah Panen</th>
                    <th>Pascapanen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($panen as $item)
                    <tr>
                        <td>{{ $item->nama_tanaman }}</td>
                        <td>{{ $item->tanggal_panen }}</td>
                        <td>{{ $item->jumlah_panen }}</td>
                        <td>
                            <ul>
                                @foreach ($item->pascapanen as $pascapanen)
                                    <li>{{ $pascapanen->nama_produk }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <a href="{{ route('panen/show', $item->id) }}" class="btn btn-primary">Detail</a>
                            <a href="{{ route('panen/edit', $item->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('panen/destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
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
