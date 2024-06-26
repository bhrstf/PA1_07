<?php

namespace App\Http\Controllers;

use App\Models\KerjaSama;
use Illuminate\Http\Request;


class KerjaSamaController extends Controller
{
    public function index(){
        $kerjasama = KerjaSama::all();
        return view('beranda', ['kerjasama' => $kerjasama]);
    }
}
