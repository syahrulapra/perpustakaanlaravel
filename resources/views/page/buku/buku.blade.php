@extends('page.app')
@section('main')

<div class="container-fluid bg-primary p-1 px-3 rounded-top pt-2 d-flex">
    <h3 class="text-white">Data Buku</h3>

    <form action="cari" method="GET" class="form-control ml-auto border-0" style="width: 245px">
        <input class="border-0" style="outline: none;" type="text" name="cari" placeholder="Cari judul" value="{{ old('cari') }}">
        <button class="border-0 bg-white">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </form>
</div>
<div class="container-fluid border p-3 rounded-bottom">
    <table class="table table-bordered table-responsive-xl">
        <thead>
            <tr>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($databuku as $b)
            <tr>
                <td>{{ $b->kodebuku }}</td>
                <td>{{ $b->judul }}</td>
                <td>{{ $b->pengarang }}</td>
                <td>{{ $b->penerbit }}</td>
                <td>{{ $b->created_at }}</td>
                <td>{{ $b->updated_at }}</td>
                <td class="d-flex">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-{{ $b->idbuku }}">
                        Edit
                    </button>
                    <div class="m-1"></div>
                    <a href="/buku/hapus/{{ $b->idbuku }}" class="btn btn-danger"> Hapus </a>
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
                        <form name="formbukutambah" id="formbukutambah" action="/buku/tambah " method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="idbuku" class="col-sm-4 col-form-label">Kode Buku</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="kodebuku" name="kodebuku" placeholder="Masukan Kode Buku">
                                </div>
                            </div>
        
                            <p>
                            <div class="form-group row">
                                <label for="judul" class="col-sm-4 col-form-label">Judul Buku</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul Buku">
                                </div>
                            </div>
        
                            <p>
                            <div class="form-group row">
                                <label for="pengarang" class="col-sm-4 col-form-label">Nama Pengarang</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Masukan Nama Pengarang">
                                </div>
                            </div>
        
                            <p>
                            <div class="form-group row">
                                <label for="penerbit" class="col-sm-4 col-form-label">Penerbit</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukan Nama Penerbit">
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
        @foreach($databuku as $b)
        <div class="modal fade" id="edit-{{ $b->idbuku }}" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLabel">Form Input Data Buku</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="formbukuedit" id="formbukuedit" action="/buku/edit/{{ $b->idbuku}} " method="post" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group row">
                                <label for="idbuku" class="col-sm-4 col-form-label">Kode Buku</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="kodebuku" name="kodebuku" value="{{ $b->kodebuku}}">
                                </div>
                            </div>
        
                            <p>
                            <div class="form-group row">
                                <label for="judul" class="col-sm-4 col-form-label">Judul Buku</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $b->judul}}">
                                </div>
                            </div>
        
                            <p>
                            <div class="form-group row">
                                <label for="pengarang" class="col-sm-4 col-form-label">Nama Pengarang</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="pengarang" name="pengarang" value="{{ $b->pengarang}}">
                                </div>
                            </div>
        
                            <p>
                            <div class="form-group row">
                                <label for="penerbit" class="col-sm-4 col-form-label">Penerbit</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $b->penerbit}}">
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
            {{ $databuku->links() }}
        </div>
    </div>
</div>
@endsection