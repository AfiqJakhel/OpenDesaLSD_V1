<?php

defined('BASEPATH') || exit('No direct script access allowed');

class Profil_desa extends Web_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // Ambil data profil desa dari setting identitas (tab profil)
        $data['profil_desa'] = \App\Models\ProfilDesa::pluck('value', 'key')->toArray();

        // Ambil data identitas desa lengkap (termasuk sejarah)
        $data['desa_info'] = \App\Models\Config::first()->toArray();

        // Cari artikel yang mengandung judul BAB
        $data['artikel_bab'] = \App\Models\Artikel::where('judul', 'like', '%BAB%')
                                ->where('enabled', 1)
                                ->orderBy('id', 'asc')
                                ->get();

        // Statistik dasar
        $data['totalJiwa']  = \App\Models\Penduduk::withoutGlobalScopes()->where('status_dasar', 1)->count();
        $data['totalKK']    = \App\Models\Keluarga::aktif()->count();
        $data['totalDusun'] = \App\Models\Wilayah::dusun()->count();

        return view('theme::partials.profil_desa.index', $data);
    }
}
