@extends('layouts.mainlayout')

@section('title', 'Tambah Data Kategori')

@section('sidebar_item')
    @include('partials.sidebar')
@endsection

@section('content')
<div class="col-11 col-sm-10 col-md-9 mx-auto mb-5 p-4 p-sm-5 border"
style="background-color: rgb(255, 255, 255); margin-top: 125px; border-radius: 10px">
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <h1 class="fs-5 mb-5 pb-2 border-bottom border-2">Tambah Data Kategori</h1>

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Nama Kategori Barang</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <button type="submit" class="btn btn-dark d-block mx-auto mt-5 px-5 py-2">Simpan</button>
    </form>
</div>
@endsection

@push('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            @if(session('success'))
                swal("Good job!", "{{ session('success') }}", "success");
            @endif
        });
    </script>
@endpush