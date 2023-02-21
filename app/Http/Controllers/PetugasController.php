<?php

namespace App\Http\Controllers;

use App\Models\peminjaman;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        $datapetugas = User::orderBy('idpetugas', 'ASC')->paginate(10);
        
        return view('page/petugas/petugas',['datapetugas' => $datapetugas]);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        
        $petugas = DB::table('tbl_petugas')
        ->where('namapetugas','like',"%".$cari."%")
        ->paginate(10);
        
        return view('page.petugas.petugas',['datapetugas' => $petugas]);
    }

    public function tambah(Request $req)
    {
        User::create([
            'namapetugas'   => $req->nama,
            'email'         => $req->email,
            'hp'            => $req->hp,
            'password'      => Hash::make($req->password),
            'created_at'    => Carbon::now()
        ]);

        return redirect('/');
    }

    public function edit($id, Request $req){ 
        $Petugas = User::find($id);
        $Petugas->namapetugas = $req-> nama;
        $Petugas->email = $req-> email;
        $Petugas->hp = $req-> hp;
        
        if ($req->filled('password')){
            $Petugas->password = Hash::make($req->password);

            $Petugas->save();
            return redirect('/logoutaksi');
        } else {
            $Petugas->save();
            return redirect()->back();
        }
    }

    public function hapus($id)
    {
        $Peminjaman = peminjaman::where('idpetugas', $id);
        $Peminjaman->delete();
        if(peminjaman::where('idpinjam', $id)->count() == 0){
            $Petugas=User::find($id);
            $Petugas->delete();
        }

        return redirect('/logoutaksi');
    }
}
