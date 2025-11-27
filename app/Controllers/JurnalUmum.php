<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAkun3;
use App\Models\ModelNilai;
use App\Models\ModelStatus;
use App\Models\ModelTransaksi;
use CodeIgniter\HTTP\IncomingRequest;
use TCPDF;

/**
 * @property IncomingRequest $request
 */


class JurnalUmum extends BaseController
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
        $tglawal= $this->request->getVar('tglawal') ? $this->request->getVar('tglawal') : '';
        $tglakhir= $this->request->getVar('tglakhir') ? $this->request->getVar('tglakhir') : '';

        $rowdata = $this->objTransaksi->get_jurnalumum($tglawal, $tglakhir);
        $i = 0;
        $temp1=0;
        $temp2=0;

        foreach($rowdata as $row){
            $tgl = ($temp1 == $row->tanggal && $temp2 == $row->kwitansi) ? '' : $row->tanggal;
            $temp1 = $row->tanggal;
            $temp2 = $row->kwitansi;
            $rowdata[$i]->tanggal = $tgl;
            $i++;
        }

        $data['dttransaksi'] = $rowdata;
        $data['tglawal'] = $tglawal;
        $data['tglakhir'] = $tglakhir;

        return view('jurnalumum/index', $data);
    }

    public function cetakjupdf()
    {
        $tglawal = $this->request->getVar('tglawal') ? $this->request->getVar('tglawal') : '';
        $tglakhir = $this->request->getVar('tglakhir') ? $this->request->getVar('tglakhir') : '';

        $rowdata = $this->objTransaksi->get_jurnalumum($tglawal, $tglakhir);
        $i = 0;
        $temp1 = 0;
        $temp2 = 0;

        foreach ($rowdata as $row) {
            $tgl = ($temp1 == $row->tanggal && $temp2 == $row->kwitansi) ? '' : $row->tanggal;
            $temp1 = $row->tanggal;
            $temp2 = $row->kwitansi;
            $rowdata[$i]->tanggal = $tgl;
            $i++;
        }

        $data = [
           'dttransaksi' => $rowdata,
           'tglawal' => $tglawal, 
           'tglakhir' => $tglakhir, 
        ];

        $html = view('jurnalumum/cetakjupdf', $data);
        // create new PDF document
        $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
        // remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        // set margin
        $pdf->setMargins(30, 4, 3);
        
        // set font
        $pdf->setFont('helvetica', '', 8);
        // add a page
        $pdf->AddPage();
        // Print text using writeHTMLCell()
        $pdf->writeHTML($html, true, false, true, false, '');
        // This method has several options, check the source code documentation for more information
        $this->response->setContentType('aplication/pdf');
        $pdf->Output('jurnalumum.pdf', 'I');
    }
}
