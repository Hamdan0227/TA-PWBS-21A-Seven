<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Madmin extends Model
{
    use HasFactory;
}

function searchData($keyword)
    {
         //tampilkan data dari "tb_donor"
         $query = DB::table('tb_donor')
         ->select("id",
         "nama",
         "golongan darah",
         "usia",
         "telpon",
         "create_at")
         ->where("nama","$keyword")
      //->orwhere("nama","LIKE","%$keyword%")
      // ->orWhere("nama","LIKE","%$keyword%")
        // ->orWhereRaw("REPLACE(nama,' ','') LIKE REPLACE ('%$keyword%',' ','')")
         ->orWhere(DB::raw("REPLACE(nama,' ','')"),"LIKE",DB::raw("REPLACE('%$keyword%',' ','')"))
         ->orwhere("create_at","$keyword")
         ->orwhere("telpon","LIKE","%$keyword%")
         ->orderBY("id")
         ->get();


      //mengirim hasil variabel "query" ke controller "Admin"
         return $query;

         //buat fungsi untuk simpan data
    function saveData($npm,$nama,$telepon,$jurusan)
    {
      //ambil data
      // "npm" = nama filed 
      // "$npm" = nama parameter
      $result = [
        "nama" =>$nama,
        "golongan darah" => $golongan_darah,
        "usia"=> $usia,
        "telpon" => $telepon

      ];
      // perintah simpan data
      DB::table('tb_data')
         ->insert($result);
    }

    }
