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
        <h1>Products</h1>

        <a href="{{ route('products/create') }}" class="btn btn-primary">Add Product</a>

        @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
        @endif
        {!! Toastr::message() !!}
        <div class="card-body">
        <table class="table table-striped" id="table1">
        {{-- <table class="table mt-3"> --}}
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th class="text-center" >Actions </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <img src="{{ asset('images/'.$product->image) }}" alt="Product Image" class="img-thumbnail" width="100">
                        </td>
                        <td>
                            <a href="{{ route('products/edit', $product->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('products/destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>






























    {{-- <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Daftar Produk</h3>
                    <p class="text-subtitle text-muted">Daftar Produk list</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Produk</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div> --}}

        {{-- message --}}
        {{-- {!! Toastr::message() !!}
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Daftar Produk
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th class="text-center">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="id">{{ $product->id }}</td>
                                    <td class="name">{{ $product->name }}</td>
                                    <td class="phone_number">{{ $product->price }}</td>
                                    <td class="description">{{ $product->description }}</td>
                                    <td class="text-center">
                                        @if ($product->image)
                                        <img src="{{ asset('images/' . $product->image) }}" alt="Gambar Produk" class="product-image">
                                        @endif


                                        <a href="{{ route('products/edit', $product->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('products/destroy', $product->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button> --}}



                                            {{-- <a href="{{ url('products/edit'.$product->id) }}">
                                                <span class="badge bg-success"><i class="bi bi-pencil-square"></i></span>
                                            </a>
                                            <a href="{{ url('products/destroy'.$product->id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapusnya?')"><span class="badge bg-danger"><i class="bi bi-trash"></i></span></a> --}}
                                    {{-- </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}

    {{-- <a href="{{ route('products/create') }}">Tambah Produk</a> --}}





    {{-- <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Pekerja Perkebunan</h3>
                <p class="text-subtitle text-muted">Form Input</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Input Pekerja Perkebunan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div> --}}

    {{-- message --}}
    {!! Toastr::message() !!}

    {{-- <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Input Information</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" action="{{ route('form/save') }}" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Nama Lengkap</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('fullName') is-invalid @enderror" value="{{ old('fullName') }}"
                                                placeholder="Masukkan Nama Lengkap" id="first-name-icon" name="fullName">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-check-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Gender</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" value="Male" id="male">
                                        <label class="form-check-label" for="male">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" value="Female" id="male">
                                        <label class="form-check-label" for="male">Perempuan</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" value="Other" id="male">
                                        <label class="form-check-label" for="male">Other</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Email Address</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="email" class="form-control @error('emailAddress') is-invalid @enderror" value="{{ old('emailAddress') }}"
                                                placeholder="Masukkan email" id="first-name-icon" name="emailAddress">
                                            <div class="form-control-icon">
                                                <i class="bi bi-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Nomor Telepon</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}"
                                                placeholder="Masukkan Nomer Telepon" name="phone_number">
                                            <div class="form-control-icon">
                                                <i class="bi bi-phone"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Posisi</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}"
                                                placeholder="Masukkan Posisi" name="position">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Alamat</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('department') is-invalid @enderror" value="{{ old('department') }}"
                                                placeholder="Masukkan Alamat" name="department">
                                            <div class="form-control-icon">
                                                <i class="bi bi-shop-window"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Gaji</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('salary') is-invalid @enderror" value="{{ old('salary') }}"
                                                placeholder="Masukkan Gaji" name="salary">
                                            <div class="form-control-icon">
                                                <i class="bi bi-envelope-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Batal</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

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
