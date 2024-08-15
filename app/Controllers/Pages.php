<?php

namespace App\Controllers;

use function PHPSTORM_META\map;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Regis Syawaludin Rifaldi'
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. Banjaran no. 29',
                    'kota' => 'Bandung'
                ],
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. Soreang no. 129',
                    'kota' => 'Bandung'
                ],
            ]
        ];
        return view('pages/contact', $data);
    }
}
