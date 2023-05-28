<?php

namespace App\Http\Controllers;
use App\Models\Tanaman;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;


class TanamanController extends Controller
{
    //
    public function index()
    {
        $tanaman = Tanaman::all();
        return view('tanaman.index', compact('tanaman'));
    }

    public function create()
    {
        return view('tanaman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'required',
        ]);

        Tanaman::create($request->all());

        Toastr::success('Tanaman berhasil ditambahkan.', 'Sukses');


        return redirect()->route('tanaman.index')->with('success', 'Tanaman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $tanaman = Tanaman::findOrFail($id);
        return view('tanaman.edit', compact('tanaman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'required',
        ]);

        $tanaman = Tanaman::findOrFail($id);
        $tanaman->update($request->all());
        Toastr::success('Tanaman berhasil diperbarui.', 'Sukses');

        return redirect()->route('tanaman.index')->with('success', 'Tanaman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $tanaman = Tanaman::findOrFail($id);
        $tanaman->delete();
        Toastr::success('Tanaman berhasil dihapus.', 'Sukses');

        return redirect()->route('tanaman.index')->with('success', 'Tanaman berhasil dihapus.');
    }
}
