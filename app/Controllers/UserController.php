<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use CodeIgniter\HTTP\request;
use Tests\Support\Entity\User;

class UserController extends Controller
{
    /**
     * Instance of the mai Request object.
     * 
     * @var HTTP\IncomingRequest
     */
    protected $request;

    function __construct()
    {
        $this->users= new UserModel();
    }
    public function index()
    {
        #code...
        $data['data']= $this->users->findAll();
        return view('UserList', $data);
    }
    public function simpan()
    {
        #code...
        $data = array(
            'nama'=>$this->request->getPost('nama'),
            'username'=>$this->request->getPost('username'),
            'password'=>password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
            'role'=>$this->request->getPost('role'),
        );
        $this->users->insert($data);
        return redirect('user')->with('success','Data berhasil disimpan');
    }
    public function delete($id)
    {
        #code...
        $this->users->delete($id);
        return redirect('user')->with('success','Data berhasil dihapus');
    }
    public function edit($id)
    {
        # code...
        $pass = $this->request->getPost('password');
        if(empty($pass)){
            $data = array(
                'nama'=>$this->request->getPost('nama'),
                'username'=>$this->request->getPost('username'),
                'role'=>$this->request->getPost('role')
            );
        }else
            $data = array(
                'nama'=>$this->request->getPost('nama'),
                'username'=>$this->request->getPost('username'),
                'password'=>password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
                'role'=>$this->request->getPost('role'),
        );
        $this->users->update($id, $data);
        return redirect ('user')->with('success', 'Data berhasil diedit');
    }
    public function tlogin()
    {
        return view('login');
    }
    public function login()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $data = $this->users->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $cek_pass = password_verify($password, $pass);
            if ($cek_pass) {
                $ses_data = [
                'id'=> $data['id'],
                'username' => $data['username'],
                'role' => $data['role'],
            ];
            $session->set($ses_data);
            return redirect()->to('/dashboard');
        }else {
            $session->setFlashdata('msg', 'password keliru ditemukan');
            return redirect('login');
        }
    }else {
        $session->setFlashdata('msg', 'password tidak ditemukan');
        return redirect('login');
    }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect('login');
    }
    public function show($id)
    {
        #code...
    }
}
    