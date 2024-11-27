@extends('layouts.template-induk')

@section('isi-kandungan-utama-disini')
<h1 class="mt-4">Pelajar</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Senarai Pelajar</li>
</ol>

<div class="my-2">
    <a href="/pelajar/daftar" class="btn btn-primary">
        Daftar Pelajar Baru
    </a>
</div>

@include('layouts.template-alerts')

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Senarai Pelajar
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAMA</th>
                    <th>NO. KP</th>
                    <th>NO. PELAJAR</th>
                    <th>NO. TEL</th>
                    <th>EMAIL</th>
                    <th>KURSUS</th>
                    <th>TINDAKAN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($senaraiPelajar as $pelajar)
                <tr>
                    <td>{{ $pelajar->id }}</td>
                    <td>{{ $pelajar->nama }}</td>
                    <td>{{ $pelajar->no_kp }}</td>
                    <td>{{ $pelajar->no_pelajar }}</td>
                    <td>{{ $pelajar->phone }}</td>
                    <td>{{ $pelajar->email }}</td>
                    <td>{{ $pelajar->course }}</td>
                    <td>
                        <a href="/pelajar/{{ $pelajar->id }}/edit" class="btn btn-primary">Kemaskini</a>

                        <form action="pelajar/{{ $pelajar->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button href="#" class="btn btn-danger" onclick="return confirm('Adakah anda pasti untuk delete {{ $pelajar->nama }}?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
