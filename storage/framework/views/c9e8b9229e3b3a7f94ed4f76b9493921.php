<?php $__env->startPush('styles'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style type="text/css">
        .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
        .label {
            border-radius: 9999px; /* rounded-full */
            padding: 4px 12px;
            color: white;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-block;
            letter-spacing: 0.05em;
        }

        .label-danger { background-color: #ef4444; }
        .label-info { background-color: #3b82f6; }
        .label-success { background-color: #10b981; }

        .support-content .fa-padding .fa { padding-top: 5px; width: 1.5em; }
        .support-content .info { color: #777; margin: 0px; }
        .support-content a { color: #111; }
        .support-content .info a:hover { text-decoration: underline; }
        .support-content .info .fa { width: 1.5em; text-align: center; }
        .support-content .number { color: #777; }
        .support-content img { margin: 0 auto; display: block; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
        .support-content .modal-body { padding-bottom: 0px; }
        .support-content-comment { padding: 10px 10px 10px 30px; }
        
        /* Modals overrides */
        .modal-content { border-radius: 1.5rem !important; overflow: hidden; border: none !important; }
        .modal-header { background-color: #f8fafc; border-bottom: 1px solid #e2e8f0 !important; }
        .modal-footer { background-color: #f8fafc; border-top: 1px solid #e2e8f0 !important; }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<section class="relative bg-[#0D2247] text-white overflow-hidden font-jakarta" style="min-height:220px;">
    <div class="absolute inset-0 opacity-10"
         style="background-image:url('https://images.unsplash.com/photo-1577962917302-cd874c4e31d2?w=1600&q=80');background-size:cover;background-position:center;">
    </div>
    <div class="container mx-auto px-4 max-w-7xl py-14 relative z-10">
        
        <nav class="flex items-center gap-2 text-xs mb-5">
            <a href="<?php echo e(ci_route()); ?>" class="text-white/60 hover:text-white transition">Beranda</a>
            <i class="fas fa-chevron-right text-[8px] text-white/30"></i>
            <span class="text-white font-semibold">Pengaduan</span>
        </nav>

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <span class="text-amber-400 font-bold tracking-widest text-[10px] uppercase block mb-2">Layanan Warga</span>
                <h1 class="text-4xl font-extrabold drop-shadow-md">Pengaduan Masyarakat</h1>
            </div>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 36" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block;width:100%">
            <path d="M0 36L0 18Q720 0 1440 18L1440 36Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>


<div class="bg-gray-50 min-h-screen font-jakarta py-10">
    <div class="container mx-auto px-4 max-w-7xl">
        
        <!-- Action Bar -->
        <div class="flex flex-col lg:flex-row justify-between items-center gap-4 mb-8 bg-white p-3 lg:p-4 rounded-full shadow-sm border border-gray-100">
            <button type="button" class="bg-[#0D2247] text-white px-6 py-3 rounded-full font-bold hover:bg-blue-900 transition-all duration-300 shadow-md hover:shadow-lg w-full lg:w-auto flex-shrink-0" data-bs-toggle="modal" data-bs-target="#newpengaduan">
                <i class="fas fa-bullhorn mr-2"></i> Buat Pengaduan
            </button>
            <div class="flex flex-col md:flex-row gap-3 w-full lg:w-auto flex-1 justify-end">
                <select class="form-select border-gray-200 focus:border-[#0D2247] focus:ring-0 rounded-full text-sm font-semibold text-gray-600 bg-gray-50" id="caristatus" name="caristatus">
                    <option value="">Semua Status</option>
                    <option value="1">Menunggu Diproses</option>
                    <option value="2">Sedang Diproses</option>
                    <option value="3">Selesai Diproses</option>
                </select>
                <div class="relative w-full lg:w-64">
                    <input type="text" name="cari-pengaduan" value="" placeholder="Cari pengaduan..." class="form-input w-full pl-5 pr-12 border-gray-200 focus:border-[#0D2247] focus:ring-0 rounded-full text-sm bg-gray-50">
                    <button id="btn-search" type="button" class="absolute right-1 top-1 bottom-1 w-10 bg-[#0D2247] text-white rounded-full flex items-center justify-center hover:bg-blue-900 transition">
                        <i class="fa fa-search text-xs"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Notifikasi -->
        <div class="mb-6">
            <?php echo $__env->make('theme::commons.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        
        <div id="pengaduan-list" class="min-h-[400px]"></div>
        
        <div class="mt-8">
            <?php echo $__env->make('theme::commons.pagination', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>

    <!-- BEGIN DETAIL TICKET -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto font-jakarta" id="pengaduan-detail" tabindex="-1" role="dialog" aria-labelledby="pengaduan-detail" aria-hidden="true">
        <div class="modal-dialog relative w-auto pointer-events-none modal-lg">
            <div class="modal-content border-none shadow-2xl relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-5 lg:p-6">
                    <h4 class="text-xl font-bold text-[#0D2247]"><i class="fa fa-folder-open mr-2 text-amber-500"></i> <span id="pengaduan-judul"></span></h4>
                </div>
                <div class="modal-body relative p-5 lg:p-8 text-sm lg:text-base text-gray-700">

                </div>
                <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-5">
                    <button type="button" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-2 px-6 rounded-full transition" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END DETAIL TICKET -->

    <!-- Formulir Pengaduan -->
    <div
        class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto font-jakarta"
        tabindex="-1"
        id="newpengaduan"
        role="dialog"
        aria-labelledby="newpengaduan"
        aria-hidden="true"
    >
        <div class="modal-dialog relative w-auto pointer-events-none modal-lg">
            <div class="modal-content border-none shadow-2xl relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-5 lg:p-6">
                    <h4 class="text-xl font-bold text-[#0D2247]"><i class="fas fa-bullhorn mr-2 text-amber-500"></i> Buat Pengaduan Baru</h4>
                </div>
                <form action="<?php echo e($form_action); ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body relative p-5 lg:p-8 space-y-4">
                        <!-- Notifikasi -->
                        <?php echo $__env->make('theme::commons.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php $data = session('data', []) ?>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1">NIK</label>
                                <input name="nik" type="text" maxlength="16" class="form-input w-full rounded-xl border-gray-200 focus:border-[#0D2247] focus:ring-0 bg-gray-50" placeholder="Masukkan NIK" value="<?php echo e($data['nik']); ?>">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input name="nama" type="text" required class="form-input w-full rounded-xl border-gray-200 focus:border-[#0D2247] focus:ring-0 bg-gray-50" placeholder="Nama Lengkap" value="<?php echo e($data['nama']); ?>">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1">Email</label>
                                <input name="email" type="email" class="form-input w-full rounded-xl border-gray-200 focus:border-[#0D2247] focus:ring-0 bg-gray-50" placeholder="Alamat Email" value="<?php echo e($data['email']); ?>">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1">Nomor Telepon</label>
                                <input name="telepon" type="text" class="form-input w-full rounded-xl border-gray-200 focus:border-[#0D2247] focus:ring-0 bg-gray-50" placeholder="No. Telepon / WA" value="<?php echo e($data['telepon']); ?>">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1">Judul Pengaduan <span class="text-red-500">*</span></label>
                            <input name="judul" type="text" class="form-input w-full rounded-xl border-gray-200 focus:border-[#0D2247] focus:ring-0 bg-gray-50" required placeholder="Judul Pengaduan" value="<?php echo e($data['judul']); ?>">
                        </div>
                        
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1">Isi Pengaduan <span class="text-red-500">*</span></label>
                            <textarea name="isi" required class="form-textarea w-full rounded-xl border-gray-200 focus:border-[#0D2247] focus:ring-0 bg-gray-50 resize-none" placeholder="Deskripsikan pengaduan Anda secara detail..." rows="4"><?php echo e($data['isi']); ?></textarea>
                        </div>
                        
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1">Lampiran Foto</label>
                            <div class="relative">
                                <input
                                    type="text"
                                    accept="image/*"
                                    onchange="readURL(this);"
                                    class="form-input w-full rounded-xl border-gray-200 focus:border-[#0D2247] focus:ring-0 bg-gray-50 pr-12 cursor-pointer"
                                    id="file_path"
                                    placeholder="Pilih file gambar..."
                                    name="foto"
                                    readonly
                                >
                                <input type="file" accept="image/*" onchange="readURL(this);" class="hidden" id="file" name="foto">
                                <button type="button" class="absolute right-1 top-1 bottom-1 px-4 bg-gray-200 text-gray-600 rounded-lg flex items-center justify-center hover:bg-gray-300 transition text-sm font-bold" id="file_browser">
                                    <i class="fa fa-folder-open"></i>
                                </button>
                            </div>
                            <p class="text-xs text-gray-400 mt-1"><i class="fas fa-info-circle"></i> Format: .png, .jpg, .jpeg, .webp</p>
                            <div class="mt-3">
                                <img id="blah" src="#" alt="Preview" class="rounded-xl shadow-sm border border-gray-200 hidden" style="max-height: 200px; object-fit: contain;" />
                            </div>
                        </div>

                        <!-- CAPTCHA -->
                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Verifikasi Keamanan <span class="text-red-500">*</span></label>
                            <div class="flex flex-col sm:flex-row gap-4 items-center">
                                <div class="flex-shrink-0 relative group cursor-pointer" onclick="document.getElementById('captcha').src = '<?php echo e(ci_route('captcha')); ?>?' + Math.random();">
                                    <img id="captcha" src="<?php echo e(ci_route('captcha')); ?>" alt="CAPTCHA Image" class="rounded-lg shadow-sm border border-gray-200 bg-white p-1 h-12 w-auto">
                                    <div class="absolute inset-0 bg-black/40 rounded-lg flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                                        <i class="fas fa-sync-alt text-white"></i>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <input
                                        type="text"
                                        class="form-input w-full rounded-xl border-gray-200 focus:border-[#0D2247] focus:ring-0 text-center text-lg tracking-widest font-bold"
                                        name="captcha_code"
                                        maxlength="6"
                                        value="<?php echo e($notif['data']['captcha_code']); ?>"
                                        placeholder="KODE"
                                        required
                                    >
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-between p-5 lg:p-6 bg-gray-50">
                        <button type="button" data-bs-dismiss="modal" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-3 px-6 rounded-full transition">Batal</button>
                        <button type="submit" class="bg-[#0D2247] hover:bg-blue-900 text-white font-bold py-3 px-8 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 active:scale-95"><i class="fas fa-paper-plane mr-2"></i> Kirim Pengaduan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(theme_asset('js/pagination.js')); ?>"></script>
    <script type="text/javascript">
        $('#file_browser').click(function(e) {
            e.preventDefault();
            $('#file').click();
        });
        $('#file').change(function() {
            let fileName = $(this).val().split('\\').pop();
            $('#file_path').val(fileName || 'Tidak ada file terpilih');
            if ($(this).val() == '') {
                $('#' + $(this).data('submit')).attr('disabled', 'disabled');
            } else {
                $('#' + $(this).data('submit')).removeAttr('disabled');
            }
        });
        $('#file_path').click(function() {
            $('#file_browser').click();
        });
        $(document).ready(function() {
            const pageSize = <?php echo e(theme_config('jumlah_pengaduan_perhalaman')); ?>

            let pageNumber = 1
            let status = ''
            let cari = $('input[name=cari-pengaduan]').val()
            window.setTimeout(function() {
                $("#notifikasi").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 2000);

            var data = <?php echo e(count(session('data') ?? [])); ?>;
            if (data) {
                $('#newpengaduan').modal('show');
            }

            $('#btn-search').click(function() {
                pageNumber = 1
                cari = $('input[name=cari-pengaduan]').val()
                status = $('#caristatus').val()
                loadPengaduan(pageNumber)
            })

            const loadPengaduan = function(pageNumber) {
                let _filter = []
                if (status) {
                    _filter.push('filter[status]=' + status)
                }
                if (cari) {
                    _filter.push('filter[search]=' + cari)
                }
                let _filterString = _filter.length ? _filter.join('&') : ''
                $.ajax({
                    url: `<?php echo e(ci_route('internal_api.pengaduan')); ?>?sort=-created_at&page[number]=${pageNumber}&page[size]=${pageSize}&${_filterString}`,
                    type: "GET",
                    beforeSend: function() {
                        const pengaduanList = document.getElementById('pengaduan-list');
                        pengaduanList.innerHTML = `<?php echo $__env->make('theme::commons.loading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>`;
                    },
                    dataType: 'json',
                    data: {},
                    success: function(data) {
                        displayPengaduan(data);
                        initPagination(data);
                    }
                });
            }

            const displayPengaduan = function(dataPengaduan) {
                const pengaduanList = document.getElementById('pengaduan-list');
                pengaduanList.innerHTML = '';
                if (!dataPengaduan.data.length) {
                    pengaduanList.innerHTML = `<div class="bg-blue-50 border border-blue-100 text-blue-600 p-8 rounded-3xl text-center font-semibold"><i class="fas fa-inbox text-3xl mb-3 opacity-50 block"></i>Belum ada data pengaduan.</div>`
                    return
                }
                const ulBlock = document.createElement('div');
                ulBlock.className = 'grid grid-cols-1 lg:grid-cols-2 gap-6';
                dataPengaduan.data.forEach(item => {
                    const card = document.createElement('div');
                    const childCount = item.attributes.child_count;
                    const labelComment = `<span class="inline-flex items-center justify-center px-3 py-1 text-xs font-bold rounded-full ${childCount ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500'}"><i class="fa fa-comments mr-1.5"></i> ${childCount} Tanggapan</span>`
                    const isiText = item.attributes.isi;
                    const isLong = isiText.length > 80;
                    const isiPreview = isLong ? isiText.substring(0,80) + '...' : isiText;
                    const readMore = isLong ? `<span class="text-blue-600 font-semibold ml-1 cursor-pointer hover:underline text-xs">Baca selengkapnya</span>` : '';
                    const isi = `<div class="italic text-gray-500 text-sm">"${isiPreview}" ${readMore}</div>`
                    let labelStatus;
                    switch (item.attributes.status) {
                        case 1:
                            labelStatus = `<span class="label label-danger shadow-sm"><i class="fas fa-clock mr-1"></i> Menunggu</span>`
                            break;
                        case 2:
                            labelStatus = `<span class="label label-info shadow-sm"><i class="fas fa-spinner fa-spin mr-1"></i> Diproses</span>`
                            break;
                        case 3:
                            labelStatus = `<span class="label label-success shadow-sm"><i class="fas fa-check-circle mr-1"></i> Selesai</span>`
                            break;
                    }
                    card.className = `bg-white p-6 rounded-3xl border border-gray-100 shadow-md hover:shadow-xl transition-all duration-300 group hover:-translate-y-1 cursor-pointer flex flex-col justify-between h-full relative overflow-hidden`;
                    
                    // Decorative line
                    const lineColors = { 1: 'bg-red-500', 2: 'bg-blue-500', 3: 'bg-green-500' };
                    const lineColor = lineColors[item.attributes.status];

                    card.innerHTML = `
                    <div class="absolute top-0 left-0 right-0 h-1 ${lineColor}"></div>
                    <div class="flex flex-col gap-4">
                        <div class="flex justify-between items-start gap-4">
                            <div class="flex-1">
                                <h3 class="font-bold text-lg lg:text-xl text-[#0D2247] group-hover:text-blue-600 transition mb-3 line-clamp-2 leading-tight">${item.attributes.judul}</h3>
                                <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-xs text-gray-400 font-semibold">
                                    <span class="flex items-center gap-1.5 bg-gray-50 px-2 py-1 rounded-md"><i class="far fa-user text-gray-400"></i> ${item.attributes.nama}</span>
                                    <span class="flex items-center gap-1.5"><i class="far fa-calendar-alt text-gray-400"></i> ${item.attributes.created_at}</span>
                                </div>
                            </div>
                            <div class="flex-shrink-0 text-right mt-1">
                                ${labelStatus}
                            </div>
                        </div>
                        <div class="border-l-4 border-gray-100 pl-4 py-1 my-1">
                            ${isi}
                        </div>
                    </div>
                    <div class="pt-4 mt-2 border-t border-gray-50 flex justify-end">
                        ${labelComment}
                    </div>
				    `;
                    card.onclick = function() {
                        let _comments = []
                        const image = item.attributes.foto ? `<div class="mt-4 rounded-xl overflow-hidden shadow-sm border border-gray-100"><img class="w-full h-auto object-contain max-h-[300px]" src="${item.attributes.foto}" alt="Lampiran Foto"></div>` : ``
                        if (item.attributes.child_count) {
                            item.attributes.child.forEach(comment => {

                                _comments.push(`
                                <div class="bg-green-50/50 border border-green-100 rounded-2xl p-4 ml-8 relative">
                                    <div class="absolute -left-3 top-5 w-3 h-3 bg-green-100 rotate-45 border-l border-b border-green-100"></div>
                                    <div class="flex items-center gap-2 mb-2 border-b border-green-100/50 pb-2">
                                        <div class="w-8 h-8 rounded-full bg-green-200 flex items-center justify-center text-green-700 font-bold"><i class="fas fa-user-tie text-sm"></i></div>
                                        <div>
                                            <p class="text-xs font-bold text-green-800">${comment.nama}</p>
                                            <p class="text-[10px] text-green-600/80"><i class="far fa-clock"></i> ${comment.created_at}</p>
                                        </div>
                                    </div>
									<p class="italic text-gray-700 text-sm leading-relaxed">${comment.isi}</p>
								</div>`)
                            });
                        }
                        
                        const commentSection = _comments.length > 0 ? 
                            `<div class="mt-6 pt-6 border-t border-gray-100 space-y-4">
                                <h5 class="font-bold text-sm text-gray-500 uppercase tracking-wide mb-4 flex items-center gap-2"><i class="fas fa-comments text-green-500"></i> Tanggapan (${item.attributes.child_count})</h5>
                                ${_comments.join('')}
                            </div>` : '';

                        const htmlBody = `
						<div class="w-full">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-700"><i class="fas fa-user"></i></div>
                                <div>
                                    <p class="font-bold text-[#0D2247]">${item.attributes.nama}</p>
                                    <p class="text-xs text-gray-400"><i class="far fa-clock"></i> Diajukan pada ${item.attributes.created_at}</p>
                                </div>
                            </div>
                            <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100">
							    <p class="text-gray-700 leading-relaxed">${item.attributes.isi.replace(/\\n/g, '<br>')}</p>
                            </div>
							${image}													
						</div>
						${commentSection}`;

                        $('#pengaduan-detail').modal('show')
                        $('#pengaduan-judul').html(`${item.attributes.judul} ` + labelStatus)
                        $('#pengaduan-detail .modal-body').html(htmlBody)
                    }
                    ulBlock.appendChild(card);
                });
                pengaduanList.appendChild(ulBlock);
            }
            $('.pagination').on('click', '.btn-page', function() {
                var page = $(this).data('page');
                loadPengaduan(page);
            });
            loadPengaduan(pageNumber);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').removeClass('hidden');
                    $('#blah').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                $('#blah').addClass('hidden');
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('theme::layouts.full-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/partials/pengaduan/index.blade.php ENDPATH**/ ?>