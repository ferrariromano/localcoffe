<?php

namespace App\Http\Controllers;

use App\Models\JadwalPanen;
use App\Models\Tanaman;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class JadwalPanenController extends Controller
{
    public function index()
    {
        $jadwalPanen = JadwalPanen::with('tanaman')->get();
        return view('jadwal_panen.index', compact('jadwalPanen'));
    }

    public function create()
    {
        $tanaman = Tanaman::all();
        return view('jadwal_panen.create', compact('tanaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanaman_id' => 'required',
            'tanggal' => 'required|date',
            'deskripsi' => 'required',
        ]);

        JadwalPanen::create($request->all());
        Toastr::success('Jadwal panen berhasil ditambahkan.', 'Sukses');
        return redirect()->route('jadwal_panen.index')->with('success', 'Jadwal panen berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwalPanen = JadwalPanen::findOrFail($id);
        $tanaman = Tanaman::all();
        return view('jadwal_panen.edit', compact('jadwalPanen', 'tanaman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanaman_id' => 'required',
            'tanggal' => 'required|date',
            'deskripsi' => 'required',
        ]);

        $jadwalPanen = JadwalPanen::findOrFail($id);
        $jadwalPanen->update($request->all());

        Toastr::success('Jadwal panen berhasil diperbarui.', 'Sukses');

        return redirect()->route('jadwal_panen.index')->with('success', 'Jadwal panen berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jadwalPanen = JadwalPanen::findOrFail($id);
        $jadwalPanen->delete();

        Toastr::success('Jadwal panen berhasil dihapus.', 'Sukses');
        return redirect()->route('jadwal_panen.index')->with('success', 'Jadwal panen berhasil dihapus.');
    }
}
