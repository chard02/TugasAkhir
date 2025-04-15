@extends('admin.layouts.app')

@section('title', 'Permintaan Persetujuan Peneliti')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Permintaan Persetujuan Peneliti</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($pendingResearchers->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Institusi</th>
                    <th>Tanggal Daftar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendingResearchers as $researcher)
                    <tr>
                        <td>{{ $researcher->full_name ?? $researcher->user->name }}</td>
                        <td>{{ $researcher->email ?? $researcher->user->email }}</td>
                        <td>{{ $researcher->institution ?? '-' }}</td>
                        <td>{{ $researcher->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('admin.researchers.show', $researcher->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <form action="{{ route('admin.researchers.approve', $researcher->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Setujui profil ini?')">Approve</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada permintaan persetujuan saat ini.</p>
    @endif
</div>
@endsection
