<?php

/*
 *
 * File ini bagian dari:
 *
 * OpenSID
 *
 * Sistem informasi desa sumber terbuka untuk memajukan desa
 *
 * Aplikasi dan source code ini dirilis berdasarkan lisensi GPL V3
 *
 * Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * Hak Cipta 2016 - 2025 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 *
 * Dengan ini diberikan izin, secara gratis, kepada siapa pun yang mendapatkan salinan
 * dari perangkat lunak ini dan file dokumentasi terkait ("Aplikasi Ini"), untuk diperlakukan
 * tanpa batasan, termasuk hak untuk menggunakan, menyalin, mengubah dan/atau mendistribusikan,
 * asal tunduk pada syarat berikut:
 *
 * Pemberitahuan hak cipta di atas dan pemberitahuan izin ini harus disertakan dalam
 * setiap salinan atau bagian penting Aplikasi Ini. Barang siapa yang menghapus atau menghilangkan
 * pemberitahuan ini melanggar ketentuan lisensi Aplikasi Ini.
 *
 * PERANGKAT LUNAK INI DISEDIAKAN "SEBAGAIMANA ADANYA", TANPA JAMINAN APA PUN, BAIK TERSURAT MAUPUN
 * TERSIRAT. PENULIS ATAU PEMEGANG HAK CIPTA SAMA SEKALI TIDAK BERTANGGUNG JAWAB ATAS KLAIM, KERUSAKAN ATAU
 * KEWAJIBAN APAPUN ATAS PENGGUNAAN ATAU LAINNYA TERKAIT APLIKASI INI.
 *
 * @package   OpenSID
 * @author    Tim Pengembang OpenDesa
 * @copyright Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * @copyright Hak Cipta 2016 - 2025 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 * @license   http://www.gnu.org/licenses/gpl.html GPL V3
 * @link      https://github.com/OpenSID/OpenSID
 *
 */

defined('BASEPATH') || exit('No direct script access allowed');

class Peta extends Web_Controller
{
    // Koordinat: Kantor Wali Nagari Koto Tangah Batu Ampa
    // Kec. Akabiluru, Kab. Lima Puluh Kota, Sumatera Barat
    // Sumber: https://maps.app.goo.gl/yBWppPatKz1Shm9fA
    private const DEFAULT_LAT  = '-0.2641948';
    private const DEFAULT_LNG  = '100.5579674';
    private const DEFAULT_ZOOM = '13';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        try {
            $config = $this->db
                ->select('lat, lng, zoom, nama_desa, nama_kecamatan, nama_kabupaten')
                ->get('config')
                ->row();

            // Gunakan koordinat dari database jika tersedia dan valid,
            // fallback ke koordinat Kantor Wali Nagari Koto Tangah Batu Ampa
            $data['lat']  = (! empty($config->lat)  && $config->lat  != '0')
                ? $config->lat
                : self::DEFAULT_LAT;

            $data['lng']  = (! empty($config->lng)  && $config->lng  != '0')
                ? $config->lng
                : self::DEFAULT_LNG;

            $data['zoom'] = (! empty($config->zoom) && $config->zoom != '0')
                ? $config->zoom
                : self::DEFAULT_ZOOM;

            $data['nama_desa'] = $config->nama_desa      ?? 'Koto Tangah Batu Ampa';
            $data['kecamatan'] = $config->nama_kecamatan ?? 'Akabiluru';
            $data['kabupaten'] = $config->nama_kabupaten ?? 'Lima Puluh Kota';

        } catch (\Exception $e) {
            log_message('error', '[Peta] ' . $e->getMessage());

            $data['lat']       = self::DEFAULT_LAT;
            $data['lng']       = self::DEFAULT_LNG;
            $data['zoom']      = self::DEFAULT_ZOOM;
            $data['nama_desa'] = 'Koto Tangah Batu Ampa';
            $data['kecamatan'] = 'Akabiluru';
            $data['kabupaten'] = 'Lima Puluh Kota';
        }

        $data['title'] = 'Peta Desa';

        return view('theme::partials.peta.index', $data);
    }
}