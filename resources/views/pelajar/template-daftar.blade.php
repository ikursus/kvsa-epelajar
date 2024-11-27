@extends('layouts.template-induk')

@section('isi-kandungan-utama-disini')

<h1 class="mt-4">Pelajar</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Pendaftaran Pelajar Baru</li>
</ol>

<form method="POST" action="">
    @csrf
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Borang Pendaftaran Pelajar Baru
        </div>
        <div class="card-body">

            @include('layouts.template-alerts')

            <div class="row">
                <div class="col-md-12 mb-3">
                    <input type="text" name="nama" class="form-control" placeholder="Nama Pelajar" value="{{ old('nama') }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="text" name="no_kp" class="form-control" placeholder="No. Kad Pengenalan Pelajar" value="{{ old('no_kp') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" name="no_pelajar" class="form-control" placeholder="No. Pelajar" value="{{ old('no_pelajar') }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Alamat Email Pelajar" value="{{ old('email') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" name="phone" class="form-control" placeholder="No. Telefon Pelajar" value="{{ old('phone') }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <textarea name="alamat" class="form-control" placeholder="Alamat Surat Menyurat Pelajar">{{ old('alamat') }}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="text" name="course" class="form-control" placeholder="Kursus Pelajar" value="{{ old('course') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <select name="status" class="form-control">
                        <option value="">-- Pilih Status --</option>
                        @foreach (config('epelajar.general.user_status') as $key => $value)
                        <option value="{{ $key }}" {{ old('status') == $key ? 'selected' : NULL }}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Rekod</button>

        </div>
    </div>
</form>

@endsection
