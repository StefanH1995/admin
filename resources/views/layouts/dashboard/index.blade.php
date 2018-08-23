@extends('index')

@section('title')
	Dashboard
@endsection

@section('extra-css')
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    {{-- <link href="../bsbmd/plugins/bootstrap/css/bootstrap.css" rel="stylesheet"> --}}

    <!-- Waves Effect Css -->
    {{-- <link href="../bsbmd/plugins/node-waves/waves.css" rel="stylesheet" /> --}}

    <!-- Animation Css -->
    {{-- <link href="../bsbmd/plugins/animate-css/animate.css" rel="stylesheet" /> --}}

    <!-- JQuery DataTable Css -->
    {{-- <link href="../bsbmd/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet"> --}}

    <!-- Custom Css -->
    {{-- <link href="../bsbmd/css/style.css" rel="stylesheet"> --}}

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    {{-- <link href="../bsbmd/css/themes/all-themes.css" rel="stylesheet" /> --}}
@endsection

@section('content')
	<div class="container-fluid">
            <div class="block-header">
                <h1 style="color:#215e8b">Selectati categoria pentru adaugarea unei inregistrari</h1>
            </div>
<br><br>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                   <a href="/service/create"> <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Serviciu</div>
                            
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                   <a href="reglarea/create"> <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">Reglarea Unghiului</div>
                            
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                   <a href="/vulcanizare/create"> <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">Vulcanizare</div>
                           
                        </div>
                    </div></a>
                </div>

            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            
        </div>
@endsection

@section('extra-script')
      
@endsection