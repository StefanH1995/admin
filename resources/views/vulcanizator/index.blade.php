@extends('index')

@section('title')

@endsection

@section('extra-css')
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../bsbmd/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../bsbmd/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../bsbmd/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../bsbmd/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../bsbmd/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../bsbmd/css/themes/all-themes.css" rel="stylesheet" />
    <style type="text/css">
        .buttons-csv{
            display: none;
        }
        .buttons-copy{
            display: none;
        }
        .dt-buttons{
            display: none;
        }
    </style>
@endsection

@section('content')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Lista de vulcanizatori
                            </h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nume</th>
                                            <th>Raport Zilnic</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nume</th>
                                            <th>Raport Zilnic</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($vulcanizator as $vulcanizators)
                                        <tr>
                                            <td>{{$vulcanizators->id}}</td>
                                            <td>{{$vulcanizators->nume}}</td>
                                            <td><a href="/vulcanizator/raport-zilnic/{{$vulcanizators->id}}">Vezi Raportul</a></td>
                                        </tr>@endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@section('extra-script')
    <script src="../bsbmd/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../bsbmd/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../bsbmd/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../bsbmd/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../bsbmd/plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../bsbmd/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../bsbmd/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../bsbmd/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../bsbmd/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../bsbmd/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../bsbmd/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../bsbmd/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../bsbmd/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../bsbmd/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <!-- <script src="../bsbmd/js/admin.js"></script> -->
    <script src="../bsbmd/js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../bsbmd/js/demo.js"></script>
@endsection