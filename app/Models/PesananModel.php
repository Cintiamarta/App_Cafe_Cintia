<?php
    namespace App\Models;

    use CodeIgniter\Model;

    class PesananModel extends Model{
        protected $table = 'tb_pesanan';

        protected $primary = 'id';
        protected $allowedFields = ['user_id','jumlah','tgl','total_harga','no_meja','nama_pemesan'];
    }