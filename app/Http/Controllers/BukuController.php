<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model BukuModel
use App\Models\BukuModel;

class BukuController extends Controller
{
    //method untuk tampil data buku
    public function bukutampil()
    {
        $databuku = BukuModel::orderby('kode_buku', 'ASC')
        ->paginate(5);

        return view('halaman/view_buku',['buku'=>$databuku]);
    }

   
}