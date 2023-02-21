@extends('page.app')
@section('main')

<div class="container-fluid bg-primary p-1 px-3 rounded-top pt-2 d-flex">
    <h3 class="text-white">Data Petugas</h3>

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
                <th>Nama</th>
                <th>Email</th>
                <th>Hp</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
        </thead>

        <tbody> 
            @foreach($datapetugas as $p)
            <tr>
                <td>{{ $p->namapetugas }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->hp }}</td>
                <td>{{ $p->created_at }}</td>
                <td>{{ $p->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex align-items-center">
        <a href="/buku/tambah">
            <button class="btn btn-primary">Tambah Data</button>
        </a>
        <div class="ml-auto mt-3">
            {{ $datapetugas->links() }}
        </div>
    </div>
</div>
@endsection