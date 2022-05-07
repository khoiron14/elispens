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
            <strong>Manajemen Riwayat Pendidikan</strong>
        </h1>
        <a href="{{ route('educations.create') }}" class="btn btn-sm btn-primary align-self-start">Tambah</a>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Manajemen</li>
            <li class="breadcrumb-item active" aria-current="page">
                Riwayat Pendidikan
            </li>
        </ol>
    </nav>
</div>
<div class="main-wrapper">
    <table id="table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Perguruan Tinggi</th>
                <th>Jenjang</th>
                <th>Gelar Akademik</th>
                <th>Tahun Ijazah</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($educations as $education)
            <tr>
                <td>{{ $education->college }}</td>
                <td>{{ $education->level }}</td>
                <td>{{ $education->degree }}</td>
                <td>{{ $education->year }}</td>
                <td class="d-flex">
                    <a class="btn btn-sm btn-secondary mr-1" href="{{ route('educations.edit', $education->id) }}">
                        Ubah
                    </a>
                    <form action="{{ route('educations.destroy', $education->id) }}" method="POST">
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
                <th>Perguruan Tinggi</th>
                <th>Jenjang</th>
                <th>Gelar Akademik</th>
                <th>Tahun Ijazah</th>
                <th>Opsi</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection