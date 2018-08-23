@extends('index')

@section('title')
  Ghervas
@endsection

@section('extra-css')

@endsection

@section('content')

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<div class="box-header with-border">
  <h3 class="box-title">Adauga mecanic</h3>
</div>

<form method="POST" action="/mecanic/store">
  {{ csrf_field() }}
  <div class="col-md-12">
    <table class="table" id="maintable">
    <thead class="thead-dark">
        <tr>
          <th scope="col">Nume</th>
          <th scope="col">Prenume</th>
        </tr>
    </thead>
    <tbody>
        <tr>
          <td><input type="text" class="form-control" id="nume" name="nume" required></td>
          <td><input type="text" class="form-control" id="prenume" name="prenume" required></td>
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