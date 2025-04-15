@extends('admin.layouts.app')
@section('title', 'Visi dan Misi')

@section('content')
<div class="container">
    <h2>Visi & Misi</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($isEdit)
        <form action="{{ route('admin.visimisi.upsert') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="visi" class="form-label">Visi</label>
                <textarea name="visi" class="form-control ckeditor" rows="5">{{ old('visi', $visi?->content) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="misi" class="form-label">Misi</label>
                <textarea name="misi" class="form-control ckeditor" rows="5">{{ old('misi', $misi?->content) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.visimisi.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    @else
        <div class="mb-4">
            <h4><strong>Visi:</strong></h4>
            <div>{!! $visi?->content ?? '<em>Belum ada visi</em>' !!}</div>
        </div>

        <div class="mb-4">
            <h4><strong>Misi:</strong></h4>
            <div>{!! $misi?->content ?? '<em>Belum ada misi</em>' !!}</div>
        </div>

        <a href="{{ route('admin.visimisi.index', ['edit' => 1]) }}" class="btn btn-warning">Edit</a>
    @endif
</div>
@endsection

@push('scripts')
@if($isEdit)
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replaceAll('ckeditor');
</script>

@endif

