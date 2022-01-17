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

            <div>
                <br>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="social-box facebook">
                    <i class="fa fa-envelope"></i>
                    <ul>
                        <li>
                            
                            <span>Surat Masuk</span>
                        </li>
                        <li>                          
                            <span>{{ $suratmasuks-> count() }}</span>                    
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
                            
                            <span>Surat Keluar</span>
                        </li>
                        <li>
                            
                            <span>{{ $suratkeluars-> count() }}</span>
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
                            
                            <span>Daftar Hasil Kegiatan</span>
                        </li>
                        <li>
                            
                            <span>{{ $hasilkegiatans-> count() }}</span>
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
                            
                            <span>Daftar Hadir Rapat</span>
                        </li>
                        <li>
                            
                            <span>{{ $hadirrapats-> count() }}</span>
                        </li>
                    </ul>
                </div>
            </div><!--/.col-->

            <div class="col-lg-3 col-md-6">
                <div class="social-box facebook">
                    <i class="fa fa-book"></i>
                    <ul>
                        <li>
                            
                            <span>Daftar Notulen Rapat</span>
                        </li>
                        <li>
                            
                            <span>{{ $notulenrapats-> count() }}</span>
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
                            
                            <span>Seminar</span>
                        </li>
                        <li>
                            
                            <span>{{ $seminars-> count() }}</span>
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
                            
                            <span>Workshop</span>
                        </li>
                        <li>                           
                            <span>{{ $workshops-> count() }}</span>
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
                            
                            <span>Lokakarya</span>
                        </li>
                        <li>
                            
                            <span>{{ $lokakaryas-> count() }}</span>
                        </li>
                    </ul>
                </div>
                <!--/social-box-->
            </div><!--/.col-->


@endsection