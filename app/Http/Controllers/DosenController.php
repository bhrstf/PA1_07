<?php

namespace App\Http\Controllers;

use App\Models\CategoryRoom;
use App\Models\Dosen;
use App\Models\Staf;

use Illuminate\Http\Request;


class DosenController extends Controller
{
    public function index(){
        $dosen = Dosen::all();
        $staf = Staf::all();
        $category = CategoryRoom::all();
        return view('dosen', compact('dosen', 'category', 'staf'));    }
}
