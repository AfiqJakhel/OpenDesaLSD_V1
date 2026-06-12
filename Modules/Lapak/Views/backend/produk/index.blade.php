@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        PRODUK
        <small>Daftar Data</small>
    </h1>
@endsection

@section('breadcrumb')
    <li class="active">Produk</li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')
    @include('admin.layouts.components.konfirmasi_hapus')

    @include('lapak::backend.navigasi', $navigasi)

    <div class="box box-info">
        <div class="box-header with-border">
            @if(request('id_pend'))
                @php
                    $pelapakTerpilih = collect($pelapak)->firstWhere('id_pend', request('id_pend'));
                    $id_pelapak = $pelapakTerpilih ? $pelapakTerpilih->id : '';
                @endphp
                <x-tambah-button :url="'lapak_admin/produk_form?id_pelapak=' . $id_pelapak" />
                <x-hapus-button :url="'lapak_admin/produk_delete_all'" :confirmDelete="true" :selectData="true" />
            @endif
            @php
            $listCetakUnduh = [
                [ 'url' => "lapak_admin/produk/dialog/cetak", 'judul' => "Cetak", 'icon' => 'fa fa-print'],
                [ 'url' => "lapak_admin/produk/dialog/unduh", 'judul' => "Unduh", 'icon' => 'fa fa-download']
            ];
            @endphp
            <x-split-button judul="Cetak/Unduh" :list="$listCetakUnduh" :icon="'fa fa-arrow-circle-down'" :type="'bg-purple'" :target="true" />
        </div>
        <form id="mainform" name="mainform" method="post">
            <div class="box-body">
                <div class="row mepet">
                    <div class="col-sm-2">
                        <select class="form-control input-sm select2" id="status" name="status">
                            <option value="">Pilih Status</option>
                            <option value="1" selected>Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control input-sm select2" id="id_pend" name="id_pend">
                            <option value="">Pilih Pelapak</option>
                            @foreach ($pelapak as $pel)
                                <option value="{{ $pel->id_pend }}" @selected($pel->id_pend == request('id_pend'))>{{ $pel->nik . ' - ' . $pel->pelapak }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control input-sm select2" id="id_produk_kategori" name="id_produk_kategori">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $kat)
                                <option value="{{ $kat->id }}">{{ $kat->kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr class="batas">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable table-hover tabel-daftar" id="tabel-produk">
                        <thead class="bg-gray disabled color-palette">
                            <tr>
                                <th><input type="checkbox" id="checkall" /></th>
                                <th>No</th>
                                <th>Aksi</th>
                                <th>Pelapak</th>
                                <th>Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Satuan</th>
                                <th>Potongan</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            let tabel_produk = $('#tabel-produk').DataTable({
                'processing': true,
                'serverSide': true,
                'autoWidth': false,
                'pageLength': 10,
                'order': [
                    [6, 'desc']
                ],
                'columnDefs': [{
                        'orderable': false,
                        'targets': [0, 1, 2]
                    },
                    {
                        'className': 'padat',
                        'targets': [0, 1, 2, 7, 8]
                    },
                    {
                        'className': 'dt-nowrap',
                        'targets': [9],
                        'width': '30%'
                    },
                    {
                        'targets': [0, 2],
                        'visible': {{ request('id_pend') ? 'true' : 'false' }}
                    }
                ],
                'ajax': {
                    'url': "{{ ci_route('lapak_admin/produk') }}",
                    'method': 'get',
                    'data': function(d) {
                        d.status = $('#status').val();
                        d.id_pend = $('#id_pend').val();
                        d.id_produk_kategori = $('#id_produk_kategori').val();
                    }
                },
                'columns': [
                    {
                        data: 'ceklist',
                        searchable: false,
                        orderable: false
                    },
                    {
                        orderable: false,
                        searchable: false,
                        'data': 'DT_RowIndex'
                    },
                    {
                        data: 'aksi',
                        class: 'aksi',
                        searchable: false,
                        orderable: false
                    },
                    {
                        searchable: false,
                        'data': 'pelapak'
                    },
                    {
                        'data': 'nama'
                    },
                    {
                        'name': 'pk.kategori',
                        'data': 'kategori'
                    },
                    {
                        'data': 'harga',
                        'render': $.fn.dataTable.render.number('.', ',', 0, 'Rp. ')
                    },
                    {
                        'data': 'satuan'
                    },
                    {
                        'name': 'potongan',
                        'data': function(data) {
                            return `${(data.tipe_potongan == 1) ? data.potongan + '%' : 'Rp. ' + formatRupiah(data.potongan.toString())}`
                        }
                    },
                    {
                        name: 'deskripsi',
                        'data': 'deskripsi',
                        'render': function(data) {
                            return data.length > 150 ? data.substr(0, 150) + '…' : data;
                        }
                    }
                ],
                'language': {
                    'url': "{{ base_url('/assets/bootstrap/js/dataTables.indonesian.lang') }}"
                }
            });

            $('#status').on('select2:select', function(e) {
                tabel_produk.ajax.reload();
            });

            $('#id_pend').on('select2:select', function(e) {
                tabel_produk.ajax.reload();
            });

            $('#id_produk_kategori').on('select2:select', function(e) {
                tabel_produk.ajax.reload();
            });
        });
    </script>
@endpush
