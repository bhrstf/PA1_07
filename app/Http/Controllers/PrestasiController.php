<?php

namespace App\Http\Controllers;

use App\Models\CategoryRoom;
use App\Models\Prestasi;
use Illuminate\Http\Request;


class PrestasiController extends Controller
{
    public function index(){
        $prestasi = Prestasi::all();
        $category = CategoryRoom::all();
        return view('prestasi', ['prestasi' => $prestasi],['category' => $category]);
    }
}
