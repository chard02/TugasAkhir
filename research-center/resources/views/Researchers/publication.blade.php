@extends('Researchers.layouts.app')

@section('title', 'Daftar Publikasi')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Publikasi</h2>

    <ul class="nav nav-tabs" id="publicationTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="orcid-tab" data-bs-toggle="tab" data-bs-target="#orcid" type="button" role="tab">ORCID</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="scopus-tab" data-bs-toggle="tab" data-bs-target="#scopus" type="button" role="tab">Scopus</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="garuda-tab" data-bs-toggle="tab" data-bs-target="#garuda" type="button" role="tab">Garuda</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="google-tab" data-bs-toggle="tab" data-bs-target="#google" type="button" role="tab">Google Scholar</button>
        </li>
    </ul>

    <div class="tab-content mt-3">

        {{-- ORCID --}}
        <div class="tab-pane fade show active" id="orcid" role="tabpanel" aria-labelledby="orcid-tab">
            @if(!empty($orcidPublications) && is_array($orcidPublications))
                <ul class="list-group">
                    @foreach($orcidPublications as $pub)
                        @php
                            $title = $pub['work-summary'][0]['title']['title']['value'] ?? 'Tanpa Judul';
                            $year = $pub['work-summary'][0]['publication-date']['year']['value'] ?? 'Tanpa Tahun';
                            $authors = $pub['work-summary'][0]['contributors'][0]['credit-name']['value'] ?? 'Tidak Diketahui';
                        @endphp
                        <li class="list-group-item">
                            <strong>{{ $title }}</strong>
                            <div><small>Penulis: {{ $authors }}</small></div>
                            <div><small>Tahun: {{ $year }}</small></div>
                            <div><small>Sitasi: N/A</small></div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">Tidak ada publikasi dari ORCID.</p>
            @endif
        </div>

        {{-- SCOPUS --}}
        <div class="tab-pane fade" id="scopus" role="tabpanel" aria-labelledby="scopus-tab">
            @if(!empty($scopusPublications) && is_array($scopusPublications))
                <ul class="list-group">
                    @foreach($scopusPublications as $pub)
                        <li class="list-group-item">
                            <strong>{{ $pub['dc:title'] ?? 'Tanpa Judul' }}</strong>
                            <div><small>Penulis: {{ $pub['dc:creator'] ?? 'Tidak Diketahui' }}</small></div>
                            <div><small>Tahun: {{ \Carbon\Carbon::parse($pub['prism:coverDate'] ?? '')->format('Y') ?? 'Tanpa Tahun' }}</small></div>
                            <div><small>Sitasi: {{ $pub['citedby-count'] ?? 'N/A' }}</small></div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">Tidak ada publikasi dari Scopus.</p>
            @endif
        </div>

        {{-- GARUDA --}}
        <div class="tab-pane fade" id="garuda" role="tabpanel" aria-labelledby="garuda-tab">
            @if(!empty($garudaPublications) && is_array($garudaPublications))
                <ul class="list-group">
                    @foreach($garudaPublications as $pub)
                        <li class="list-group-item">
                            <strong>{{ $pub['title'] ?? 'Tanpa Judul' }}</strong>
                            <div><small>Penulis: {{ $pub['authors'] ?? 'Tidak Diketahui' }}</small></div>
                            <div><small>Tahun: {{ $pub['year'] ?? 'Tanpa Tahun' }}</small></div>
                            <div><small>Sitasi: N/A</small></div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">Tidak ada publikasi dari Garuda.</p>
            @endif
        </div>

        {{-- GOOGLE SCHOLAR --}}
        <div class="tab-pane fade" id="google" role="tabpanel" aria-labelledby="google-tab">
            @if(!empty($googleScholarPublications) && is_array($googleScholarPublications))
                <ul class="list-group">
                    @foreach($googleScholarPublications as $pub)
                        <li class="list-group-item">
                            <strong>{{ $pub['title'] ?? 'Tanpa Judul' }}</strong>
                            <div><small>Penulis: {{ $pub['authors'] ?? 'Tidak Diketahui' }}</small></div>
                            <div><small>Tahun: {{ $pub['year'] ?? 'Tanpa Tahun' }}</small></div>
                            <div><small>Sitasi: {{ $pub['cited_by']['value'] ?? 0 }} kali</small></div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">Tidak ada publikasi dari Google Scholar.</p>
            @endif
        </div>

    </div>
</div>
@endsection
