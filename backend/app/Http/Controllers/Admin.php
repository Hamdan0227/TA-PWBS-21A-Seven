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

       function saveController(Request $req)
    {
      //ambil data input
      //"npm" = variabel array yang menampung nilai dari $req
      //"$req ->npm" = variabel yang di kirim dari front end
    $data = [
      "nama"=> $req->nama,
      "golongan darah"=> $req->golongan_darah,
      "usia"=> $req->usia,
      "telpon"=> $req->telepon,
     // "id" => base64_encode(md5($req->npm))
      //  $data =array();
    ];
    $id = base64_encode(md5($req->npm));
   
    //jika data tersedia
    if(count($this->model->detailData($id))==1)
    {
        $status = 0;
        $message = "Data Gagal Disimpan ! ( NPM Sudah Ada !! )";
    }
    // jika data tersedia
    else
    {
        //lakukan penyimpanan data
           // lakukan penghapusan data (panggil fungsi "deleteData"dari mAdmin)
           $this->model->saveData($data["nama"],$data["golongan darah"],$data["usia"],$data["telpon"]);

        //buat status dan pesan
        $status = 1;
        $message = "Data berhasil di simpan!";
    }
    return response(["status" =>$status,"message" =>$message],http_response_code());

  }

    }
}
