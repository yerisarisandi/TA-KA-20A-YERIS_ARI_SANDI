<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stok;

class StokController extends Controller
{
    //

    public function index(){
        $stoks = Stok::all();

        return view('dashboard',compact('stoks'));
    }
}
