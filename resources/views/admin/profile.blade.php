@extends('layouts.mainlayout')

@section('title', 'Profil Saya')

@section('sidebar_item')
    @include('partials.sidebar')
@endsection

@section('content')
    <div class="container mt-5">
        <div class="card p-5 mb-5 mx-5" style="margin-top: 100px;">
            <h4 class="pb-3">Profile Info</h4>
            <div class="row">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="col-md-3 mb-4 text-center">
                    <div class="card">
                        <img id="file-preview" src="{{ asset('img/profile.png') }}" class="rounded-circle mx-auto mt-4 mb-4" alt="Profile Picture" style="width: 150px; height: 150px;">
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header bg-white pt-3">
                            <h5>Informasi Profil</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="username" class="form-label">
                                    <h6>Username</h6>
                                </label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ auth()->user()->username }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">
                                    <h6>Phone</h6>
                                </label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ auth()->user()->phone }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">
                                    <h6>Email</h6>
                                </label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ auth()->user()->email }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">
                                    <h6>Address</h6>
                                </label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ auth()->user()->address }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">
                                    <h6>Status</h6>
                                </label>
                                <input type="text" class="form-control" id="status" name="status" value="{{ auth()->user()->status }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection