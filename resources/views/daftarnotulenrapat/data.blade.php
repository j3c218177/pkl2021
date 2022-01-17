@extends('main')

@section('title' , 'Daftar Notulen Rapat')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Daftar Notulen Rapat</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                        	<li>
                        		<a href="#">Daftar Notulen Rapat</a></li>
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
            				<strong>Data Daftar Notulen Rapat</strong>
            			</div>
            			<div class="pull-right">
            				<a href="{{ url('daftarnotulenrapat/add')}}" class="btn btn-success">
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
	        				<th>Tanggal</th>
	        				<th>Tempat</th>
	        				<th>Agenda</th>
							<th>File Notulen</th>
                            <th>Aksi</th>
        				</tr>
        			</thead>
        			<tbody>
						@forelse ($notulenrapats as $key => $item)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$item->tanggal}}</td>
							<td>{{$item->tempat}}</td>
							<td>{{$item->agenda}}</td>
							<td><a href="{{asset('file/notulenrapat/'.$item->file_notulen)}}" target="_blank" rel="noopener noreferrer"><i class="fa fa-file"></i></a></td>
							<td class="text-center">
								<a href="{{route('daftarnotulenrapats.edit',['notulenrapat'=>$item->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
								<form action="{{ route('daftarnotulenrapats.delete', ['notulenrapat'=>$item->id]) }}" 
									method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
									@method('DELETE')
									@csrf
								<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
								</form>
							</td>
						</tr>
						@empty
                 			<td colspan="5" class="text-center"> Data kosong... </td>
                		@endforelse
        			</tbody>
        		</table>
				{{-- <div class="pull-left">
                    Menampilkan data {{ $notulenrapats->firstItem() }} sampai {{ $notulenrapats->lastItem() }}
                    dari {{ $notulenrapats->total() }} data
                </div>
                <div class="pull-right">
                    {{ $notulenrapats->links() }}
	        </div> --}}
	    </div>

            </div>

        </div>

@endsection