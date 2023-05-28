<?php

namespace App\Http\Controllers;
use App\Models\JadwalPascapanen;
use App\Models\Tanaman;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;

class JadwalPascapanenController extends Controller
{
    public function index()
    {
        $jadwalPascapanen = JadwalPascapanen::with('tanaman')->get();
        return view('jadwal_pascapanen.index', compact('jadwalPascapanen'));
    }

    public function create()
    {
        $tanaman = Tanaman::all();
        return view('jadwal_pascapanen.create', compact('tanaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanaman_id' => 'required',
            'tanggal' => 'required|date',
            'deskripsi' => 'required',
        ]);

        JadwalPascapanen::create($request->all());

        Toastr::success('Jadwal pascapanen berhasil ditambahkan.', 'Sukses');

        return redirect()->route('jadwal_pascapanen.index')->with('success', 'Jadwal pascapanen berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwalPascapanen = JadwalPascapanen::findOrFail($id);
        $tanaman = Tanaman::all();
        return view('jadwal_pascapanen.edit', compact('jadwalPascapanen', 'tanaman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanaman_id' => 'required',
            'tanggal' => 'required|date',
            'deskripsi' => 'required',
        ]);

        $jadwalPascapanen = JadwalPascapanen::findOrFail($id);
        $jadwalPascapanen->update($request->all());
        Toastr::success('Jadwal pascapanen berhasil diperbarui.', 'Sukses');

        return redirect()->route('jadwal_pascapanen.index')->with('success', 'Jadwal pascapanen berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jadwalPascapanen = JadwalPascapanen::findOrFail($id);
        $jadwalPascapanen->delete();
        Toastr::success('Jadwal pascapanen berhasil dihapus.', 'Sukses');

        return redirect()->route('jadwal_pascapanen.index')->with('success', 'Jadwal pascapanen berhasil dihapus.');
    }
}
