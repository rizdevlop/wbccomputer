@extends('layouts.mainlayout')

@section('title', 'Kategori Barang')

@section('sidebar_item')
    @include('partials.sidebar')
@endsection

@section('content')
<div class="col-11 mx-auto mb-5 border overflow-hidden"
    style="background-color: rgb(255, 255, 255); font-size: 13px; margin-top: 125px; border-radius: 10px">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center p-4">
        <h1 class="fs-5 mb-3 mb-sm-0">Kategori Barang</h1>
        <a href="{{ route('category.create') }}" class="btn btn-success align-self-end" style="border-radius: 25px">
            <span>+</span>
            <span>Tambah Kategori Barang</span>
        </a>
    </div>
    
    @if (session('success'))
        <div class="mt-3 mx-4 alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="table-responsive px-3 pb-3">
        <table class="table table-hover mt-3" id="table-category">
            <thead class="table-light border-top border-bottom">
                <tr>
                    <th class="text-secondary fw-semibold text-center px-3 text-nowrap">NO</th>
                    <th class="text-secondary fw-semibold px-3 text-nowrap">KATEGORI BARANG</th>
                    <th class="text-secondary fw-semibold text-center px-3 text-nowrap">AKSI</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td class="text-center px-3">{{ $loop->iteration }}</td>
                        <td class="px-3">{{ $category->name }}</td>
                        <td class="text-center px-3">
                            <form action="{{ route('category.edit', ['category' => $category->id]) }}" method="GET" class="d-inline">
                                @csrf
                                @method('GET')
                                <button type="submit" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>
                            </form>
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" id="delete-form-{{ $category->id }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" name="hapus" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $category->id }})">
                                    <i class="bi bi-trash3"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
@endpush

@push('js')
    <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table-category').DataTable({
                scrollCollapse: true,
                ordering: false
            });

            @if(session('success'))
                swal("Good job!", "{{ session('success') }}", "success");
            @endif
        });

        function confirmDelete(categoryId) {
            swal({
                title: "Apakah anda yakin?",
                text: "Saat dihapus, Anda tidak bisa memulihkan data kategori ini!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    document.getElementById('delete-form-' + categoryId).submit();
                } else {
                    swal("This category data is safe!");
                }
            });
        }
    </script>
@endpush
