@extends('main')

@section('title' , 'Profil')

@section('breadcrumbs')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profil</div>

                <div class="card-body">
                    <div class="card-content">
                            <p>Nama akun: {{$users->name}}</p>
                            <p>Nama lengkap: {{$users->nama_lengkap}}</p>
                            <p>Email : {{$users->email}}</p>
                            <p>Peran : {{$users->role}}</p>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4"></div>
                        <div class="col-md-8 offset-md-4">
                            @can('isMaster')
                                <a class="btn btn-secondary" href="{{ route('profils.list') }}">Daftar Pengguna</a>
                            @endcan
                        </div>
                        <!--<div class="col-md-8 offset-md-4">
                            @if (Route::has('register'))
                                <a class="btn btn-secondary" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
