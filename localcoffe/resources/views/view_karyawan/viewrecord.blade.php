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
                            <li class="breadcrumb-item active" aria-current="page">Ubah Karyawan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        {{-- message --}}
        {!! Toastr::message() !!}
        <div class="container">
            <h1>List of Employees</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Sex</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                        <th>Position</th>
                        <th>Department</th>
                        <th>Salary</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->full_name }}</td>
                            <td>{{ $row->sex }}</td>
                            <td>{{ $row->email_address }}</td>
                            <td>{{ $row->phone_number }}</td>
                            <td>{{ $row->position }}</td>
                            <td>{{ $row->department }}</td>
                            <td>{{ $row->salary }}</td>
                            <td>
                                <a href="{{ route('karyawan.view-detail', $row->id) }}">View Detail</a>
                                <form action="{{ route('karyawan.view-delete', ['id' => $row->id]) }}" method="post" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('karyawan.view-delete', $row->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    <footer>
        <div class="footer clearfix mb-0 text-muted ">
            <div class="float-start">
                <p>2023 &copy; Local Coffe</p>
            </div>
            <div class="float-end">
                <p>Make with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                href="http://localcoffe.com">Local Coffe</a></p>
            </div>
        </div>
    </footer>
</div>
@endsection
