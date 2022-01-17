@extends('main')

@section('title' , 'Pengguna')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Pengguna</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                        	<li>
                        		<a href="#">Pengguna</a></li>
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
            				<strong>Data Pengguna</strong>
            			</div>
            			<div class="pull-right">
            				<a href="{{ url('profil/add')}}" class="btn btn-success">
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
	        				<th>Nama</th>
							<th>Nama Lengkap</th>
	        				<th>Email</th>
	        				<th>Peran</th>
	        				<th>Aksi</th>
        				</tr>
        			</thead>
        			<tbody>
						@forelse ($users as $key => $item)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$item->name}}</td>
							<td>{{$item->nama_lengkap}}</td>
							<td>{{$item->email}}</td>
							<td>{{$item->role}}</td>
							<td class="text-center">
								<a href="{{route('profils.edit',['profil'=>$item->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
								<form action="{{ route('profils.delete', ['profil'=>$item->id]) }}" 
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
				{{--<div class="pull-left">
                    Menampilkan data {{ $users->firstItem() }} sampai {{ $users->lastItem() }}
                    dari {{ $users->total() }} data
                </div>
                <div class="pull-right">
                    {{ $users->links() }}
	        </div>--}}
	    </div>

            </div>

        </div>

@endsection