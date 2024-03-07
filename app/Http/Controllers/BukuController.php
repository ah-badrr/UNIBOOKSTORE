<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function dashboard(Request $request)
    {
        $cari = $request->get('search');
        $buku = Buku::where('nama_buku', 'like', "%$cari%")
            ->Paginate(5);

        $no = 5 * ($buku->currentPage() - 1);
        return view('dashboard', compact('buku', 'no', 'cari'));
    }

    public function index(Request $request)
    {
        $cari = $request->get('search');
        $buku = Buku::where('nama_buku', 'like', "%$cari%")
            ->Paginate(5);

        $no = 5 * ($buku->currentPage() - 1);
        return view('buku.index', compact('buku', 'no', 'cari'));
    }

    public function create()
    {
        $penerbit = Penerbit::all();
        return view('buku.create', compact('penerbit'));
    }

    public function store(Request $request)
    {
        $rules = [
            'kode' => 'required|min:4|max:25|unique:buku,kode',
            'nama_buku' => 'required|min:3|max:255|unique:buku,nama_buku',
            'kategori' => 'required|min:3|max:100',
            'harga' => 'required',
            'stok' => 'required',
            'penerbit' => 'required',
        ];

        $this->validate($request, $rules);

        Buku::create([
            'kode' => $request->kode,
            'nama_buku' => $request->nama_buku,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'penerbit_id' => $request->penerbit,
        ]);

        return redirect()->route('buku.index');
    }

    public function show(Buku $buku)
    {
        //
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $penerbit = Penerbit::all();
        return view('buku.edit', compact('buku', 'penerbit'));
    }

    public function update(Request $request, $id)
    {
        $update = Buku::find($id);

        $update->kode = $request->kode;
        $update->nama_buku = $request->nama_buku;

        if (!$update->isDirty()) {
            $rules = [
                'kode' => 'required|min:4|max:25',
                'nama_buku' => 'required|min:3|max:255',
                'kategori' => 'required|min:3|max:100',
                'harga' => 'required',
                'stok' => 'required',
                'penerbit' => 'required',
            ];
        } else {
            $rules = [
                'kode' => 'required|min:4|max:25|unique:buku,kode',
                'nama_buku' => 'required|min:3|max:255|unique:buku,nama_buku',
                'kategori' => 'required|min:3|max:100',
                'harga' => 'required',
                'stok' => 'required',
                'penerbit' => 'required',
            ];
        }

        $this->validate($request, $rules);

        $update->kode = $request->kode;
        $update->nama_buku = $request->nama_buku;
        $update->kategori = $request->kategori;
        $update->harga = $request->harga;
        $update->stok = $request->stok;
        $update->penerbit_id = $request->penerbit;

        $update->save();

        return redirect()->route('buku.index');
    }

    public function destroy( $id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect()->route('buku.index');
    }
}
