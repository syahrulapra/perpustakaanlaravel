@extends('page.app')
@section('main')

<header class="container-fluid">
    <div class="d-flex flex-column text-center justify-content-center align-items-center py-5">
        <h1 class="font-weight-bold px-5 py-3 pt-5">Selamat Datang di Perpustakaan <br> SMK Negeri 1 Cimahi</h1>
        <form class="form-group d-flex" action="#" style="min-width: 370px;">
            <div class="form-control">
                <input class="border-0 mr-auto" style="outline: none; width: 310px;" type="search" name="search" id="search" placeholder="search">
                <button class="border-0 bg-white">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </form>
    </div>
    <div class=""><iframe src="https://discord.com/widget?id=1078951329529073709&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe></div>
</header>
@endsection