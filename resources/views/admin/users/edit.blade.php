@extends('layouts.mainlayout')

@section('title', 'Edit User')

@section('sidebar_item')
    @include('partials.sidebar')
@endsection

@section('content')
    <div class="col-11 col-sm-10 col-md-9 mx-auto mb-5 p-4 p-sm-5 border"
        style="background-color: rgb(255, 255, 255); margin-top: 125px; border-radius: 10px">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h1 class="fs-5 mb-5 pb-2 border-bottom border-2">Edit Data User</h1>

            <div class="mb-4">
                <label for="username" class="fw-semibold mb-2">Username</label>
                <input type="text" class="form-control p-2" id="username" name="username" value="{{ old('username', $user->username) }}"
                    required>
            </div>

            <div class="mb-4">
                <label for="phone" class="fw-semibold mb-2">Phone</label>
                <input type="text" class="form-control p-2" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                required>
            </div>

            <div class="mb-4">
                <label for="email" class="fw-semibold mb-2">Email</label>
                <input type="email" class="form-control p-2" id="email" name="email" value="{{ old('email', $user->email) }}"
                required>
            </div>

            <div class="mb-4">
                <label for="address" class="fw-semibold mb-2">Alamat</label>
                <input type="text" class="form-control p-2" id="address" name="address" value="{{ old('address', $user->address) }}"
                required>
            </div>

            <div class="mb-4">
                <label for="status" class="fw-semibold mb-2">Status</label>
                <select id="status" class="form-select p-2" name="status" required>
                    <option value="" disabled hidden>Pilih Status</option>
                    <option value="active" {{ old('status', $user->status) == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status', $user->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="role_id" class="fw-semibold mb-2">Role</label>
                <select id="role_id" class="form-select p-2" name="role_id" required>
                    <option value="" disabled hidden>Pilih Role</option>
                    <option value="1" {{ old('role_id', $user->role_id) == 1 ? 'selected' : '' }}>Admin</option>
                    <option value="2" {{ old('role_id', $user->role_id) == 2 ? 'selected' : '' }}>User</option>
                </select>
            </div>

            <button type="submit" class="btn btn-dark d-block mx-auto mt-5 px-5 py-2">Simpan</button>
        </form>
    </div>
@endsection