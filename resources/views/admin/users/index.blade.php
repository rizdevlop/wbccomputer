@extends('layouts.mainlayout')

@section('title', 'Data User')

@section('sidebar_item')
    @include('partials.sidebar')
@endsection

@section('content')
    <div class="col-11 mx-auto mb-5 border overflow-hidden"
        style="background-color: rgb(255, 255, 255); font-size: 13px; margin-top: 125px; border-radius: 10px">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center p-4">
            <h1 class="fs-5 mb-3 mb-sm-0">Data User</h1>
            <a href="{{ route('users.create') }}" class="btn btn-success align-self-end" style="border-radius: 25px">
                <span>+</span>
                <span>Tambah User</span>
            </a>
        </div>
        
        @if (session('success'))
            <div class="mt-3 mx-4 alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        {{-- Table --}}
        <div class="table-responsive px-3 pb-3">
            <table class="table table-hover mt-3" id="table-user">
                <thead class="table-light border-top border-bottom">
                    <tr>
                        <th class="text-secondary fw-semibold text-center px-3 text-nowrap">NO</th>
                        <th class="text-secondary fw-semibold px-3 text-nowrap">USERNAME</th>
                        <th class="text-secondary fw-semibold px-3 text-nowrap">EMAIL</th>
                        <th class="text-secondary fw-semibold text-center px-3 text-nowrap">NO TELP</th>
                        <th class="text-secondary fw-semibold px-3 text-nowrap">ROLE</th>
                        <th class="text-secondary fw-semibold px-3 text-nowrap">STATUS</th>
                        <th class="text-secondary fw-semibold text-center px-3 text-nowrap">AKSI</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td class="text-secondary text-center px-3 text-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-3 text-nowrap">{{ $user->username }}</td>
                            <td class="px-3 text-nowrap">{{ $user->email }}</td>
                            <td class="text-center px-3 text-nowrap">{{ $user->phone }}</td>
                            <td class="px-3 text-nowrap">
                                {{ $user->role_id === 1 ? 'Admin' : 'User' }}
                            </td>
                            <td class="px-3 text-nowrap">{{ $user->status }}</td>
                            <td class="text-center px-3 text-nowrap">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                </form>
                                <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="post"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="confirmDelete({{ $user->id }})">
                                        <i class="bi bi-trash3"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
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
            $('#table-user').DataTable({
                ordering: false,
                responsive: true
            });

            @if(session('success'))
                swal("Good job!", "{{ session('success') }}", "success");
            @endif
        });

        function confirmDelete(userId) {
            swal({
                title: "Apakah Anda yakin?",
                text: "Setelah dihapus, Anda tidak akan dapat memulihkan user ini!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    document.getElementById('delete-form-' + userId).submit();
                } else {
                    swal("User ini aman");
                }
            });
        }
    </script>
@endpush
