<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MenuModel;

class MenuController extends Controller
{
        /**
         * Instance of the mai Request object.
         * 
         * @var HTTP\IncomingRequest
         */
        protected $request;
    
        function __construct()
        {
            $this->menus= new MenuModel();
        }
        public function tampil()
        {
            #code...
            $data['data']= $this->menus->findAll();
            return view('MenuList', $data);
        }
        public function simpan()
        {
            #code...
            $data = array(
                'nama'=>$this->request->getPost('nama'),
                'harga'=>$this->request->getPost('harga'),
                'jenis'=>$this->request->getPost('jenis'),
                'stok'=>$this->request->getPost('stok'),
                'gambar'=>$this->request->getPost('gambar'),
            );
            $this->menus->insert($data);
            return redirect('menu')->with('success','Data berhasil disimpan');
        }
        public function delete($id)
        {
            #code...
            $this->menus->delete($id);
            return redirect('menu')->with('success','Data berhasil dihapus');
        }
        public function edit($id)
        {
            # code...
            $pass = $this->request->getPost('nama');
            if(empty($pass)){
                $data = array(
                    'nama'=>$this->request->getPost('nama'),
                    'harga'=>$this->request->getPost('harga'),
                    'jenis'=>$this->request->getPost('jenis'),
                    'stok'=>$this->request->getPost('stok'),
                    'gambar'=>$this->request->getPost('gambar'),
                );
            }else
                $data = array(
                    'nama'=>$this->request->getPost('nama'),
                    'harga'=>$this->request->getPost('harga'),
                    'jenis'=>$this->request->getPost('jenis'),
                    'stok'=>$this->request->getPost('stok'),
                    'gambar'=>$this->request->getPost('gambar'),
            );
            $this->menus->update($id, $data);
            return redirect ('menu')->with('success', 'Data berhasil diedit');
        }
        public function hapus()
        {
            # code...
        }
}