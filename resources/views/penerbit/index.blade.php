@extends('master.app')
@section('breadcrumb')
    <li><a href="{{ route('admin') }}">Admin <span class="mx-1">></span></a></li>
    <li><a> Penerbit </a></li>
@endsection
@section('header')
    <h2 style="width: max-content">Data Penerbit</h2>
@endsection
@section('konten')
    <div class="row">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="float-right heading1 margin_0">
                        <a href="{{ route('penerbit.create') }}">
                            <button class="btn btn-primary"><i class="fa fa-plus mr-2"></i>tambah </button>
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
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Kota</th>
                                    <th>Telepon</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($penerbit->count() != null)
                                    @foreach ($penerbit as $p)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>{{ $p->kode }}</td>
                                            <td>{{ $p->nama }}</td>
                                            <td>{{ $p->alamat }}</td>
                                            <td>{{ $p->kota }}</td>
                                            <td>{{ $p->telepon }}</td>
                                            <td class="text-right d-flex justify-content-end">
                                                <a class="btn btn-warning" href="{{ route('penerbit.edit', $p->id) }}"><i
                                                        class="fa fa-pencil"></i></a>
                                                <form class="inline-block w-max"
                                                    action="{{ route('penerbit.destroy', $p->id) }}" method="POST">
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
                                        <td colspan="7" class="text-center">Belum ada data penerbit
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7" class="text-end">
                                        {{ $penerbit->withQueryString()->links('pagination::bootstrap-5') }}
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
