<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.jquery_ui', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title'); ?>
    <h1>
        <?php if($parent): ?>
            <i class="fa fa-image" style="margin-right:18px;"></i>Foto dalam Album: <strong><?php echo e($subtitle); ?></strong>
        <?php else: ?>
            <i class="fa fa-th-large" style="margin-right:18px;"></i>Daftar Album Galeri
        <?php endif; ?>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php if($parent): ?>
        <li><a href="<?php echo e(ci_route('gallery')); ?>">Daftar Album</a></li>
        <li class="active"><?php echo e($subtitle); ?></li>
    <?php else: ?>
        <li class="active">Daftar Album</li>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <div class="box-header with-border" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); padding: 14px 18px;">
            <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:10px;">
                <div style="display:flex; align-items:center; gap:12px;">
                    <?php if($parent): ?>
                        <?php echo $__env->make('admin.layouts.components.tombol_kembali', ['url' => ci_route('gallery'), 'label' => 'Daftar Album'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <span style="color:#555; font-size:13px;">
                        <?php if($parent): ?>
                            <i class="fa fa-info-circle text-info"></i>
                            Anda sedang mengelola <strong>foto</strong> dalam album ini.
                        <?php else: ?>
                            <i class="fa fa-info-circle text-info"></i>
                            Klik nama album untuk menambah <strong>foto</strong> ke dalamnya.
                        <?php endif; ?>
                    </span>
                </div>

                <div style="display:flex; gap:8px; flex-wrap:wrap;">
                    <?php if(can('u')): ?>
                        <?php if($parent): ?>
                            
                            <a href="<?php echo e(ci_route('gallery.form', $parentEncrypt)); ?>"
                               class="btn btn-success btn-sm"
                               title="Tambah foto baru ke album ini">
                                <i class="fa fa-picture-o"></i>&nbsp; Tambah Foto
                            </a>
                        <?php else: ?>
                            
                            <a href="<?php echo e(ci_route('gallery.form', $parentEncrypt)); ?>"
                               class="btn btn-primary btn-sm"
                               title="Buat album baru">
                                <i class="fa fa-folder-open"></i>&nbsp; Tambah Album
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if(can('h')): ?>
                        <a href="#confirm-delete"
                           title="Hapus item terpilih"
                           onclick="deleteAllBox('mainform', '<?php echo e(ci_route('gallery.delete', $parentEncrypt)); ?>')"
                           class="btn btn-danger btn-sm hapus-terpilih">
                            <i class="fa fa-trash-o"></i>&nbsp; Hapus Terpilih
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="box-body">
            <div class="row mepet">
                <div class="col-sm-2">
                    <select id="status" class="form-control input-sm select2" name="status">
                        <option value="">Pilih Status</option>
                        <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <hr class="batas">
            <?php echo form_open(null, 'id="mainform" name="mainform"'); ?>

            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tabeldata">
                    <thead>
                        <tr>
                            <th class="padat">#</th>
                            <th><input type="checkbox" id="checkall" /></th>
                            <th class="padat">No</th>
                            <th class="padat">Aksi</th>
                            <th nowrap>Nama <?php echo e($parent ? 'Gambar' : 'Album'); ?></th>
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

    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#status').val(1).trigger('change');

            var parent = '<?php echo e($parent); ?>';
            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [
                    [7, 'asc']
                ],
                ajax: {
                    url: "<?php echo e(ci_route('gallery.datatables')); ?>",
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

            <?php echo $__env->make('admin.layouts.components.draggable', ['urlDraggable' => ci_route('gallery.tukar')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/web/gallery/index.blade.php ENDPATH**/ ?>