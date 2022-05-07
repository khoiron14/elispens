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
            <strong>Manajemen Riwayat Mengajar</strong>
        </h1>
        <a href="{{ route('teaches.create') }}" class="btn btn-sm btn-primary align-self-start">Tambah</a>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Manajemen</li>
            <li class="breadcrumb-item active" aria-current="page">
                Riwayat Mengajar
            </li>
        </ol>
    </nav>
</div>
<div class="main-wrapper">
    <table id="table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Semester</th>
                <th>Kode Mata Kuliah</th>
                <th>Mata Kuliah</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teaches as $teach)
            <tr>
                <td>{{ $teach->semesterName . ' ' . $teach->year }}</td>
                <td>{{ $teach->course->code }}</td>
                <td>{{ $teach->course->name }}</td>
                <td class="d-flex">
                    <a class="btn btn-sm btn-secondary mr-1" href="{{ route('teaches.edit', $teach->id) }}">
                        Ubah
                    </a>
                    <form action="{{ route('teaches.destroy', $teach->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                            class="btn btn-sm btn-danger" 
                            onclick="return confirm('Apakah anda yakin ingin menghapus?')"
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
                <th>Semester</th>
                <th>Kode Mata Kuliah</th>
                <th>Mata Kuliah</th>
                <th>Opsi</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection