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
                ->select("id","nama","golongan_darah","usia",
                "telpon")
                ->orderBy("id")
                ->get();
        //mengirim hasil variabel "query" ke controller "admin"
        return $query;
    }

}
