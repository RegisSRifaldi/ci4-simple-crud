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

        // jika car tidak ada di tabel 
        if (empty($data['cars'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Car named ' . $slug . ' not found');
        }
        return view('cars/detail', $data);
    }

    public function create()
    {
        session();
        $data = [
            'title' => 'Form Add Car',
            'validation' => \Config\Services::validation()
        ];

        return view('cars/create', $data);
    }

    // method save mengelola data yang dikirim dari create untuk di insert ke dalam tabel
    public function save()
    {
        // validasi input 
        if (!$this->validate([
            'car' =>
            [
                'rules' => 'required|is_unique[cars.car]',
                'errors' => [
                    'required' => '{filed} car harus diisi',
                    'is_unique' => '{field} car sudah ada'
                ]
            ]
        ])) {

            $validation = \Config\Services::validation();
            // dd($validation);
            // return redirect()->to('/car/create');
            return redirect()->to('/car/create')->withInput()->with('validation', $validation);
        }
        //  untuk membuat string menjadi hufuf kecil semua dan spasi hilang = default - 
        $slug = url_title($this->request->getVar('car'), '-', true);
        $this->carsModel->save([
            'car' => $this->request->getVar('car'),
            'slug' => $slug,
            'type' => $this->request->getVar('type'),
            'price' => $this->request->getVar('price'),
            'picture' => $this->request->getVar('picture')
        ]);

        session()->setFlashdata('message', 'Data added successfully.');

        return redirect()->to('/cars');
    }


    public function delete($id)
    {
        $this->carsModel->delete($id);
        session()->setFlashdata('message', 'Data successfully deleted.');
        return redirect()->to('/cars');
    }

    public function edit($slug)
    {
        session();
        $data = [
            'title' => 'Form Edit Car',
            'validation' => \Config\Services::validation(),
            'car' => $this->carsModel->getCars($slug)
        ];

        return view('cars/edit', $data);
    }

    public function update($id)
    {
        // cek car
        $oldcar = $this->carsModel->getCars($this->request->getVar('slug'));

        if ($oldcar) {
            if ($oldcar['car'] === $this->request->getVar('car')) {
                $rule_car = 'required';
            } else {
                $rule_car = 'required|is_unique[cars.car]';
            }
        } else {
            // Tambahkan logika penanganan jika data tidak ditemukan
            $rule_car = 'required|is_unique[cars.car]';
        }

        // validasi input 
        if (!$this->validate([
            'car' =>
            [
                'rules' => $rule_car,
                'errors' => [
                    'required' => '{filed} car harus diisi',
                    'is_unique' => '{field} car sudah ada'
                ]
            ]
        ])) {

            $validation = \Config\Services::validation();
            // dd($validation);
            // return redirect()->to('/car/create');
            return redirect()->to('/cars/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }


        $slug = url_title($this->request->getVar('car'), '-', true);
        $this->carsModel->save([
            'id' => $id,
            'car' => $this->request->getVar('car'),
            'slug' => $slug,
            'type' => $this->request->getVar('type'),
            'price' => $this->request->getVar('price'),
            'picture' => $this->request->getVar('picture')
        ]);

        session()->setFlashdata('message', 'Data successfully changed.');

        return redirect()->to('/cars');
    }
}
