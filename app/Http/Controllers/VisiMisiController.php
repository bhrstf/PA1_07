<?php

namespace App\Http\Controllers;

use App\Models\CategoryRoom;
use App\Models\Meta;
use Illuminate\Http\Request;


class VisiMisiController extends Controller
{
    public function index(){
        $visimisi = Meta::where('meta_key', 'visi-misi')->first();
        $category = CategoryRoom::all();
        return view('visimisi', ['visimisi' => $visimisi],  ['category' => $category]);
    }
}
