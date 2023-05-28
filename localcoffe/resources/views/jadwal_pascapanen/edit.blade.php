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

    {!! Toastr::message() !!}

    <h1>Edit Jadwal Pascapanen</h1>
    <form method="POST" action="{{ route('jadwal_pascapanen.update', $jadwalPascapanen->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tanaman_id">Tanaman:</label>
            <select id="tanaman_id" name="tanaman_id" class="form-control" required>
                @foreach($tanaman as $t)
                    <option value="{{ $t->id }}" {{ $jadwalPascapanen->tanaman_id == $t->id ? 'selected' : '' }}>{{ $t->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ $jadwalPascapanen->tanggal }}" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" class="form-control" required>{{ $jadwalPascapanen->deskripsi }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>



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
