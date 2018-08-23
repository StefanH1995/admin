@extends('index')

@section('title')
  Ghervas
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
    </style>
@endsection

@section('content')

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<div class="box-header with-border">
                <h3 class="box-title">Adauga vulcanizator</h3>
              </div>

<form method="POST" action="/vulcanizator/store">
  {{ csrf_field() }}
  <div class="col-md-12">
<table class="table" id="maintable">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nume</th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <td><input type="text" class="form-control" id="nume" name="nume" required></td>
    </tr>

    
    
  </tbody>
</table>
  </div>
<input class="btnbtn" type="submit" value="Salveaza">
</form>


<style type="text/css">
  .btnbtn {
  background: #3c8dbc;
  background-image: -webkit-linear-gradient(top, #3c8dbc, #2980b9);
  background-image: -moz-linear-gradient(top, #3c8dbc, #2980b9);
  background-image: -ms-linear-gradient(top, #3c8dbc, #2980b9);
  background-image: -o-linear-gradient(top, #3c8dbc, #2980b9);
  background-image: linear-gradient(to bottom, #3c8dbc, #2980b9);
  -webkit-border-radius: 9;
  -moz-border-radius: 9;
  border-radius: 9px;
  font-family: Arial;
  color: #ffffff;
  font-size: 16px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
  width: 11%;
  text-align: center;
  display: inline-block;
}

.btnbtn:hover {
  background: #fa172a;
  background-image: -webkit-linear-gradient(top, #fa172a, #d93434);
  background-image: -moz-linear-gradient(top, #fa172a, #d93434);
  background-image: -ms-linear-gradient(top, #fa172a, #d93434);
  background-image: -o-linear-gradient(top, #fa172a, #d93434);
  background-image: linear-gradient(to bottom, #fa172a, #d93434);
  text-decoration: none;
}

  section.content {
    margin: 50px 15px 0 315px;
  }
</style>

@endsection

@section('extra-script')
        {{Html::script('bsbmd/plugins/jquery-countto/jquery.countTo.js')}}
        {{Html::script('bsbmd/plugins/raphael/raphael.min.js')}}
        {{Html::script('bsbmd/plugins/morrisjs/morris.js')}}
        {{Html::script('bsbmd/plugins/chartjs/Chart.bundle.js')}}
        {{Html::script('bsbmd/plugins/flot-charts/jquery.flot.js')}}
        {{Html::script('bsbmd/plugins/flot-charts/jquery.flot.resize.js')}}
        {{Html::script('bsbmd/plugins/flot-charts/jquery.flot.pie.js')}}
        {{Html::script('bsbmd/plugins/flot-charts/jquery.flot.categories.js')}}
        {{Html::script('bsbmd/plugins/flot-charts/jquery.flot.time.js')}}
        {{Html::script('bsbmd/plugins/jquery-sparkline/jquery.sparkline.js')}}
        {{Html::script('bsbmd/js/pages/index.js')}}
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