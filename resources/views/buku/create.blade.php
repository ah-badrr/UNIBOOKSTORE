@extends('master.app')
@section('breadcrumb')
    <li><a href="{{ route('admin') }}">Admin <span class="mx-1">></span></a></li>
    <li><a href="{{ route('buku.index') }}">Buku <span class="mx-1">></span></a></li>
    <li><a> Create </a></li>
@endsection
@section('header')
    <h2 style="width: max-content">Tambah Data Buku</h2>
@endsection
@section('konten')
    <div class="row">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="float-right heading1 margin_0">
                        <a href="{{ route('buku.index') }}">
                            <button class="btn btn-warning text-light"><i
                                    class="fa fa-circle-arrow-left mr-2"></i>kembali</button>
                        </a>
                    </div>
                </div>
                <form class="padding_infor_info row" action="{{ route('buku.store') }}" method="POST">
                    @csrf
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="kode" class="form-label">Kode <span class="text-danger small">*</span></label>
                            <input id="kode" type="text" class="form-control @error('kode') is-invalid @enderror"
                                value="{{ old('kode') }}" name="kode">
                            @error('kode')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="kategori" class="form-label">kategori <span
                                    class="text-danger small">*</span></label>
                            <input id="kategori" type="text"
                                class="form-control @error('kategori') is-invalid @enderror" value="{{ old('kategori') }}"
                                name="kategori">
                            @error('kategori')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="nama_buku" class="form-label">nama_buku <span
                                    class="text-danger small">*</span></label>
                            <input id="nama_buku" type="text"
                                class="form-control @error('nama_buku') is-invalid @enderror" value="{{ old('nama_buku') }}"
                                name="nama_buku">
                            @error('nama_buku')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="harga" class="form-label">harga <span class="text-danger small">*</span></label>
                            <input id="harga" type="number" class="form-control @error('harga') is-invalid @enderror"
                                value="{{ old('harga') }}" name="harga">
                            @error('harga')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="stok" class="form-label">Stok <span
                                    class="text-danger small">*</span></label>
                            <input id="stok" type="number" class="form-control @error('stok') is-invalid @enderror"
                                value="{{ old('stok') }}" name="stok">
                            @error('stok')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="penerbit" class="form-label">Penerbit <span
                                    class="text-danger small">*</span></label>
                            <select name="penerbit" id="penerbit"
                                class="custom-select mb-2 @error('penerbit') is-invalid @enderror">
                                <option value="" selected hidden disabled>Pilih Penerbit</option>
                                @foreach ($penerbit as $p)
                                    <option value="{{ $p->id }}">
                                        {{ $p->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('penerbit')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
