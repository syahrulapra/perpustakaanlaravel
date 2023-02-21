@extends('layouts')

@section('content')
<body class="vh-100 body d-flex align-items-center justify-content-center bg-light">
        <div class="col-3 card p-4 shadow d-flex align-items-center position-relative">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('../image/SMKN 1 Cimahi.png') }}" alt="" style="width: 100px;">
            </div>
            <h3 class="text-dark text-center">Perpustakaan <br> SMK Negeri 1 Cimahi</h3>
            <form action="petugas/tambah" class="form-group mt-4 col-12" method="POST">
                {{ csrf_field() }}
                <input type="text" class="form-control" name="nama" placeholder="Masukan Nama" required autocomplete="off" minlength="4">
                <div class="m-3"></div>
                <input type="email" class="form-control" name="email" placeholder="Masukan Email" required autocomplete="off">
                <div class="m-3"></div>
                <input type="tel" class="form-control" name="hp" placeholder="Masukan No Hp" required autocomplete="off" minlength="12" maxlength="12" pattern="[0-9]{12}">
                <div class="m-3"></div>
                <input type="password" class="form-control" name="password" placeholder="Masukan Password" required autocomplete="off" minlength="8">
                <br>
                <input type="submit" value="Sign Up" class="form-control btn-primary">
            </form>
            <a href="/">
                <i class="fa-solid fa-arrow-left-long position-absolute text-primary" style="left: 0; top: 0; margin: 20px; font-size: 20px;"></i>
            </a>
        </div>
</body>