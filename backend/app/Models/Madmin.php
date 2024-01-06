<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Madmin extends Model
{
    // use HasFactory;

    //buat fungsi untuk ambil data "tb_data"
    function getData()
    {
        //tampilkan data dari "tb_data"
        $query = DB::table('tb_data')
                ->select("id AS id_data","nama","golongan_darah","usia",
                "telpon")
                ->orderBy("id")
                ->get();
        //mengirim hasil variabel "query" ke controller "admin"
        return $query;
    }

    //buat fungsi pencarian data
    function searchData($keyword)
    {
        //tampilkan data dari "tb_data"
        $query = DB::table('tb_data')
                ->select("id AS id_data","nama","golongan_darah","usia",
                "telpon")
                ->where("nama","$keyword")
                ->orWhere(DB::raw("REPLACE(nama,' ','')"),"LIKE",DB::raw("REPLACE('%$keyword%',' ','')"))
                ->orWhere("golongan_darah","$keyword")
                ->orWhere("usia","LIKE","%$keyword%")
                ->orWhere("telpon","$keyword")
                ->orderBy("id")
                ->get();
        //mengirim hasil variabel "query" ke controller "admin"
        return $query;
    }

    function detailData($id)
    {  
            //tampilkan data dari "tb_data"
            $query = DB::table('tb_data')
                    ->select("id","nama","golongan_darah","usia","telpon");
                    //->where(DB::raw("TO_BASE64(MD5(id))"),"$id")
    }

    function checkUpdateData($nama,$id)
   {
    //tampilkan data dari "tb_mahasiswa"
    $query = DB::table('tb_data')
    ->select("id AS id_data","nama","golongan_darah","usia",
    "telpon")
    // ->where(DB::raw("TO_BASE64(MD5(npm))"),"!=","$id")
    ->where("nama","$nama")
    ->get($id);
//mengirim hasil variabel "query" ke controller "mahasiswa"
return $query;
   }
   // fungsi untuk update data
   function updateData($nama,$golongan_darah,$usia,$telpon,$id)
   {
    //ambil data
    //"npm" = nama field
    //"$npm" = nama Parameter
    $result = [
        "nama" => $nama,
        "golongan_darah" => $golongan_darah,
        "usia" => $usia,
        "telpon" => $telpon
        
    ];
    //perintah untuk update
    DB::table("tb_data")
    // ->where(DB::raw("TO_BASE64(MD5(npm))"), "$id")
    ->update($result);
   }
}
