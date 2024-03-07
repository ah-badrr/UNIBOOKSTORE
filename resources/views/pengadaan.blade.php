@extends('master.app')
@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">Home <span class="mx-1">></span></a></li>
    <li><a> Pengadaan </a></li>
@endsection
@section('header')
    <h2 style="width: max-content">Pengadaan Stok Buku</h2>
@endsection
@section('konten')
    <div class="row">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="float-right heading1 margin_0">
                    </div>
                </div>
                <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Judul Buku</th>
                                    <th>Nama Penerbit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($buku->count() != null)
                                    @foreach ($buku as $b)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>{{ $b->nama_buku }}</td>
                                            <td>{{ $b->penerbit->nama }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center">Data buku tidak ditemukan
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7" class="text-end">
                                        {{--  {{ $buku->withQueryString()->links('pagination::bootstrap-5') }}  --}}
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
