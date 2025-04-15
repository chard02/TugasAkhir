@extends('Admin.Layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Dashboard Admin</h1>

    {{-- Ringkasan Kartu --}}
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Peneliti</h5>
                    <p class="card-text">{{ $totalResearchers }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Publikasi</h5>
                    <p class="card-text">{{ $totalPublications }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Proyek</h5>
                    <p class="card-text">{{ $totalProjects }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Kolaborator</h5>
                    <p class="card-text">{{ $collaboratorCount }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Pending Approval --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card border-danger">
                <div class="card-body">
                    <h5 class="card-title">Akun Peneliti Pending</h5>
                    <p class="card-text">{{ $pendingResearchers }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-danger">
                <div class="card-body">
                    <h5 class="card-title">Proyek Pending</h5>
                    <p class="card-text">{{ $pendingProjects }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Publikasi Terbaru --}}
    <div class="card mb-4">
        <div class="card-header">Publikasi Terbaru</div>
        <ul class="list-group list-group-flush">
            @foreach($latestPublications as $pub)
                <li class="list-group-item">
                    <strong>{{ $pub->title }}</strong> <br>
                    <small>{{ $pub->created_at->format('d M Y') }}</small>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Grafik --}}
    <div class="row mb-4">
        <div class="col-md-6">
            <canvas id="publicationsChart"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="categoryPieChart"></canvas>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const publicationsPerYear = @json($publicationsPerYear);
    
    const years = publicationsPerYear.map(item => item.year);
    const totals = publicationsPerYear.map(item => item.total);

    const categoryLabels = categories.map(c => c.category);
    const categoryData = categories.map(c => c.total);

    const ctx1 = document.getElementById('publicationsChart').getContext('2d');
    new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: years,
            datasets: [{
                label: 'Jumlah Publikasi',
                data: totals,
                backgroundColor: 'rgba(54, 162, 235, 0.6)'
            }]
        }
    });

    const ctx2 = document.getElementById('categoryPieChart').getContext('2d');
    new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: categoryLabels,
            datasets: [{
                data: categoryData,
                backgroundColor: [
                    '#007bff', '#28a745', '#dc3545', '#ffc107', '#17a2b8'
                ]
            }]
        }
    });
</script>
@endsection
