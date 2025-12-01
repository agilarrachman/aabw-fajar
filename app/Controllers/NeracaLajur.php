<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAkun3;
use App\Models\ModelNilai;
use App\Models\ModelStatus;
use App\Models\ModelTransaksi;
use CodeIgniter\HTTP\ResponseInterface;
use TCPDF;

class NeracaLajur extends BaseController
{
    protected $objTransaksi;
    protected $objNilai;
    protected $objAkun3;
    protected $objStatus;
    protected $db;

    // inisialisasi object data
    function __construct()
    {
        $this->objTransaksi = new ModelTransaksi();
        $this->objNilai = new ModelNilai();
        $this->objAkun3 = new ModelAkun3();
        $this->objStatus = new ModelStatus();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $tglawal = $this->request->getVar('tglawal') ? $this->request->getVar('tglawal') : '';
        $tglakhir = $this->request->getVar('tglakhir') ? $this->request->getVar('tglakhir') : '';

        $rowdata = $this->objTransaksi->get_neracalajur($tglawal, $tglakhir);
        $data['dttransaksi'] = $rowdata;
        $data['tglawal'] = $tglawal;
        $data['tglakhir'] = $tglakhir;

        // print_r($rowdata);

        return view('neracalajur/index', $data);
    }

    public function neracalajurpdf()
    {
        $tglawal = $this->request->getVar('tglawal') ? $this->request->getVar('tglawal') : '';
        $tglakhir = $this->request->getVar('tglakhir') ? $this->request->getVar('tglakhir') : '';

        $rowdata = $this->objTransaksi->get_neracalajur($tglawal, $tglakhir);        

        $data = [
            'dttransaksi' => $rowdata,
            'tglawal' => $tglawal,
            'tglakhir' => $tglakhir,
        ];

        $html = view('neracalajur/neracalajurpdf', $data);        
        $pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);        
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);        
        $pdf->setMargins(30, 4, 30);        
        $pdf->setFont('helvetica', '', 8);        
        $pdf->AddPage();        
        $pdf->writeHTML($html, true, false, true, false, '');        
        $this->response->setContentType('aplication/pdf');
        $pdf->Output('neracalajur.pdf', 'I');
    }
}
