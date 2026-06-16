<?php

use App\Models\MasterInventaris;

defined('BASEPATH') || exit('No direct script access allowed');

class BukuInventarisKekayaan extends Api_Controller
{
    public function index()
    {
        $tahun = $this->input->get('tahun') ?? date('Y');

        return datatables()->of(MasterInventaris::permen47($tahun))
            ->addIndexColumn()
            ->editColumn('keterangan', static function (array $row): string {
                $html = '';
                if(is_array($row['keterangan'])) {
                    foreach ($row['keterangan'] as $ket) {
                        $html .= '<li>' . $ket . '</li>';
                    }
                } else {
                    $html = $row['keterangan'];
                }
                return $html;
            })
            ->editColumn('tgl_hapus', static fn ($row) => tgl_indo($row['tgl_hapus']))
            ->make();
    }
}
