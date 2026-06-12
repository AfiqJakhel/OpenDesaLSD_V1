<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.datetime_picker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->startSection('title'); ?>
    <h1>
        Data Calon Pemilih
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Data Calon Pemilih</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="col-sm-8 col-lg-9">
                <div class="row">
                    <?php echo $__env->make('admin.layouts.components.buttons.btn', [
                        'url' => 'pemilihan',
                        'judul' => 'Daftar Pemilihan',
                        'icon' => 'fa fa-list',
                        'type' => 'btn-success'
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('admin.layouts.components.tombol_cetak_unduh', [
                        'cetak' => "dpt/ajax_cetak/cetak",
                        'unduh' => "dpt/ajax_cetak/unduh"
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('admin.layouts.components.buttons.btn', [
                        'judul' => 'Daftar Pemilihan',
                        'icon' => 'fa fa-search',
                        'type' => 'btn-primary',
                        'modalTarget' => 'modal-search-form',
                        'judul' => 'Pencarian Spesifik',
                        'modal' => true,
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="row">
                    <div class="input-group">
                        <span class="input-group-addon input-sm">Tanggal Pemilihan</span>
                        <div class="input-group input-group-sm date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control input-sm datepicker pull-right" name="tgl_pemilihan" type="text" value="<?php echo e($tanggal_pemilihan); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-header" style="border-bottom: 1px solid #f4f4f4;">
            <h4 class="text-center"><strong>DAFTAR CALON PEMILIH UNTUK TANGGAL PEMILIHAN <span id="info-tgl-pemilihan"><?php echo e($tanggal_pemilihan); ?></span></strong></h4>
        </div>
        <div class="box-body">
            <div class="row mepet">
                <div class="col-sm-2">
                    <select class="form-control input-sm select2" name="sex">
                        <option value="">Pilih Jenis Kelamin</option>
                        <?php $__currentLoopData = $jenis_kelamin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($data->id); ?>"><?php echo e(set_ucwords($data->nama)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <?php echo $__env->make('admin.layouts.components.wilayah', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <hr class="batas">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tabeldata">
                    <thead>
                        <tr>
                            <th class="padat">NO</th>
                            <th nowrap>NIK</th>
                            <th nowrap>TAG ID CARD</th>
                            <th nowrap>NAMA</th>
                            <th nowrap>NO KK</th>
                            <th nowrap>ALAMAT</th>
                            <th nowrap><?php echo e(strtoupper(setting('sebutan_dusun'))); ?></th>
                            <th nowrap>RW</th>
                            <th nowrap>RT</th>
                            <th nowrap>PENDIDIKAN DALAM KK</th>
                            <th nowrap class="info-umur">UMUR PADA <?php echo e($tanggal_pemilihan); ?></th>
                            <th nowrap>PEKERJAAN</th>
                            <th nowrap>KAWIN</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <?php echo $__env->make('admin.dpt.modal_search_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .select2-results__option[aria-disabled=true] {
            display: none;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e(ci_route('dpt.datatables')); ?>",
                    data: function(req) {
                        req.tgl_pemilihan = $('input[name=tgl_pemilihan]').val()
                        req.sex = $('select[name=sex]').val()
                        req.dusun = $('#dusun').val()
                        req.rw = $('#rw').val()
                        req.rt = $('#rt').val()
                        req.advanced = {
                            umur: {
                                min: $('input[name=umur_min]').val(),
                                max: $('input[name=umur_max]').val(),
                                satuan: $('select[name=umur]').val()
                            },
                            search: $('.search-advance').find('select').not('select[name=umur]').serialize()
                        }
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'nik',
                        name: 'nik',
                        class: 'padat',
                        searchable: true,
                        orderable: true,
                        render: function(data, type, row) {
                            return `<a href="<?php echo e(ci_route('penduduk.detail')); ?>/${row.id}" id="test" name="${row.id}">${row.nik}</a>`
                        },
                    },
                    {
                        data: 'tag_id_card',
                        name: 'tag_id_card',
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
                        data: 'keluarga.no_kk',
                        name: 'keluarga.no_kk',
                        searchable: false,
                        orderable: true,
                        defaultContent: '',
                        render: function(data, type, row) {
                            return row.id_kk ? `<a href="<?php echo e(ci_route('keluarga.kartu_keluarga')); ?>/${row.id_kk}" >${row.keluarga.no_kk}</a>` : ``
                        },
                    },
                    {
                        data: 'alamat_sekarang',
                        name: 'alamat_sekarang',
                        searchable: false,
                        orderable: false,
                    },
                    {
                        data: 'dusun',
                        name: 'dusun',
                        searchable: false,
                        orderable: false,
                    },
                    {
                        data: 'rw',
                        name: 'rw',
                        searchable: false,
                        orderable: false,
                    },
                    {
                        data: 'rt',
                        name: 'rt',
                        searchable: false,
                        orderable: false,
                    },
                    {
                        data: 'pendidikan_k_k.nama',
                        name: 'pendidikan_k_k.nama',
                        searchable: false,
                        orderable: false,
                        defaultContent: ''
                    },
                    {
                        data: 'tanggallahir',
                        name: 'tanggallahir',
                        class: 'padat',
                        searchable: false,
                        orderable: true,
                        render: function(data, type, row) {
                            return row.umur_pemilihan
                        },
                    },
                    {
                        data: 'pekerjaan.nama',
                        name: 'pekerjaan.nama',
                        searchable: false,
                        orderable: false,
                    },
                    {
                        data: 'status_kawin.nama',
                        name: 'status_kawin.nama',
                        searchable: false,
                        orderable: false,
                        defaultContent: ''
                    },
                ],
                order: [
                    [1, 'asc']
                ],
                pageLength: 50,
            });

            $('input[name=tgl_pemilihan]').change(function() {
                TableData.draw()
                $('span#info-tgl-pemilihan').text($(this).val())
                $('th.info-umur').text('UMUR PADA ' + $(this).val())
            })

            $('select[name=sex], #dusun, #rw, #rt').change(function() {
                TableData.draw()
            })

            $('#btnSearchAdvance').click(function() {
                $(this).closest('.modal').modal('hide')
                TableData.draw()
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/dpt/index.blade.php ENDPATH**/ ?>