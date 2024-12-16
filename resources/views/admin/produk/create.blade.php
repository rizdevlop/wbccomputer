@extends('layouts.mainlayout')

@section('title', 'Tambah Data Barang')

@section('sidebar_item')
    @include('partials.sidebar')
@endsection

@section('content')
<div class="col-11 col-sm-10 col-md-9 mx-auto mb-5 p-4 p-sm-5 border"
style="background-color: rgb(255, 255, 255); margin-top: 125px; border-radius: 10px">
    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1 class="fs-5 mb-5 pb-2 border-bottom border-2">Tambah Data Barang</h1>

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="mb-4">
            <label for="nama_barang" class="fw-semibold mb-2">Nama Barang</label>
            <input type="text" class="form-control p-2" id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}" placeholder="Masukkan Nama Barang"
            required>
            @error('nama_barang')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-4">
            <label for="kategori_id" class="fw-semibold mb-2">Kategori</label>
            <select id="kategori_id" class="form-select p-2" name="kategori_id" required>
                <option value="" selected disabled hidden>Pilih Kategori</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="jumlah_stok" class="fw-semibold mb-2">Jumlah Stok</label>
            <input type="number" class="form-control p-2" id="jumlah_stok" name="jumlah_stok" value="{{ old('jumlah_stok') }}" placeholder="Masukkan Jumlah Stok"
            required>
            @error('jumlah_stok')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-4">
            <label for="harga_seller" class="fw-semibold mb-2">Harga Seller</label>
            <input type="text" class="form-control p-2" id="harga_seller" name="harga_seller" value="{{ old('harga_seller') }}" placeholder="Masukkan Nominal"
            required>
            @error('harga_seller')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-4">
            <label for="harga_user" class="fw-semibold mb-2">Harga User</label>
            <input type="text" class="form-control p-2" id="harga_user" name="harga_user" value="{{ old('harga_user') }}" placeholder="Masukkan Nominal"
            required>
            @error('harga_user')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-4">
            <label for="keterangan" class="fw-semibold mb-2">Keterangan</label>
            <input type="text" class="form-control p-2" id="keterangan" name="keterangan" value="{{ old('keterangan') }}" placeholder="Masukkan Keterangan"
            required>
            @error('keterangan')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-4">
            <label for="image" class="form-label">Upload Foto</label>
            <input type="file" name="image" class="form-control">
        </div>        

        <button type="submit" class="btn btn-dark d-block mx-auto mt-5 px-5 py-2">Simpan</button>
    </form>
</div>
@endsection