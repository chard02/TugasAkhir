@extends('researchers.layouts.app')

@section('title', 'Dashboard Peneliti')
@section('content')
<div class="container py-4">
    <h2 class="mb-4">Dashboard Peneliti</h2>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-left-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Publikasi</h5>
                    <h3>{{ $totalPublications }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-left-success">
                <div class="card-body">
                    <h5 class="card-title">Proyek Aktif</h5>
                    <h3>{{ $activeProjects }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-left-warning">
                <div class="card-body">
                    <h5 class="card-title">Proyek Kolaborasi</h5>
                    <h3>{{ $collaborativeProjects }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h4>Selamat datang, {{ $researcher->user->name }}</h4>
        <p>Institusi: {{ $researcher->institution }}</p>
        <p>Email: {{ $researcher->user->email }}</p>
    </div>
</div>
@endsection
