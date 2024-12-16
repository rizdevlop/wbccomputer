@extends('layouts.mainlayout')

@section('title', 'Data Barang')

@section('sidebar_item')
    @include('partials.sidebar')
@endsection

@section('content')
<div class="col-11 mx-auto mb-5 border overflow-hidden"
    style="background-color: rgb(255, 255, 255); font-size: 13px; margin-top: 125px; border-radius: 10px">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center p-4">
        <h1 class="fs-5 mb-3 mb-sm-0">Data Barang</h1>
        <a href="{{ route('produk.create') }}" class="btn btn-success align-self-end" style="border-radius: 25px">
            <span>+</span>
            <span>Tambah Barang</span>
        </a>
    </div>
    
    @if (session('success'))
        <div class="mt-3 mx-4 alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="table-responsive px-3 pb-3">
        <table class="table table-hover mt-3" id="table-product">
            <thead class="table-light border-top border-bottom">
                <tr>
                    <th class="text-secondary fw-semibold text-center px-3 text-nowrap">NO</th>
                    <th class="text-secondary fw-semibold px-3 text-nowrap">NAMA BARANG</th>
                    <th class="text-secondary fw-semibold px-3 text-nowrap">KATEGORI</th>
                    <th class="text-secondary fw-semibold px-3 text-nowrap">JUMLAH STOK</th>
                    <th class="text-secondary fw-semibold px-3 text-nowrap">HARGA SELLER</th>
                    <th class="text-secondary fw-semibold px-3 text-nowrap">HARGA USER</th>
                    <th class="text-secondary fw-semibold text-center px-3 text-nowrap">AKSI</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($produk as $item)
                    <tr>
                        <td class="text-secondary text-center px-3 text-nowrap">{{ $loop->iteration }}</td>
                        <td class="px-3 text-nowrap">{{ $item->nama_barang }}</td>
                        <td class="px-3 text-nowrap">{{ $item->kategori->name }}</td>
                        <td class="text-center px-3 text-nowrap">{{ $item->jumlah_stok }}</td>
                        <td class="px-3 text-nowrap">Rp. {{ $item->harga_seller }}</td>
                        <td class="px-3 text-nowrap">Rp. {{ $item->harga_user }}</td>
                        <td class="text-center px-3 text-nowrap">
                            <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form id="delete-form-{{ $item->id }}" action="{{ route('produk.destroy', $item->id) }}" method="post"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="confirmDelete({{ $item->id }})">
                                    <i class="bi bi-trash3"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data produk</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
@endpush

@push('js')
    <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table-product').DataTable({
                ordering: false,
                responsive: true
            });

            @if(session('success'))
                swal("Good job!", "{{ session('success') }}", "success");
            @endif
        });

        function confirmDelete(itemId) {
        swal({
            title: 'Apakah Anda yakin?',
            text: "Setelah dihapus, Anda tidak akan dapat memulihkan barang ini!",
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                document.getElementById('delete-form-' + itemId).submit();
            } else {
                swal("Barang ini aman");
            }
        });
    }
    </script>
@endpush