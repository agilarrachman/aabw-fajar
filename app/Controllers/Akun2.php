<?php

namespace App\Controllers;

use App\Models\ModelAkun2;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\IncomingRequest;

/**
 * @property IncomingRequest $request
 */

class Akun2 extends ResourceController
{
    protected $objAkun2;
    protected $db;

    // inisialisasi object data
    function __construct()
    {
        $this->objAkun2 = new ModelAkun2();
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
        $data['dtakun2'] = $this->objAkun2->ambilrelasi();
        return view('akun2/index', $data);
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
        return view('akun2/new', $data);
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
            'kode_akun2' => $this->request->getVar('kode_akun2'),
            'nama_akun2' => $this->request->getVar('nama_akun2'),
            'kode_akun1' => $this->request->getVar('kode_akun1'),
        ];
        $this->db->table('akun2s')->insert($data);
        return redirect()->to(site_url('akun2'))->with('success', 'Data Berhasil di Simpan');
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

        $akun2 = $this->objAkun2->find($id);
        if (is_object($akun2)) {
            $data['dtakun2'] = $akun2;
            $data['dtakun1'] = $query->getResult();
            return view('akun2/edit', $data);
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
            'kode_akun2' => $this->request->getVar('kode_akun2'),
            'nama_akun2' => $this->request->getVar('nama_akun2'),
            'kode_akun1' => $this->request->getVar('kode_akun1'),
        ];
        $this->db->table('akun2s')->where(['id_akun2' => $id])->update($data);
        return redirect()->to(site_url('akun2'))->with('success', 'Data Berhasil di Update');
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
        $this->db->table('akun2s')->where(['id_akun2' => $id])->delete();
        return redirect()->to(site_url('akun2'))->with('success', 'Data Berhasil di Hapus');
    }
}
