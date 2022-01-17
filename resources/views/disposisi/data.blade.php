@extends('main')

@section('title' , 'Disposisi')



@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Disposisi</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li>
                                <a href="#">Disposisi</a></li>
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
                @if (session('pesan'))
                    <div class="alert alert-success">
                        {{ session('pesan') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <strong>Data Disposisi</strong>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('disposisi/'.$idsurat)}}" class="btn btn-success">
                                <i class="fa fa-plus"></i> Add
                            </a>
                            {{-- <a href="{{ url('lokakarya/print')}}" class="btn btn-primary">
                                <i class="fa fa-print"></i> Print
                            </a> --}}
                        </div>                      
                    </div>
                    <div class="card-body table-responsive">
                        {{-- database --}}
                        <table id="table-datatables" class="table table-bordered text-center"> 
                    <thead class="text-center" bgcolor="azure">
                        <tr>
                            <th>No.</th>
                            <th>Catatan Disposisi</th>
                            <th>Tanggal Disposisi</th>
                            <th>Lampiran</th>
                            <th>Verifikasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($disposisis as $key => $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->catatan_disposisi }}</td>
                                <td>{{ $item->tanggal_verifikasi }}</td>
                                <td><a href="{{asset('file/suratmasuk/disposisi/'.$item->disposisi_lampiran)}}" target="_blank" rel="noopener noreferrer"><i class="fa fa-file"></i></a></td>
                                <td>{{ $item->verifikasi }}</td>
                                <td class="text-center">
                                    <a href="{{ url('disposisi/'.$item->id.'/edit')}}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ url('disposisi/'.$item->id)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin Hapus Data')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>                                
                            </tr>                            
                            @empty                                
                 			    <td colspan="5" class="text-center"> Data kosong... </td>
                                <td class="text-center">
                                    <a href="{{ url('disposisi/'.$idsurat)}}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </td>
                        @endforelse
                    </tbody>
                </table>
                {{-- <div class="pull-left">
                    Menampilkan data {{ $lokakaryas->firstItem() }} sampai {{ $lokakaryas->lastItem() }}
                    dari {{ $lokakaryas->total() }} data
                </div>
                <div class="pull-right">
                    {{ $lokakaryas->links() }}
                </div> --}}
            </div>
        </div>

            </div>

        </div>

@endsection