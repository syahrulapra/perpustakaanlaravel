<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\peminjaman;
use App\Models\buku;
use App\Models\siswa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PinjamController extends Controller
{
    public function index()
    {
        $datapinjam = peminjaman::all();    

        $datapetugas    = User::all();
        $datasiswa      = siswa::all();
        $databuku       = buku::all();
        
        return view('page/peminjaman/peminjaman',['datapinjam'=>$datapinjam,'datapetugas'=>$datapetugas,'datasiswa'=>$datasiswa,'databuku'=>$databuku]);
    }

    public function tambah(Request $request)
    {
        peminjaman::create([
            'idpetugas' => $request->idpetugas,
            'idsiswa' => $request->idsiswa,
            'idbuku' => $request->idbuku,
            'created_at' => Carbon::now()
        ]);
        return redirect('/pinjam');
    }

    public function hapus($id)
    {
        $datapinjam=siswa::find($id);
        $datapinjam->delete();

        return redirect()->back();
    }

    public function update(Request $req)
    {
        DB::table('tbl_buku')->where('idbuku',$req->id)->update([
            'updated_at' => Carbon::now()
        ]);

        return redirect('/buku');
    }
}
