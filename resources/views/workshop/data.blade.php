@extends('main')

@section('title' , 'Workshop')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Workshop</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                        	<li>
                        		<a href="#">Workshop</a></li>
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
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            	<div class="card">
            		<div class="card-header">
            			<div class="pull-left">
            				<strong>Data Workshop</strong>
            			</div>
            			<div class="pull-right">
            				<a href="{{ url('workshop/add')}}" class="btn btn-success">
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
                            <th>Nama Workshop</th>
                            <th>Tempat</th>
                            <th>Waktu</th>
                            <th>Penyelenggara</th>
                            <th>Tahun</th>
                            <th>LN/DN</th>
                            <th>Aksi</th>
        				</tr>
        			</thead>
        			<tbody>

        				@forelse ($workshops as $key => $item)
        					<tr>
        						<td>{{ $loop->iteration }}</td>
        						<td>{{ $item->nama }}</td>
        						<td>{{ $item->nama_pelatihan }}</td>
        						<td>{{ $item->tempat }}</td>
                                <td>{{ $item->waktu }}</td>
                                <td>{{ $item->penyelenggara }}</td>
                                <td>{{ $item->tahun }}</td>
                                <td>{{ $item->ln_dn }}</td>
        						<td class="text-center">
        							<a href="{{ url('workshop/edit/'.$item->id)}}" class="btn btn-primary btn-sm">
        								<i class="fa fa-pencil"></i>
        							</a>
                                    <form action="{{ url('workshop/'.$item->id)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin Hapus Data')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
        						</td>
        					</tr>
                            @empty
                                 <td colspan="9" class="text-center"> Data kosong... </td>
        				@endforelse
        			</tbody>
        		</table>
                {{-- <div class="pull-left">
                    Menampilkan data {{ $workshops->firstItem() }} sampai {{ $workshops->lastItem() }}
                    dari {{ $workshops->total() }} data
                </div>
                <div class="pull-right">
                    {{ $workshops->links() }}
	        </div> --}}
	    </div>

            </div>

        </div>

@endsection