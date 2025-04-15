@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Proyek Riset</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Peneliti</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{ $project->title }}</td>
                <td>{{ $project->researcher->user->name ?? '-' }}</td>
                <td>{{ ucfirst($project->status) }}</td>
                <td>
                    @if($project->status == 'pending')
                        <form method="POST" action="{{ route('admin.projects.approve', $project->id) }}" style="display:inline">
                            @csrf
                            <button class="btn btn-success btn-sm">Setujui</button>
                        </form>
                        <form method="POST" action="{{ route('admin.projects.reject', $project->id) }}" style="display:inline">
                            @csrf
                            <button class="btn btn-danger btn-sm">Tolak</button>
                        </form>
                    @else
                        <span class="badge bg-secondary">Sudah {{ ucfirst($project->status) }}</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $projects->links() }}
</div>
@endsection
