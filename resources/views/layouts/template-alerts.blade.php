{{-- Paparkan validation rules --}}
@if ( $errors->any() )
    <div class="alert alert-danger">
        Terdapat masalah dengan validasi borang:
        <ul>
            @foreach ($errors->all() as $errorItem )
            <li>{{ $errorItem }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Paparkan flash message mesej berjaya --}}
@if ( session('mesej-berjaya') )
    <div class="alert alert-success">
        {{ session('mesej-berjaya') }}
    </div>
@endif
