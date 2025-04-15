@extends('admin.layouts.app')

@section('title', 'Edit Peneliti')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold mb-4">Edit Profil Peneliti</h1>

    <form action="{{ route('admin.researchers.update', $researcher->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium">Nama Lengkap</label>
            <input type="text" name="full_name" value="{{ old('full_name', $researcher->user->name) }}"
                   class="w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block font-medium">Institusi</label>
            <input type="text" name="institution" value="{{ old('institution', $researcher->institution) }}"
                   class="w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block font-medium">Jabatan Akademik</label>
            <input type="text" name="academic_position" value="{{ old('academic_position', $researcher->academic_position) }}"
                   class="w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block font-medium">Keahlian</label>
            <input type="text" name="expertise" value="{{ old('expertise', $researcher->expertise) }}"
                   class="w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block font-medium">ORCID ID</label>
            <input type="text" name="orcid_id" value="{{ old('orcid_id', $researcher->orcid_id) }}"
                   class="w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block font-medium">Scopus ID</label>
            <input type="text" name="scopus_id" value="{{ old('scopus_id', $researcher->scopus_id) }}"
                   class="w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block font-medium">Garuda ID</label>
            <input type="text" name="garuda_id" value="{{ old('garuda_id', $researcher->garuda_id) }}"
                   class="w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block font-medium">Nomor HP</label>
            <input type="text" name="phone" value="{{ old('phone', $researcher->phone) }}"
                   class="w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block font-medium">Biografi</label>
            <textarea name="bio" rows="4"
                      class="w-full border-gray-300 rounded-md shadow-sm">{{ old('bio', $researcher->bio) }}</textarea>
        </div>

        <div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.researchers.index') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
