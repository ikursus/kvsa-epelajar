@extends('layouts.template-induk')

@section('isi-kandungan-utama-disini')
<h1 class="mt-4">Admin</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Senarai Admin</li>
</ol>

<div class="my-2">
    <a href="{{ route('admin.create') }}" class="btn btn-primary">
        Daftar Admin Baru
    </a>
</div>

@include('layouts.template-alerts')

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Senarai Admin
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAMA</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>STATUS</th>
                    <th>TINDAKAN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($senaraiAdmin as $admin)
                <tr>
                    <td>{{ $admin->id ?? 'N/A' }}</td>
                    <td>{{ $admin->name ?? 'N/A' }}</td>
                    <td>{{ $admin->email ?? 'N/A' }}</td>
                    <td>{{ $admin->phone ?? 'N/A' }}</td>
                    <td>{{ $admin->status ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('admin.edit', $admin->id ?? '1') }}" class="btn btn-primary">Kemaskini</a>

                        <form action="{{ route('admin.destroy', $admin->id ?? '1') }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button href="#" class="btn btn-danger" onclick="return confirm('Adakah anda pasti untuk delete {{ $admin->name }}?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
