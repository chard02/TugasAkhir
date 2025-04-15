@extends('admin.layouts.app')

@section('title', 'Daftar Peneliti')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold mb-4">Manajemen Peneliti</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">Nama Lengkap</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Institusi</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($researchers as $researcher)
                    <tr class="border-t">
                        <td class="px-4 py-2 border">{{ $researcher->full_name ?? $researcher->user->name }}</td>
                        <td class="px-4 py-2 border">{{ $researcher->user->email }}</td>
                        <td class="px-4 py-2 border">{{ $researcher->institution ?? '-' }}</td>
                        <td class="px-4 py-2 border">
                            @if($researcher->is_approved)
                                <span class="text-green-600 font-semibold">Disetujui</span>
                            @else
                                <span class="text-yellow-600 font-semibold">Menunggu</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 border space-x-2">
    <a href="{{ route('admin.researchers.show', $researcher->id) }}"
       class="text-blue-500 hover:underline">Detail</a>

    <a href="{{ route('admin.researchers.edit', $researcher->id) }}"
       class="text-yellow-500 hover:underline">Edit</a>

    <form action="{{ route('admin.researchers.destroy', $researcher->id) }}" method="POST" class="inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-600 hover:underline"
            onclick="return confirm('Hapus peneliti ini?')">Hapus</button>
    </form>
</td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">Tidak ada data peneliti.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
