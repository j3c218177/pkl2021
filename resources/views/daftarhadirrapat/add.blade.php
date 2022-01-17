@extends('main')

@section('title' , 'Daftar Hadir Rapat')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Tambah Daftar Hadir Rapat</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                        	<li>
                        		<a href="#">Daftar Hadir Rapat</a></li>
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
            				<strong>Data Daftar Hadir Rapat</strong>
            			</div>
            			<div class="pull-right">
            				<a href="{{ url('daftarhadirrapat')}}" class="btn btn-secondary btn-sm">
            					<i class="fa fa-undo"></i> Back
            				</a>
            			</div>            			
            		</div>
            		<div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ url('daftarhadirrapat')}}" method="post">
                                    @csrf
                                    {{--<div class="form-group">
                                        <label>No.</label>
                                        <input type="text" name="name0" class="form-control" autofocus required>
                                    </div>--}}
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" class="form-control
                                        @error('keterangan') is invalid @enderror" 
                                        id="keterangan" name="keterangan" value="{{old('keterangan')}}" 
                                        autofocus required>
                                        @error('keterangan')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control
                                        @error('tanggal') is invalid @enderror" 
                                        id="tanggal" name="tanggal" value="{{old('tanggal')}}" 
                                        autofocus required>
                                        @error('tanggal')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Pukul</label>
                                        <input type="text" class="form-control
                                        @error('pukul') is invalid @enderror" 
                                        id="pukul" name="pukul" value="{{old('pukul')}}" 
                                        autofocus required>
                                        @error('pukul')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tempat</label>
                                        <input type="text" class="form-control
                                        @error('tempat') is invalid @enderror" 
                                        id="tempat" name="tempat" value="{{old('tempat')}}" 
                                        autofocus required>
                                        @error('tempat')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Yang Hadir</label>
                                        {{--<input type="text" class="form-control
                                        @error('yang_hadir') is invalid @enderror" 
                                        id="yang_hadir" name="yang_hadir" value="{{old('yang_hadir')}}" 
                                        autofocus required>--}}
                                        <select class="form-control @error('yang_hadir') is invalid @enderror" 
                                        id="yang_hadir[]" name="yang_hadir[]" multiple autofocus required>
                                            @foreach ($users as $item)
                                                <option value="{{$item->nama_lengkap}}">{{$item->nama_lengkap}}</option>
                                            @endforeach
                                        </select>
                                        <small>Tahan tombol ctrl untuk menambah lebih dari satu orang</small>
                                        @error('yang_hadir')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
	               </div>
	        </div>

            </div>

        </div>

@endsection