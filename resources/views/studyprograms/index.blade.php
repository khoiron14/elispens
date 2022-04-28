@extends('layouts.dashboard')

@push('head')
<link href="{{ asset('plugins/DataTables/datatables.min.css') }}" rel="stylesheet">  
@endpush

@push('script')
<script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
@endpush

@section('content')
<div class="page-info">
    <div class="d-flex justify-content-between">
        <h1>
            <strong>Manajemen Program Studi</strong>
        </h1>
        <a href="{{ route('studyprograms.create') }}" class="btn btn-sm btn-primary align-self-start">Tambah</a>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Manajemen</li>
            <li class="breadcrumb-item active" aria-current="page">
                Program Studi
            </li>
        </ol>
    </nav>
</div>
<div class="main-wrapper">
    <table id="table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($studyprograms as $studyprogram)
            <tr>
                <td>{{ $studyprogram->name }}</td>
                <td>
                    @if ($studyprogram->is_validated)
                    <span class="text-success">Divalidasi</span>
                    @else 
                    <form action="{{ route('studyprograms.validation', $studyprogram->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-success">Validasi</button>
                    </form>
                    @endif
                </td>
                <td class="d-flex">
                    <a class="btn btn-sm btn-secondary mr-1" href="{{ route('studyprograms.edit', $studyprogram->id) }}">
                        Ubah
                    </a>
                    <form action="{{ route('studyprograms.destroy', $programstudy->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                            class="btn btn-sm btn-danger" 
                            onclick="return confirm('Apakah anda yakin ingin menghapus?')"
                            @if (auth()->programstudy()->id == $programstudy->id) disabled @endif
                        >
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Nama</th>
                <th>Opsi</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection