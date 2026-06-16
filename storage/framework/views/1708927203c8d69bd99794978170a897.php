<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
    <h1>
        PRODUK
        <small><?php echo e($aksi); ?> Data</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="<?php echo e(site_url('lapak_admin/produk')); ?>"></i> Produk</a></li>
    <li class="active"><?php echo e($aksi); ?> Data</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <form id="validasi" action="<?php echo e($form_action); ?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-9">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <?php if (isset($component)) { $__componentOriginalc11c7292aaa9235aebed7379ae351e6a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc11c7292aaa9235aebed7379ae351e6a = $attributes; } ?>
<?php $component = App\View\Components\KembaliButton::resolve(['judul' => 'Kembali ke Daftar Data Produk','url' => '/lapak_admin/produk' . (request('id_pend') ? '?id_pend=' . request('id_pend') : '')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('kembali-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\KembaliButton::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc11c7292aaa9235aebed7379ae351e6a)): ?>
<?php $attributes = $__attributesOriginalc11c7292aaa9235aebed7379ae351e6a; ?>
<?php unset($__attributesOriginalc11c7292aaa9235aebed7379ae351e6a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc11c7292aaa9235aebed7379ae351e6a)): ?>
<?php $component = $__componentOriginalc11c7292aaa9235aebed7379ae351e6a; ?>
<?php unset($__componentOriginalc11c7292aaa9235aebed7379ae351e6a); ?>
<?php endif; ?>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="control-label" for="kategori">Nama Pelapak</label>
                            <select class="form-control input-sm select2 required" name="id_pelapak">
                                <option value="">Pilih Nama Pelapak</option>
                                <?php $__currentLoopData = $pelapak; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($pel->id); ?>" <?= ($main->id_pelapak == $pel->id) ? 'selected' : ''; ?>><?php echo e($pel->nik . ' - ' . $pel->pelapak); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="nama">Nama Produk</label>
                            <input
                                name="nama"
                                class="form-control input-sm strip_tags judul required"
                                type="text"
                                placeholder="Nama Produk"
                                minlength="3"
                                maxlength="100"
                                value="<?php echo e(e($main->nama)); ?>"
                            />
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="kategori">Kategori Produk</label>
                                    <select class="form-control input-sm select2 required" name="id_produk_kategori">
                                        <option value="">Pilih Kategori Produk</option>
                                        <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($kat->id); ?>" <?= ($main->id_produk_kategori == $kat->id) ? 'selected' : ''; ?>><?php echo e($kat->kategori); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="harga">Harga Produk</label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-sm">Rp.</span>
                                        <input
                                            id="harga"
                                            name="harga"
                                            onkeyup="cek_nominal();"
                                            class="form-control input-sm number required"
                                            type="number"
                                            placeholder="Harga Produk"
                                            style="text-align:right;"
                                            min="100"
                                            max="2000000000"
                                            step="100"
                                            value="<?php echo e($main->harga); ?>"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="satuan">Satuan Produk</label>
                                    <select class="form-control input-sm select2-tags required" name="satuan">
                                        <option value="">Pilih Satuan Produk</option>
                                        <?php $__currentLoopData = $satuan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($sat); ?>" <?= ($main->satuan == $sat) ? 'selected' : ''; ?>><?php echo e($sat); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="nama">Potongan Harga Produk</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select id="tipe_potongan" name="tipe_potongan" class="form-control input-sm required">
                                        <option value="1" <?= ($main->tipe_potongan == 1) ? 'selected' : ''; ?>>Persen (%)</option>
                                        <option value="2" <?= ($main->tipe_potongan == 2) ? 'selected' : ''; ?>>Nominal (Rp.)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6" id="tampil-persen" <?php echo e(jecho($main->tipe_potongan, 2, 'style="display:none;"')); ?>>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input
                                            type="number"
                                            class="form-control input-sm number required"
                                            <?php echo e($main->tipe_potongan == 1 ? '' : 'disabled'); ?>

                                            id="persen"
                                            name="persen"
                                            onkeyup="cek_persen();"
                                            placeholder="Potongan Persen (%)"
                                            style="text-align:right;"
                                            min="0"
                                            max="100"
                                            step="1"
                                            value="<?php echo e($main->potongan ?? 0); ?>"
                                        />
                                        <span class="input-group-addon input-sm">%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6" id="tampil-nominal" <?php echo e(jecho($main->tipe_potongan, 1, 'style="display:none;"')); ?>>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon input-sm ">Rp.</span>
                                        <input
                                            type="number"
                                            class="form-control input-sm number required"
                                            <?php echo e($main->tipe_potongan == 2 ? '' : 'disabled'); ?>

                                            id="nominal"
                                            name="nominal"
                                            onkeyup="cek_nominal();"
                                            placeholder="Potongan Nominal (Rp.)"
                                            style="text-align:right;"
                                            min="0"
                                            max="99999999999"
                                            step="10"
                                            value="<?php echo e($main->potongan ?? 0); ?>"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="kode_desa">Deskripsi Produk</label>
                            <textarea name="deskripsi" class="form-control input-sm required" rows="5"><?php echo e(e($main->deskripsi)); ?></textarea>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="reset" class="btn btn-social  btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
                        <button type="submit" class="btn btn-social  btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Foto Produk</h3>
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <center>
                            <?php $foto = json_decode($main->foto, null); ?>
                            <?php for($i = 0; $i < setting('banyak_foto_tiap_produk'); $i++): ?>
                                <b>Foto <?php echo e($i == 0 ? 'Utama' : 'Tambahan ' . $i); ?></b>
                                <?php $ii = $i + 1; ?>
                                <div class="form-group preview-img">
                                    <?php if(is_file(LOKASI_PRODUK . $foto[$i])): ?>
                                        <img class="img-responsive" src="<?php echo e(to_base64(LOKASI_PRODUK . $foto[$i])); ?>" alt="Foto Produk">
                                    <?php else: ?>
                                        <img class="img-responsive" src="<?php echo e(to_base64('assets/images/404-image-not-found.jpg')); ?>" alt="Foto Produk" />
                                    <?php endif; ?>
                                    <div class="input-group input-group-sm">
                                        <input type="hidden" name="old_foto_<?php echo e($ii); ?>" value="<?php echo e($foto[$i]); ?>">
                                        <input type="text" class="form-control file-path">
                                        <input type="file" class="hidden file-input" name="foto_<?php echo e($ii); ?>" accept=".gif,.jpg,.jpeg,.png">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info file-browser"><i class="fa fa-search"></i></button>
                                        </span>
                                        <span class="input-group-addon" style="background-color: red; border: 1px solid #ccc;">
                                            <input type="checkbox" title="Centang Untuk Hapus Foto" name="hapus_foto_<?php echo e($ii); ?>" value="hapus">
                                        </span>
                                    </div>
                                </div>
                                <hr />
                            <?php endfor; ?>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo $__env->make('admin.layouts.components.validasi_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script type="text/javascript">
        /**
         * Tipe Potongan
         * 1 = Persen
         * 2 = Nominal
         */
        $(document).ready(function() {

            $('#tipe_potongan').change();

            $('#tipe_potongan').on('change', function() {
                if (this.value == 2) {
                    $('#tampil-persen').hide();
                    $('#tampil-nominal').show();
                    $('#nominal').addClass('required');
                    $('#persen').removeClass('required');
                    $('#nominal').removeAttr("disabled");
                    cek_nominal();
                } else {
                    $('#tampil-nominal').hide();
                    $('#tampil-persen').show();
                    $('#persen').addClass('required');
                    $('#nominal').removeClass('required');
                    $('#persen').removeAttr("disabled");
                    cek_persen();
                }
            });
        });

        function cek_persen() {
            if (parseInt($('#persen').val()) > 100) {
                $('#persen').val(100);
            }
        }

        function cek_nominal() {
            if (parseInt($('#nominal').val()) > parseInt($('#harga').val())) {
                $('#nominal').val($('#harga').val());
            }
        }

        <?php if(request('sukses_tambah') == 1): ?>
        $(document).ready(function() {
            Swal.fire({
                title: 'Tambah Produk Lain?',
                text: 'Apakah Anda ingin menambahkan produk lain untuk pelapak ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Tambah',
                cancelButtonText: 'Tidak, Kembali',
                customClass: {
                    popup: "swal-lg",
                }
            }).then((result) => {
                if (!result.isConfirmed) {
                    window.location.href = "<?php echo e(site_url('lapak_admin/produk')); ?>" + "<?php echo request('id_pend') ? '?id_pend=' . request('id_pend') : ''; ?>";
                }
            });
        });
        <?php endif; ?>
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\Modules\Lapak\Views/backend/produk/form.blade.php ENDPATH**/ ?>