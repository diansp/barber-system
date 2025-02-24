<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class ProfileController extends Controller
{
  public function index()
  {
      $userModel = new UserModel();
      $user = $userModel->find(session()->get('user_id'));

      return view('profile', ['user' => $user]);
  }


    public function update()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');

        $data = [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        // Jika password diisi, update password
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $userModel->update($userId, $data);

        return redirect()->to('/profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
