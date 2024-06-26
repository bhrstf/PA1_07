<?php

namespace App\Http\Controllers;
use App\Models\CategoryRoom;
use App\Models\Himamera;
use Illuminate\Http\Request;

class HimameraController extends Controller
{
    public function index(){
        $himamera = Himamera::all();
        $category = CategoryRoom::all();
        return view('himamera', ['himamera' => $himamera, 'category' => $category]); 
    }
}
