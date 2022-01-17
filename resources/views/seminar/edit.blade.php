@extends('main')

@section('title' , 'Seminar')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Tambah Seminar</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                        	<li>
                        		<a href="#">Seminar</a></li>
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
            				<strong>Data Seminar</strong>
            			</div>
            			<div class="pull-right">
            				<a href="{{ url('seminars')}}" class="btn btn-secondary btn-sm">
            					<i class="fa fa-undo"></i> Back
            				</a>
            			</div>            			
            		</div>
            		<div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ url('seminars/'.$seminar->id)}}" method="post">
                                    @method('PUT')
                                    @csrf
                                    {{--<div class="form-group">
                                        <label>No.</label>
                                        <input type="text" name="name0" class="form-control" autofocus required>
                                    </div>--}}
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control
                                        @error('nama') is invalid @enderror" 
                                        id="nama" name="nama" value="{{old('nama')??$seminar->nama}}" 
                                        autofocus required>
                                        @error('nama')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Seminar</label>
                                        <input type="text" class="form-control
                                        @error('nama_pelatihan') is invalid @enderror" 
                                        id="nama_pelatihan" name="nama_pelatihan" value="{{old('nama_pelatihan')??$seminar->nama_pelatihan}}" 
                                        autofocus required>
                                        @error('nama_pelatihan')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat</label>
                                        <input type="text" class="form-control
                                        @error('tempat') is invalid @enderror" 
                                        id="tempat" name="tempat" value="{{old('tempat')??$seminar->tempat}}" 
                                        autofocus required>
                                        @error('tempat')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Waktu</label>
                                        <input type="date" class="form-control
                                        @error('waktu') is invalid @enderror" 
                                        id="waktu" name="waktu" value="{{old('waktu')??$seminar->waktu}}" 
                                        autofocus required>
                                        @error('waktu')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Penyelenggara</label>
                                        <input type="text" class="form-control
                                        @error('penyelenggara') is invalid @enderror" 
                                        id="penyelenggara" name="penyelenggara" value="{{old('penyelenggara')??$seminar->penyelenggara}}" 
                                        autofocus required>
                                        @error('penyelenggara')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun</label>
                                        <input type="text" class="form-control
                                        @error('tahun') is invalid @enderror" 
                                        id="tahun" name="tahun" value="{{old('tahun')??$seminar->tahun}}" 
                                        autofocus required>
                                        @error('tahun')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>LN/DN</label>
                                        <select type="text" class="form-control
                                        @error('ln_dn') is invalid @enderror" 
                                        id="ln_dn" name="ln_dn" autofocus required>
                                            <option value="LN" {{old('ln_dn') == 'LN' ? 'selected' : null}}>Luar Negeri</option>
                                            <option value="DN" {{old('ln_dn') == 'DN' ? 'selected' : null}}>Dalam Negeri</option>
                                        </select>
                                        @error('ln_dn')
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