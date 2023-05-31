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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detail Karyawan</div>

                    <div class="card-body">
                        <h5>Nama Lengkap:</h5>
                        <p>{{ $karyawan->nama_lengkap }}</p>

                        <h5>Jenis Kelamin:</h5>
                        <p>{{ $karyawan->kelamin }}</p>

                        <h5>Email:</h5>
                        <p>{{ $karyawan->email }}</p>

                        <h5>Posisi:</h5>
                        <p>{{ $karyawan->posisi }}</p>

                        <h5>Alamat:</h5>
                        <p>{{ $karyawan->alamat }}</p>

                        <h5>Gaji:</h5>
                        <p>{{ $karyawan->gaji }}</p>

                        <div class="mt-4">
                            <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
