<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function index()
    {
        $databuku = buku::orderBy('kodebuku', 'ASC')->paginate(10);
        
        return view('page/buku/buku',['databuku' => $databuku]);
    }

    public function cari(Request $req)
    {
        $cari = $req->keyword;
        
        $buku = DB::table('tbl_buku')
        ->where('judul','like',"%".$cari."%")
        ->paginate(10);
        
        return view('page/buku/buku',['databuku' => $buku]);
    }

    public function tambah(Request $req)
    {
        buku::create([
            'kodebuku'  => $req->kodebuku,
            'judul'     => $req->judul,
            'pengarang' => $req->pengarang,
            'penerbit'  => $req->penerbit,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back();
    }

    public function edit($id, Request $req)
    { 
        $Buku = buku::find($id);
        $Buku->kodebuku = $req-> kodebuku;
        $Buku->judul = $req-> judul;
        $Buku->pengarang = $req-> pengarang;
        $Buku->penerbit = $req-> penerbit;
        $Buku->updated_at = Carbon::now();
        
        $Buku->save();

        return redirect()->back();
    }

    public function hapus($id)
    {
        $Peminjaman = peminjaman::where('idbuku', $id);
        $Peminjaman->delete();
        if(peminjaman::where('idpinjam', $id)->count() == 0){
            $Buku=buku::find($id);
            $Buku->delete();
        }

        return redirect('/logoutaksi');
    }

}