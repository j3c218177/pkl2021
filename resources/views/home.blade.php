@extends('main')

@section('title' , 'Dashboard')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><i class="fa fa-dashboard"></i></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('content')
        {{-- <!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head> --}}
{{-- <body> --}}

            {{-- <div>
                <br>
            </div> --}}
            
            <div class="col-lg-3 col-md-6">
                <div class="social-box facebook">
                    <i class="fa fa-envelope"></i>
                    <ul>
                        <li>                            
                            <a href="{{url('suratmasuk')}}">Surat Masuk</a>
                        </li>
                        <li>                          
                            @if ($suratmasuks-> count() < 1000)
                            <a href="{{url('suratmasuk')}}">{{ $suratmasuks-> count() }}</a>
                            @else  
                            <a href="{{url('suratmasuk')}}">999+</a>  
                            @endif
                        </li>
                    </ul>
                </div>
                <!--/social-box-->
            </div><!--/.col-->


            <div class="col-lg-3 col-md-6">
                <div class="social-box twitter">
                    <i class="fa fa-envelope-open"></i>
                    <ul>
                        <li>                            
                            <a href="{{url('suratkeluar')}}">Surat Keluar</a>
                        </li>
                        <li>                            
                            @if ($suratkeluars-> count() < 1000)
                            <a href="{{url('suratkeluar')}}">{{ $suratkeluars-> count() }}</a>
                            @else  
                            <a href="{{url('suratkeluar')}}">999+</a> 
                            @endif 
                        </li>
                    </ul>
                </div>
                <!--/social-box-->
            </div><!--/.col-->


            <div class="col-lg-3 col-md-6">
                <div class="social-box linkedin">
                    <i class="fa fa-list-ul"></i>
                    <ul>
                        <li>                            
                            <a href="{{url('daftarhasilkegiatan')}}">Kegiatan</a>
                        </li>
                        <li>                            
                            @if ($hasilkegiatans-> count() < 1000)
                            <a href="{{url('daftarhasilkegiatan')}}">{{ $hasilkegiatans-> count() }}</a>
                            @else  
                            <a href="{{url('daftarhasilkegiatan')}}">999+</a> 
                            @endif
                        </li>
                    </ul>
                </div>
                <!--/social-box-->
            </div><!--/.col-->


            <div class="col-lg-3 col-md-6">
                <div class="social-box google-plus">
                    <i class="fa fa-file-text-o"></i>
                    <ul>
                        <li>                           
                            <a href="{{url('daftarhadirrapat')}}">Hadir Rapat</a>
                        </li>
                        <li>                           
                            @if ($hadirrapats-> count() < 1000)
                            <a href="{{url('daftarhadirrapat')}}">{{ $hadirrapats-> count() }}</a>
                            @else  
                            <a href="{{url('daftarhadirrapat')}}">999+</a> 
                            @endif 
                        </li>
                    </ul>
                </div>
                
            </div><!--/.col-->
            
            
            
            <div class="col-lg-3 col-md-6">
                <div class="social-box facebook">
                    <i class="fa fa-book"></i>
                    <ul>
                        <li>                            
                            <a href="{{url('daftarnotulenrapat')}}">Notulen</a>
                        </li>
                        <li>                            
                            @if ($notulenrapats-> count() < 1000)
                            <a href="{{url('daftarnotulenrapat')}}">{{ $notulenrapats-> count() }}</a>
                            @else  
                            <a href="{{url('daftarnotulenrapat')}}">999+</a> 
                            @endif
                        </li>
                    </ul>
                </div>
                <!--/social-box-->
            </div><!--/.col-->


            <div class="col-lg-3 col-md-6">
                <div class="social-box twitter">
                    <i class="fa fa-group"></i>
                    <ul>
                        <li>                            
                            <a href="{{url('seminars')}}">Seminar</a>
                        </li>
                        <li>                            
                            @if ($seminars-> count() < 1000)
                            <a href="{{url('seminar')}}">{{ $seminars-> count() }}</a>
                            @else  
                            <a href="{{url('seminar')}}">999+</a> 
                            @endif
                        </li>
                    </ul>
                </div>
                <!--/social-box-->
            </div><!--/.col-->


            <div class="col-lg-3 col-md-6">
                <div class="social-box linkedin">
                    <i class="fa fa-group"></i>                  
                    <ul>
                        <li>                            
                            <a href="{{url('workshop')}}">Workshop</a>
                        </li>
                        <li>                           
                            @if ($workshops-> count() < 1000)
                            <a href="{{url('workshop')}}">{{ $workshops-> count() }}</a>
                            @else  
                            <a href="{{url('workshop')}}">999+</a> 
                            @endif
                        </li>
                    </ul>                   
                </div>
                <!--/social-box-->
            </div><!--/.col-->


            <div class="col-lg-3 col-md-6">
                <div class="social-box google-plus">
                    <i class="fa fa-group"></i>
                    <ul>
                        <li>                            
                            <a href="{{url('lokakarya')}}">Lokakarya</a>
                        </li>
                        <li>                           
                            @if ($lokakaryas-> count() < 1000)
                            <a href="{{url('lokakarya')}}">{{ $lokakaryas-> count() }}</a>
                            @else  
                            <a href="{{url('lokakarya')}}">999+</a> 
                            @endif 
                        </li>
                    </ul>
                </div>
                <!--/social-box-->
            </div><!--/.col-->
      


@endsection


                            