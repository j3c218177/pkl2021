@extends('main')

@section('title' , 'Surat Masuk')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Surat Masuk</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                        	<li>
                        		<a href="#">Surat Masuk</a></li>
                            <li class="active">Data</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>		
@endsection

@section('content')
        <div class="content mt-3">
			
            <div class="animated fadeIn">
				@if (session()->has('pesan'))
					<div class="alert alert-success">
						{{session()->get('pesan')}}
					</div>
				@endif
            	<div class="card">
            		<div class="card-header">
            			<div class="pull-left">
            				<strong>Data Surat Masuk</strong>
            			</div>
            			<div class="pull-right">
            				<a href="{{ url('suratmasuk/add')}}" class="btn btn-success">
            					<i class="fa fa-plus"></i> Add
            				</a>
            			</div>            			
            		</div>
            		<div class="card-body table-responsive">
            			{{-- database --}}
            			<table id="table-datatables" class="table table-bordered text-center"> 
        			<thead class="text-center" bgcolor="azure" >
        				<tr>
	        				<th>No.</th>
	        				<th>Tanggal Terima</th>
	        				<th>No & Tgl Surat</th>
	        				<th>Jenis Surat(S/B/R)</th>
	        				<th>Pengirim</th>
	        				<th>Ditujukan</th>
	        				<th>Hal</th>
	        				<th>Lampiran</th>
	        				<th>Bidang & PJ</th>
	        				<th>Penerima Surat/Via</th>
	        				<th>Penyerahan Surat</th>
	        				<th>Tindak Lanjut Surat</th>
	        				<th>Arsip</th>
	        				<th>Note</th>
	        				<th>Kode Surat</th>
	        				<th>Aksi</th>
        				</tr>
        			</thead>
        			<tbody>
						@forelse ($suratmasuks as $key => $item)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$item->tanggal_diterima}}</td>
							<td>{{$item->nomor_dan_tanggal}}</td>
							<td>{{$item->jenis_surat}}</td>
							<td>{{$item->pengirim}}</td>
							<td>{{$item->ditujukan}}</td>
							<td>{{$item->hal}}</td>
							<td>
                                <a href="{{asset('file/suratmasuk/'.$item->lampiran)}}" target="_blank" rel="noopener noreferrer"><i class="fa fa-file"></i></a></td>                                
							<td>{{$item->bidang_dan_pj}}</td>
							<td>{{$item->penerima}}</td>
							<td>{{$item->penyerahan}}</td>
							<td>{{$item->tindak_lanjut}}</td>
							<td>{{$item->arsip}}</td>
							<td>{{$item->note}}</td>
							<td>{{$item->kode_surat}}</td>
							<td class="text-center">
								<a href="{{route('suratmasuks.edit',['suratmasuk'=>$item->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
								<form action="{{ route('suratmasuks.delete', ['suratmasuk'=>$item->id]) }}" 
									method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
									@method('DELETE')
									@csrf
								<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                <a href="{{ url('disposisi/view/'.$item->id)}}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-file"></i>
                                </a>
								</form>
							</td>
						</tr>
						@empty
                 			<td colspan="16" class="text-center"> Data kosong... </td>
                		@endforelse

        			</tbody>
        		</table>
				{{-- <div class="pull-left">
                    Menampilkan data {{ $suratmasuks->firstItem() }} sampai {{ $suratmasuks->lastItem() }}
                    dari {{ $suratmasuks->total() }} data
                </div>
                <div class="pull-right">
                    {{ $suratmasuks->links() }}
	        </div> --}}
	    </div>

            </div>

        </div>

@endsection