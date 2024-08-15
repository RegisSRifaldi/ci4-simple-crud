<?php

namespace App\Models;

use CodeIgniter\Model;

class CarsModel extends Model
{
    protected $table = "cars";
    protected $useTimestamps = true;
    protected $allowedFields = ['car', 'slug', 'type', 'price', 'picture'];

    public function getCars($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
