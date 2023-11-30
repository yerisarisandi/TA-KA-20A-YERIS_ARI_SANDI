<?php

namespace App\Http\Controllers;

use App\Models\Mlogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class Login extends Controller
{
    // buat variabel
    protected $model;

    function __construct()
    {
        // inisialisasi model "Mlogin"
        $this->model = new Mlogin();
    }

    function index()
    {
        // panggil view "login"
        return view("login");
    }

    // buat fungsi untuk ambil data 
    function getLogin(Request $req)
    {
        // collecting data input (username dan password)
        // "username" = nama variabel array
        // "$req->username" = nama object yang dikirim dari "fetch"
        $data = [

            "username" => $req->username,
            "password" => $req->password,
            "ingat" => $req->ingat,
        ];

        // cek data/record dari "tb_user"
        // jika data ditemukan
        if(count($this->model->getData($data["username"],$data["password"])) == 1)
        {
            //ambil data username
            $query = $this->model->getData($data["username"],$data["password"]);
            $nama = $query->last()->nama;
            $req->session()->put("username_backend",$nama);

            //jika ingat = 1
            if($data["ingat"] == 1)
            {
            //buat cookie
            Cookie::queue("cookie_backend",$nama,120);
            }

            $output = 1;
        }
        // jika data tidak ditemukan
        else
        {
            $output = 0;
        }
        // kirim nilai variabel "$output" ke "then(result)" pada fetch
        echo json_encode(["output" => $output]);
    }
}
