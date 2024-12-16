@extends('layouts.mainlayout')

@section('title', 'Tambah User')

@section('sidebar_item')
    @include('partials.sidebar')
@endsection

@section('content')
    <div class="col-11 col-sm-10 col-md-9 mx-auto mb-5 p-4 p-sm-5 border"
        style="background-color: rgb(255, 255, 255); margin-top: 125px; border-radius: 10px">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <h1 class="fs-5 mb-5 pb-2 border-bottom border-2">Tambah Data User</h1>

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
                <label for="username" class="fw-semibold mb-2">Username</label>
                <input type="text" class="form-control p-2" id="username" name="username" value="{{ old('username') }}" placeholder="Masukkan Nama"
                required>
                @error('username')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="fw-semibold mb-2">Password</label>
                <input type="password" class="form-control p-2" id="password" name="password" placeholder="Masukkan Password"
                required>
                @error('password')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4">
                <label for="phone" class="fw-semibold mb-2">Phone</label>
                <input type="text" class="form-control p-2" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Masukkan Nomor HP"
                required>
                @error('phone')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="fw-semibold mb-2">Email</label>
                <input type="email" class="form-control p-2" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email"
                required>
                @error('email')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4">
                <label for="address" class="fw-semibold mb-2">Alamat</label>
                <input type="text" class="form-control p-2" id="address" name="address" value="{{ old('address') }}" placeholder="Masukkan Alamat"
                required>
                @error('address')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="fw-semibold mb-2">Status</label>
                <select id="status" class="form-select p-2" name="status" required>
                    <option value="" selected disabled hidden>Pilih Status</option>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="role_id" class="fw-semibold mb-2">Role</label>
                <select id="role_id" class="form-select p-2" name="role_id" required>
                    <option value="" selected disabled hidden>Pilih Role</option>
                    <option value="1" {{ old('role_id') == 1 ? 'selected' : '' }}>Admin</option>
                    <option value="2" {{ old('role_id') == 2 ? 'selected' : '' }}>User</option>
                </select>
            </div>

            <button type="submit" class="btn btn-dark d-block mx-auto mt-5 px-5 py-2">Simpan</button>
        </form>
    </div>
@endsection