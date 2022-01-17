@extends('main')

@section('title' , 'Surat Masuk')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Tambah Surat Masuk</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                        	<li>
                        		<a href="#">Surat Masuk</a></li>
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
            				<strong>Data Surat Masuk</strong>
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
                                <form action="{{ url('suratmasuk')}}" method="post" enctype="multipart/form-data">
                                    {{--<div class="form-group col-md-6">--}}                                       
                                    @csrf
                                    {{--<div class="form-group">
                                        <label>No.</label>
                                        <input type="text" name="name0" class="form-control" autofocus required>
                                    </div>--}}
                                    <div class="form-group">
                                        <label>Tanggal Terima</label>
                                        <input type="date" class="form-control
                                        @error('tanggal_diterima') is invalid @enderror" 
                                        id="tanggal_diterima" name="tanggal_diterima" value="{{old('tanggal_diterima')}}" 
                                        autofocus required>
                                        @error('tanggal_diterima')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor dan Tanggal Surat</label>
                                       <input type="text" class="form-control 
                                        @error('nomor_dan_tanggal') is invalid @enderror" 
                                        id="nomor_dan_tanggal" name="nomor_dan_tanggal" value="{{old('nomor_dan_tanggal')}}" 
                                        autofocus required>
                                        @error('nomor_dan_tanggal')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Surat</label>
                                       <input type="text" class="form-control 
                                        @error('jenis_surat') is invalid @enderror" 
                                        id="jenis_surat" name="jenis_surat" value="{{old('jenis_surat')}}" 
                                        autofocus required>
                                        @error('jenis_surat')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Ditujukan</label>
                                        <input type="text" class="form-control
                                        @error('ditujukan') is invalid @enderror" 
                                        id="ditujukan" name="ditujukan" value="{{old('ditujukan')}}" 
                                        autofocus required>
                                        @error('ditujukan')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Pengirim</label>
                                        <input type="text" class="form-control
                                        @error('pengirim') is invalid @enderror" 
                                        id="pengirim" name="pengirim" value="{{old('pengirim')}}" 
                                        autofocus required>
                                        @error('pengirim')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Hal</label>
                                        <input type="text" class="form-control
                                        @error('hal') is invalid @enderror" 
                                        id="hal" name="hal" value="{{old('hal')}}" 
                                        autofocus required>
                                        @error('hal')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="file">Lampiran</label>
                                        <input type="file" class="form-control
                                        @error('lampiran') is invalid @enderror" 
                                        id="lampiran" name="lampiran" value="{{old('lampiran')}}" 
                                        >
                                        @error('lampiran')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>                                    
                                    <div class="form-group">
                                        <label>Bidang dan PJ</label>
                                        <input type="text" class="form-control
                                        @error('bidang_dan_pj') is invalid @enderror" 
                                        id="bidang_dan_pj" name="bidang_dan_pj" value="{{old('bidang_dan_pj')}}" 
                                        autofocus required>
                                        @error('bidang_dan_pj')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                    <div class="form-group">
                                        <label>Penerima Surat/Via</label>
                                        <input type="text" class="form-control
                                        @error('penerima') is invalid @enderror" 
                                        id="penerima" name="penerima" value="{{old('penerima')}}" 
                                        autofocus required>
                                        @error('penerima')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Penyerahan Surat</label>
                                        <input type="text" class="form-control
                                        @error('penyerahan') is invalid @enderror" 
                                        id="penyerahan" name="penyerahan" value="{{old('penyerahan')}}" 
                                        autofocus required>
                                        @error('penyerahan')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tindak Lanjut Surat</label>
                                        <input type="text" class="form-control
                                        @error('tindak_lanjut') is invalid @enderror" 
                                        id="tindak_lanjut" name="tindak_lanjut" value="{{old('tindak_lanjut')}}" 
                                        autofocus required>
                                        @error('tindak_lanjut')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>                                    
                                    <div class="form-group">
                                        <label>Teruskan ke</label>
                                        <select class="form-control @error('teruskan') is invalid @enderror" 
                                            id="teruskan[]" name="teruskan[]" multiple autofocus>
                                                <option value="notforwarded@email.com">- Tidak diteruskan -</option>
                                                @foreach ($users as $item)
                                                    <option value="{{$item->email}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        <small>Tahan tombol ctrl untuk menambah lebih dari satu orang</small>
                                        @error('teruskan')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>                                    
                                    <div class="form-group">
                                        <label>Arsip</label>
                                        <input type="text" class="form-control
                                        @error('arsip') is invalid @enderror" 
                                        id="arsip" name="arsip" value="{{old('arsip')}}" 
                                        autofocus required>
                                        @error('arsip')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Note</label>
                                        <input type="text" class="form-control
                                        @error('note') is invalid @enderror" 
                                        id="note" name="note" value="{{old('note')}}" 
                                        autofocus required>
                                        @error('note')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Surat</label>
                                        <input type="text" class="form-control
                                        @error('kode_surat') is invalid @enderror" 
                                        id="kode_surat" name="kode_surat" value="{{old('kode_surat')}}" 
                                        autofocus required>
                                        @error('kode_surat')
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