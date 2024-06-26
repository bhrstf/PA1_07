<?php

namespace App\Http\Controllers;

use App\Models\CategoryRoom;
use App\Models\MrClub;
use Illuminate\Http\Request;


class MrClubController extends Controller
{
    public function index(){
        $mrclub = MrClub::all();
        $category = CategoryRoom::all();
        return view('mrclub', ['mrclub' => $mrclub], ['category' => $category]);
    }
}
