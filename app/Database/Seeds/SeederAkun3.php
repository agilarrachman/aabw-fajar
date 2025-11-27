<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederAkun3 extends Seeder
{
    public function run()
    {
        $data = [
            // --- AKTIVA LANCAR ---
            [
                'kode_akun3' => 1101,
                'nama_akun3' => 'Kas',
                'kode_akun1' => '1',
                'kode_akun2' => '11',
            ],
            [
                'kode_akun3' => 1102,
                'nama_akun3' => 'Piutang Usaha',
                'kode_akun1' => '1',
                'kode_akun2' => '11',
            ],
            [
                'kode_akun3' => 1103,
                'nama_akun3' => 'Perlengkapan Kantor',
                'kode_akun1' => '1',
                'kode_akun2' => '11',
            ],
            [
                'kode_akun3' => 1104,
                'nama_akun3' => 'Sewa Dibayar di muka',
                'kode_akun1' => '1',
                'kode_akun2' => '11',
            ],
            [
                'kode_akun3' => 1105,
                'nama_akun3' => 'Asuransi dibayar di muka',
                'kode_akun1' => '1',
                'kode_akun2' => '11',
            ],

            // --- AKTIVA TETAP ---
            [
                'kode_akun3' => 1201,
                'nama_akun3' => 'Peralatan Kantor',
                'kode_akun1' => '1',
                'kode_akun2' => '12',
            ],
            [
                'kode_akun3' => 1202,
                'nama_akun3' => 'Akumulasi Penyusutan P. Kantor',
                'kode_akun1' => '1',
                'kode_akun2' => '12',
            ],
            [
                'kode_akun3' => 1203,
                'nama_akun3' => 'Tanah',
                'kode_akun1' => '1',
                'kode_akun2' => '12',
            ],

            // --- UTANG JANGKA PENDEK ---
            [
                'kode_akun3' => 2101,
                'nama_akun3' => 'Utang Usaha',
                'kode_akun1' => '2',
                'kode_akun2' => '21',
            ],
            [
                'kode_akun3' => 2102,
                'nama_akun3' => 'Utang Gaji',
                'kode_akun1' => '2',
                'kode_akun2' => '21',
            ],
            [
                'kode_akun3' => 2103,
                'nama_akun3' => 'Pendapatan diterima di muka',
                'kode_akun1' => '2',
                'kode_akun2' => '21',
            ],

            // --- UTANG JANGKA PANJANG ---
            [
                'kode_akun3' => 2201,
                'nama_akun3' => 'Utang Hipotek',
                'kode_akun1' => '2',
                'kode_akun2' => '22',
            ],
            [
                'kode_akun3' => 2202,
                'nama_akun3' => 'Utang Obligasi',
                'kode_akun1' => '2',
                'kode_akun2' => '22',
            ],

            // --- MODAL & PRIVE ---
            [
                'kode_akun3' => 3101,
                'nama_akun3' => 'Modal Pemilik',
                'kode_akun1' => '3',
                'kode_akun2' => '31',
            ],
            [
                'kode_akun3' => 3201,
                'nama_akun3' => 'Prive Tuan Najwan',
                'kode_akun1' => '3',
                'kode_akun2' => '32',
            ],

            // --- PENDAPATAN ---
            [
                'kode_akun3' => 4101,
                'nama_akun3' => 'Pendapatan Jasa',
                'kode_akun1' => '4',
                'kode_akun2' => '41',
            ],
            [
                'kode_akun3' => 4102, 
                'nama_akun3' => 'Pendapatan diterima di muka',
                'kode_akun1' => '4',
                'kode_akun2' => '41',
            ],
            [
                'kode_akun3' => 4201,
                'nama_akun3' => 'Pendapatan diluar Usaha',
                'kode_akun1' => '4',
                'kode_akun2' => '42',
            ],

            // --- BEBAN USAHA ---
            [
                'kode_akun3' => 5101,
                'nama_akun3' => 'Beban Gaji Karyawan',
                'kode_akun1' => '5',
                'kode_akun2' => '51',
            ],
            [
                'kode_akun3' => 5102,
                'nama_akun3' => 'Beban Iklan',
                'kode_akun1' => '5',
                'kode_akun2' => '51',
            ],
            [
                'kode_akun3' => 5103,
                'nama_akun3' => 'Beban Asuransi',
                'kode_akun1' => '5',
                'kode_akun2' => '51',
            ],
            [
                'kode_akun3' => 5104,
                'nama_akun3' => 'Beban Telepon',
                'kode_akun1' => '5',
                'kode_akun2' => '51',
            ],
            [
                'kode_akun3' => 5105,
                'nama_akun3' => 'Beban Listrik',
                'kode_akun1' => '5',
                'kode_akun2' => '51',
            ],
            [
                'kode_akun3' => 5106,
                'nama_akun3' => 'Beban Sewa',
                'kode_akun1' => '5',
                'kode_akun2' => '51',
            ],
            [
                'kode_akun3' => 5107,
                'nama_akun3' => 'Beban Penyusutan Peralatan Kantor',
                'kode_akun1' => '5',
                'kode_akun2' => '51',
            ],
            [
                'kode_akun3' => 5108,
                'nama_akun3' => 'Beban Perlengkapan Kantor',
                'kode_akun1' => '5',
                'kode_akun2' => '51',
            ],

            // --- BEBAN DI LUAR USAHA ---
            [
                'kode_akun3' => 5201,
                'nama_akun3' => 'Beban Bunga',
                'kode_akun1' => '5',
                'kode_akun2' => '52',
            ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        // $this->db->table('akun1s')->insert($data);
        $this->db->table('akun3s')->insertBatch($data);
    }
}
