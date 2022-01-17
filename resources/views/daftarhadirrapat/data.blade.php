@extends('main')

@section('title' , 'Daftar Hadir Rapat')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Daftar Hadir Rapat</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                        	<li>
                        		<a href="#">Daftar Hadir Rapat</a></li>
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
            				<strong>Data Daftar Hadir Rapat</strong>
            			</div>
            			<div class="pull-right">
            				<a href="{{ url('daftarhadirrapat/add')}}" class="btn btn-success">
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
	        				<th>Tanggal</th>
	        				<th>Pukul</th>
	        				<th>Tempat</th>
                            <th>Yang Hadir</th>
                            <!--<th>Editor terakhir</th>-->
                            <th>Aksi</th>
        				</tr>
        			</thead>
        			<tbody>
						@forelse ($hadirrapats as $key => $item)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$item->keterangan}}</td>
							<td>{{$item->tanggal}}</td>
							<td>{{$item->pukul}}</td>
							<td>{{$item->tempat}}</td>
							<td>{{$item->yang_hadir}}</td>
							{{--<td>{{$item->editor}}</td>--}}
							<td class="text-center">
								<a href="{{route('daftarhadirrapats.edit',['hadirrapat'=>$item->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
								<form action="{{ route('daftarhadirrapats.delete', ['hadirrapat'=>$item->id]) }}" 
									method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
									@method('DELETE')
									@csrf
								<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
								</form>
							</td>						
						</tr>
						@empty
                 			<td colspan="7" class="text-center"> Data kosong... </td>
                		@endforelse

        			</tbody>
        		</table>
				{{-- <div class="pull-left">
                    Menampilkan data {{ $hadirrapats->firstItem() }} sampai {{ $hadirrapats->lastItem() }}
                    dari {{ $hadirrapats->total() }} data
                </div>
                <div class="pull-right">
                    {{ $hadirrapats->links() }}
	        </div> --}}
	    </div>

            </div>

        </div>

@endsection