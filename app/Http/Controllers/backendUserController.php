<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class backendUserController extends Controller
{
    public function tampilUser(){
        $user = DB::table('users')->get();
        return view('backendDaftarUser',['user'=>$user]);
    }

    public function detailUser($id){
        $user = DB::table('users')->where('id',$id)->get();
        return view('backendDetailUser',['user'=>$user]);
    }
    public function hapusUser($id){
        DB::table('users')->where('id',$id)->delete();
        return redirect('/backendUser');
    }
    public function registerUser(){
        return view('backendTambahUser');
    }

    public function updateUser(Request $request)
    {
	DB::table('users')->where('id',$request->id)->update([
		'name' => $request->nama,
		'nik' => $request->nik,
		'tempat_lahir' => $request->tempatLahir,
        'tanggal_lahir' => $request->tanggalLahir,
        'jenis_kelamin' => $request->jenisKelamin,
        'alamat' => $request->alamat,
        'rt' => $request->rt,
        'rw' => $request->rw,
        'kecamatan' => $request->kecamatan,
        'agama' => $request->agama,
        'pekerjaan' => $request->pekerjaan,
        'kewarganegaraan' => "WNI",
        'status_perkawinan' => $request->statusPerkawinan,
        'golongan_darah' => $request->golonganDarah,
        'foto' => $request->foto,
        'email' => $request->email,
        'notelp' => $request->notelp
	]);
	return redirect('/backendUser');
    }

    public function resetPassword(Request $request)
    {
	DB::table('users')->where('id',$request->id)->update([
		'password' => '$2y$10$zdSRnFXGP4mXf7LxeVe55u896fIXUcq38XkauJHSAXdtEnX39vsvq'	
	]);
	return redirect('/backendUser');
    }

    public function registerUserPost(Request $request ){
        DB::table('users')->insert([
            'name' => $request->nama,
	    	'nik' => $request->nik,
	    	'tempat_lahir' => $request->tempatLahir,
            'tanggal_lahir' => $request->tanggalLahir,
            'jenis_kelamin' => $request->jenisKelamin,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kecamatan' => $request->kecamatan,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'kewarganegaraan' => "WNI",
            'status_perkawinan' => $request->statusPerkawinan,
            'golongan_darah' => $request->golonganDarah,
            'foto' => $request->foto,
            'email' => $request->email,
            'notelp' => $request->notelp,
            'password' => '$2y$10$zdSRnFXGP4mXf7LxeVe55u896fIXUcq38XkauJHSAXdtEnX39vsvq'
            
	    ]);
	    return redirect('/backendUser');
    }
}
