@extends('admin.layouts.app')

@section('title', 'Sejarah')

@section('content')
<div class="container">
    <h2>Sejarah</h2>

    @if ($history)
        <div class="mb-3">
            {!! $history->content !!}
        </div>
        <a href="{{ route('admin.history.edit', $history->id) }}" class="btn btn-warning">Edit</a>
    @else
        <a href="{{ route('admin.history.create') }}" class="btn btn-primary">Tambah Sejarah</a>
    @endif
</div>
@endsection
