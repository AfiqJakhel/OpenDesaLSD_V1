@extends('theme::layouts.full-content')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
.font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
.stat-card {
    background:white; border-radius:1.25rem;
    padding:1.5rem 1.75rem; border:1.5px solid #f3f4f6;
    box-shadow:0 4px 20px -4px rgba(0,0,0,.07);
    transition:all .25s;
}
.stat-card:hover { transform:translateY(-3px); box-shadow:0 12px 28px -6px rgba(0,0,0,.12); }
.chart-card { background:white; border-radius:1.25rem; border:1.5px solid #f3f4f6; box-shadow:0 4px 16px -4px rgba(0,0,0,.07); overflow:hidden; }
.chart-header { padding:1.1rem 1.5rem; border-bottom:1px solid #f3f4f6; display:flex; align-items:center; gap:.65rem; }
.bar-h { height:9px; border-radius:9999px; }
.tbl th { background:#0D2247; color:white; padding:.65rem 1rem; text-align:center; font-size:.78rem; font-weight:700; }
.tbl td { padding:.6rem 1rem; font-size:.82rem; border-bottom:1px solid #f9fafb; }
.tbl tr:hover td { background:#f9fafb; }
</style>
@endpush

@section('content')

{{-- HERO --}}
<section class="relative bg-[#0D2247] text-white overflow-hidden" style="min-height:200px;">
    <div class="absolute inset-0" style="background:url('https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=1400&q=70') center/cover;opacity:.08;"></div>
    <div class="container mx-auto px-4 max-w-7xl py-14 relative z-10 font-jakarta">
        <span class="text-amber-400 font-bold tracking-[.2em] text-xs uppercase">Data Resmi · Semester II 2025</span>
        <h1 class="font-extrabold text-4xl mt-2 mb-1">Data Demografi & Statistik</h1>
        <p class="text-white/60 text-sm">Nagari Koto Tangah Batu Ampa · Kode 13.07.13.2002 · Kec. Akabiluru · Kab. Lima Puluh Kota</p>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 36" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block;width:100%">
            <path d="M0 36L0 18Q720 0 1440 18L1440 36Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>

<div class="bg-gray-50 min-h-screen">
<div class="container mx-auto px-4 max-w-7xl py-10 space-y-8 font-jakarta">

{{-- ── KARTU RINGKAS ── --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="stat-card">
        <div class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-2">Total Penduduk</div>
        <div class="text-4xl font-extrabold text-[#0D2247]">9.969</div>
        <div class="text-xs text-gray-400 mt-0.5">Jiwa · 6 Jorong</div>
        <div class="mt-2 text-[10px] bg-blue-50 text-blue-600 font-bold px-2 py-0.5 rounded-full inline-block">Semester II 2025</div>
    </div>
    <div class="stat-card">
        <div class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-2">Kepala Keluarga</div>
        <div class="text-4xl font-extrabold text-amber-500">3.196</div>
        <div class="text-xs text-gray-400 mt-0.5">KK (LK 2.382 · PR 814)</div>
        <div class="mt-2 text-[10px] bg-amber-50 text-amber-600 font-bold px-2 py-0.5 rounded-full inline-block">Rata-rata 3,1 jiwa/KK</div>
    </div>
    <div class="stat-card">
        <div class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-2">Laki-laki</div>
        <div class="text-4xl font-extrabold text-blue-600">5.001</div>
        <div class="text-xs text-gray-400 mt-0.5">Jiwa (50,2%)</div>
        <div class="mt-3 h-2 bg-gray-100 rounded-full"><div class="h-2 bg-blue-500 rounded-full" style="width:50.2%"></div></div>
    </div>
    <div class="stat-card">
        <div class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-2">Perempuan</div>
        <div class="text-4xl font-extrabold text-pink-500">4.968</div>
        <div class="text-xs text-gray-400 mt-0.5">Jiwa (49,8%)</div>
        <div class="mt-3 h-2 bg-gray-100 rounded-full"><div class="h-2 bg-pink-500 rounded-full" style="width:49.8%"></div></div>
    </div>
</div>

{{-- ── PENDUDUK PER JORONG + AGAMA ── --}}
<div class="grid grid-cols-1 lg:grid-cols-5 gap-6">

    {{-- Penduduk per Jorong --}}
    <div class="chart-card lg:col-span-3">
        <div class="chart-header">
            <div class="w-8 h-8 rounded-lg bg-[#0D2247]/5 flex items-center justify-center"><i class="fas fa-map-pin text-[#0D2247] text-sm"></i></div>
            <h2 class="font-bold text-[#0D2247] text-sm">Penduduk per Jorong</h2>
        </div>
        <div class="p-6 space-y-4">
            @php
            $jorongs = [
                ['nama'=>'Piladang',       'lk'=>1746,'pr'=>1748,'kk'=>1104,'color'=>'#8b3a2a'],
                ['nama'=>'Seberang Parit', 'lk'=>1125,'pr'=>1102,'kk'=>708, 'color'=>'#1a5c52'],
                ['nama'=>'Sungai Cubadak', 'lk'=>833, 'pr'=>798, 'kk'=>483, 'color'=>'#0D2247'],
                ['nama'=>'Tambun Ijuk',    'lk'=>406, 'pr'=>443, 'kk'=>301, 'color'=>'#7c3d8f'],
                ['nama'=>'Koto Tangah',    'lk'=>489, 'pr'=>509, 'kk'=>342, 'color'=>'#3a7d44'],
                ['nama'=>'Batu Tanyuh',    'lk'=>402, 'pr'=>368, 'kk'=>258, 'color'=>'#c8973a'],
            ];
            $max_j = 3494;
            @endphp
            @foreach($jorongs as $j)
            @php $tot_j = $j['lk']+$j['pr']; $pct_j = round($tot_j/$max_j*100); @endphp
            <div>
                <div class="flex justify-between mb-1">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full flex-shrink-0" style="background:{{ $j['color'] }}"></span>
                        <span class="text-sm font-semibold text-gray-700">{{ $j['nama'] }}</span>
                        <span class="text-[10px] text-gray-400">{{ $j['kk'] }} KK</span>
                    </div>
                    <div class="text-sm font-extrabold" style="color:{{ $j['color'] }}">{{ number_format($tot_j) }} jiwa</div>
                </div>
                <div class="h-2.5 bg-gray-100 rounded-full overflow-hidden">
                    <div class="bar-h" style="width:{{ $pct_j }}%;background:{{ $j['color'] }};"></div>
                </div>
                <div class="flex gap-3 mt-0.5">
                    <span class="text-[10px] text-blue-500">♂ {{ number_format($j['lk']) }}</span>
                    <span class="text-[10px] text-pink-500">♀ {{ number_format($j['pr']) }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Agama + Usia Produktif --}}
    <div class="lg:col-span-2 space-y-5">
        <div class="chart-card">
            <div class="chart-header">
                <div class="w-8 h-8 rounded-lg bg-amber-50 flex items-center justify-center"><i class="fas fa-mosque text-amber-500 text-sm"></i></div>
                <h2 class="font-bold text-[#0D2247] text-sm">Agama</h2>
            </div>
            <div class="p-5 space-y-3">
                @php
                $agamas = [
                    ['nama'=>'Islam',   'lk'=>5000,'pr'=>4968,'color'=>'#0D2247'],
                    ['nama'=>'Kristen', 'lk'=>1,   'pr'=>0,   'color'=>'#c8973a'],
                ];
                @endphp
                @foreach($agamas as $ag)
                @php $tot_ag=$ag['lk']+$ag['pr']; $pct_ag=round($tot_ag/9969*100,1); @endphp
                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-sm font-semibold text-gray-700">{{ $ag['nama'] }}</span>
                        <span class="text-sm font-extrabold" style="color:{{ $ag['color'] }}">{{ number_format($tot_ag) }} <span class="text-xs font-normal text-gray-400">({{ $pct_ag }}%)</span></span>
                    </div>
                    <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                        <div class="bar-h" style="width:{{ $pct_ag }}%;background:{{ $ag['color'] }};height:8px;"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="chart-card">
            <div class="chart-header">
                <div class="w-8 h-8 rounded-lg bg-green-50 flex items-center justify-center"><i class="fas fa-people-arrows text-green-600 text-sm"></i></div>
                <h2 class="font-bold text-[#0D2247] text-sm">Angkatan Kerja</h2>
            </div>
            <div class="p-5 space-y-3">
                @php
                $angkatan = [
                    ['label'=>'Usia Muda (0–14)',      'val'=>2398, 'color'=>'#c8973a'],
                    ['label'=>'Usia Produktif (15–64)','val'=>6564, 'color'=>'#3a7d44'],
                    ['label'=>'Usia Tua (≥65)',         'val'=>1007, 'color'=>'#0D2247'],
                ];
                @endphp
                @foreach($angkatan as $ak)
                @php $pct_ak=round($ak['val']/9969*100,1); @endphp
                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-xs font-semibold text-gray-600">{{ $ak['label'] }}</span>
                        <span class="text-xs font-bold" style="color:{{ $ak['color'] }}">{{ number_format($ak['val']) }} ({{ $pct_ak }}%)</span>
                    </div>
                    <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                        <div class="bar-h" style="width:{{ $pct_ak }}%;background:{{ $ak['color'] }};height:8px;"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

{{-- ── KELOMPOK UMUR + PENDIDIKAN ── --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="chart-card">
        <div class="chart-header">
            <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center"><i class="fas fa-birthday-cake text-blue-500 text-sm"></i></div>
            <h2 class="font-bold text-[#0D2247] text-sm">Kelompok Umur (5-tahunan)</h2>
        </div>
        <div class="p-1"><div id="chart-umur" style="height:320px;"></div></div>
    </div>
    <div class="chart-card">
        <div class="chart-header">
            <div class="w-8 h-8 rounded-lg bg-indigo-50 flex items-center justify-center"><i class="fas fa-graduation-cap text-indigo-600 text-sm"></i></div>
            <h2 class="font-bold text-[#0D2247] text-sm">Tingkat Pendidikan</h2>
        </div>
        <div class="p-1"><div id="chart-pendidikan" style="height:320px;"></div></div>
    </div>
</div>

{{-- ── PEKERJAAN + STATUS KAWIN ── --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="chart-card">
        <div class="chart-header">
            <div class="w-8 h-8 rounded-lg bg-teal-50 flex items-center justify-center"><i class="fas fa-briefcase text-teal-600 text-sm"></i></div>
            <h2 class="font-bold text-[#0D2247] text-sm">Mata Pencaharian</h2>
        </div>
        <div class="p-1"><div id="chart-pekerjaan" style="height:320px;"></div></div>
    </div>
    <div class="chart-card">
        <div class="chart-header">
            <div class="w-8 h-8 rounded-lg bg-pink-50 flex items-center justify-center"><i class="fas fa-ring text-pink-500 text-sm"></i></div>
            <h2 class="font-bold text-[#0D2247] text-sm">Status Perkawinan</h2>
        </div>
        <div class="p-1"><div id="chart-kawin" style="height:320px;"></div></div>
    </div>
</div>

{{-- ── TABEL PER JORONG ── --}}
<div class="chart-card">
    <div class="chart-header">
        <div class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center"><i class="fas fa-table text-gray-600 text-sm"></i></div>
        <h2 class="font-bold text-[#0D2247] text-sm">Rekapitulasi Penduduk & KK per Jorong · Semester II 2025</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full tbl">
            <thead>
                <tr>
                    <th class="text-left" style="padding-left:1.25rem;">No</th>
                    <th class="text-left">Jorong</th>
                    <th>LK</th><th>PR</th><th>Total Jiwa</th>
                    <th>KK (LK)</th><th>KK (PR)</th><th>Total KK</th>
                    <th>% Pddk</th>
                </tr>
            </thead>
            <tbody>
                @php
                $tbl = [
                    ['nama'=>'Batu Tanyuh',    'lk'=>402,  'pr'=>368,  'kk_lk'=>199, 'kk_pr'=>59,  'color'=>'#c8973a'],
                    ['nama'=>'Koto Tangah',    'lk'=>489,  'pr'=>509,  'kk_lk'=>243, 'kk_pr'=>99,  'color'=>'#3a7d44'],
                    ['nama'=>'Piladang',       'lk'=>1746, 'pr'=>1748, 'kk_lk'=>807, 'kk_pr'=>297, 'color'=>'#8b3a2a'],
                    ['nama'=>'Seberang Parit', 'lk'=>1125, 'pr'=>1102, 'kk_lk'=>550, 'kk_pr'=>158, 'color'=>'#1a5c52'],
                    ['nama'=>'Sungai Cubadak', 'lk'=>833,  'pr'=>798,  'kk_lk'=>383, 'kk_pr'=>100, 'color'=>'#0D2247'],
                    ['nama'=>'Tambun Ijuk',    'lk'=>406,  'pr'=>443,  'kk_lk'=>200, 'kk_pr'=>101, 'color'=>'#7c3d8f'],
                ];
                $g_lk=$g_pr=$g_kk_lk=$g_kk_pr=0;
                @endphp
                @foreach($tbl as $i=>$r)
                @php
                    $tot_r=$r['lk']+$r['pr']; $kk_tot=$r['kk_lk']+$r['kk_pr'];
                    $pct_r=round($tot_r/9969*100,1);
                    $g_lk+=$r['lk']; $g_pr+=$r['pr'];
                    $g_kk_lk+=$r['kk_lk']; $g_kk_pr+=$r['kk_pr'];
                @endphp
                <tr>
                    <td class="text-gray-400 font-semibold" style="padding-left:1.25rem;">{{ $i+1 }}</td>
                    <td>
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full" style="background:{{ $r['color'] }}"></span>
                            <span class="font-semibold text-gray-800">{{ $r['nama'] }}</span>
                        </div>
                    </td>
                    <td class="text-center text-blue-600 font-bold">{{ number_format($r['lk']) }}</td>
                    <td class="text-center text-pink-500 font-bold">{{ number_format($r['pr']) }}</td>
                    <td class="text-center font-extrabold text-gray-800">{{ number_format($tot_r) }}</td>
                    <td class="text-center text-blue-500">{{ number_format($r['kk_lk']) }}</td>
                    <td class="text-center text-pink-400">{{ number_format($r['kk_pr']) }}</td>
                    <td class="text-center font-bold text-gray-700">{{ number_format($kk_tot) }}</td>
                    <td class="text-center">
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full" style="background:{{ $r['color'] }}18;color:{{ $r['color'] }};">{{ $pct_r }}%</span>
                    </td>
                </tr>
                @endforeach
                <tr style="background:#0D224710;">
                    <td colspan="2" class="font-extrabold text-[#0D2247]" style="padding-left:1.25rem;">JUMLAH</td>
                    <td class="text-center font-extrabold text-blue-700">{{ number_format($g_lk) }}</td>
                    <td class="text-center font-extrabold text-pink-600">{{ number_format($g_pr) }}</td>
                    <td class="text-center font-extrabold text-gray-900">9.969</td>
                    <td class="text-center font-bold text-blue-600">{{ number_format($g_kk_lk) }}</td>
                    <td class="text-center font-bold text-pink-500">{{ number_format($g_kk_pr) }}</td>
                    <td class="text-center font-extrabold text-gray-900">3.196</td>
                    <td class="text-center font-bold text-gray-700">100%</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

{{-- ── DISABILITAS + INFO USIA PENDIDIKAN ── --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-5">
    <div class="stat-card">
        <div class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Usia Produktif</div>
        <div class="text-3xl font-extrabold text-[#3a7d44]">6.564 <span class="text-sm font-normal text-gray-400">jiwa</span></div>
        <div class="text-xs text-gray-500 mt-2">65,8% dari total · usia 15–64 tahun</div>
    </div>
    <div class="stat-card">
        <div class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Pelajar/Mahasiswa</div>
        <div class="text-3xl font-extrabold text-amber-500">2.392 <span class="text-sm font-normal text-gray-400">jiwa</span></div>
        <div class="text-xs text-gray-500 mt-2">LK 1.218 · PR 1.174</div>
    </div>
    <div class="stat-card">
        <div class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Disabilitas</div>
        <div class="text-3xl font-extrabold text-red-500">26 <span class="text-sm font-normal text-gray-400">jiwa</span></div>
        <div class="text-xs text-gray-500 mt-2">Fisik 3 · Rungu/Wicara 3 · Mental/Jiwa 20</div>
    </div>
</div>

</div>
</div>
@endsection

@push('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
// Kelompok Umur
Highcharts.chart('chart-umur',{
    chart:{type:'bar',backgroundColor:'transparent'},
    title:{text:''},
    xAxis:{categories:['00–04','05–09','10–14','15–19','20–24','25–29','30–34','35–39','40–44','45–49','50–54','55–59','60–64','65–69','70–74','≥75'],
        labels:{style:{fontSize:'10px'}}},
    yAxis:{title:{text:'Jiwa'},gridLineColor:'#f3f4f6'},
    plotOptions:{bar:{grouping:true,borderRadius:2,dataLabels:{enabled:false}}},
    legend:{itemStyle:{fontSize:'10px'}},
    series:[
        {name:'Laki-laki',color:'#3b82f6',data:[322,434,461,483,439,438,337,296,335,314,284,231,199,182,123,123]},
        {name:'Perempuan',color:'#ec4899',data:[331,391,459,419,397,353,314,297,315,326,289,250,248,200,152,227]}
    ],
    credits:{enabled:false}
});

// Pendidikan
Highcharts.chart('chart-pendidikan',{
    chart:{type:'bar',backgroundColor:'transparent'},
    title:{text:''},
    xAxis:{categories:['Tidak/Blm Sekolah','Blm Tamat SD','Tamat SD','SLTP','SLTA','Diploma I/II','Diploma III','S1/S2'],
        labels:{style:{fontSize:'10px'}}},
    yAxis:{title:{text:'Jiwa'},gridLineColor:'#f3f4f6'},
    plotOptions:{bar:{borderRadius:3,dataLabels:{enabled:true,style:{fontSize:'9px'}}}},
    series:[{name:'Jiwa',color:'#0D2247',data:[1631,2499,1758,1196,2230,33,148,473]}],
    legend:{enabled:false},
    credits:{enabled:false}
});

// Pekerjaan
Highcharts.chart('chart-pekerjaan',{
    chart:{type:'pie',backgroundColor:'transparent'},
    title:{text:''},
    tooltip:{pointFormat:'<b>{point.y}</b> jiwa ({point.percentage:.1f}%)'},
    plotOptions:{pie:{dataLabels:{enabled:true,format:'{point.name}<br>{point.percentage:.1f}%',style:{fontSize:'9px'}},borderWidth:0,showInLegend:true}},
    legend:{layout:'horizontal',align:'center',verticalAlign:'bottom',itemStyle:{fontSize:'9px'}},
    series:[{name:'Penduduk',data:[
        {name:'Blm/Tdk Bekerja',y:2009,color:'#9ca3af'},
        {name:'Pelajar/Mhs',    y:2392,color:'#3b82f6'},
        {name:'Wiraswasta',     y:1657,color:'#c8973a'},
        {name:'Pertanian/Ternak',y:1140,color:'#3a7d44'},
        {name:'Lainnya',        y:2517,color:'#8b3a2a'},
        {name:'Aparatur Negara',y:146, color:'#0D2247'},
        {name:'Pensiunan',      y:75,  color:'#1a5c52'},
        {name:'Tenaga Kesehatan',y:6,  color:'#7c3d8f'},
        {name:'Tenaga Pengajar', y:27, color:'#e11d48'}
    ]}],
    credits:{enabled:false}
});

// Status Kawin
Highcharts.chart('chart-kawin',{
    chart:{type:'pie',backgroundColor:'transparent'},
    title:{text:''},
    tooltip:{pointFormat:'<b>{point.y}</b> jiwa ({point.percentage:.1f}%)'},
    plotOptions:{pie:{innerSize:'50%',dataLabels:{enabled:true,format:'{point.name}<br>{point.percentage:.1f}%',style:{fontSize:'10px'}},borderWidth:0}},
    series:[{name:'Penduduk',data:[
        {name:'Belum Kawin',y:4859,color:'#0D2247'},
        {name:'Kawin',      y:4373,color:'#3a7d44'},
        {name:'Cerai Mati', y:545, color:'#c8973a'},
        {name:'Cerai Hidup',y:192, color:'#8b3a2a'}
    ]}],
    credits:{enabled:false}
});
</script>
@endpush
