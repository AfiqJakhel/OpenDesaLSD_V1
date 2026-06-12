@php
    if (empty($ekstensi)) {
        $ekstensi = 'xls';
    }

    if ($aksi == 'unduh') {
        header('Content-type: application/' . $ekstensi);
        header('Content-Disposition: attachment; filename=' . namafile($file) . '.' . $ekstensi);
        header('Pragma: no-cache');
        header('Expires: 0');
    }
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucwords($file) }}</title>
    <link href="{{ base_url('assets/css/report.css') }}" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        #container { padding: 20px; }
        .print-header { text-align: center; margin-bottom: 30px; }
        .ttd-table { margin-top: 50px; width: 100%; border: none; }
        .ttd-table td { border: none !important; }
    </style>
    @stack('css')
</head>
<body @if($aksi == 'cetak') onload="window.print()" @endif>
    <div id="container">
        <div class="print-header">
            <h2 style="margin: 0;">{{ strtoupper($judul ?? $file) }}</h2>
            <h3 style="margin: 5px 0;">PEMERINTAH {{ strtoupper(setting('sebutan_kabupaten') . ' ' . $desa['nama_kabupaten']) }}</h3>
            <h4 style="margin: 0;">{{ strtoupper(setting('sebutan_kecamatan') . ' ' . $desa['nama_kecamatan'] . ' ' . setting('sebutan_desa') . ' ' . $desa['nama_desa']) }}</h4>
            <hr style="border: 1.5px solid #000; margin: 15px 0;">
        </div>

        <div id="body">
            @include($isi)
        </div>

        @if ($letak_ttd && count($letak_ttd) > 0)
            <table class="ttd-table">
                <tr>
                    <td width="50%" style="text-align: center;">
                        @if (!empty($pamong_ketahui))
                            MENGETAHUI
                            <br>{{ strtoupper($pamong_ketahui['pamong_jabatan'] . ' ' . $desa['nama_desa']) }}
                            <br><br><br><br><br>
                            <u>{{ strtoupper($pamong_ketahui['nama'] ?? $pamong_ketahui['pamong_nama']) }}</u>
                            <br>{{ setting('sebutan_nip_desa') }}/NIP : {{ $pamong_ketahui['pamong_nip'] }}
                        @endif
                    </td>
                    <td width="50%" style="text-align: center;">
                        {{ strtoupper($desa['nama_desa'] . ', ' . tgl_indo($tgl_cetak ? date('Y m d', strtotime($tgl_cetak)) : date('Y m d'))) }}
                        <br>{{ strtoupper($pamong_ttd['pamong_jabatan'] . ' ' . $desa['nama_desa']) }}
                        <br><br><br><br><br>
                        <u>{{ strtoupper($pamong_ttd['nama'] ?? $pamong_ttd['pamong_nama']) }}</u>
                        <br>{{ setting('sebutan_nip_desa') }}/NIP : {{ $pamong_ttd['pamong_nip'] }}
                    </td>
                </tr>
            </table>
        @endif
    </div>
    @stack('scripts')
</body>
</html>
