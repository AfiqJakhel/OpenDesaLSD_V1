<?php if(can('u')): ?>
    <form action="<?php echo e($form_action); ?>" method="post" id="validasi">
        <div class='modal-body'>
            <div class="form-group">
                <label for="nik">NIK / Nama Penduduk</label>
                <select class="form-control input-sm select2 required" id="nik" name="nik" style="width:100%;">
                    <option option value="">-- Silakan Cari NIK / Nama Penduduk--</option>
                </select>
            </div>
            <div class="table-responsive">
                <table id="keluarga" class="table table-bordered dataTable table-hover nowrap" style="display:none;">
                    <thead class="bg-gray disabled color-palette">
                        <tr>
                            <th>#</th>
                            <th>No</th>
                            <th>NIK</th>
                            <th class="text-center">Nama</th>
                            <th>SHDK</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <?php echo batal(); ?>

            <button type="submit" class="btn btn-social btn-info btn-sm" id="ok"><i class='fa fa-check'></i> Simpan</button>
        </div>
    </form>
    <?php echo $__env->make('admin.layouts.components.form_modal_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        $('document').ready(function() {
            $('#nik').select2({
                ajax: {
                    url: '<?php echo e(ci_route('rtm.apipendudukrtm')); ?>',
                    dataType: 'json',
                    data: function(params) {
                        return {
                            q: params.term || '',
                            page: params.page || 1,
                        };
                    },
                    cache: true
                },
                placeholder: function() {
                    $(this).data('placeholder');
                },
                minimumInputLength: 0,
                allowClear: true,
                escapeMarkup: function(markup) {
                    return markup;
                },
            });
        });

        $('#nik').on('select2:select', function(e) {
            if ($.fn.dataTable.isDataTable('#keluarga')) {
                $('#keluarga').DataTable().destroy()
            }
            var table = $('#keluarga').DataTable({
                responsive: true,
                processing: true,
                serverSide: false,
                ajax: {
                    url: `<?php echo e(ci_route('rtm.datables_anggota')); ?>/${e.params.data.id}`,
                    dataSrc: function(data) {
                        if (data.data == null) {
                            $('#keluarga').hide();
                            table.destroy()
                        } else {
                            $('#keluarga').show();
                            return data.data;
                        }
                    },
                },
                'columns': [{
                        'data': function(data) {
                            let checked = data.no == 1 ? 'checked' : '';
                            return `<td><input type="checkbox" name="id_cb[]" value="${data.id}" ${checked} /></td>`
                        },
                        'class': 'padat'
                    },
                    {
                        'data': 'no',
                        'class': 'padat'
                    },
                    {
                        'data': 'nik',
                        'class': 'padat'
                    },
                    {
                        'data': 'nama',
                    },
                    {
                        'data': 'kk_level',
                        'class': 'padat'
                    },
                ],
            });

            table.destroy();
        });
    </script>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\OpenSID\resources\views/admin/penduduk/rtm/ajax_add_anggota_rtm_form.blade.php ENDPATH**/ ?>