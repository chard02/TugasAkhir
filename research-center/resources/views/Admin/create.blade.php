@extends('Admin.Layouts.app')
@section('content')

<div class="container">
    <h2>Buat Akun Peneliti</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.researchers.store') }}">
        @csrf
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-primary">Buat Akun</button>
    </form>
</div>
@endsection
