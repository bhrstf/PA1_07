<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CategoryRoom;
use App\Models\Laboratorium;


class LaboratoriumController extends Controller
{
    public function index(){
        $laboratorium = Laboratorium::all();
        $category = CategoryRoom::all();
        return view('laboratorium', ['laboratorium' => $laboratorium, 'category' => $category]); 
    }
}
