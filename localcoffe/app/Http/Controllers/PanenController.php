<?php

namespace App\Http\Controllers;
use App\Models\Panen;
use Illuminate\Http\Request;

class PanenController extends Controller
{
    //
    public function index()
    {
        $panen = Panen::all();
        return view('panen.index', compact('panen'));
    }

    public function create()
    {
        return view('panen.create');
    }

    public function store(Request $request)
    {
        $panen = new Panen();
        $panen->nama_tanaman = $request->input('nama_tanaman');
        $panen->tanggal_panen = $request->input('tanggal_panen');
        $panen->jumlah_panen = $request->input('jumlah_panen');
        $panen->save();

        return redirect()->route('panen.index')->with('success', 'Data Panen berhasil ditambahkan');
    }

    public function show($id)
    {
        $panen = Panen::find($id);
        return view('panen.show', compact('panen'));
    }

    public function edit($id)
    {
        $panen = Panen::find($id);
        return view('panen.edit', compact('panen'));
    }

    public function update(Request $request, $id)
    {
        $panen = Panen::find($id);
        $panen->nama_tanaman = $request->input('nama_tanaman');
        $panen->tanggal_panen = $request->input('tanggal_panen');
        $panen->jumlah_panen = $request->input('jumlah_panen');
        $panen->save();

        return redirect()->route('panen.index')->with('success', 'Data Panen berhasil diperbarui');
    }

    public function destroy($id)
    {
        $panen = Panen::find($id);
        $panen->delete();

        return redirect()->route('panen.index')->with('success', 'Data Panen berhasil dihapus');
    }
}
