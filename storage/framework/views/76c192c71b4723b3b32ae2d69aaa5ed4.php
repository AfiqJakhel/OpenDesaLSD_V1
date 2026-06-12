<?php echo $__env->make('admin.layouts.components.asset_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title'); ?>
    <h1>
        Lokasi
        <small><?php echo e($aksi); ?> Data</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="<?php echo e(ci_route('plan.index')); ?>"> Lokasi</a></li>
    <li class="active"><?php echo e($aksi); ?> Data</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-3">
            <?php echo $__env->make('admin.peta.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-9">
            <?php echo form_open_multipart($form_action, 'class="form-horizontal" id="validasi"'); ?>

            <div class="box box-info">
                <div class="box-header with-border">
                    <?php echo $__env->make('admin.layouts.components.tombol_kembali', ['url' => ci_route('plan.index'), 'label' => 'Lokasi'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Nama Lokasi / Properti</label>
                        <div class="col-sm-7">
                            <input name="nama" class="form-control input-sm nomor_sk required" maxlength="100" type="text" value="<?php echo e($plan->nama); ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Kategori</label>
                        <div class="col-sm-7">
                            <select class="form-control input-sm select2 required" id="ref_point" name="ref_point">
                                <option value="">Pilih Kategori</option>
                                <?php $__currentLoopData = $list_point; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($data->id); ?>" <?= ($data->id == $plan->ref_point) ? 'selected' : ''; ?>><?php echo e($data->nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <?php if ($plan->foto_lokasi) : ?>
                    <div class="form-group">
                        <label class="control-label col-sm-3"></label>
                        <div class="col-sm-7">
                            <img class="attachment-img img-responsive img-circle" src="<?php echo e($plan->foto_lokasi); ?>" alt="Foto">
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Ganti Foto</label>
                        <div class="col-sm-7">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" id="file_path">
                                <input id="file" type="file" class="hidden" name="foto" accept=".gif,.jpg,.jpeg,.png,.webp">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info " id="file_browser"><i class="fa fa-search"></i> Browse</button>
                                </span>
                            </div>
                            <p class="help-block small text-red">Kosongkan jika tidak ingin mengubah foto.</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Keterangan</label>
                        <div class="col-sm-7">
                            <textarea id="desk" name="desk" class="form-control input-sm required" style="height: 200px;white-space: pre-wrap;"><?php echo e($plan->desk); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-12 col-sm-3 col-lg-3 control-label" for="status">Status</label>
                        <div class="btn-group col-xs-12 col-sm-9" data-toggle="buttons">
                            <label id="sx3" class="btn btn-info  btn-sm col-xs-6 col-sm-4 col-lg-2 form-check-label <?php if($plan->enabled == '1' || $plan->enabled == null): ?> <?php echo e('active'); ?> <?php endif; ?>">
                                <input
                                    id="sx1"
                                    type="radio"
                                    name="enabled"
                                    class="form-check-input"
                                    type="radio"
                                    value="1"
                                    <?php if($plan->enabled == '1' || $plan->enabled == null): ?> <?php echo e('checked'); ?> <?php endif; ?>
                                    autocomplete="off"
                                > Aktif
                            </label>
                            <label id="sx4" class="btn btn-info  btn-sm col-xs-6 col-sm-4 col-lg-2 form-check-label <?php if($plan->enabled == '2'): ?> <?php echo e('active'); ?> <?php endif; ?>">
                                <input
                                    id="sx2"
                                    type="radio"
                                    name="enabled"
                                    class="form-check-input"
                                    type="radio"
                                    value="2"
                                    <?php if($plan->enabled == '2'): ?> <?php echo e('checked'); ?> <?php endif; ?>
                                    autocomplete="off"
                                > Tidak Aktif
                            </label>
                        </div>
                    </div>
                </div>
                <div class='box-footer'>
                    <div>
                        <button type='reset' class='btn btn-social btn-danger btn-sm'><i class='fa fa-times'></i>
                            Batal</button>
                        <button type='submit' class='btn btn-social btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Simpan</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {

        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/peta/lokasi/form.blade.php ENDPATH**/ ?>