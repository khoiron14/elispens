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
            <strong>Manajemen Course</strong>
        </h1>
        <a href="{{ route('courses.create') }}" class="btn btn-sm btn-primary align-self-start">Tambah</a>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Manajemen</li>
            <li class="breadcrumb-item active" aria-current="page">
                Course
            </li>
        </ol>
    </nav>
</div>
<div class="main-wrapper">
    <table id="table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Kode MK</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
            <tr>
                <td>{{ $course->code }}</td>
                <td>{{ $course->name }}</td>
                <td>
                    @if ($course->is_validated)
                    <span class="text-success">Divalidasi</span>
                    @else 
                    <form action="{{ route('courses.validation', $course->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-success">Validasi</button>
                    </form>
                    @endif
                </td>
                <td class="d-flex">
                    <a class="btn btn-sm btn-secondary mr-1" href="{{ route('courses.edit', $course->id) }}">
                        Ubah
                    </a>
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                            class="btn btn-sm btn-danger" 
                            onclick="return confirm('Apakah anda yakin ingin menghapus?')"
                            @if (auth()->course()->id == $course->id) disabled @endif
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
                <th>Kode MK</th>
                <th>Nama</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection