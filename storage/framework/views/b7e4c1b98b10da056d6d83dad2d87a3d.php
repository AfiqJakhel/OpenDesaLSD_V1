<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title'); ?>
    <h1>
        Lokasi
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Lokasi</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-3">
            <?php echo $__env->make('admin.peta.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    <?php if(can('u')): ?>
                        <a href="<?php echo e(ci_route('plan.form', $parent)); ?>" id="btn-add" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
                    <?php endif; ?>
                    <?php if(can('h')): ?>
                        <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?php echo e(ci_route('plan.delete', $parent)); ?>')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i
                                class='fa fa-trash-o'
                            ></i>Hapus</a>
                    <?php endif; ?>
                    <?php if($parent_jenis): ?>
                        <?php echo $__env->make('admin.layouts.components.tombol_kembali', ['url' => ci_route('lokasi.index'), 'label' => 'Lokasi'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
                <div class="box-body">
                    <div class="row mepet">
                        <div class="col-sm-2">
                            <select id="status" class="form-control input-sm select2">
                                <option value="">Pilih Status</option>
                                <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select id="point" class="form-control input-sm select2">
                                <option value="">Pilih Jenis</option>
                                <?php $__currentLoopData = $point; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option data-children='<?php echo $item->children->toJson(); ?>' value="<?php echo e($item->id); ?>"><?php echo e($item->nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-sm-3">
                            <select id="subpoint" class="form-control input-sm select2">
                                <option value="">Pilih Kategori</option>
                                <?php $__currentLoopData = $point; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <optgroup label="<?php echo e($item->nama); ?>">
                                        <?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($child->id); ?>"><?php echo e($child->nama); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </optgroup>
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
                                    <th><input type="checkbox" id="checkall" /></th>
                                    <th class="padat">No</th>
                                    <th class="padat">Aksi</th>
                                    <th>Lokasi</th>
                                    <th style="width:10%">Aktif</th>
                                    <th style="width:15%">Jenis</th>
                                    <th style="width:15%">Kategori</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                    url: "<?php echo e(ci_route('plan.datatables')); ?>?parent=<?php echo e($parent); ?>",
                    data: function(req) {
                        req.status = $('#status').val();
                        req.point = $('#point').val();
                        req.subpoint = $('#subpoint').val();
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
                        data: 'nama',
                        name: 'nama',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'enabled',
                        name: 'enabled',
                        searchable: false,
                        orderable: true
                    },
                    {
                        data: 'ref_point',
                        name: 'ref_point',
                        label: 'jenis',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'kategori',
                        name: 'kategori',
                        searchable: false,
                        orderable: false
                    },
                ],
                order: [
                    [3, 'asc']
                ]
            });

            if (hapus == 0) {
                TableData.column(0).visible(false);
            }

            if (ubah == 0) {
                TableData.column(2).visible(false);
            }

            $('#point').change(function() {
                let _label = $(this).find('option:selected').text()
                $('#subpoint').val('')
                $('#subpoint').find('optgroup').prop('disabled', 1)
                if ($(this).val()) {
                    $('#subpoint').closest('div').show()
                    $('#subpoint').find(`optgroup[label="${_label}"]`).prop('disabled', 0)
                } else {
                    $('#subpoint').closest('div').hide()
                }
                $('#btn-add').attr('href', '<?php echo e(ci_route('plan.form')); ?>/' + $(this).val())
                $('#subpoint').select2()
            })

            $('#subpoint').closest('div').hide()

            $('#subpoint, #point, #status').change(function() {
                TableData.draw()
            })

            if (<?php echo e($parent); ?> > 0) {
                $('#point').val(<?php echo e($parent); ?>)
                $('#point').trigger('change')
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/peta/lokasi/index.blade.php ENDPATH**/ ?>