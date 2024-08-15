<?php

namespace App\Controllers;

use App\Models\CarsModel;

class Cars extends BaseController
{
    protected $carsModel;
    public function __construct()
    {
        $this->carsModel = new CarsModel();
    }


    public function index(): string
    {
        // $cars = $this->carsModel->findAll();

        $data = [
            'title' => 'List cars',
            'cars' => $this->carsModel->getCars()
        ];


        // $carsModel = new \App\Models\CarsModel();
        // dd($cars);




        // cara konek db tanpa model
        // $db = \Config\Database::connect();
        // $car = $db->query("SELECT * FROM cars");
        // foreach ($car->getResultArray() as $row) {
        //     d($row);
        // }


        return view('cars/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Cars',
            'cars' => $this->carsModel->getCars($slug)
        ];
        return view('cars/detail', $data);
    }
}
