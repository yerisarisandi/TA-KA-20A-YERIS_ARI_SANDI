<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mlogin extends Model
{
    // use HasFactory;
    // buat fungsi untuk ambil ambil data login
    function getdata($username, $password)
    {
        // cek data username dan password
        $query = DB::table('tb_user')
        ->select("username","password","nama")
        ->whereRaw("username = '$username'")
        ->get();
        return $query;
    }
}
