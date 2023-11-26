<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin extends Controller
{
     //buuat fungsi untuk pencarian data
    function searchController($keyword)
    { 
          //isi nilai variabel "relsult dari fungsi "searchData"dari model "Madmin" sesuai dengan isi parameter "keyword"
       $result = $this->model->searchData
       ($keyword);

       //kembalikan nilai variabel "result" kedalam object "admin"
       return response(["Admin" =>$result],http_response_code());
    }
}
