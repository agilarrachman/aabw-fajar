<?php

namespace App\Controllers;

use App\Models\ModelAkun2;
use App\Models\ModelAkun3;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\IncomingRequest;

/**
 * @property IncomingRequest $request
 */

class Akun3 extends ResourceController
{
    protected $objAkun2;
    protected $objAkun3;
    protected $db;

    // inisialisasi object data
    function __construct()
    {
        $this->objAkun2 = new ModelAkun2();
        $this->objAkun3 = new ModelAkun3();
        $this->db = \Config\Database::connect();
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        // $data['dtakun2'] = $this->objAkun2->findAll();
        $data['dtakun3'] = $this->objAkun3->ambilrelasi();
        return view('akun3/index', $data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        $builders = $this->db->table('akun1s');
        $query = $builders->get();
        $data['dtakun1'] = $query->getResult(); 

        $builder2 = $this->db->table('akun2s');
        $query2 = $builder2->get();
        $data['dtakun2'] = $query2->getResult(); 

        return view('akun3/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $data = $this->request->getPost();
        $data = [
            'kode_akun3' => $this->request->getVar('kode_akun3'),
            'nama_akun3' => $this->request->getVar('nama_akun3'),
            'kode_akun1' => $this->request->getVar('kode_akun1'),
            'kode_akun2' => $this->request->getVar('kode_akun2'),
        ];
        $this->db->table('akun3s')->insert($data);
        return redirect()->to(site_url('akun3'))->with('success', 'Data Berhasil di Simpan');
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        $builders = $this->db->table('akun1s');
        $query = $builders->get();

        $akun2 = $this->objAkun2->findAll($id);
        $akun3 = $this->objAkun3->find($id);

        if (is_object($akun3)) {
            $data['dtakun3'] = $akun3;
            $data['dtakun2'] = $akun2;
            $data['dtakun1'] = $query->getResult();
            return view('akun3/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $data = [
            'kode_akun3' => $this->request->getVar('kode_akun3'),
            'nama_akun3' => $this->request->getVar('nama_akun3'),
            'kode_akun1' => $this->request->getVar('kode_akun1'),
            'kode_akun2' => $this->request->getVar('kode_akun2'),
        ];
        $this->db->table('akun3s')->where(['id_akun3' => $id])->update($data);
        return redirect()->to(site_url('akun3'))->with('success', 'Data Berhasil di Update');
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $this->db->table('akun3s')->where(['id_akun3' => $id])->delete();
        return redirect()->to(site_url('akun3'))->with('success', 'Data Berhasil di Hapus');
    }
}
