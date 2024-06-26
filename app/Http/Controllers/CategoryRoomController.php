<?php

namespace App\Http\Controllers;

use App\Models\CategoryRoom;
use Illuminate\Http\Request;


class CategoryRoomController extends Controller
{
    public function index(){
        $category = CategoryRoom::all();
        return view('admin.category.index', compact('category'));
    }
}
