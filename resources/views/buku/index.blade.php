@extends('master.app')
@section('breadcrumb')
    <li><a href="{{ route('admin') }}">Admin <span class="mx-1">></span></a></li>
    <li><a> Buku </a></li>
@endsection
@section('header')
    <h2 style="width: max-content">Data Buku</h2>
@endsection
@section('konten')
    <div class="row">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="float-right heading1 margin_0">
                        <a href="{{ route('buku.create') }}">
                            <button class="btn btn-primary"><i class="fa fa-circle-plus mr-2"></i>tambah </button>
                        </a>
                    </div>
                </div>
                <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Kategori</th>
                                    <th>Nama Buku</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Penerbit</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($buku->count() != null)
                                    @foreach ($buku as $b)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>{{ $b->kode }}</td>
                                            <td>{{ $b->kategori }}</td>
                                            <td>{{ $b->nama_buku }}</td>
                                            <td>{{ $b->harga }}</td>
                                            <td>{{ $b->stok }}</td>
                                            <td>{{ $b->nerbit->nama }}</td>
                                            <td class="text-right d-flex justify-content-end">
                                                <a class="btn btn-warning" href="{{ route('buku.edit', $b->id) }}"><i
                                                        class="fa fa-pencil"></i></a>
                                                <form class="inline-block w-max"
                                                    action="{{ route('buku.destroy', $b->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                        onclick="return confirm('Anda Yakin Ingin Hapus Data??')"
                                                        class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center">Belum ada data buku
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8" class="text-end">
                                        {{ $buku->withQueryString()->links('pagination::bootstrap-5') }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
