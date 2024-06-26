<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\CategoryRoom;
use App\Models\GaleriRuang;
use App\Models\KerjaSama;
use App\Models\Meta;
use App\Models\Testimoni;
use Illuminate\Http\Request;


class BeritaController extends Controller
{
    public function index(){
        $berita = Berita::all();
        $testimoni = Testimoni::all();
        $category = CategoryRoom::all();
        $kerjasama = KerjaSama::all();
        $youtube = Meta::where('meta_key', 'youtube')->first();
        $poster = Meta::where('meta_key', 'poster')->first();
        return view('beranda', compact('berita', 'testimoni', 'category', 'kerjasama', 'youtube','poster'));
    }

    public function fasilitas(Request $request){
        $kategoriId = $request->input('category');
        $galery = GaleriRuang::query();

        if ($kategoriId) {
            $galery->where('room_id', $kategoriId);
        }

        $galery = $galery->latest()->get();
        $category = CategoryRoom::all();

        return view('ruang', compact('galery', 'category'));

    }
    
    public function show($id){
        $berita = Berita::findOrFail($id);
        $relatedBerita = Berita::where('id', '!=', $id)->latest()->take(5)->get();
        $testimoni = Testimoni::all();
        $category = CategoryRoom::all();
        $kerjasama = KerjaSama::all();
        return view('detail_berita', compact('berita', 'relatedBerita', 'testimoni', 'category', 'kerjasama'));
    }
    
}
