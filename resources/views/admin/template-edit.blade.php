@extends('layouts.template-induk')

@section('isi-kandungan-utama-disini')

<h1 class="mt-4">Admin</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Borang Kemaskini Admin</li>
</ol>

<form method="POST" action="">
    @csrf
    {{-- Letak kod pemberitahuan borang ini perlu menggunakan method jenis patch apabila dihantar ke laravel --}}
    <input type="hidden" name="_method" value="PATCH">
    @method('PATCH')

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Borang Kemaskini Admin
        </div>
        <div class="card-body">

            @include('layouts.template-alerts')

            <div class="row">
                <div class="col-md-12 mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Nama Admin" value="{{ old('name') ?? $admin->name }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Alamat Email Admin" value="{{ old('email') ?? $admin->email }}">
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" name="phone" class="form-control" placeholder="No. Telefon Admin" value="{{ old('phone') ?? $admin->phone }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="col-md-6 mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Pengesahan Password">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <select name="status" class="form-control">
                        <option value="">-- Pilih Status --</option>
                        @foreach (config('epelajar.general.user_status') as $key => $value)
                        <option value="{{ $key }}" {{ (old('status') ?? $admin->status) == $key ? 'selected' : NULL }}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Rekod</button>

        </div>
    </div>
</form>

@endsection
