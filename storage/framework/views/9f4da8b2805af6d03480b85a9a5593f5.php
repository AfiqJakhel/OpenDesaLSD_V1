

<?php $__env->startPush('styles'); ?>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
    /* Datatable modern styles */
    .dataTables_wrapper .dataTables_paginate .paginate_button { padding: 0.25rem 0.75rem; margin-left: 0.25rem; border-radius: 0.375rem; border: 1px solid #e2e8f0; background: white; color: #475569 !important; }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current { background: #0D2247 !important; color: white !important; border-color: #0D2247; }
    .dataTables_wrapper .dataTables_filter input { border: 1px solid #e2e8f0; border-radius: 0.5rem; padding: 0.5rem 1rem; margin-left: 0.5rem; outline: none; transition: border-color 0.2s; }
    .dataTables_wrapper .dataTables_filter input:focus { border-color: #0D2247; }
    .dataTables_wrapper .dataTables_length select { border: 1px solid #e2e8f0; border-radius: 0.5rem; padding: 0.3rem 1.5rem 0.3rem 0.5rem; margin: 0 0.5rem; outline: none; }
    table.dataTable tbody td { padding: 1rem; border-bottom: 1px solid #f3f4f6; color: #4b5563; vertical-align: middle; }
    table.dataTable tr:hover td { background-color: #f9fafb; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('theme::commons.asset_sweetalert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div id="hero-wrapper"></div>

    <div class="bg-gray-50 min-h-screen py-16">
        <div class="container mx-auto px-4 max-w-7xl">
            <div id="kelompok-wrapper">
                <div class="flex justify-center py-20">
                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-[#0D2247]"></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            var route = "<?php echo e(route('api.' . $tipe . '.detail', ['slug' => $slug])); ?>";
            $.ajax({
                url: route,
                method: 'GET',
                success: function(data) {
                    try {
                        if (!data || !data.data) {
                            $('#hero-wrapper').html(`
                                <section class="relative bg-[#0D2247] text-white overflow-hidden" style="min-height: 250px;">
                                    <div class="absolute inset-0 opacity-20" style="background-image: url('https://images.unsplash.com/photo-1573164713988-8665fc963095?w=1600&q=80'); background-size: cover; background-position: center;"></div>
                                    <div class="absolute inset-0 bg-gradient-to-t from-[#0D2247] via-[#0D2247]/80 to-transparent"></div>
                                    <div class="container mx-auto px-4 max-w-7xl py-12 relative z-10 flex flex-col items-center text-center">
                                        <nav class="text-white/60 text-sm mb-6 font-jakarta flex items-center justify-center gap-2">
                                            <a href="<?php echo e(site_url()); ?>" class="hover:text-white transition">Beranda</a>
                                            <i class="fas fa-chevron-right text-[9px]"></i>
                                            <span class="text-white font-semibold">Detail Lembaga</span>
                                        </nav>
                                        <h1 class="font-jakarta font-extrabold text-3xl md:text-5xl mb-2 leading-tight">Data Tidak Ditemukan</h1>
                                    </div>
                                    <div class="absolute bottom-0 left-0 right-0">
                                        <svg viewBox="0 0 1440 50" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full" style="display:block">
                                            <path d="M0 50 L0 25 Q360 0 720 25 Q1080 50 1440 25 L1440 50 Z" fill="#f9fafb"/>
                                        </svg>
                                    </div>
                                </section>
                            `);
                            $('#kelompok-wrapper').html('<div class="bg-yellow-50 text-yellow-700 p-8 rounded-3xl text-center border border-yellow-100 max-w-2xl mx-auto"><i class="fas fa-folder-open text-5xl mb-4 text-yellow-400"></i><h3 class="font-bold font-jakarta text-2xl mb-2">Data Lembaga Kosong</h3><p>Mohon maaf, detail lembaga yang Anda tuju tidak tersedia atau belum ditambahkan oleh administrator.</p></div>');
                            return;
                        }
                        var detail = data.data.attributes;
                        var pengurus = detail.pengurus || [];
                        // Kadang PHP me-return object kosong {} bukan array [] jika tidak ada data
                        if (!Array.isArray(pengurus)) {
                            pengurus = Object.values(pengurus);
                        }
                        var tipe = detail.tipe || 'Lembaga';
                        var gambar_desa = detail.logo ? detail.logo : 'https://ui-avatars.com/api/?name='+encodeURIComponent(detail.nama)+'&background=0D2247&color=fff&size=150';
                        var jumlahPengurus = pengurus.length;

                        var heroElemen = `
                        <section class="relative bg-[#0D2247] text-white overflow-hidden" style="min-height: 380px;">
                            <div class="absolute inset-0 opacity-20" style="background-image: url('https://images.unsplash.com/photo-1573164713988-8665fc963095?w=1600&q=80'); background-size: cover; background-position: center;"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0D2247] via-[#0D2247]/80 to-transparent"></div>
                            <div class="container mx-auto px-4 max-w-7xl py-16 relative z-10 flex flex-col items-center text-center">
                                <nav class="text-white/60 text-sm mb-8 font-jakarta flex items-center justify-center gap-2">
                                    <a href="<?php echo e(site_url()); ?>" class="hover:text-white transition">Beranda</a>
                                    <i class="fas fa-chevron-right text-[9px]"></i>
                                    <span class="text-white font-semibold">Detail Lembaga</span>
                                </nav>
                                <div class="w-28 h-28 bg-white p-2 rounded-3xl shadow-2xl mb-6 transform hover:scale-105 transition duration-500">
                                    <img src="${gambar_desa}" alt="Logo" class="w-full h-full object-contain rounded-2xl">
                                </div>
                                <span class="bg-amber-400 text-amber-900 font-bold tracking-[0.1em] text-xs uppercase font-jakarta mb-4 px-3 py-1 rounded-full shadow-lg inline-flex items-center gap-2">
                                    <i class="fas fa-certificate"></i> ${detail.kategori || tipe}
                                </span>
                                <h1 class="font-jakarta font-extrabold text-4xl md:text-6xl mb-4 leading-tight">${detail.nama || '-'}</h1>
                                <p class="text-white/80 max-w-2xl font-jakarta text-lg leading-relaxed">${detail.keterangan || 'Lembaga masyarakat desa yang berperan aktif dalam pembangunan dan pemberdayaan.'}</p>
                            </div>
                            <div class="absolute bottom-0 left-0 right-0">
                                <svg viewBox="0 0 1440 50" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full" style="display:block">
                                    <path d="M0 50 L0 25 Q360 0 720 25 Q1080 50 1440 25 L1440 50 Z" fill="#f9fafb"/>
                                </svg>
                            </div>
                        </section>
                        `;
                        $('#hero-wrapper').html(heroElemen);

                        var detailElemen = `
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10 font-jakarta">
                            <div class="bg-white rounded-3xl p-6 shadow-lg shadow-gray-200/50 border border-gray-100 flex items-center gap-5 hover:-translate-y-1 transition duration-300 group">
                                <div class="w-16 h-16 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                                    <i class="fas fa-fingerprint"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-bold uppercase tracking-widest mb-1">Kode ${tipe}</p>
                                    <p class="text-xl font-extrabold text-gray-800">${detail.kode || '-'}</p>
                                </div>
                            </div>
                            <div class="bg-white rounded-3xl p-6 shadow-lg shadow-gray-200/50 border border-gray-100 flex items-center gap-5 hover:-translate-y-1 transition duration-300 group">
                                <div class="w-16 h-16 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-2xl group-hover:bg-amber-500 group-hover:text-white transition duration-300">
                                    <i class="fas fa-file-signature"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-bold uppercase tracking-widest mb-1">No. SK Pendirian</p>
                                    <p class="text-xl font-extrabold text-gray-800 line-clamp-1">${detail.no_sk_pendirian || '-'}</p>
                                </div>
                            </div>
                            <div class="bg-white rounded-3xl p-6 shadow-lg shadow-gray-200/50 border border-gray-100 flex items-center gap-5 hover:-translate-y-1 transition duration-300 group">
                                <div class="w-16 h-16 rounded-2xl bg-green-50 text-green-600 flex items-center justify-center text-2xl group-hover:bg-green-500 group-hover:text-white transition duration-300">
                                    <i class="fas fa-users-cog"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-bold uppercase tracking-widest mb-1">Total Pengurus</p>
                                    <p class="text-xl font-extrabold text-gray-800">${jumlahPengurus} <span class="text-base font-medium text-gray-500">Orang</span></p>
                                </div>
                            </div>
                        </div>
                        `;

                        var pengurusElemen = `
                        <div class="bg-white rounded-3xl shadow-lg shadow-gray-200/50 border border-gray-100 mb-10 overflow-hidden font-jakarta">
                            <div class="p-6 md:p-8 border-b border-gray-100 flex items-center gap-4 bg-gradient-to-r from-gray-50 to-white">
                                <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-xl shadow-sm">
                                    <i class="fas fa-sitemap"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-extrabold text-[#0D2247]">Struktur Kepengurusan</h2>
                                    <p class="text-sm text-gray-500 mt-1">Daftar anggota yang menjabat dalam struktur organisasi.</p>
                                </div>
                            </div>
                            <div class="overflow-x-auto p-2">
                                <table class="w-full text-left border-collapse">
                                    <thead>
                                        <tr>
                                            <th class="bg-gray-50 text-gray-400 text-xs uppercase tracking-widest font-bold p-4 border-b rounded-tl-xl w-16 text-center">No</th>
                                            <th class="bg-gray-50 text-gray-400 text-xs uppercase tracking-widest font-bold p-4 border-b">Jabatan</th>
                                            <th class="bg-gray-50 text-gray-400 text-xs uppercase tracking-widest font-bold p-4 border-b">Nama Lengkap</th>
                                            <th class="bg-gray-50 text-gray-400 text-xs uppercase tracking-widest font-bold p-4 border-b rounded-tr-xl">Alamat Lengkap</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                                    
                        if(jumlahPengurus > 0) {
                            pengurus.forEach((data, key) => {
                                pengurusElemen += `
                                <tr class="hover:bg-gray-50/80 transition duration-200 group">
                                    <td class="p-4 border-b border-gray-50 text-gray-400 font-bold text-center">${key + 1}</td>
                                    <td class="p-4 border-b border-gray-50">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-indigo-50 text-indigo-700 ring-1 ring-indigo-100">
                                            <i class="fas fa-id-badge mr-2 opacity-50"></i> ${data.nama_jabatan || '-'}
                                        </span>
                                    </td>
                                    <td class="p-4 border-b border-gray-50 font-extrabold text-gray-800 whitespace-nowrap group-hover:text-[#0D2247] transition">
                                        ${data.nama_penduduk || '-'}
                                    </td>
                                    <td class="p-4 border-b border-gray-50 text-gray-500 text-sm">
                                        <div class="flex items-start gap-2">
                                            <i class="fas fa-map-marker-alt text-gray-300 mt-1"></i>
                                            <span>${data.alamat_lengkap || '-'}</span>
                                        </div>
                                    </td>
                                </tr>`;
                            });
                        } else {
                            pengurusElemen += `<tr><td colspan="4" class="text-center p-12 text-gray-400 italic">Belum ada data pengurus yang ditambahkan.</td></tr>`;
                        }
                        pengurusElemen += `</tbody></table></div></div>`;

                        var anggotaElemen = `
                        <div class="bg-white rounded-3xl shadow-lg shadow-gray-200/50 border border-gray-100 overflow-hidden font-jakarta mb-8">
                            <div class="p-6 md:p-8 border-b border-gray-100 flex items-center gap-4 bg-gradient-to-r from-gray-50 to-white">
                                <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-xl shadow-sm">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-extrabold text-[#0D2247]">Daftar Anggota</h2>
                                    <p class="text-sm text-gray-500 mt-1">Seluruh anggota yang terdaftar dalam lembaga ini.</p>
                                </div>
                            </div>
                            <div class="p-6 overflow-x-auto">
                                <table class="w-full text-left border-collapse" id="tabel-data">
                                    <thead>
                                        <tr>
                                            <th class="bg-gray-50 text-gray-400 text-xs uppercase tracking-widest font-bold p-4 border-b rounded-tl-xl w-16 text-center">No</th>
                                            <th class="bg-gray-50 text-gray-400 text-xs uppercase tracking-widest font-bold p-4 border-b">No. Anggota</th>
                                            <th class="bg-gray-50 text-gray-400 text-xs uppercase tracking-widest font-bold p-4 border-b">Nama Lengkap</th>
                                            <th class="bg-gray-50 text-gray-400 text-xs uppercase tracking-widest font-bold p-4 border-b">Alamat Lengkap</th>
                                            <th class="bg-gray-50 text-gray-400 text-xs uppercase tracking-widest font-bold p-4 border-b rounded-tr-xl">L/P</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>`;

                        $('#kelompok-wrapper').hide().html(detailElemen + pengurusElemen + anggotaElemen).fadeIn(500);

                        anggotaTable();
                    } catch (e) {
                        console.error('JS Execution Error:', e);
                        $('#kelompok-wrapper').html('<div class="bg-red-50 text-red-600 p-8 rounded-3xl text-center border border-red-100"><i class="fas fa-exclamation-triangle text-4xl mb-4"></i><h3 class="font-bold font-jakarta text-xl mb-2">Terjadi Kesalahan Aplikasi</h3><p>Mohon periksa data dari server atau hubungi administrator.</p></div>');
                    }
                },
                error: function(xhr) {
                    $('#kelompok-wrapper').html('<div class="bg-red-50 text-red-600 p-8 rounded-3xl text-center border border-red-100"><i class="fas fa-exclamation-triangle text-4xl mb-4"></i><h3 class="font-bold font-jakarta text-xl mb-2">Gagal Memuat Data</h3><p>Terjadi kesalahan saat memuat data lembaga. Silakan coba lagi nanti.</p></div>');
                }
            });

            const anggotaTable = () => {
                $('#tabel-data').DataTable({
                    processing: true,
                    serverSide: true,
                    autoWidth: false,
                    ordering: true,
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Cari nama anggota...",
                        lengthMenu: "Tampilkan _MENU_ data"
                    },
                    ajax: {
                        url: `<?php echo e(route('api.' . $tipe . '.anggota', ['slug' => $slug])); ?>`,
                        method: 'GET',
                        data: row => ({
                            "page[size]": row.length,
                            "page[number]": (row.start / row.length) + 1,
                            "filter[search]": row.search.value,
                            "sort": `${row.order[0]?.dir === "asc" ? "" : "-"}${row.columns[row.order[0]?.column]?.name}`
                        }),
                        dataSrc: json => {
                            json.recordsTotal = json.meta.pagination.total;
                            json.recordsFiltered = json.meta.pagination.total;
                            return json.data;
                        }
                    },
                    columnDefs: [{
                        targets: '_all',
                        className: 'text-nowrap'
                    }],
                    columns: [{
                            data: null,
                            searchable: false,
                            orderable: false,
                            className: 'text-center text-gray-500 font-medium'
                        },
                        {
                            data: 'no_anggota',
                            name: 'no_anggota',
                            className: 'font-semibold text-gray-700',
                            render: (data, type, row) => row.attributes.no_anggota
                        },
                        {
                            data: 'nama',
                            name: 'nama',
                            className: 'text-wrap font-bold text-gray-800',
                            render: (data, type, row) => row.attributes.anggota.nama
                        },
                        {
                            data: 'alamat',
                            name: 'alamat',
                            className: 'text-gray-500 text-sm',
                            render: (data, type, row) => row.attributes.alamat_lengkap
                        },
                        {
                            data: 'jenis_kelamin',
                            name: 'jenis_kelamin',
                            render: (data, type, row) => {
                                const jk = row.attributes.sex;
                                if(jk === 'LAKI-LAKI') return '<span class="px-2 py-1 bg-blue-50 text-blue-600 rounded-lg text-xs font-bold">L</span>';
                                if(jk === 'PEREMPUAN') return '<span class="px-2 py-1 bg-pink-50 text-pink-600 rounded-lg text-xs font-bold">P</span>';
                                return jk;
                            }
                        },
                    ],
                    drawCallback: function(settings) {
                        var api = this.api();
                        api.column(0, {
                            search: 'applied',
                            order: 'applied'
                        }).nodes().each(function(cell, i) {
                            cell.innerHTML = api.page.info().start + i + 1;
                        });
                    }
                });
                
                setTimeout(() => {
                    $('.dataTables_filter input').addClass('font-jakarta rounded-xl border-gray-200 focus:ring-indigo-500 focus:border-indigo-500');
                    $('.dataTables_length select').addClass('font-jakarta rounded-xl border-gray-200');
                }, 100);
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('theme::layouts.full-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/partials/lembaga/detail.blade.php ENDPATH**/ ?>