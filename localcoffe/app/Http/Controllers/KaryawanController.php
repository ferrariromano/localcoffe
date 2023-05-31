<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use DB;

class KaryawanController extends Controller
{

    public function index()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.index', compact('karyawan'));
    }


    public function create()
    {
        return view('karyawan.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'kelamin' => 'required',
            'email' => 'required|email|unique:karyawan',
            'posisi' => 'required',
            'alamat' => 'required',
            'gaji' => 'required|numeric',
        ]);

        Karyawan::create($request->all());

        return redirect()->route('karyawan.index')->with('success', 'Karyawan created successfully.');
    }


    public function show($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.show', compact('karyawan'));
    }


    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);

        return view('karyawan.edit', compact('karyawan'));
    }


    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $karyawan->nama_lengkap = $request->input('nama_lengkap');
        $karyawan->kelamin = $request->input('kelamin');
        $karyawan->email = $request->input('email');
        $karyawan->posisi = $request->input('posisi');
        $karyawan->alamat = $request->input('alamat');
        $karyawan->gaji = $request->input('gaji');

        $karyawan->save();

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus');
    }
}
