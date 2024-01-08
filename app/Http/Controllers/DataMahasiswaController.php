<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\DataMahasiswaModel;

class DataMahasiswaController extends Controller
{
    //method untuk tampil data buku
    public function datamahasiswatampil()
    {
        $datadatamahasiswa = DataMahasiswaModel::orderby('nim', 'ASC')
        ->paginate(5);

        return view('halaman/view_datamahasiswa',['datamahasiswa'=>$datadatamahasiswa]);
    }

    //method untuk tambah data buku
    public function datamahasiswatambah(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required'
        ]);

        DataMahasiswaModel::create([
            'nim' => $request->kode_buku,
            'nama' => $request->judul,
            'tanggal_lahir' => $request->pengarang,
            'tempat_lahir' => $request->kategori
        ]);

        return redirect('/buku');
    }

     //method untuk hapus data buku
     public function bukuhapus($id_nim)
     {
         $datadatamahasiswa=DataMahasiswaModel::find($id_nim);
         $datadatamahasiswa->delete();
 
         return redirect()->back();
     }

     //method untuk edit data buku
    public function bukuedit($id_buku, Request $request)
    {
        $this->validate($request, [
            'nim' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required'
        ]);

        $id_datamahasiswa = DataMahasiswaModel::find($id_nim);
        $id_datamahasiswa ->nim   = $request->nim;
        $id_datamahasiswa ->nama      = $request->nama;
        $id_datamahasiswa ->tanggal_lahir  = $request->tanggal_lahir;
        $id_datamahasiswa ->tempat_lahir   = $request->tempat_lahir;

        $id_datamahasiswa ->save();

        return redirect()->back();
    }
}