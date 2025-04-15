@extends('admin.layouts.app')

@section('title', 'Detail Peneliti')

@section('content')
<div class="container mt-4">
    <h2>Detail Peneliti</h2>

    <div class="card mt-3">
        <div class="card-body">
            <h4>{{ $researcher->user->name }}</h4>
            <p><strong>Email:</strong> {{ $researcher->user->email }}</p>
            <p><strong>Institusi:</strong> {{ $researcher->institution ?? '-' }}</p>
            <p><strong>Jabatan Akademik:</strong> {{ $researcher->academic_position ?? '-' }}</p>
            <p><strong>Keahlian:</strong> {{ $researcher->expertise ?? '-' }}</p>
            <p><strong>ORCID ID:</strong> {{ $researcher->orcid_id ?? '-' }}</p>
            <p><strong>Scopus ID:</strong> {{ $researcher->scopus_id ?? '-' }}</p>
            <p><strong>Garuda ID:</strong> {{ $researcher->garuda_id ?? '-' }}</p>
            <p><strong>Google Scholar ID:</strong> {{ $researcher->googlescholar_id ?? '-' }}</p>
            <p><strong>Biografi:</strong> {!! nl2br(e($researcher->bio)) ?? '-' !!}</p>
            <p><strong>Telepon:</strong> {{ $researcher->phone ?? '-' }}</p>
            <p><strong>Status:</strong> 
                @if ($researcher->is_approved)
                    <span class="badge bg-success">Disetujui</span>
                @else
                    <span class="badge bg-warning text-dark">Menunggu Persetujuan</span>
                @endif
            </p>
        </div>
    </div>

    <a href="{{ route('admin.researchers.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
