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
        //inisialisasi variabel "model" dari model "Madmin"
        $this->model = new Madmin();
    }

    function getController()
    {
        //isi nilai dari variabel "result" dari fungsi "getData" dari model "Madmin"
        $result = $this->model->getData();

        //Kembalikan nilai variabel "result" ke dalam object "admin"
        return response(["admin"=> $result], http_response_code());
    }

    //Digunakan Untuk pencarian data
    function searchController($keyword)
    {
         //isi nilai dari variabel "result" dari fungsi "searchData" dari model "Mmahasiswa" sesuai dengan isi parameter
         $result = $this->model->searchData($keyword);

         //Kembalikan nilai variabel "result" ke dalam object "mahasiswa"
        return response(["admin"=> $result], http_response_code());
    }

   //buat fungsi detail data
   function detailController($id)
   {
                
                $result = $this->model->detailData($id);

                //Kembalikan nilai variabel "result" ke dalam object "mahasiswa"
               return response(["admin"=> $result], http_response_code());
       
   }
}
