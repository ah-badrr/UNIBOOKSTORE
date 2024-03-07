@extends('master.app')
@section('breadcrumb')
    <li><a href="{{ route('admin') }}">Admin <span class="mx-1">></span></a></li>
    <li><a href="{{ route('penerbit.index') }}">Penerbit <span class="mx-1">></span></a></li>
    <li><a> Update </a></li>
@endsection
@section('header')
    <h2 style="width: max-content">Edit Data Penerbit</h2>
@endsection
@section('konten')
    <div class="row">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="float-right heading1 margin_0">
                        <a href="{{ route('penerbit.index') }}">
                            <button class="btn btn-warning text-light"><i
                                    class="fa fa-circle-arrow-left mr-2"></i>kembali</button>
                        </a>
                    </div>
                </div>
                <form class="padding_infor_info row" action="{{ route('penerbit.update', $penerbit->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="kode" class="form-label">Kode <span class="text-danger small">*</span></label>
                            <input id="kode" type="text" class="form-control @error('kode') is-invalid @enderror"
                                value="{{ $penerbit->kode }}" name="kode">
                            @error('kode')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama <span class="text-danger small">*</span></label>
                            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                                value="{{ $penerbit->nama }}" name="nama">
                            @error('nama')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="alamat" class="form-label">Alamat <span class="text-danger small">*</span></label>
                            <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"
                                value="{{ $penerbit->alamat }}" name="alamat">
                            @error('alamat')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="kota" class="form-label">Kota <span class="text-danger small">*</span></label>
                            <input id="kota" type="text" class="form-control @error('kota') is-invalid @enderror"
                                value="{{ $penerbit->kota }}" name="kota">
                            @error('kota')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="telepon" class="form-label">No. Telepon <span
                                    class="text-danger small">*</span></label>
                            <input id="telepon" type="number" class="form-control @error('telepon') is-invalid @enderror"
                                value="{{ $penerbit->telepon }}" name="telepon">
                            @error('telepon')
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
