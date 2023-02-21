<?php

namespace App\Http\Controllers;

use App\Models\peminjaman;
use App\Models\siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index()
    {
        $datasiswa = siswa::orderBy('idsiswa', 'ASC')->paginate(10);
        
        return view('page/siswa/siswa',['datasiswa' => $datasiswa]);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        
        $siswa = DB::table('siswa')
        ->where('namasiswa','like',"%".$cari."%")
        ->paginate(10);
        
        return view('page/siswa/siswa',['datasiswa' => $siswa]);
    }

    public function tambah(Request $req)
    {
        siswa::create([
            'nis'           => $req->nis,
            'namasiswa'     => $req->nama,
            'kelas'         => $req->kelas,
            'hp'            => $req->hp,
            'created_at'    => Carbon::now()
        ]);

        return redirect()->back();
    }

    public function edit($id, Request $req)
    { 
        $Siswa = siswa::find($id);
        $Siswa->nis = $req-> nis;
        $Siswa->namasiswa = $req-> nama;
        $Siswa->kelas = $req-> kelas;
        $Siswa->hp = $req-> hp;
        $Siswa->updated_at = Carbon::now();
        
        $Siswa->save();

        return redirect()->back();
    }

    public function hapus($id)
    {
        $Peminjaman = peminjaman::where('idsiswa', $id);
        $Peminjaman->delete();
        if(peminjaman::where('idpinjam', $id)->count() == 0){
            $Siswa=siswa::find($id);
            $Siswa->delete();
        }

        return redirect()->back();
    }
}