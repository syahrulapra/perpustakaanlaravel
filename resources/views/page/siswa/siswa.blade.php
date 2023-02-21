@extends('page.app')

@section('main')
<div class="container-fluid bg-primary p-1 px-3 rounded-top pt-2 d-flex">
    <h3 class="text-white">Data Siswa</h3>

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
                <th>Nis</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Hp</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($datasiswa as $s)
            <tr>
                <td>{{ $s->nis }}</td>
                <td>{{ $s->namasiswa }}</td>
                <td>{{ $s->kelas }}</td>
                <td>{{ $s->hp }}</td>
                <td>{{ $s->created_at }}</td>
                <td>{{ $s->updated_at }}</td>
                <td class="d-flex">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-{{ $s->idsiswa }}">
                        Edit
                    </button>
                    <div class="m-1"></div>
                    <a href="/siswa/hapus/{{ $s->idsiswa }}" class="btn btn-danger col-5"> Hapus </a>
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
                        <form name="formsiswatambah" id="formsiswatambah" action="/siswa/tambah " method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="idsiswa" class="col-sm-4 col-form-label">NIS</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukan NIS">
                                </div>
                            </div>
        
                            <p>
                            <div class="form-group row">
                                <label for="judul" class="col-sm-4 col-form-label">Nama Siswa</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Siswa">
                                </div>
                            </div>
        
                            <p>
                            <div class="form-group row">
                                <label for="pengarang" class="col-sm-4 col-form-label">Kelas</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukan Kelas">
                                </div>
                            </div>
        
                            <p>
                            <div class="form-group row">
                                <label for="penerbit" class="col-sm-4 col-form-label">HP</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="hp" name="hp" placeholder="Masukan No.HP">
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
        @foreach($datasiswa as $s)
        <div class="modal fade" id="edit-{{ $s->idsiswa }}" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLabel">Form Input Data Buku</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="formsiswaedit" id="formsiswaedit" action="/siswa/edit/{{ $s->idsiswa}} " method="post" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group row">
                                <label for="nis" class="col-sm-4 col-form-label">NIS</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nis" name="nis" value="{{ $s->nis}}">
                                </div>
                            </div>
        
                            <p>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-4 col-form-label">Nama Siswa</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $s->namasiswa}}">
                                </div>
                            </div>
        
                            <p>
                            <div class="form-group row">
                                <label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $s->kelas}}">
                                </div>
                            </div>
        
                            <p>
                            <div class="form-group row">
                                <label for="penerbit" class="col-sm-4 col-form-label">No.HP</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="hp" name="hp" value="{{ $s->hp}}">
                                </div>
                            </div>
        
                            <p>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close" class="btn btn-success">Tutup</button>
                                <button type="submit" name="bukutambah" class="btn btn-primary">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="ml-auto mt-3">
            {{ $datasiswa->links() }}
        </div>
    </div>
</div>
@endsection