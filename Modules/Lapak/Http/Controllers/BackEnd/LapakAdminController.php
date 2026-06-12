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

use App\Enums\StatusEnum;
use App\Models\Pamong;
use Illuminate\Support\Facades\View;
use Modules\Lapak\Models\Pelapak;
use Modules\Lapak\Models\Produk;
use Modules\Lapak\Models\ProdukKategori;

defined('BASEPATH') || exit('No direct script access allowed');

class LapakAdminController extends AdminModulController
{
    public $moduleName          = 'Lapak';
    public $modul_ini           = 'lapak';
    public $kategori_pengaturan = 'Lapak';

    public function __construct()
    {
        parent::__construct();
        isCan('b');
    }

    public function index()
    {
        $data['navigasi'] = Produk::navigasi();

        if ($data['navigasi']['jml_pelapak']['aktif'] <= 0) {
            redirect_with('error', 'Pelapak tidak tersedia, silakan tambah pelapak terlebih dahulu', 'lapak_admin/pelapak');
        }

        if ($data['navigasi']['jml_kategori']['aktif'] <= 0) {
            redirect_with('error', 'Kategori tidak tersedia, silakan tambah kategori terlebih dahulu', 'lapak_admin/kategori');
        }

        if (request()->ajax()) {
            $status             = request('status');
            $id_pend            = request('id_pend');
            $id_produk_kategori = request('id_produk_kategori');

            $query = Produk::listProduk()
                ->when($status !== '', static function ($query) use ($status): void {
                    $query->where('produk.status', $status);
                })
                ->when($id_pend, static function ($query, $id_pend): void {
                    $query->where('p.id', $id_pend);
                })
                ->when($id_produk_kategori, static function ($query, $id_produk_kategori): void {
                    $query->where('pk.id', $id_produk_kategori);
                });

            return datatables($query)
                ->addColumn('ceklist', static fn ($row): string => '<input type="checkbox" name="id_cb[]" value="' . $row->id . '"/>')
                ->addIndexColumn()
                ->addColumn('aksi', static function ($row): string {
                    $qIdPend = request('id_pend') ? '?id_pend=' . request('id_pend') : '';
                    $aksi = '<div class="btn-group">
                        <button type="button" class="btn btn-social btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-arrow-circle-down"></i> Pilih Aksi</button>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="' . site_url("lapak_admin/produk_form/{$row->id}") . $qIdPend . '" class="btn btn-social btn-block btn-sm"><i class="fa fa-edit"></i> Ubah Data</a>
                            </li>';
                    $statusNama = $row->status == 1 ? 'Non-aktifkan' : 'Aktifkan';
                    $statusIcon = $row->status == 1 ? 'fa-lock' : 'fa-unlock';
                    $aksi .= '<li>
                                <a href="' . ci_route('lapak_admin.produk_status', $row->id) . $qIdPend . '" class="btn btn-social btn-block btn-sm"><i class="fa ' . $statusIcon . '"></i> ' . $statusNama . '</a>
                            </li>';
                    $aksi .= '<li>
                                    <a href="#" data-href="' . ci_route('lapak_admin.produk_delete', $row->id) . $qIdPend . '" class="btn btn-social btn-block btn-sm" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i> Hapus Data</a>
                                </li>';
                    $aksi .= '</ul></div>';
                    return $aksi;
                })
                ->editColumn('deskripsi', static fn ($row) => e($row->deskripsi))
                ->rawColumns(['ceklist', 'aksi'])
                ->make();
        }

        $data['pelapak']  = Pelapak::listPelapak()->where('pelapak.status', 1)->get();
        $data['kategori'] = ProdukKategori::listKategori()->where('produk_kategori.status', 1)->get();

        return view('lapak::backend.produk.index', $data);
    }

    public function produkForm($id = '')
    {
        isCan('u');

        if ($id) {
            $data['main']        = Produk::listProduk()->where('produk.id', $id)->first() ?? show_404();
            $data['aksi']        = 'Ubah';
            $data['form_action'] = site_url("lapak_admin/produk_update/{$id}") . (request('id_pend') ? '?id_pend=' . request('id_pend') : '');
        } else {
            $data['main']                = new stdClass();
            $data['main']->tipe_potongan = 1;
            $data['main']->id_pelapak    = request('id_pelapak');
            $data['aksi']                = 'Tambah';
            $data['form_action']         = site_url('lapak_admin/produk_insert');
        }

        $data['pelapak']  = Pelapak::listPelapak()->where('pelapak.status', 1)->get();
        $data['kategori'] = ProdukKategori::listKategori()->where('produk_kategori.status', 1)->get();
        $data['satuan']   = Produk::listSatuan();

        return view('lapak::backend.produk.form', $data);
    }

    public function produkInsert(): void
    {
        isCan('u');
        $post           = request()->post();
        $post['status'] = StatusEnum::YA;
        $redirectUrl = 'lapak_admin/produk_form?id_pelapak=' . ($post['id_pelapak'] ?? '') . '&sukses_tambah=1' . (request('id_pend') ? '&id_pend=' . request('id_pend') : '');
        if ((new Produk())->produkInsert($post)) {
            redirect_with('success', 'Berhasil menambah data', $redirectUrl);
        } else {
            redirect_with('error', 'Gagal menambah data', 'lapak_admin/produk' . (request('id_pend') ? '?id_pend=' . request('id_pend') : ''));
        }
    }

    public function produkUpdate($id = ''): void
    {
        isCan('u');

        $redirectUrl = 'lapak_admin/produk' . (request('id_pend') ? '?id_pend=' . request('id_pend') : '');

        if ((new Produk())->produkUpdate($id, request()->post())) {
            redirect_with('success', 'Berhasil mengubah data', $redirectUrl);
        }

        redirect_with('error', 'Gagal mengubah data', $redirectUrl);
    }

    public function produkDelete($id): void
    {
        isCan('h');

        $redirectUrl = 'lapak_admin/produk' . (request('id_pend') ? '?id_pend=' . request('id_pend') : '');

        if ((new Produk())->produkDelete($id)) {
            redirect_with('success', 'Berhasil Hapus Data', $redirectUrl);
        }

        redirect_with('error', 'Gagal Hapus Data', $redirectUrl);
    }

    public function produkDeleteAll(): void
    {
        isCan('h');

        $redirectUrl = 'lapak_admin/produk' . (request('id_pend') ? '?id_pend=' . request('id_pend') : '');

        if ((new Produk())->produkDeleteAll()) {
            redirect_with('success', 'Berhasil Hapus Data', $redirectUrl);
        }

        redirect_with('error', 'Gagal Hapus Data', $redirectUrl);
    }

    public function produkDetail($id = 0)
    {
        $data['main'] = Produk::listProduk()->where('produk.id', $id)->first() ?? show_404();

        return view('lapak::backend.produk.detail', $data);
    }

    public function produkStatus($id = 0): void
    {
        isCan('u');

        $redirectUrl = 'lapak_admin/produk' . (request('id_pend') ? '?id_pend=' . request('id_pend') : '');

        if (Produk::gantiStatus($id)) {
            redirect_with('success', 'Berhasil mengubah data', $redirectUrl);
        }

        redirect_with('error', 'Gagal mengubah data', $redirectUrl);
    }

    public function dialog($aksi = 'cetak'): void
    {
        $data                = $this->modal_penandatangan();
        $data['aksi']        = ucwords($aksi);
        $data['form_action'] = site_url("lapak_admin/produk/aksi/{$aksi}");

        view('admin.layouts.components.ttd_pamong', $data);
    }

    public function aksi($aksi = 'cetak'): void
    {
        $data['aksi']           = $aksi;
        $data['config']         = identitas();
        $data['pamong_ttd']     = Pamong::selectData()->where(['pamong_id' => request('pamong_ttd')])->first()->toArray();
        $data['pamong_ketahui'] = Pamong::selectData()->where(['pamong_id' => request('pamong_ketahui')])->first()->toArray();
        $data['main']           = Produk::with(['pelapak.penduduk:id,nama', 'kategori:id,kategori'])->get();
        $data['file']           = 'Data Produk';
        $data['isi']            = 'lapak::backend.produk.cetak';
        $data['letak_ttd']      = ['1', '1', '1'];

        view('admin.layouts.components.format_cetak', $data);
    }
}
