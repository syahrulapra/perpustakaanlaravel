@extends('layouts')

@section('content')
<body class="min-vh-100 d-flex flex-column user-select-none align-items-center">
    <nav class="container-fluid navbar navbar-expand-md navbar-light border">
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#drop">
            <h2>
                <i class="fa-solid fa-bars text-dark"></i>
            </h2>
        </button>
        <div class="collapse navbar-collapse" id="drop">
            <div class="container-fluid">
                <ul class="navbar-nav col-12">
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('dashboard')) ? 'active' : ''}}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('buku')) ? 'active' : ''}}" href="{{ route('buku') }}">Data Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('siswa')) ? 'active' : ''}}" href="{{ route('siswa') }}">Data Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('petugas')) ? 'active' : ''}}" href="{{ route('petugas') }}">Data Petugas</a>
                    </li>    
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('pinjam')) ? 'active' : ''}}" href="{{ route('pinjam') }}">Data Peminjaman</a>
                    </li>    
                    <li class="nav-item dropdown ml-auto">
                        <a href="#" class="nav-link d-flex align-items-center" data-toggle="dropdown" role="button" >
                            {{ Auth::user()->namapetugas }}
                            <div class="m-1"></div>
                            <i class="fa-solid fa-chevron-down" style="font-size: 12px"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right text-right" style="width: 120px">
                            <li class="pr-2">
                                <a type="button" class="text-dark" data-toggle="modal" data-target="#editPetugas">
                                    Edit
                                </a>
                            </li>
                            <hr>
                            <li class="pr-2">
                                <a href="{{ route('logoutaksi') }}" class="text-dark">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                    Log Out
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </ul>
        </div>  
    </nav>
    <main class="container-fluid p-3 px-4">
        @yield('main')
    </main>
    <footer class="container-fluid p-3 text-center border mt-auto">
        <span>
            © 2023 RPL™. All Rights Reserved.
        </span>
    </footer>
    <div class="modal fade" id="editPetugas" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLabel">Form Input Data Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="formbukuedit" id="formbukuedit" action="/petugas/edit/{{ Auth::user()->idpetugas}} " method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label for="idbuku" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ Auth::user()->namapetugas}}">
                            </div>
                        </div>
    
                        <p>
                        <div class="form-group row">
                            <label for="judul" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email}}">
                            </div>
                        </div>
    
                        <p>
                        <div class="form-group row">
                            <label for="pengarang" class="col-sm-4 col-form-label">No.Hp</label>
                            <div class="col-sm-8">
                                <input type="let" class="form-control" id="hp" name="hp" value="{{ Auth::user()->hp}}" pattern="[0-9]{12}">
                            </div>
                        </div>
    
                        <p>
                        <div class="form-group row">
                            <label for="penerbit" class="col-sm-4 col-form-label">Password Baru</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="passwword" name="password">
                            </div>
                        </div>
                        
                        <p>
                        <div class="modal-footer">
                            <a href="/petugas/hapus/{{ Auth::user()->idpetugas }}" class="btn btn-danger col-5" onclick="return confirm('yakin ingin menghapus akun?')"> Hapus Akun</a>
                            <button type="submit" name="bukutambah" class="btn btn-success">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection