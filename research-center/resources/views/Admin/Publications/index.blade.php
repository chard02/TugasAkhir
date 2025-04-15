@extends('admin.layouts.app')

@section('title', 'Daftar Publikasi')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold mb-4">Manajemen Publikasi</h1>

    {{-- Filter --}}
    <form method="GET" action="{{ route('admin.publications.index') }}" class="mb-4 flex flex-wrap gap-2">
        <select name="year" class="border rounded px-3 py-2">
            <option value="">Semua Tahun</option>
            @foreach($years as $y)
                <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>
                    {{ $y }}
                </option>
            @endforeach
        </select>

        <select name="type" class="border rounded px-3 py-2">
            <option value="">Semua Jenis</option>
            <option value="jurnal" {{ request('type') == 'jurnal' ? 'selected' : '' }}>Jurnal</option>
            <option value="prosiding" {{ request('type') == 'prosiding' ? 'selected' : '' }}>Prosiding</option>
        </select>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Filter
        </button>
    </form>

    {{-- Tabel Publikasi --}}
    <div class="bg-white rounded shadow p-4 overflow-x-auto">
        <table class="min-w-full border border-gray-300 table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">Judul</th>
                    <th class="border px-4 py-2">Jenis</th>
                    <th class="border px-4 py-2">Tahun</th>
                    <th class="border px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($publications as $pub)
                    <tr class="border-t">
                        <td class="px-4 py-2 border">{{ $pub->title }}</td>
                        <td class="px-4 py-2 border capitalize">{{ $pub->type }}</td>
                        <td class="px-4 py-2 border">{{ $pub->created_at->year }}</td>
                        <td class="px-4 py-2 border">
                            @if($pub->is_approved)
                                <span class="text-green-600 font-semibold">Disetujui</span>
                            @else
                                <span class="text-yellow-600 font-semibold">Menunggu</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 border space-x-2">
                            <a href="{{ route('admin.publications.show', $pub->id) }}"
                               class="text-blue-500 hover:underline">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">Tidak ada publikasi ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $publications->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection
