@extends('index')

@section('title')
  Dashboard
@endsection

@section('extra-css')
    {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" /> --}}
@endsection

@section('content')
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
  border:0;
}
section.content {
    margin: 0px 15px 0 315px;
    -moz-transition: 0.5s;
    -o-transition: 0.5s;
    -webkit-transition: 0.5s;
    transition: 0.5s;
}
.btnbtn:hover {
  background: #fa172a;
  background-image: linear-gradient(to bottom, #1b374c, #223848);
  text-decoration: none;
}
</style>
 <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel panel-headline">
                    <div class="table-responsive" style="margin-left: 2%;">
              

              {{-- <div class="box-header with-border">
                <h2 class="box-title" style="color: #b92929; font-weight: bold">ADAUGA LUCRARI</h2>
                <hr>
              </div> --}}



<form method="POST" action="/service/update/{{$parent->id}}/{{$parent->Beneficiar->id}}">
  {{ csrf_field() }}

<input name="_method" type="hidden" value="PUT">

<div class="col-md-2" style="padding: 0">

<h4 style="font-weight: bold"> Selecteaza categorie beneficar</h4>

<select class="form-control" name='category'>
<?php if($parent->Beneficiar->category == 0){ ?>
     <option value='0'>Persoana fizica</option>
     <option value='1' >Persoana juridica</option>
     <?php } else{ ?>
     <option value='1'>Persoana juridica</option>
     <option value='0' >Persoana fizica</option>
    <?php  } ?>
</select>


<h4 style="font-weight: bold"> Selecteaza mecanic</h4>


<select class="form-control" name='mecanic_id' data-live-search="true">

  <option value="{{$parent->Mecanic->id}}">{{$parent->Mecanic->nume.' '. $parent->Mecanic->prenume}}</option>
@foreach($mecanic as $mecanics)
    <option value='{{ $mecanics->id }}'>{{$mecanics->nume .' '. $mecanics->prenume}}</option>
@endforeach
     </select>


</div>
<div class="col-md-10" style="margin-bottom: 30px;">
<h4 style="font-weight: bold; margin-left: 50px;">Adauga beneficiar</h4>

<div class="col-md-3" style="margin-left: 50px;">
<h5>Beneficiar</h5>
<input type="text" class="form-control" id="nume" name="nume" value="{{$parent->Beneficiar->nume}}">

<h5>Telefon</h5>
<input type="text" class="form-control" id="telefon" name="telefon" value="{{$parent->Beneficiar->telefon}}"></div>

<div class="col-md-3">
<h5>Model</h5>
<input type="text" class="form-control" id="model" name="model" value="{{$parent->Beneficiar->model}}" required>

<h5>Nr. masina</h5>
<input type="text" class="form-control" id="nr_masina" name="nr_masina" value="{{$parent->Beneficiar->nr_masina}}">
</div>

<div class="col-md-3">
<h5>KM</h5>
<input type="text" class="form-control" id="km" name="km" value="{{$parent->Beneficiar->km}}">






</div>

</div>

<hr>

     <table class="table" id="maintable">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Piese/Lucru</th>
      <th scope="col">Cantitatea</th>
      <th scope="col">Pretul</th>
      <th scope="col">Suma</th>
      <th scope="col">Pret Lucru</th>
      <th scope="col">Suma totala</th>
    </tr>
  </thead>
  <tbody>
    <?php 
  foreach ($parent->Service as $value) { ?>
    <tr>
      <td class="col-md-4"><input type="text" class="form-control" id="piese" name="piese[]" value="{{$value->piese}}" required></td>
      <td class="col-md-1"><input type="text" class="form-control cantitate" id="cantitate" name="cantitate[]" value="{{$value->cantitate}}" required></td>
      <td class="col-md-1"><input type="text" class="form-control"  name="pret[]" value="{{$value->pret}}" required></td>
      <td class="col-md-1"><input type="text" class="form-control suma"  name="suma[]" value="{{$value->suma}}" required></td>
      <td class="col-md-2"><input type="text" class="form-control pret_lucru"  name="pret_lucru[]" value="{{$value->pret_lucru}}" required></td>
      <td class="col-md-2"><input type="text" class="form-control suma_totala"  name="suma_totala[]" value="{{$value->suma_totala}}" required></td>
    </tr>
<?php  }
?>
  </tbody>
</table>

<?php $test=  DB::table('beneficiars')->orderBy('id', 'desc')->first(); ?>
<input type="hidden" name="beneficiar_id" value="{{ $test->id}}"> 


<input class="btnbtn" type="submit" value="Salveaza">
</form>

</div>
</div>
</div>
</div>
</div>






@endsection





@section('extra-script')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
  <script type="text/javascript">
    
    var seen = {};
$('option').each(function() {
    var txt = $(this).text();
    if (seen[txt])
        $(this).remove();
    else
        seen[txt] = true;
});

  </script>

     <!-- Duplicate TR rows  -->
    <script type="text/javascript">
      $(document).ready(function () {

        $("#add_new").click(function () {
          $("#maintable").each(function () {
            var count = $(".maintable__tr").length + 1;
            var tds = '<tr class="maintable__tr service-' + count + '">';
            jQuery.each($('tr:last td', this), function () {
              tds += '<td>' + $(this).html() + '</td>';
            });

            tds += '</tr>';

            if ($('tbody', this).length > 0) {
              $('tbody', this).append(tds);
            } else {
              $(this).append(tds);
            }
            recalculate(count);
          });
        });

        var $tbody = $("#maintable tbody")
        $("#delete").click(function () {
          var $last = $tbody.find('tr:last');
          if ($last.is(':first-child')) {

          } else {
            $last.remove();
          }
        });

        recalculate($(".maintable__tr").length);

        function recalculate(countOfTr) {
          for (var i = 1; i <= countOfTr; i++) {
            FieldCalculation(i);
          }
        }

        function FieldCalculation(i) {
          $(".service-" + i + " input[type=text]").keyup(function () {
            if ($(".service-" + i + " .cantitate").val() !== "" && $(".service-" + i + " .pret").val() !== "") {
              suma = parseInt($(".service-" + i + " .pret").val()) * parseInt($(".service-" + i + " .cantitate").val());
              $(".service-" + i + " .suma").val(suma);
              $(".service-" + i + " .suma").text = suma;
              if ($(".service-" + i + " .pret_lucru").val() !== "") {
                suma_totala = parseInt($(".service-" + i + " .suma").val()) + parseInt($(".service-" + i + " .pret_lucru").val());
                $(".service-" + i + " .suma_totala").val(suma_totala);
                $(".service-" + i + " .suma_totala").text = suma_totala;
              }
            }
          });
        }
      });


      /******************************************************************************************/


    </script>

    <!-- Validation form -->
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

      $('#cantitate').keypress(function (e) {
        var regex = new RegExp("^[0-9]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
          return true;
        }

        e.preventDefault();
        return false;
      });

      $('#pret').keypress(function (e) {
        var regex = new RegExp("^[0-9]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
          return true;
        }

        e.preventDefault();
        return false;
      });

      $('#suma').keypress(function (e) {
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

      $('#suma_totala').keypress(function (e) {
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
