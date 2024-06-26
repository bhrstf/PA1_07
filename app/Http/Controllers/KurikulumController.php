<?php

namespace App\Http\Controllers;
use App\Models\Kurikulum;
use App\Models\CategoryRoom;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function index(){
        $kurikulum = Kurikulum::all();
        $category = CategoryRoom::all();
        return view('kurikulum', ['kurikulum' => $kurikulum], ['category' => $category]);
    }
}
