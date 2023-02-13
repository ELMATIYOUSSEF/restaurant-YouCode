<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plat;

class HomeController extends Controller
{
    public function home(){
        // $plats = Plat::all();
        $plats = Plat::orderBy('id','DESC')->paginate(2);

        return view('home',['plats'=>$plats]);
    }
}
