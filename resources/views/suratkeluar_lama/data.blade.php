@extends('main')

@section('title' , 'Surat Keluar')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Surat Keluar</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                        	<li>
                        		<a href="#">Surat Keluar</a></li>
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
            				<strong>Data Surat Keluar</strong>
            			</div>
            			<div class="pull-right">
            				<a href="{{ url('suratkeluar/add')}}" class="btn btn-success">
            					<i class="fa fa-plus"></i> Add
            				</a>
            			</div>            			
            		</div>
            		<div class="card-body table-responsive">
            			{{-- database --}}
            			<table id="table-datatables" class="table table-bordered text-center" > 
        			<thead class="text-center" bgcolor="azure">
        				<tr>
	        				<th>No.</th>
                            <th>Tanggal Keluar</th>
                            <th>No & Tgl Surat</th>
                            <th>Jenis Surat(S/B/R)</th>
                            <th>Jawaban Surat Masuk</th>
                            <th>Ditujukan</th>
                            <th>Hal</th>
                            <th>Lampiran</th>
                            <th>Bidang & PJ</th>
                            <th>Pengetik</th>
                            <th>Tindak Lanjut Surat</th>
                            <th>Arsip</th>
                            <th>Note</th>
                            <th>Kode Surat</th>
                            <th>Aksi</th>
        				</tr>
        			</thead>
        			<tbody>
                        @forelse ($suratkeluars as $key => $item)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$item->tanggal_keluar}}</td>
							<td>{{$item->nomor_dan_tanggal}}</td>
							<td>{{$item->jenis_surat}}</td>
							<td>{{$item->jawaban}}</td>
							<td>{{$item->ditujukan}}</td>
							<td>{{$item->hal}}</td>
							<td><a href="{{asset('file/suratkeluar/'.$item->lampiran)}}" target="_blank" rel="noopener noreferrer"><i class="fa fa-file"></i></a></td>
							<td>{{$item->bidang_dan_pj}}</td>
							<td>{{$item->pengetik}}</td>
							<td>{{$item->tindak_lanjut}}</td>
							<td>{{$item->arsip}}</td>
							<td>{{$item->note}}</td>
							<td>{{$item->kode_surat}}</td>
							<td class="text-center">
								<a href="{{route('suratkeluars.edit',['suratkeluar'=>$item->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
								<form action="{{ route('suratkeluars.delete', ['suratkeluar'=>$item->id]) }}" 
									method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
									@method('DELETE')
									@csrf
								<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
								</form>
							</td>
						</tr>
						@empty
                 			<td colspan="15" class="text-center"> Data kosong... </td>
                		@endforelse						

        			</tbody>
        		</table>
				{{-- <div class="pull-left">
                    Menampilkan data {{ $suratkeluars->firstItem() }} sampai {{ $suratkeluars->lastItem() }}
                    dari {{ $suratkeluars->total() }} data
                </div>
                <div class="pull-right">
                    {{ $suratkeluars->links() }}
	        </div> --}}
	    </div>

            </div>

        </div>

@endsection