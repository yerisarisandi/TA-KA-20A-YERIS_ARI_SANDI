<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class Dashboard extends Controller
{

    function __construct()
    {
        //baca session dan cookie secara global
       $this->middleware(function($req,$next){
        if($req->session()->has('username_loginapp') || Cookie::has("cookie_loginapp")){
            return $next($req);
        }
        else
        {
            return redirect("/login");
        }
       });
    }

    function index(Request $req)
    {
        // buat session
        // jika session ada dan berhasil
        // jika cookie ada
        // if($req->session()->has('username_loginapp') || Cookie::has("cookie_loginapp")){
            //ambil nilai session "username_loginapp"
            $data = [
                "isi_session" => $req->session()->get('username_loginapp')
            ];
           return view("dashboard",$data);
        // }
        // jika session tidak ada / tidak login
        // else
        // {
        //     return redirect("/login");
        // }
        $display = '<img src="https://teknokrat.ac.id/wp-content/uploads/2023/11/2-1.jpg">';

        echo "<br>";

        echo $display;
        
        echo "<br>";

        echo strip_tags ($display);
    }
    
    function getView(Request $req)
    {
        echo "Ini halaman dashboard(view)";
    }
    
}
