<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Controller;

class CustomerController extends Controller
{
    protected $customerModel;
    protected $session;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
        $this->session = session();

        // Cek apakah pengguna sudah login
        if (!$this->session->get('logged_in')) {
            // Redirect ke login dengan pesan error
            header('Location: ' . base_url('/login'));
            exit();
        }
    }

    public function index()
    {
        $data['customers'] = $this->customerModel->findAll();
        return view('customers/index', $data);
    }

    public function create()
    {
        return view('customers/form');
    }

    public function store()
    {
        $this->customerModel->save([
            'name' => $this->request->getPost('name'),
            'phone' => $this->request->getPost('phone'),
            'alamat' => $this->request->getPost('alamat'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kategori' => $this->request->getPost('kategori'),
            'email' => $this->request->getPost('email'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/customers')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['customer'] = $this->customerModel->find($id);
        return view('customers/edit', $data);
    }

    public function update($id)
    {
        $this->customerModel->update($id, [
            'name' => $this->request->getPost('name'),
            'phone' => $this->request->getPost('phone'),
            'alamat' => $this->request->getPost('alamat'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kategori' => $this->request->getPost('kategori'),
            'email' => $this->request->getPost('email'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/customers')->with('success', 'Pelanggan berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->customerModel->delete($id);
        return redirect()->to('/customers')->with('success', 'Pelanggan berhasil dihapus.');
    }
}
