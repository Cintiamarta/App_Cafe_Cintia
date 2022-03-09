<?php
    namespace App\Models;

    use CodeIgniter\Model;

    class DetailPesananModel extends Model{
        protected $table = 'tb_detailpesanan';

        protected $primary = 'id';
        protected $allowedFields = ['pesanan_id','menu_id','jumlah'];
    }