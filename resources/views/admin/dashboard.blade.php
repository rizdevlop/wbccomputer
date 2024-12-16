@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('sidebar_item')
    @include('partials.sidebar')
@endsection

@section('content')
    <div class="box-menu d-flex flex-column align-items-center flex-md-row justify-content-md-evenly mb-3"
        style="margin-top: 125px;">
        <a href="{{ route('usersmanagement.index') }}"
            class="col-9 col-md-3 d-flex mb-5 mb-md-0 text-dark text-decoration-none shadow-sm">
            <div class="col-4 d-flex justify-content-center py-2" style="background-color: #2F88FF;">
                <i class="bi bi-people text-light" style="font-size: 36px;"></i>
            </div>
            <div class="col-8 d-flex align-items-center">
                <p class="mx-3 mb-0">Total User<br><span class="fw-bold">{{ $user_count }}</span></p>
            </div>
        </a>

        <a href="{{ route('produk.index') }}"
            class="col-9 col-md-3 d-flex mb-5 mb-md-0 text-dark text-decoration-none shadow-sm">
            <div class="col-4 d-flex justify-content-center py-2" style="background-color: #19D242;">
                <i class="bi bi-journal-text text-light" style="font-size: 36px;"></i>
            </div>
            <div class="col-8 d-flex align-items-center">
                <p class="mx-3 mb-0">Stok Barang<br><span class="fw-bold">{{ $produk_count }}</span></p>
            </div>
        </a>

        <a href="{{ route('category.index') }}"
            class="col-9 col-md-3 d-flex mb-5 mb-md-0 text-dark text-decoration-none shadow-sm">
            <div class="col-4 d-flex justify-content-center py-2" style="background-color: #FB8700;">
                <i class="bi bi-list-ol text-light" style="font-size: 36px;"></i>
            </div>
            <div class="col-8 d-flex align-items-center">
                <p class="mx-3 mb-0">Kategori Barang<br><span class="fw-bold">{{ $category_count }}</span></p>
            </div>
        </a>
    </div>
@endsection