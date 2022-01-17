@extends('main')

@section('title' , 'Disposisi')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Tambah Disposisi</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                        	<li>
                        		<a href="#">Disposisi</a></li>
                            <li class="active"></li>
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
            				<strong></strong>
            			</div>
            			<div class="pull-right">
            				<a href="{{ url('suratmasuk') }}" class="btn btn-secondary btn-sm">
            					<i class="fa fa-undo"></i> Back
            				</a>
            			</div>            			
            		</div>
            		<div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ url('disposisi/add/'.$idsurat)}}" method="post" enctype="multipart/form-data">
                                    {{--<div class="form-group col-md-6">--}}                                       
                                    @csrf
                                    {{--<div class="form-group">
                                        <label>No.</label>
                                        <input type="text" name="name0" class="form-control" autofocus required>
                                    </div>--}}
                                    <div class="form-group">
                                        <label>Catatan Disposisi</label>
                                        <input type="text" class="form-control
                                        @error('catatan_disposisi') is invalid @enderror" 
                                        id="catatan_disposisi" name="catatan_disposisi" value="{{old('catatan_disposisi')}}" 
                                        autofocus required>
                                        @error('catatan_disposisi')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Verifikasi</label>
                                       <input type="date" class="form-control 
                                        @error('tanggal_verifikasi') is invalid @enderror" 
                                        id="tanggal_verifikasi" name="tanggal_verifikasi" value="{{old('tanggal_verifikasi')}}" 
                                        autofocus required>
                                        @error('tanggal_verifikasi')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="file">Lampiran</label>
                                        <input type="file" class="form-control
                                        @error('disposisi_lampiran') is invalid @enderror" 
                                        id="disposisi_lampiran" name="disposisi_lampiran" value="{{old('disposisi_lampiran')}}" 
                                        >
                                        @error('disposisi_lampiran')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" class=" 
                                        @error('verifikasi') is invalid @enderror" 
                                        id="verifikasi" name="verifikasi" value="Sudah" 
                                        autofocus>
                                        <label>Verifikasi</label> 
                                        @error('verifikasi')
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

        </div>

@endsection