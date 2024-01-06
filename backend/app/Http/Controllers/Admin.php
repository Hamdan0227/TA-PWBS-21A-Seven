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
         //isi nilai dari variabel "result" dari fungsi "searchData" dari model "Madmin" sesuai dengan isi parameter
         $result = $this->model->searchData($keyword);

         //Kembalikan nilai variabel "result" ke dalam object "admin"
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

    //buat fungsi untuk ubah data
    function updateController(Request $req,$id)
    {
       //ambil data input
       $data = [
           "nama" => $req->nama,
           "golongan_darah" => $req->golongan_darah,
           "usia" => $req->usia,
           "telpon" => $req->telpon
       ];
   
       //lakukan pengecekan apakah data "npm" yang diisi sudah pernah tersimpan/belum di database
      
       //jika data tidak tersedia
       if(count($this->model->checkUpdateData($data["nama"],$id))==0)
       {
           //Lakukan perubahan data
           //panggil model checkupdatedata dari model "Mmahasiswa"
           $this->model->updateData($data["nama"],$data["golongan_darah"],$data["usia"],$data["telpon"], $id);

           $status = 1;
           $message = "Data Berhasil DiUpdate!";
       }
       //jika data  tersedia
       else
       {
           $status = 0;
           $message = "Data Gagal DiUpdate !";
       }
      
       //Kembalikan Nilai variabel "result" ke dalam object "Mahasiswa"
      return response(["status" => $status,"message"=>$message],http_response_code());
    }
}
