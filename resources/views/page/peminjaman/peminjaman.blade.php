@extends('page.app')

@section('main')
<div class="container-fluid bg-primary p-1 px-3 rounded-top pt-2 d-flex">
    <h3 class="text-white">Data Peminjaman</h3>

    <form action="cari" method="GET" class="form-control ml-auto border-0" style="width: 245px">
        <input class="border-0" style="outline: none;" type="text" name="cari" placeholder="Cari Nama" value="{{ old('cari') }}">
        <button class="border-0 bg-white">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </form>
</div>
<div class="container-fluid border p-3 rounded-bottom">
    <table class="table table-bordered table-responsive-xl">
        <thead>
            <tr>
                <th>Nama Petugas</th>
                <th>Nama Siswa</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody> 
            @foreach($datapinjam as $p)
            <tr>
                <td>{{ $p->petugas->namapetugas }}</td>
                <td>{{ $p->siswa->namasiswa }}</td>
                <td>{{ $p->buku->judul }}</td>
                <td>{{ $p->created_at }}</td>
                <td class="d-flex">
                    <a href="/pinjam/hapus/{{ $p->idsiswa }}" class="btn btn-danger col-5"> Hapus </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex align-items-center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
            Input Data Buku
        </button>
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambahLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahLabel">Form Input Data Buku</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/pinjam/tambah" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="form-group row">
                                    <label for="idpetugas" class="col-sm-4 col-form-label">Nama Petugas</label>
                                    <div class="col-sm-8">
                                        <select type="text" class="form-control" id="idpetugas" name="idpetugas" placeholder="Pilih Nama Petugas">
                                            <option>--Pilih Data Petugas--</option>
                                            @foreach($datapetugas as $pt)
                                                <option value="{{ $pt->idpetugas }}">{{ $pt->namapetugas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <p>
                                <div class="form-group row">
                                    <label for="idsiswa" class="col-sm-4 col-form-label">Nama Siswa</label>
                                    <div class="col-sm-8">
                                        <select type="text" class="form-control" id="idsiswa" name="idsiswa" placeholder="Pilih Nama Siswa">
                                            <option>--Pilih Data Siswa--</option>
                                            @foreach($datasiswa as $s)
                                                <option value="{{ $s->idsiswa }}">{{ $s->namasiswa }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <p>
                                <div class="form-group row">
                                    <label for="idbuku" class="col-sm-4 col-form-label">Judul Buku</label>
                                    <div class="col-sm-8">
                                        <select type="text" class="form-control" id="idbuku" name="idbuku" placeholder="Pilih Judul Buku">
                                            <option>--Pilih Data Buku--</option>
                                            @foreach($databuku as $bk)
                                                <option value="{{ $bk->idbuku }}">{{ $bk->judul }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close" class="btn btn-success">Tutup</button>
                                    <button type="submit" name="bukutambah" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection