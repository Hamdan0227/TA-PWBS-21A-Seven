<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Madmin extends Model
{
    use HasFactory;
}

function checkUpdateData($nama, $id)

    {
      //tampilkan data dari "tb_mahasiswa"
      $query = DB::table('tb_data')
      ->select("id",
      "nama ",
      "golongan darah",
      "usia",
      "telpon",
      "create_at")
      ->where("nama","$nama")
        ->get();
    }
