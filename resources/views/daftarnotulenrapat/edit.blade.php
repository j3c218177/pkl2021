@extends('main')

@section('title' , 'Daftar Notulen Rapat')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Tambah Daftar Notulen Rapat</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                        	<li>
                        		<a href="#">Daftar Notulen Rapat</a></li>
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
            				<strong>Data Daftar Notulen Rapat</strong>
            			</div>
            			<div class="pull-right">
            				<a href="{{ url('daftarnotulenrapat')}}" class="btn btn-secondary btn-sm">
            					<i class="fa fa-undo"></i> Back
            				</a>
            			</div>            			
            		</div>
            		<div class="card-body">

                        <div class="row">
                            <div class="col-md-4 offset-md-4">
                                <form action="{{ route('daftarnotulenrapats.update',['notulenrapat'=>$notulenrapat->id])}}" method="post" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    {{--<div class="form-group">
                                        <label>No.</label>
                                        <input type="text" class="form-control
                                        @error('idNotulenRapat') is invalid @enderror" 
                                        id="idNotulenRapat" name="idNotulenRapat" value="{{old('idNotulenRapat')}}" 
                                        autofocus required>
                                        @error('idNotulenRapat')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>--}}
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control
                                        @error('tanggal') is invalid @enderror" 
                                        id="tanggal" name="tanggal" value="{{old('tanggal')??$notulenrapat->tanggal}}" 
                                        autofocus required>
                                        @error('tanggal')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat</label>
                                        <input type="text" class="form-control
                                        @error('tempat') is invalid @enderror" 
                                        id="tempat" name="tempat" value="{{old('tempat')??$notulenrapat->tempat}}" 
                                        autofocus required>
                                        @error('tempat')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Agenda</label>
                                        <input type="text" class="form-control
                                        @error('agenda') is invalid @enderror" 
                                        id="agenda" name="agenda" value="{{old('agenda')??$notulenrapat->agenda}}" 
                                        autofocus required>
                                        @error('agenda')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>File Notulen</label>
                                        <input type="file" class="form-control
                                        @error('file_notulen') is invalid @enderror" 
                                        id="file_notulen" name="file_notulen" value="{{$notulenrapat->file_notulen}}" 
                                        >
                                        @error('file_notulen')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </form>
                            </div>
                        </div>
	               </div>
	        </div>

            </div>

        </div>

@endsection