<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'phone', 'alamat', 'kecamatan', 'kategori', 'email', 'photo', 'status'];
}
