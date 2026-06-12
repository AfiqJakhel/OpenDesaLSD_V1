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

use App\Models\Galery;

defined('BASEPATH') || exit('No direct script access allowed');

class Galeri extends Web_Controller
{
    public $cekMenu;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // Semua item di level root (parrent=0) adalah ALBUM
        $albums = Galery::with(['children' => static fn($q) => $q->where('enabled', 1)->orderBy('urut')])
            ->where('parrent', 0)
            ->where('enabled', 1)
            ->orderBy('urut')
            ->get()
            ->map(static function ($album) {
                // Thumbnail: dari gambar album itu sendiri, atau dari foto anak pertama
                $thumb = $album->gambar;
                if (!$thumb && $album->children->isNotEmpty()) {
                    $thumb = $album->children->first()->gambar;
                }
                $album->thumb_url  = $thumb ? base_url(LOKASI_GALERI . 'sedang_' . $thumb) : null;
                $album->detail_url = site_url('galeri/' . $album->id);
                return $album;
            });

        return view('theme::partials.galeri.index', [
            'title'  => identitas('nama_desa'),
            'albums' => $albums,
        ]);
    }

    public function detail($parent)
    {
        $galeri = Galery::find($parent);

        // Ambil semua foto dalam album ini
        $photos = Galery::where('parrent', $parent)
            ->where('enabled', 1)
            ->orderBy('urut')
            ->get()
            ->map(static function ($foto) {
                $foto->photo_url = $foto->gambar
                    ? base_url(LOKASI_GALERI . 'sedang_' . $foto->gambar)
                    : null;
                return $foto;
            })
            ->filter(static fn($f) => !empty($f->photo_url));

        return view('theme::partials.galeri.index', [
            'title'  => $galeri->nama,
            'parent' => $parent,
            'album'  => $galeri,
            'photos' => $photos,
        ]);
    }
}
