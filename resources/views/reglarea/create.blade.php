@extends('index')

@section('title')
  Dashboard
@endsection

@section('extra-css')
{{--     <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" /> --}}
@endsection

@section('content')


<!-- general form elements -->
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel panel-headline">
                    <div class="table-responsive"  style="margin-left: 2%;">

              {{-- <div class="box-header with-border">
                <h2 class="box-title" style="color: #b92929; font-weight: bold">ADAUGA LUCRARI</h2>
                <hr>
              </div>
 --}}




<form method="POST" action="/reglarea/store">
  {{ csrf_field() }}


<div class="col-md-2" style="padding: 0">

<h4 style="font-weight: bold"> Selecteaza categorie beneficar</h4>

<select class="form-control" name='category'>
     <option value='0'>Persoana fizica</option>
     <option value='1'>Persoana juridica</option>
</select>


<h4 style="font-weight: bold"> Selecteaza mecanic</h4>

<select class="form-control" name='mecanic_id' data-live-search="true">
@foreach($reglareaMecanic as $mecanics)
     <option value='{{ $mecanics->id }}'>{{ $mecanics->nume ." " .$mecanics->prenume  }}</option>
@endforeach
     </select>


</div>
<div class="col-md-10" style="margin-bottom: 30px;">
<h4 style="font-weight: bold; margin-left: 50px;">Adauga beneficiar</h4>

<div class="col-md-4" style="margin-left: 50px;">
<h5>Beneficiar</h5>
<!-- <input type="text" class="form-control" id="nume" name="nume" required> -->
 <select class="form-control show-tick selectpicker" id="state" name='nume' data-live-search="true">
            @foreach($beneficiar as $beneficiars)
              @if($beneficiars->category == '1')
                <option value="{{ $beneficiars->nume}}">{{ $beneficiars->nume}}</option>
              @endif
            @endforeach
          </select>


<h5>Telefon</h5>
<input type="text" class="form-control" id="telefon" name="telefon" required></div>

<div class="col-md-3">
<h5>Model</h5>
<input type="text" class="form-control" id="model" name="model" required>

<h5>Nr. masina</h5>
<input type="text" class="form-control" id="nr_masina" name="nr_masina" required>
</div>

<div class="col-md-3">
<h5>KM</h5>
<input type="text" class="form-control" id="km" name="km" required>

<h5>Pret</h5>
<input type="text" class="form-control" id="pret_lucru" name="pret_lucru" required>

</div>

</div>

<hr>

<?php $test=  DB::table('beneficiars')->orderBy('id', 'desc')->first(); ?>
<input type="hidden" name="beneficiar_id" value="{{ $test->id + 1 }}">


<input class="btnbtn" type="submit" value="Salveaza">
</form>
  </div>
  </div>
  </div>
  </div>
  </div>


<style type="text/css">
body{
  background-color: #FFF;
}
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

h5{
  font-weight: bold;
}

hr{
  border: 2px solid #eee;
}

  .tbl td{
    padding: 5px;
  }

  section.content {
    margin: 100px 15px 0 315px;
  }

.navbar{
  position: fixed;
}

/*******************************************************/
  ul#select2-state-results {
            background-color: #3184ba;
            padding: 12px;
        }

        .select2-results__option {
            color: white;
            list-style: none;
            font-weight: bold;
        }

        .select2-results__option:hover {
            color: #020202;
            background-color: #eae1e1;
        }

        .btn-group.bootstrap-select.form-control.show-tick.select2-hidden-accessible {
            display: none;
        }

        .select2-search__fieldP {
            display: block !important;
        }

        span.select2.select2-container.select2-container--default.select2-container {
            border: 1px solid #ccc;
            border-radius: 4px;
            height: 34px;
            display: inline-block;
            width: 219px !important;
        }

        span.selection {
            margin-top: 6px;
            display: inline-block;
            margin-left: 13px;
            width: 174px;
        }

        span.select2-selection.select2-selection--single {
            display: inline-block;
            width: 204px;
            height: 26px;
            outline: none;
        }

</style>

              

@endsection

@section('extra-script')

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.js"></script>
  <script type="text/javascript">
  <script type="text/javascript">
 $('#nr_masina').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});
</script>
<script type="text/javascript">

    $(document).ready(function() {
    $("#state").select2({
      tags: true
    });
      
    $("#btn-add-state").on("click", function(){
      var newStateVal = $("#new-state").val();
      // Set the value, creating a new option if necessary
      if ($("#state").find("option[value='" + newStateVal + "']").length) {
        $("#state").val(newStateVal).trigger("change");
      } else { 
        // Create the DOM option that is pre-selected by default
        var newState = new Option(newStateVal, newStateVal, true, true);
        // Append it to the select
        $("#state").append(newState).trigger('change');
      } 
    });  
});
  </script>
<script type="text/javascript">
 $('#telefon').keypress(function (e) {
    var regex = new RegExp("^[0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});

 $('#km').keypress(function (e) {
    var regex = new RegExp("^[0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});

  $('#pret_lucru').keypress(function (e) {
    var regex = new RegExp("^[0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});

</script>
@endsection

