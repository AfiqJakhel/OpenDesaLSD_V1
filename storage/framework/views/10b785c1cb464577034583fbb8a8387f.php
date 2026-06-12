<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.datetime_picker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title'); ?>
    <h1>
        Catatan Peristiwa
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Catatan Peristiwa</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-sm-12">
                    <?php if(can('h') && data_lengkap()): ?>
                        <a href="#confirm-status" title="Kembalikan Status" onclick="aksiBorongan('mainform', '<?php echo e(ci_route('penduduk_log.kembalikan_status_all')); ?>')"
                            class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"
                        ><i class='fa fa-undo'></i> Kembalikan Status Terpilih</a>
                    <?php endif; ?>
                    <?php echo $__env->make('admin.layouts.components.tombol_cetak_unduh', ['cetak' => 'penduduk_log/ajax_cetak/cetak', 'unduh' => 'penduduk_log/ajax_cetak/unduh'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="row mepet">
                <div class="col-sm-2">
                    <select class="form-control input-sm select2" id="kode_peristiwa">
                        <option value="">Pilih Jenis Peristiwa</option>
                        <?php $__currentLoopData = $list_jenis_peristiwa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>" <?= ($defaultFilter['kode_peristiwa'] == $key) ? 'selected' : ''; ?>><?php echo e(set_ucwords($val)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control input-sm select2" id="tahun" width="100%">
                        <option value="">Pilih Tahun</option>
                        <?php for($t = date('Y'); $t >= $tahun_log_pertama; $t--): ?>
                            <option value=<?php echo e($t); ?> <?= ($defaultFilter['tahun'] == $t) ? 'selected' : ''; ?>><?php echo e($t); ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control input-sm select2" id="bulan" width="100%">
                        <option value="">Pilih Bulan</option>
                        <?php $__currentLoopData = bulan(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no_bulan => $nama_bulan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($no_bulan); ?>" <?= ($defaultFilter['bulan'] == $no_bulan) ? 'selected' : ''; ?>><?php echo e($nama_bulan); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control input-sm select2" id="jenis_kelamin">
                        <option value="">Pilih Jenis Kelamin</option>
                        <?php $__currentLoopData = $list_sex; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>" <?= ($defaultFilter['sex'] == $key) ? 'selected' : ''; ?>><?php echo e(set_ucwords($val)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control input-sm select2" id="agama">
                        <option value="">Pilih Agama</option>
                        <?php $__currentLoopData = $list_agama; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>"><?php echo e(set_ucwords($val)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="row mepet" style="margin-top:10px;">
                <?php echo $__env->make('admin.layouts.components.wilayah', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <hr class="batas">
            <?php echo form_open(null, 'id="mainform" id="mainform"'); ?>

            <?php if($judul_statistik): ?>
                <h5 id="judul-statistik" class="box-title text-center"><b><?php echo e($judul_statistik); ?></b></h5>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tabeldata" data-statistikfilter='<?php echo json_encode($statistikFilter); ?>'>
                    <thead>
                        <tr>
                            <th nowrap><input type="checkbox" id="checkall"></th>
                            <th nowrap>NO</th>
                            <th nowrap>AKSI</th>
                            <th nowrap>FOTO</th>
                            <th nowrap>NIK</th>
                            <th nowrap>NAMA</th>
                            <th nowrap>NO. KK / NAMA KK</th>
                            <th nowrap><?php echo e(strtoupper(setting('sebutan_dusun'))); ?></th>
                            <th nowrap>RW</th>
                            <th nowrap>RT</th>
                            <th nowrap>UMUR</th>
                            <th nowrap>STATUS MENJADI</th>
                            <th nowrap>TGL PERISTIWA</th>
                            <th nowrap>TGL LAPOR</th>
                            <th nowrap>CATATAN PERISTIWA</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            </form>
        </div>
    </div>
    <?php echo $__env->make('admin.layouts.components.konfirmasi', ['periksa_data' => true, 'pertanyaan' => $pertanyaan], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .select2-results__option[aria-disabled=true] {
            display: none;
        }

        .row.mepet>div {
            margin-right: -25px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            let filterColumn = <?php echo json_encode($filterColumn); ?>

            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e(ci_route('penduduk_log.datatables')); ?>",
                    data: function(req) {
                        req.kode_peristiwa = $('#kode_peristiwa').val();
                        req.tahun = $('#tahun').val();
                        req.bulan = $('#bulan').val();
                        req.jenis_kelamin = $('#jenis_kelamin').val();
                        req.agama = $('#agama').val();
                        req.dusun = $('#dusun').val();
                        req.rw = $('#rw').val();
                        req.rt = $('#rt').val();
                        req.statistikfilter = $('#tabeldata').data('statistikfilter')
                    }
                },
                columns: [{
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
                        data: 'foto',
                        name: 'foto',
                        searchable: false,
                        orderable: false,
                        defaultContent: ''
                    },
                    {
                        data: 'penduduk.nik',
                        name: 'penduduk.nik',
                        render: function(item, data, row) {
                            return `<a href='<?php echo e(ci_route('penduduk.detail')); ?>/${row.penduduk.id}'>${item}</a>`
                        },
                        searchable: true,
                        orderable: true,
                        defaultContent: ''
                    },
                    {
                        data: 'penduduk.nama',
                        name: 'penduduk.nama',
                        render: function(item, data, row) {
                            return `<a href='<?php echo e(ci_route('penduduk.detail')); ?>/${row.penduduk.id}'>${item.toUpperCase()}</a>`
                        },
                        searchable: true,
                        orderable: true,
                        defaultContent: ''
                    },
                    {
                        data: 'keluarga.no_kk',
                        name: 'keluarga.no_kk',
                        render: function(item, data, row) {
                            return !item ? '' :
                                `<a href='<?php echo e(ci_route('keluarga.kartu_keluarga')); ?>/${row.penduduk.id_kk}'>${item}</a><br>${row.kepala_keluarga.toUpperCase()}`
                        },
                        searchable: true,
                        orderable: true,
                        defaultContent: ''
                    },
                    {
                        data: 'penduduk.wilayah.dusun',
                        name: 'dusun',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'penduduk.wilayah.rw',
                        name: 'rw',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'penduduk.wilayah.rt',
                        name: 'rt',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'umur',
                        name: 'penduduk.tanggallahir',
                        searchable: false,
                        orderable: true,
                        defaultContent: '-',
                    },
                    {
                        data: 'status_menjadi',
                        name: 'status_menjadi',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'tgl_peristiwa',
                        name: 'tgl_peristiwa',
                        searchable: false,
                        orderable: true
                    },
                    {
                        data: 'tgl_lapor',
                        name: 'tgl_lapor',
                        searchable: false,
                        orderable: true
                    },
                    {
                        data: 'catatan',
                        name: 'catatan',
                        searchable: false,
                        orderable: false
                    },

                ],
                order: [
                    [13, 'desc']
                ],
            });

            if (hapus == 0) {
                TableData.column(0).visible(false);
            }
            if (ubah == 0) {
                TableData.column(2).visible(false);
            }

            $('#kode_peristiwa, #bulan, #tahun ,#agama, #jenis_kelamin, #dusun, #rw, #rt').change(function() {
                TableData.draw()
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/penduduk_log/index.blade.php ENDPATH**/ ?>