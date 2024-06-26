<?php

namespace App\Http\Controllers;

use App\Models\CategoryRoom;
use App\Models\StrukturDosen;
use Illuminate\Http\Request;


class StrukturDosenController extends Controller
{
    public function index(){
        $strukturdosen = StrukturDosen::all();
        $category = CategoryRoom::all();
        return view('strukturdosen', ['strukturdosen' => $strukturdosen, 'category' => $category]); 
    }
}
