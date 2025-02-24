<?php
namespace App\Models;

use CodeIgniter\Model;

class HaircutModel extends Model
{
    protected $table = 'haircuts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customer_id', 'haircut_date', 'style', 'before_photo', 'after_photo', 'notes'];

    public function getHaircuts()
    {
        return $this->select('haircuts.*, customers.name as customer_name')
                    ->join('customers', 'customers.id = haircuts.customer_id')
                    ->orderBy('haircut_date', 'DESC')
                    ->findAll();
    }
}
