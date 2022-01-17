@extends('main')

@section('title' , 'Workshop')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Workshop</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                        	<li>
                        		<a href="#">Workshop</a></li>
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
            				<strong>Data Workshop</strong>
            			</div>
            			<div class="pull-right">
            				<a href="{{ url('workshop/data')}}" class="btn btn-secondary btn-sm">
            					<i class="fa fa-undo"></i> Back
            				</a>
            			</div>            			
            		</div>
            		<div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ url('workshop/'.$workshop->id) }}" method="post">
                                    @method('patch')
                                    @csrf                                   
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $workshop->nama)}}" autofocus>
                                        @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Workshop</label>
                                        <input type="text" name="nama_pelatihan" class="form-control @error('nama_pelatihan') is-invalid @enderror" value="{{ old('nama_pelatihan', $workshop->nama_pelatihan)}}">
                                        @error('nama_pelatihan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat</label>
                                        <input type="text" name="tempat" class="form-control @error('tempat') is-invalid @enderror" value="{{ old('tempat', $workshop->tempat)}}" >
                                        @error('tempat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>                                
                                    <div class="form-group">
                                        <label>Waktu</label>
                                        <input type="date" name="waktu" class="form-control @error('waktu') is-invalid @enderror" value="{{ old('waktu', $workshop->waktu)}}">
                                        @error('waktu')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Penyelenggara</label>
                                        <input type="text" name="penyelenggara" class="form-control @error('penyelenggara') is-invalid @enderror" value="{{ old('penyelenggara', $workshop->penyelenggara)}}">
                                        @error('penyelenggara')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun</label>
                                        <input type="text" name="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun', $workshop->tahun)}}">
                                        @error('tahun')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>LN/DN</label>
                                        <select type="text" name="ln_dn" class="form-control @error('ln_dn') is-invalid @enderror" value="{{ old('ln_dn', $workshop->ln_dn)}}">
                                            <option value="LN">Luar Negeri</option>
                                            <option value="DN">Dalam Negeri</option>
                                        </select>
                                        @error('ln_dn')
                                        <div class="invalid-feedback">{{ $message }}</div>
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

@endsection