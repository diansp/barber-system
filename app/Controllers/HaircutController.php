<?php

namespace App\Controllers;

use App\Models\HaircutModel;
use App\Models\CustomerModel;
use CodeIgniter\Controller;

class HaircutController extends Controller
{
  public function index()
  {
      $haircutModel = new HaircutModel();
      $data['haircuts'] = $haircutModel->getHaircuts();

      return view('haircuts/index', $data);
  }

    public function create()
    {
        $customerModel = new CustomerModel();
        $data['customers'] = $customerModel->findAll();
        return view('haircuts/form', $data);
    }

    public function edit($id)
    {
        $haircutModel = new HaircutModel();
        $customerModel = new CustomerModel();

        $data['haircut'] = $haircutModel->find($id);
        $data['customers'] = $customerModel->findAll(); // Untuk dropdown pelanggan

        if (!$data['haircut']) {
            return redirect()->to('/haircuts')->with('error', 'Data tidak ditemukan');
        }

        return view('haircuts/form', $data);
    }
    public function update($id)
  {
      $haircutModel = new HaircutModel();

      $haircut = $haircutModel->find($id);
      if (!$haircut) {
          return redirect()->to('/haircuts')->with('error', 'Data tidak ditemukan.');
      }

      $data = [
          'customer_id' => $this->request->getPost('customer_id'),
          'haircut_date' => $this->request->getPost('haircut_date'),
          'style' => $this->request->getPost('style'),
          'notes' => $this->request->getPost('notes'),
      ];

      // Upload Foto Sebelum
      if ($this->request->getFile('before_photo')->isValid()) {
          $beforePhoto = $this->request->getFile('before_photo');
          $newBeforePhoto = $beforePhoto->getRandomName();
          $beforePhoto->move('uploads/haircuts', $newBeforePhoto);
          $data['before_photo'] = $newBeforePhoto;
      }

      // Upload Foto Sesudah
      if ($this->request->getFile('after_photo')->isValid()) {
          $afterPhoto = $this->request->getFile('after_photo');
          $newAfterPhoto = $afterPhoto->getRandomName();
          $afterPhoto->move('uploads/haircuts', $newAfterPhoto);
          $data['after_photo'] = $newAfterPhoto;
      }

      $haircutModel->update($id, $data);
      return redirect()->to('/haircuts')->with('success', 'Data berhasil diperbarui.');
  }
  public function delete($id)
  {
      $haircutModel = new HaircutModel();

      // Cek apakah data haircut ada
      $haircut = $haircutModel->find($id);
      if (!$haircut) {
          return redirect()->to('/haircuts')->with('error', 'Data tidak ditemukan.');
      }

      // Hapus foto sebelum jika ada
      if ($haircut['before_photo'] && file_exists('uploads/haircuts/' . $haircut['before_photo'])) {
          unlink('uploads/haircuts/' . $haircut['before_photo']);
      }

      // Hapus foto sesudah jika ada
      if ($haircut['after_photo'] && file_exists('uploads/haircuts/' . $haircut['after_photo'])) {
          unlink('uploads/haircuts/' . $haircut['after_photo']);
      }

      // Hapus data haircut
      $haircutModel->delete($id);

      return redirect()->to('/haircuts')->with('success', 'Data berhasil dihapus.');
  }
  
    public function store()
    {
        $haircutModel = new HaircutModel();

        $data = [
            'customer_id'  => $this->request->getPost('customer_id'),
            'haircut_date' => $this->request->getPost('haircut_date'),
            'style'        => $this->request->getPost('style'),
            'notes'        => $this->request->getPost('notes')
        ];

        // Upload foto sebelum dan sesudah
        $beforePhoto = $this->request->getFile('before_photo');
        $afterPhoto  = $this->request->getFile('after_photo');

        if ($beforePhoto->isValid() && !$beforePhoto->hasMoved()) {
            $beforePhotoName = $beforePhoto->getRandomName();
            $beforePhoto->move('uploads/haircuts/', $beforePhotoName);
            $data['before_photo'] = 'uploads/haircuts/' . $beforePhotoName;
        }

        if ($afterPhoto->isValid() && !$afterPhoto->hasMoved()) {
            $afterPhotoName = $afterPhoto->getRandomName();
            $afterPhoto->move('uploads/haircuts/', $afterPhotoName);
            $data['after_photo'] = 'uploads/haircuts/' . $afterPhotoName;
        }

        $haircutModel->insert($data);
        return redirect()->to('/haircuts')->with('success', 'Rekaman potong rambut berhasil ditambahkan.');
    }
}
