@extends('main')

@section('title' , 'Pengguna')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Tambah Pengguna</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                        	<li>
                        		<a href="#">Pengguna</a></li>
                            <li class="active">Add</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('content')
        <div class="content mt-3">

            <div class="animated fadeIn">
            	<div class="card">
            		<div class="card-header">
            			<div class="pull-left">
            				<strong>Data Pengguna</strong>
            			</div>
            			<div class="pull-right">
            				<a href="{{ url('profil/add')}}" class="btn btn-secondary btn-sm">
            					<i class="fa fa-undo"></i> Back
            				</a>
            			</div>            			
            		</div>
            		<div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ route('profils.update',['profil'=>$profil->id])}}" method="post">
                                    @method('PUT')
                                    @csrf
                                    {{--<div class="form-group">
                                        <label>No.</label>
                                        <input type="text" name="name0" class="form-control" autofocus required>
                                    </div>--}}
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control
                                        @error('name') is invalid @enderror" 
                                        id="name" name="name" value="{{old('name')??$profil->name}}" 
                                        autofocus required>
                                        @error('name')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control
                                        @error('nama_lengkap') is invalid @enderror" 
                                        id="nama_lengkap" name="nama_lengkap" value="{{old('nama_lengkap')??$profil->nama_lengkap}}" 
                                        autofocus required>
                                        @error('nama_lengkap')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control
                                        @error('email') is invalid @enderror" 
                                        id="email" name="email" value="{{old('email')??$profil->email}}" 
                                        autofocus required>
                                        @error('email')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control
                                        @error('password') is invalid @enderror" 
                                        id="password" name="password" value="{{old('password')}}" 
                                        autofocus required>
                                        @error('password')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Peran</label>
                                        <select id="role" name="role" class="form-control
                                        @error('role') is invalid @enderror" autofocus required>
                                            <option value="Master">Master</option>
                                            <option value="Pegawai">Pegawai sekretariat</option>
                                            <option value="Anggota">Anggota lainnya</option>
                                        </select>
                                        <!--<input type="text" class="form-control
                                        @error('role') is invalid @enderror" 
                                        id="role" name="role" value="{{old('role')??$profil->role}}" 
                                        autofocus required>-->
                                        @error('role')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
	               </div>
	        </div>

            </div>

        </div>

@endsection