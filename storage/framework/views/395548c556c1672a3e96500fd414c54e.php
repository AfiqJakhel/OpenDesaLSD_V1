<?php echo $__env->make('core::admin.layouts.components.asset_numeral', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
    <nav role="navigation" aria-label="navigation" class="breadcrumb">
        <ol>
            <li><a href="<?php echo e(site_url('inventaris')); ?>">Inventaris</a></li>
            <li aria-current="page"><?php echo e($judul); ?></li>
        </ol>
    </nav>
    <div class="content py-1">
        <div class="box box-danger" style="padding-bottom: 2rem;">
            <div class="box-header with-border" style="margin-bottom: 15px;">
                <h class="box-title"><?php echo e($judul); ?></h>
            </div>
            <div class="box-body">
                <div class="table-responsive content">
                    <table id="inventaris" class="table table-bordered dataTable table-hover">
                        <thead class="bg-gray">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Barang</th>
                                <th class="text-center">Kode Barang / Nomor Registrasi</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Tahun Pembelian</th>
                                <th class="text-center">Asal Usul</th>
                                <th class="text-center">Harga (Rp)</th>
                            </tr>
                        </thead>
                        <tbody id="inventaris-tbody">

                        </tbody>

                        <tfoot id="inventaris-tfoot">
                            <tr>
                                <th colspan="6" class="text-right">Total:</th>
                                <th class="total"></th>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function(event) {
                const _url = `<?php echo e(ci_route('internal_api.inventaris-asset')); ?>`
                const _tbody = document.getElementById('inventaris-tbody')
                const _tfoot = document.getElementById('inventaris-tfoot')
                $.ajax({
                    url: _url,
                    type: 'GET',
                    beforeSend: () => _tbody.innerHTML = `<?php echo $__env->make('theme::commons.loading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>`,
                    success: (response) => {
                        let _trString = []
                        let _total = 0
                        if (response.data.length) {
                            response.data.forEach((element, key) => {
                                _trString.push(`<tr>
                            <td>${key + 1}</td>                                                                                                                                                                                            
                            <td>${element.attributes.nama_barang}</td>
                            <td>${element.attributes.kode_barang}<br>${element.attributes.register}</td>
                            <td>${element.attributes.jumlah}</td>
                            <td>${element.attributes.tahun_pengadaan}</td>                            
                            <td>${element.attributes.asal}</td>
                            <td>${element.attributes.harga_format}</td>
                        </tr>`)
                                _total += element.attributes.harga
                            });
                            _tfoot.querySelector(`th.total`).innerHTML = numeral(_total).format()
                            _tbody.innerHTML = _trString.join('')
                        } else {
                            _tfoot.remove()
                            _tbody.innerHTML = ''
                        }
                        setTimeout(() => {
                            $('#inventaris').DataTable({
                                columnDefs: [{
                                    targets: [0],
                                    orderable: false
                                }],
                                order: [
                                    [1, 'asc']
                                ]
                            });
                        }, 1000);
                    },
                    dataType: 'json'
                })
            });
        </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('theme::layouts.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/partials/inventaris/asset.blade.php ENDPATH**/ ?>