@extends('index')

@section('title')

@endsection

@section('extra-css')
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="/bsbmd/plugins/node-waves/waves.css" rel="stylesheet"/>
    <link href="/bsbmd/plugins/animate-css/animate.css" rel="stylesheet"/>
    <link href="/bsbmd/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/bsbmd/css/themes/all-themes.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css"/>
    <style type="text/css">
        .buttons-csv {
            display: none;
        }

        .buttons-copy {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel panel-headline">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nume</th>
                        <th>Prenume</th>
                        <th>Raport Zilnic</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nume</th>
                        <th>Prenume</th>
                        <th>Raport Zilnic</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($mecanic as $mecanincs)
                    <tr>
                        <td>{{$mecanincs->id}}</td>
                        <td>{{$mecanincs->nume}}</td>
                        <td>{{$mecanincs->prenume}}</td>
                        <td>
                            <a href="/mecanic/raport-zilnic/{{$mecanincs->id}}">Vezi Raportul</a>
                        </td>
                    </tr>@endforeach
                </tbody>
            </table>
        </div>
    </div>
        </div>
    </div>
    </div>
</div>

@endsection

@section('extra-script')
<script src="../bsbmd/plugins/jquery/jquery.min.js"></script>
<script src="../bsbmd/plugins/bootstrap/js/bootstrap.js"></script>
<script src="../bsbmd/plugins/bootstrap-select/js/bootstrap-select.js"></script>
<script src="../bsbmd/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="../bsbmd/plugins/node-waves/waves.js"></script>
<script src="../bsbmd/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="../bsbmd/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="../bsbmd/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="../bsbmd/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="../bsbmd/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="../bsbmd/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="../bsbmd/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="../bsbmd/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="../bsbmd/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<script src="../bsbmd/js/pages/tables/jquery-datatable.js"></script>
<script src="../bsbmd/js/demo.js"></script>
@endsection