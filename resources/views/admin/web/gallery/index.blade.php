@extends('admin.layouts.index')

@include('admin.layouts.components.asset_datatables')
@include('admin.layouts.components.jquery_ui')
@section('title')
    <h1>
        @if($parent)
            <i class="fa fa-image" style="margin-right:18px;"></i>Foto dalam Album: <strong>{{ $subtitle }}</strong>
        @else
            <i class="fa fa-th-large" style="margin-right:18px;"></i>Daftar Album Galeri
        @endif
    </h1>
@endsection

@section('breadcrumb')
    @if($parent)
        <li><a href="{{ ci_route('gallery') }}">Daftar Album</a></li>
        <li class="active">{{ $subtitle }}</li>
    @else
        <li class="active">Daftar Album</li>
    @endif
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); padding: 14px 18px;">
            <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:10px;">
                <div style="display:flex; align-items:center; gap:12px;">
                    @if ($parent)
                        @include('admin.layouts.components.tombol_kembali', ['url' => ci_route('gallery'), 'label' => 'Daftar Album'])
                    @endif
                    <span style="color:#555; font-size:13px;">
                        @if($parent)
                            <i class="fa fa-info-circle text-info"></i>
                            Anda sedang mengelola <strong>foto</strong> dalam album ini.
                        @else
                            <i class="fa fa-info-circle text-info"></i>
                            Klik nama album untuk menambah <strong>foto</strong> ke dalamnya.
                        @endif
                    </span>
                </div>

                <div style="display:flex; gap:8px; flex-wrap:wrap;">
                    @if (can('u'))
                        @if($parent)
                            {{-- Di dalam album: tombol Tambah Foto --}}
                            <a href="{{ ci_route('gallery.form', $parentEncrypt) }}"
                               class="btn btn-success btn-sm"
                               title="Tambah foto baru ke album ini">
                                <i class="fa fa-picture-o"></i>&nbsp; Tambah Foto
                            </a>
                        @else
                            {{-- Di halaman daftar album: tombol Tambah Album --}}
                            <a href="{{ ci_route('gallery.form', $parentEncrypt) }}"
                               class="btn btn-primary btn-sm"
                               title="Buat album baru">
                                <i class="fa fa-folder-open"></i>&nbsp; Tambah Album
                            </a>
                        @endif
                    @endif

                    @if (can('h'))
                        <a href="#confirm-delete"
                           title="Hapus item terpilih"
                           onclick="deleteAllBox('mainform', '{{ ci_route('gallery.delete', $parentEncrypt) }}')"
                           class="btn btn-danger btn-sm hapus-terpilih">
                            <i class="fa fa-trash-o"></i>&nbsp; Hapus Terpilih
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="box-body">
            <div class="row mepet">
                <div class="col-sm-2">
                    <select id="status" class="form-control input-sm select2" name="status">
                        <option value="">Pilih Status</option>
                        @foreach ($status as $key => $item)
                            <option value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <hr class="batas">
            {!! form_open(null, 'id="mainform" name="mainform"') !!}
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tabeldata">
                    <thead>
                        <tr>
                            <th class="padat">#</th>
                            <th><input type="checkbox" id="checkall" /></th>
                            <th class="padat">No</th>
                            <th class="padat">Aksi</th>
                            <th nowrap>Nama {{ $parent ? 'Gambar' : 'Album' }}</th>
                            <th nowrap>Aktif</th>
                            <th>Dimuat Pada</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="dragable">
                    </tbody>
                </table>
            </div>
            </form>
        </div>
    </div>

    @include('admin.layouts.components.konfirmasi_hapus')
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#status').val(1).trigger('change');

            var parent = '{{ $parent }}';
            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [
                    [7, 'asc']
                ],
                ajax: {
                    url: "{{ ci_route('gallery.datatables') }}",
                    data: function(req) {
                        req.parent = parent;
                        req.status = $('#status').val();
                    }
                },
                columns: [{
                        data: 'drag-handle',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'ceklist',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'DT_RowIndex',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'aksi',
                        class: 'aksi',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'enabled',
                        name: 'enabled',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'tgl_upload',
                        name: 'tgl_upload',
                        searchable: false,
                        orderable: true
                    },
                    {
                        data: 'urut',
                        name: 'urut',
                        searchable: false,
                        orderable: true,
                        visible: false
                    },
                ],
                createdRow: function(row, data, dataIndex) {
                    $(row).attr('data-id', data.id)
                    $(row).addClass('dragable-handle');
                },
                drawCallback: function() {
                    $('[data-rel="popover"]').popover({
                        html: true,
                        trigger: "hover",
                    });
                }
            });

            $('#status').change(function() {
                TableData.column(5).search($(this).val()).draw()
            })


            if (hapus == 0) {
                TableData.column(1).visible(false);
            }

            if (ubah == 0) {
                TableData.column(0).visible(false);

                if (parent) {
                    TableData.column(3).visible(false);
                }
            }

            @include('admin.layouts.components.draggable', ['urlDraggable' => ci_route('gallery.tukar')])

        });
    </script>
@endpush
