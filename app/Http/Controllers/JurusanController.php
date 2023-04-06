<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function getjurusan()
    {
        $dt_jurusan=jurusan::get();
        return response()->json($dt_jurusan);
        
    }
    public function getid($id)
    {
        $dt_jurusan=jurusan::where('id_jurusan','=',$id)->get();
        return response()->json($dt_jurusan);
         
    }
    public function createjurusan(Request $req){
        $validate = Validator::make($req->all(),[]);
        if($validate->fails()){
            return response->json($validate->errors()->toJson());
        }
        $create = Jurusan::create([
            'nama_jurusan'->$req->nama_jurusan,
        ]);
        if($create){
            return response()->json(['status'=>true, 'message'=>'Sukses Menambah Data Jurusan.']);
        }else{
            return response()->json(['status'=>false, 'message'=>'Gagal Menambah Data Jurusan.']); 
        } 
        
    }    
    public function updatejurusan(Request $req, $id){
            $validate = Validator::make($req->all(),[
                'nama_jurusan'=>'required'
            ]);
            if($validate->fails()){
                return response()->json($validate->errors()->toJson());
            }
            $update = jurusan::where('id_jurusan',$id)->update([
                'nama_jurusan'=>$req->get('nama_jurusan')
            ]);
            if($update){
                return response()->json(['status'=>true, 'messege'=>'Berhasil mengubah daftar jurusan']);
            }else{
                return response()->json(['status'=>false, 'message'=>'Gagal Mengubah Data Jurusan.']);
            }
        }
        public function deletejurusan($id){
            $delete = jurusan::where('id_jurusan',$id)->delete();
            if($delete){
                return response()->json(['status'=>true, 'messege'=>'Sukses Menghapus daftar jurusan']);
            }else{
                return response()->json(['status'=>false, 'message'=>'Gagal Menghapus Data Jurusan.']);
            }
        }
    }
