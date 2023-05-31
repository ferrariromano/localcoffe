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
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Karyawan Pemilik Usaha</h3>
                <p class="text-subtitle text-muted">Form Input</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Form Input Karyawan Pemilik Usaha</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    {{-- message --}}
    {!! Toastr::message() !!}

    <div class="container">
        <h1>Add New Employee</h1>
        <form action="{{ route('karyawan.save-record') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" class="form-control" name="fullName" id="fullName" required>
            </div>
            <div class="form-group">
                <label for="sex">Sex</label>
                <select class="form-control" name="sex" id="sex" required>
                    <option value="">Select Sex</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="emailAddress">Email Address</label>
                <input type="email" class="form-control" name="emailAddress" id="emailAddress" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="tel" class="form-control" name="phone_number" id="phone_number" required>
            </div>
            <div class="form-group">
                <label for="position">Position</label>
                <input type="text" class="form-control" name="position" id="position" required>
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <input type="text" class="form-control" name="department" id="department" required>
            </div>
            <div class="form-group">
                <label for="salary">Salary</label>
                <input type="text" class="form-control" name="salary" id="salary" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
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
