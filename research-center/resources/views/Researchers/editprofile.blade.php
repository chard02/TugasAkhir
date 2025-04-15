@extends('Researchers.layouts.app')

@section('title', 'Edit Profil Peneliti')

@section('content')
<div class="container mt-5">
    <h2>Edit Profil Peneliti</h2>

    {{-- Flash message --}}
    @if(session('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
    @endif


    <form action="{{ route('researcher.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Photo --}}
        <div class="mb-3">
            <label for="photo" class="form-label">Foto Profil</label><br>
            @if(auth()->user()->researcher && auth()->user()->researcher->photo)
                <img src="{{ asset('storage/' . auth()->user()->researcher->photo) }}" alt="Foto Profil" width="120" class="rounded mb-2">
            @endif
            <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" id="photo">
            @error('photo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Institution --}}
        <div class="mb-3">
            <label for="institution" class="form-label">Institusi</label>
            <input type="text" name="institution" class="form-control @error('institution') is-invalid @enderror" id="institution" value="{{ old('institution', auth()->user()->researcher->institution ?? '') }}">
            @error('institution')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Academic Position --}}
        <div class="mb-3">
            <label for="academic_position" class="form-label">Jabatan Akademik</label>
            <input type="text" name="academic_position" class="form-control @error('academic_position') is-invalid @enderror" id="academic_position" value="{{ old('academic_position', auth()->user()->researcher->academic_position ?? '') }}">
            @error('academic_position')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Expertise --}}
        <div class="mb-3">
            <label for="expertise" class="form-label">Keahlian</label>
            <input type="text" name="expertise" class="form-control @error('expertise') is-invalid @enderror" id="expertise" value="{{ old('expertise', auth()->user()->researcher->expertise ?? '') }}">
            @error('expertise')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- ORCID ID --}}
        <div class="mb-3">
            <label for="orcid_id" class="form-label">ORCID ID</label>
            <input type="text" name="orcid_id" class="form-control @error('orcid_id') is-invalid @enderror" id="orcid_id" value="{{ old('orcid_id', auth()->user()->researcher->orcid_id ?? '') }}">
            @error('orcid_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Scopus ID --}}
        <div class="mb-3">
            <label for="scopus_id" class="form-label">Scopus ID</label>
            <input type="text" name="scopus_id" class="form-control @error('scopus_id') is-invalid @enderror" id="scopus_id" value="{{ old('scopus_id', auth()->user()->researcher->scopus_id ?? '') }}">
            @error('scopus_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Garuda ID --}}
        <div class="mb-3">
            <label for="garuda_id" class="form-label">Garuda ID</label>
            <input type="text" name="garuda_id" class="form-control @error('garuda_id') is-invalid @enderror" id="garuda_id" value="{{ old('garuda_id', auth()->user()->researcher->garuda_id ?? '') }}">
            @error('garuda_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
            
            {{-- Google Scholar ID --}}
        <div class="mb-3">
            <label for="googlescholar_id" class="form-label">Google Scholar ID</label>
            <input type="text" name="googlescholar_id" class="form-control @error('googlescholar_id') is-invalid @enderror" id="googlescholar_id" value="{{ old('googlescholar_id', auth()->user()->researcher->googlescholar_id ?? '') }}">
            @error('googlescholar_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Phone --}}
        <div class="mb-3">
            <label for="phone" class="form-label">Nomor HP</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone', auth()->user()->researcher->phone ?? '') }}">
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Bio --}}
        <div class="mb-3">
            <label for="bio" class="form-label">Biografi Singkat</label>
            <textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror" rows="4">{{ old('bio', auth()->user()->researcher->bio ?? '') }}</textarea>
            @error('bio')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn btn-primary">Simpan Profil</button>
        <a href="{{ route('researchers.dashboard') }}" class="btn btn-link">← Kembali ke Dashboard</a>
    </form>
</div>
@endsection
