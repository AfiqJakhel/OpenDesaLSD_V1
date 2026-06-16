<?php $__env->startPush('css'); ?>
    <style>
        .no-wrap {
            text-wrap: nowrap;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title'); ?>
    <h1>
        Data <?php echo e($tipe); ?>

        <?php echo e(ucwords($kelompok['nama'])); ?>

    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="<?php echo e(site_url(str_replace('_anggota', '', $controller))); ?>"> Daftar <?php echo e($tipe); ?></a></li>
    <li class="active">
        <?php echo e(ucwords($kelompok['nama'])); ?>

    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <?php if(can('u')): ?>
                        <?php echo $__env->make('admin.layouts.components.buttons.split', [
                            'judul' => "Tambah",
                            'icon' => 'fa fa-plus',
                            'type' => 'btn-success',
                            'list' => [
                                [
                                    'url' => "{$controller}/aksi/1/{$kelompok['id']}",
                                    'judul' => "Tambah Satu Anggota {$tipe}",
                                    'modal' => false
                                ],
                                [
                                    'url' => "{$controller}/aksi/2/{$kelompok['id']}",
                                    'judul' => "Tambah Beberapa Anggota {$tipe}",
                                    'modal' => false
                                ]
                            ]
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <?php echo $__env->make('admin.layouts.components.buttons.hapus', [
                        'url' => "{$ci->controller}/delete_all/{$kelompok['id']}",
                        'confirmDelete' => true,
                        'selectData' => true,
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('admin.layouts.components.tombol_cetak_unduh', [
                        'cetak' => "{$controller}/dialog/cetak/{$kelompok['id']}",
                        'unduh' => "{$controller}/dialog/unduh/{$kelompok['id']}"
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('admin.layouts.components.tombol_kembali', ['url' => site_url(strtolower($tipe)), 'label' => 'Daftar ' . $tipe], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="box-body">
                    <h5><b>Rincian <?php echo e($tipe); ?></b></h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover tabel-rincian">
                            <tbody>
                                <tr>
                                    <td width="20%">Kode <?php echo e($tipe); ?></td>
                                    <td width="1">:</td>
                                    <td>
                                        <?php echo e(strtoupper($kelompok['kode'])); ?>

                                    </td>
                                    <td class="padat" rowspan="5">
                                        <img src="<?php echo e(base_url(LOKASI_LOGO_DESA . $kelompok['logo'])); ?>" class="img-thumbnail" alt="Logo <?php echo e($tipe); ?>" style="max-width: 150px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama <?php echo e($tipe); ?>

                                    </td>
                                    <td>:</td>
                                    <td>
                                        <?php echo e(strtoupper($kelompok['nama'])); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Ketua <?php echo e($tipe); ?>

                                    </td>
                                    <td>:</td>
                                    <td>
                                        <?php echo e(strtoupper($kelompok['nama_ketua'])); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Kategori <?php echo e($tipe); ?>

                                    </td>
                                    <td>:</td>
                                    <td>
                                        <?php echo e(strtoupper($kelompok['kategori'])); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td>
                                        <?php echo e($kelompok['keterangan']); ?>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr style="margin-bottom: 5px;">
                <div class="box-body">
                    <h5><b>Anggota <?php echo e($tipe); ?></b></h5>
                    <hr>
                    <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <form id="mainform" name="mainform" method="post">
                            <div class="table-responsive dataTables_wrapper">
                                <table class="table table-bordered table-striped dataTable table-hover tabel-daftar" id="tabeldata">
                                    <thead class="bg-gray disabled color-palette">
                                        <tr>
                                            <th><input type="checkbox" id="checkall" /></th>
                                            <th>No</th>
                                            <th>Aksi</th>
                                            <th>Foto</th>
                                            <th>No. Anggota</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Tempat / Tanggal Lahir</th>
                                            <th>Umur (Tahun)</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Jabatan</th>
                                            <th>Nomor SK Jabatan</th>
                                            <?php if($tipe == 'Lembaga'): ?>
                                                <th>Nomor SK Pengangkatan</th>
                                                <th>Tanggal SK Pengangkatan</th>
                                                <th>Tanggal SK Pengangkatan</th>
                                                <th>Nomor SK Pemberhentian</th>
                                                <th>Tanggal SK Pemberhentian</th>
                                                <th>Masa Jabatan (Usia/Periode)</th>
                                            <?php endif; ?>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: `<?php echo e(route($controller . '.datatables')); ?>`,
                    data: function(req) {
                        req.id_kelompok = '<?php echo e($kelompok['id']); ?>';
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
                    },
                    {
                        data: 'no_anggota',
                        name: 'no_anggota',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'anggota.nik',
                        name: 'anggota.nik',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'anggota.nama',
                        name: 'anggota.nama',
                        class: 'no-wrap',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'tanggallahir',
                        name: 'tanggallahir',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'umur',
                        name: 'umur',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'jk',
                        name: 'jk',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'anggota.alamat_wilayah',
                        name: 'anggota.alamat_wilayah',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'jabatan',
                        name: 'jabatan',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'no_sk_jabatan',
                        name: 'no_sk_jabatan',
                        searchable: false,
                        orderable: false
                    },
                    <?php if($tipe == 'Lembaga'): ?>
                        {
                            data: 'nmr_sk_pengangkatan',
                            name: 'nmr_sk_pengangkatan',
                            searchable: false,
                            orderable: false
                        }, {
                            data: 'tgl_sk_pengangkatan',
                            name: 'tgl_sk_pengangkatan',
                            searchable: false,
                            orderable: false
                        }, {
                            data: 'tgl_sk_pengangkatan',
                            name: 'tgl_sk_pengangkatan',
                            searchable: false,
                            orderable: false
                        }, {
                            data: 'nmr_sk_pemberhentian',
                            name: 'nmr_sk_pemberhentian',
                            searchable: false,
                            orderable: false
                        }, {
                            data: 'tgl_sk_pemberhentian',
                            name: 'tgl_sk_pemberhentian',
                            searchable: false,
                            orderable: false
                        }, {
                            data: 'periode',
                            name: 'periode',
                            searchable: false,
                            orderable: false
                        },
                    <?php endif; ?> {
                        data: 'keterangan',
                        name: 'keterangan',
                        searchable: true,
                        orderable: false
                    },
                ],
                order: [
                    // [6, 'asc']
                ],
            });

            if (hapus == 0) {
                TableData.column(0).visible(false);
            }

            if (ubah == 0) {
                TableData.column(2).visible(false);
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/kelompok/anggota/index.blade.php ENDPATH**/ ?>