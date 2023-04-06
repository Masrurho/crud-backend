<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facedes\Validator;
use Illuminate\Http\Request;
use Illuminate\app\Buku;

class BukuController extends Controller
{
    public function getbuku()
    {
        $dt_buku=buku::get();
        return response()->json($dt_mahasiswa);
    }
    public function getid($id)
    {
        $dt_buku=buku::where('id_buku', '=',$id)->get();
        return response()->json($dt_mahasiswa);
    }
    public function createbuku(Request $req){
        $validate = Validator::make($req->all(),[
            'judul_buku'=>'required',
            'jenis_buku'=>'required',
            'pengarang'=>'required'
        ]);
        if($validate->fails()){
            return response()->json($validate->errors()-toJson());
        }
        $create = Buku::create([
            'judul_buku'=>$req->judul_buku,
            'jenis_buku'=>$req->jenis_buku,
            'pengarang'=>$req->pengarang,
        ]);
        if($create){
            return response()->json(['status'=>true, 'messege'=>'Sukses Menambah Daftar Buku']);
        }else{
            return response()->json(['status'=>false, 'messege'=>'Gagal Menambah Daftar Buku']);
        }
    }

    public function updatebuku(Request $req, $id){
        $validate = Validator::make($req->all(),[
            'judul_buku'=>'required',
            'jenis_buku'=>'required',
            'pengarang'=>'required'  
        ]);
        if($validate->fails()){
            return response()->json($validate->errors()-toJson());
        }
        $update = buku::where('id_buku',$id)->update([
            'judul_buku'=>$req->get('judul_buku'),
            'jenis_buku'=>$req->get('jenis_buku'),
            'pengarang'=>$req->get('pengarang') 
        ]);
        if($update){
            return response()->json(['status'=>true, 'messege'=>'Berhasil Mengubah Daftar Buku']);
        }else{
            return response()->json(['status'=>false, 'messege'=>'Gagal Mengubah Daftar Buku']);
        }
    }
    public function deletebuku($id){
        $delete = buku::where('id_buku',$id)->delete();
        if($delete){
            return response()->json(['status'=>true, 'messege'=>'Sukses Menghapus Data Buku']);
        }else{
            return response()->json(['status'=>false, 'messege'=>'Gagal Menghapus Data Buku']);
        }
    }
}