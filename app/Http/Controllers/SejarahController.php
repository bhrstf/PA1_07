<?php

namespace App\Http\Controllers;

use App\Models\CategoryRoom;
use App\Models\Meta;
use Illuminate\Http\Request;


class SejarahController extends Controller
{
    public function index(){
        $sejarah = Meta::where('meta_key', 'sejarah')->first();
        $category = CategoryRoom::all();
        return view('sejarah', ['sejarah' => $sejarah],  ['category' => $category]);
    }
}
