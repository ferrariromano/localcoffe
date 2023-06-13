@extends('layouts.master')
@section('menu')
  @extends('sidebar.usermanagement')
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
                    <h3>User Profile</h3>
                    <p class="text-subtitle text-muted"></p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
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
                    Data User
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($data as $item)
                            <li class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-6">
                                        <h5 class="mb-0">{{ $item->name }}</h5>
                                        <small class="text-muted">{{ $item->email }}</small>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <p class="mb-0">{{ $item->phone_number }}</p>
                                    </div>
                                    <div class="col-12 col-md-3 text-end">
                                        <a href="{{ url('view/detail/'.$item->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
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
                <p>Dibuat sepenuh <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                href="http://localcoffe.com">Local Coffe</a></p>
            </div>
        </div>
    </footer>
</div>
@endsection
