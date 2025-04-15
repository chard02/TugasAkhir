@extends('admin.layouts.app')

@section('title', 'Detail Publikasi')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold mb-4">Detail Publikasi</h1>

    <div class="bg-white shadow-md rounded-lg p-6 space-y-4">
        <div>
            <h2 class="text-xl font-bold">{{ $publication->title }}</h2>
            <p class="text-gray-600">Tahun: {{ $publication->year }}</p>
            <p class="text-gray-600">Jenis: {{ ucfirst($publication->type) }}</p>
        </div>

        <div>
            <p class="font-semibold">Penulis:</p>
            <p>{{ $publication->researcher->user->name ?? '-' }}</p>
        </div>

        @if ($publication->doi)
        <div>
            <p class="font-semibold">DOI:</p>
            <a href="https://doi.org/{{ $publication->doi }}" class="text-blue-500 hover:underline" target="_blank">
                {{ $publication->doi }}
            </a>
        </div>
        @endif

        <div>
            <p class="font-semibold">Abstrak:</p>
            <p>{{ $publication->abstract }}</p>
        </div>
    </div>
</div>
@endsection
