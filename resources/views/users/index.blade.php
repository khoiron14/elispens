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
            <strong>Manajemen User</strong>
        </h1>
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary align-self-start">Tambah</a>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Manajemen</li>
            <li class="breadcrumb-item active" aria-current="page">
                User
            </li>
        </ol>
    </nav>
</div>
<div class="main-wrapper">
    <table id="table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Role</th>
                <th>Status</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->roleName }}</td>
                <td>
                    @if ($user->is_validated)
                    <span class="text-success">Divalidasi</span>
                    @else 
                    <form action="{{ route('users.validation', $user->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-success">Validasi</button>
                    </form>
                    @endif
                </td>
                <td class="d-flex">
                    <a class="btn btn-sm btn-secondary mr-1" href="{{ route('users.edit', $user->id) }}">
                        Ubah
                    </a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                            class="btn btn-sm btn-danger" 
                            onclick="return confirm('Apakah anda yakin ingin menghapus?')"
                            @if (auth()->user()->id == $user->id) disabled @endif
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
                <th>Role</th>
                <th>Status</th>
                <th>Opsi</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection