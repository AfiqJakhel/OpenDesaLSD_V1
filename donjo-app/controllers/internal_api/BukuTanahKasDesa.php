<?php

use App\Models\TanahKasDesa;

defined('BASEPATH') || exit('No direct script access allowed');

class BukuTanahKasDesa extends Api_Controller
{
    public function index()
    {
        return datatables()->of(TanahKasDesa::visible())
            ->addIndexColumn()
            ->editColumn('kode', static fn ($row) => $row->ref_persil_kelas ? $row->ref_persil_kelas->kode : '')
            ->editColumn('tanggal_perolehan', static fn ($row) => tgl_indo($row->tanggal_perolehan))
            ->make();
    }
}
