<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Madmin extends Model
{
    //use HasFactory;
    function detailData($id)
    {
        //tampilkan data dari "tb_data"
        $query = DB::table('tb_data')
                ->select("id","nama","golongan_darah","usia","telpon","create_at")
                //->where(DB::raw("TO_BASE64(MD5(id))"),"$id")

                ->get();
        //mengirim hasil variabel "query" ke controller "admin"
        return $query;
    }

}
