<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function processLogin()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Simpan session user
                $session->set([
                    'user_id' => $user['id'],
                    'user_email' => $user['email'],
                    'isLoggedIn' => true,
                ]);

                return redirect()->to('/dashboard'); // ✅ Redirect ke dashboard setelah login sukses
            } else {
                return redirect()->to('/login')->with('error', 'Password salah.');
            }
        } else {
            return redirect()->to('/login')->with('error', 'Email tidak ditemukan.');
        }
    }



    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Logout berhasil.');
    }
}
