<?php

namespace App\Http\Controllers;

use App\Models\Madmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Admin extends Controller
{
    //buat fungsi detail data
    function detailController($id)
    {
                 //isi nilai dari variabel "result" dari fungsi "detailData" dari model "Madmin" sesuai dengan isi parameter "id"
                 $result = $this->model->detailData($id);

                 //Kembalikan nilai variabel "result" ke dalam object "Admin"
                return response(["Admin"=> $result], http_response_code());
        
    }
}
