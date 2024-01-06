<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Madmin;
use Illuminate\Support\Facedes\Mail;


class Admin extends Controller
{
    //buat variabel
    protected $model;

    //buat fungsi global
    function __construct()
    {
        //inisialisasi variabel "model" dari model "Mmahasiswa"
        $this->model = new Madmin();
    }

    function getController()
    {
        //isi nilai dari variabel "result" dari fungsi "getData" dari model "Mmahasiswa"
        $result = $this->model->getData();

        //Kembalikan nilai variabel "result" ke dalam object "mahasiswa"
        return response(["admin"=> $result], http_response_code());
    }

    //buat fungsi detail data
    function detailController($id)
    {
                 //isi nilai dari variabel "result" dari fungsi "detailData" dari model "Madmin" sesuai dengan isi parameter "id"
                 $result = $this->model->detailData($id);

                 //Kembalikan nilai variabel "result" ke dalam object "Admin"
                return response(["admin"=> $result], http_response_code());
        
    }
}
