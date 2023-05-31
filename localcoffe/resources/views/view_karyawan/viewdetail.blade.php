@extends('layouts.master')
@section('menu')
@extends('sidebar.viewkaryawanrecord')
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
                    <h3>Ubah Karyawan</h3>
                    <p class="text-subtitle text-muted">Ubah Karyawan Information List</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ubah Karyawan List</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="container">
                <h1>Employee Detail</h1>
                @foreach($data as $row)
                    <form action="{{ route('karyawan.view-update', ['id' => $row->id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input type="text" class="form-control" name="fullName" id="fullName" value="{{ $row->full_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="sex">Sex</label>
                            <select class="form-control" name="sex" id="sex" required>
                                <option value="Male" {{ $row->sex == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $row->sex == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="emailAddress">Email Address</label>
                            <input type="email" class="form-control" name="emailAddress" id="emailAddress" value="{{ $row->email_address }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="tel" class="form-control" name="phone_number" id="phone_number" value="{{ $row->phone_number }}" required>
                        </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" class="form-control" name="position" id="position" value="{{ $row->position }}" required>
                        </div>
                        <div class="form-group">
                            <label for="department">Department</label>
                            <input type="text" class="form-control" name="department" id="department" value="{{ $row->department }}" required>
                        </div>
                        <div class="form-group">
                            <label for="salary">Salary</label>
                            <input type="text" class="form-control" name="salary" id="salary" value="{{ $row->salary }}" required>
                        </div>
                        <input type="hidden" name="id" value="{{ $row->id }}">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                @endforeach
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
