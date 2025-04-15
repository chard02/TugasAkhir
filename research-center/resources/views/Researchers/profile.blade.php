@extends('Researchers.layouts.app')

@section('title', 'Profil Peneliti')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Profil Peneliti</h2>

    @if(!$researcher->is_approved)
    <div class="alert alert-warning">
        Profil Anda sedang menunggu persetujuan admin.
    </div>
    @endif

    <div class="card shadow-sm p-4">
        <div class="row">
            <div class="col-md-4 text-center">
                @if($researcher && $researcher->photo)
                    <img src="{{ asset('storage/' . $researcher->photo) }}" class="img-fluid rounded-circle mb-3" width="150" alt="Foto Profil">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}" class="img-fluid rounded-circle mb-3" width="150" alt="Foto Default">
                @endif

                <h5>{{ $user->name }}</h5>
                <p class="text-muted">{{ $user->email }}</p>
            </div>

            <div class="col-md-8">
                <table class="table table-borderless">
                    <tr>
                        <th>Institusi</th>
                        <td>{{ $researcher->institution ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Jabatan Akademik</th>
                        <td>{{ $researcher->academic_position ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Keahlian</th>
                        <td>{{ $researcher->expertise ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>ORCID ID</th>
                        <td>{{ $researcher->orcid_id ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Scopus ID</th>
                        <td>{{ $researcher->scopus_id ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Garuda ID</th>
                        <td>{{ $researcher->garuda_id ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Google Scholar ID</th>
                        <td>{{ $researcher->googlescholar_id ?? '-' }}</td>
                    <tr>
                        <th>Nomor HP</th>
                        <td>{{ $researcher->phone ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Biografi Singkat</th>
                        <td>{{ $researcher->bio ?? '-' }}</td>
                    </tr>
                </table>

                <a href="{{ route('researchers.editprofile') }}" class="btn btn-outline-primary mt-3">Edit Profil</a>
            </div>
        </div>
    </div>
</div>
@endsection
