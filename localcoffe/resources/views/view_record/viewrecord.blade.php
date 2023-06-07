@extends('layouts.master')
@section('menu')
@extends('sidebar.viewrecord')
@endsection
@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Ubah Pekerja</h3>
                    <p class="text-subtitle text-muted">Ubah Pekerja Information List</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ubah Pekerja</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        {{-- message --}}
        {!! Toastr::message() !!}
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Ubah Pekerja List
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama Lengkap</th>
                                <th>Gender</th>
                                <th>Email Address</th>
                                <th>Nomor Telepon</th>
                                <th>Posisi</th>
                                <th>Alamat</th>
                                <th>Gaji</th>
                                <th class="text-center">Ubah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td class="id">{{ ++$key }}</td>
                                    <td class="name">{{ $item->rec_id }}</td>
                                    <td class="name">{{ $item->full_name }}</td>
                                    <td class="name">{{ $item->sex }}</td>
                                    <td class="email">{{ $item->email_address }}</td>
                                    <td class="phone_number">{{ $item->phone_number }}</td>
                                    <td class="phone_number">{{ $item->position }}</td>
                                    <td class="phone_number">{{ $item->department }}</td>
                                    <td class="phone_number">{{ $item->salary }}</td>
                                    <td class="text-center">
                                        {{-- <a href="{{ route('form/staff/new') }}">
                                            <span class="badge bg-info"><i class="bi bi-person-plus-fill"></i></span>
                                        </a> --}}
                                        <a href="{{ url('form/view/detail/'.$item->id) }}">
                                            <span class="badge bg-success"><i class="bi bi-pencil-square"></i></span>
                                        </a>
                                        {{-- <a href="{{ url('delete/'.$item->id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapusnya?')"><span class="badge bg-danger"><i class="bi bi-trash"></i></span></a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <footer>
        <div class="footer clearfix mb-0 text-muted ">
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
