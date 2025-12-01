<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAkun3;
use App\Models\ModelNilai;
use App\Models\ModelStatus;
use App\Models\ModelTransaksi;
use CodeIgniter\HTTP\ResponseInterface;
use TCPDF;

class Pmodal extends BaseController
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

        $rowdata = $this->objTransaksi->get_pmodal($tglawal, $tglakhir);

        $modal_awal = 0;
        $pendapatan = 0;
        $prive = 0;
        $jumdebit = 0;
        $jumdebits = 0;

        foreach ($rowdata as $row) {
            if ($row->kode_akun3 == 3101) {
                $modal_awal = $row->jumkredit;
            }
            if ($row->kode_akun3 == 4101) {
                $pendapatan = $row->jumkredit + $row->jumkredits;
            }
            if ($row->kode_akun3 == 3201) {
                $prive = $row->jumdebit;
            }
            if (substr($row->kode_akun3, 0, 2) == 51) {
                $jumdebit = $jumdebit + $row->jumdebit;
                $jumdebits = $jumdebits + $row->jumdebits;
            }
        }

        $beban = $jumdebit + $jumdebits;

        $rowdatanew['modal_awal'] = $modal_awal;
        $rowdatanew['pendapatan'] = $pendapatan;
        $rowdatanew['prive'] = $prive;
        $rowdatanew['beban'] = $beban;
        $rowdatanew['laba_rugi'] = $pendapatan - $beban;

        $rowdatanew['penambahan_modal'] = $rowdatanew['laba_rugi'] - $prive;
        $rowdatanew['modal_akhir'] = $rowdatanew['penambahan_modal'] + $modal_awal;

        $data['dttransaksi'] = $rowdatanew;
        $data['tglawal'] = $tglawal;
        $data['tglakhir'] = $tglakhir;


        return view('pmodal/index', $data);
    }

    public function pmodal()
    {
        $tglawal = $this->request->getVar('tglawal') ? $this->request->getVar('tglawal') : '';
        $tglakhir = $this->request->getVar('tglakhir') ? $this->request->getVar('tglakhir') : '';

        $rowdata = $this->objTransaksi->get_pmodal($tglawal, $tglakhir);

        $modal_awal = 0;
        $pendapatan = 0;
        $jumdebits = 0;

        foreach ($rowdata as $row) {
            if ($row->kode_akun3 == 3101) {
                $modal_awal = $row->jumkredit;
            }
            if ($row->kode_akun3 == 4101) {
                $pendapatan = $row->jumkredit + $row->jumkredits;
            }
            if ($row->kode_akun3 == 3101) {
                $prive = $row->jumkredit + $row->jumkredits;
            }
            if (substr($row->kode_akun3, 0, 2) == 51) {
                $jumdebit = $row->jumdebit + $row->jumdebits;
                $jumdebits = $jumdebits + $row->jumdebits;
            }
        }
        $beban = $jumdebit + $jumdebits;

        $rowdatanew['modal_awal'] = $modal_awal;
        $rowdatanew['pendapatan'] = $pendapatan;
        $rowdatanew['prive'] = $prive;
        $rowdatanew['beban'] = $beban;
        $rowdatanew['laba_rugi'] = $pendapatan - $beban;

        $rowdatanew['penambahan_modal'] = $rowdatanew['laba_rugi'] - $prive;
        $rowdatanew['modal_akhir'] = $rowdatanew['penambahan_modal'] - $modal_awal;

        $data = [
            'dttransaksi' => $rowdatanew,
            'tglawal' => $tglawal,
            'tglakhir' => $tglakhir,
        ];

        $html = view('pmodal/pmodalpdf', $data);
        $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->setMargins(30, 4, 30);
        $pdf->setFont('helvetica', '', 8);
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');
        $this->response->setContentType('aplication/pdf');
        $pdf->Output('pmodal.pdf', 'I');
    }
}
