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

    
}
