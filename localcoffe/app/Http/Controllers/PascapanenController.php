<?php

namespace App\Http\Controllers;

use App\Models\Panen;
use App\Models\Pascapanen;

use Illuminate\Http\Request;

class PascapanenController extends Controller
{
    //
    public function create($panenId)
    {
        $panen = Panen::find($panenId);
        return view('pascapanen.create', compact('panen'));
    }

    public function store(Request $request, $panenId)
    {
        $pascapanen = new Pascapanen();
        $pascapanen->panen_id = $panenId;
        $pascapanen->nama_produk = $request->input('nama_produk');
        $pascapanen->tanggal_kemasan = $request->input('tanggal_kemasan');
        $pascapanen->save();

        return redirect()->route('panen.index')->with('success', 'Data Pascapanen berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pascapanen = Pascapanen::find($id);
        return view('pascapanen.edit', compact('pascapanen'));
    }

    public function update(Request $request, $id)
    {
        $pascapanen = Pascapanen::find($id);
        $pascapanen->nama_produk = $request->input('nama_produk');
        $pascapanen->tanggal_kemasan = $request->input('tanggal_kemasan');
        $pascapanen->save();

        return redirect()->route('panen.index')->with('success', 'Data Pascapanen berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pascapanen = Pascapanen::find($id);
        $pascapanen->delete();

        return redirect()->route('panen.index')->with('success', 'Data Pascapanen berhasil dihapus');
    }
}
