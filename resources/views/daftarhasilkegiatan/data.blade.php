@extends('main')

@section('title' , 'Daftar Hasil Kegiatan')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Daftar Hasil Kegiatan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                        	<li>
                        		<a href="#">Daftar Hasil Kegiatan</a></li>
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
            				<strong>Data Daftar Hasil Kegiatan</strong>
            			</div>
            			<div class="pull-right">
            				<a href="{{ url('daftarhasilkegiatan/add')}}" class="btn btn-success">
            					<i class="fa fa-plus"></i> Add
            				</a>
            			</div>            			
            		</div>
            		<div class="card-body table-responsive">
            			{{-- database --}}
            			<table id="table-datatables" class="table table-bordered text-center"> 
        			<thead class="text-center" bgcolor="azure">
        				<tr>
	        				<th>No.</th>
	        				<th>Keterangan</th>
	        				<th>Tempat</th>
	        				<th>Tanggal</th>
	        				<th>Ikut</th>
                            <th>Aksi</th>
        				</tr>
        			</thead>
        			<tbody>
						@forelse ($hasilkegiatans as $key => $item)
						<tr>
							<td>{{$loop->iteration}}</td>							
							<td>{{$item->keterangan}}</td>
							<td>{{$item->tempat}}</td>
							<td>{{$item->tanggal}}</td>
							<td>{{$item->ikut}}</td>
							<td class="text-center">
								<a href="{{route('daftarhasilkegiatans.edit',['hasilkegiatan'=>$item->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
								<form action="{{ route('daftarhasilkegiatans.delete', ['hasilkegiatan'=>$item->id]) }}" 
									method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
									@method('DELETE')
									@csrf
								<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
								</form>
							</td>
						</tr>
						@empty
                 			<td colspan="6" class="text-center"> Data kosong... </td>
                		@endforelse

        			</tbody>
        		</table>
				{{-- <div class="pull-left">
                    Menampilkan data {{ $hasilkegiatans->firstItem() }} sampai {{ $hasilkegiatans->lastItem() }}
                    dari {{ $hasilkegiatans->total() }} data
                </div>
                <div class="pull-right">
                    {{ $hasilkegiatans->links() }}
	        </div> --}}
	    </div>

            </div>

        </div>

@endsection