@extends('index')

@section('title')
    Ghervas
@endsection

@section('extra-css')
    {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css"/> --}}
@endsection

@section('content')

 <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel panel-headline">
                    <div class="table-responsive" style="margin-left: 2%;">






        {{-- <div class="box-header with-border">
            <h2 class="box-title" style="color: #b92929; font-weight: bold; margin-top: 0">ADAUGA LUCRARI</h2>
            <hr style="margin-top: 10px; margin-bottom: 10px;">
        </div> --}}

        <!-- Form -->
        <form method="POST" action="/service/store">
        {{ csrf_field() }}

        <!-- Select category  -->
            <div class="col-md-2" style="padding: 0">
                <h4 style="font-weight: bold"> Selecteaza categorie</h4>
                <select class="form-control" name='category'>
                    <option value='0'>Persoana fizica</option>
                    <option value='1'>Persoana juridica</option>
                </select>

                <!-- Select mecanic -->
                <h4 style="font-weight: bold"> Selecteaza mecanic</h4>
                <select class="form-control" name='mecanic_id' data-live-search="true">
                    @foreach($mecanic as $mecanics)
                        <option value='{{ $mecanics->id }}'>{{ $mecanics->nume ." " .$mecanics->prenume  }}</option>
                    @endforeach
                    <select>
            </div>

            <!-- Add benefeciar  -->
            <div class="col-md-10" style="margin-bottom: 30px;">
                <h4 style="font-weight: bold; margin-left: 50px;">Adauga beneficiar</h4>

                <div class="col-md-4" style="margin-left: 50px;">
                    <h5>Beneficiar</h5>
                    <select class="form-control show-tick selectpicker" id="state" name='nume' data-live-search="true">
                        @foreach($beneficiar as $beneficiars)
                            @if($beneficiars->category == '1')
                                <option value="{{ $beneficiars->nume}}">{{ $beneficiars->nume}}</option>
                            @endif
                        @endforeach
                    </select>

                    <h5>Telefon</h5>
                    <input type="text" class="form-control" id="telefon" name="telefon">
                </div>

                <div class="col-md-4">
                    <h5>Model</h5>
                    <input type="text" class="form-control" id="model" name="model" required>

                    <h5>Nr. masina</h5>
                    <input type="text" class="form-control" id="nr_masina" name="nr_masina"
                           style="text-transform: uppercase;" required>
                </div>

                <div class="col-md-2">
                    <h5>KM</h5>
                    <input type="text" class="form-control" id="km" name="km" required>
                </div>
            </div>

            <hr>

            <!-- Add and delete buton for service form  -->
            <input id="add_new" class="btnbtn" type="button" value="Adauga"/>
            <input id="delete" class="btnbtn" style="background-image: linear-gradient(to bottom, #ab3636, #ab3636);"
                   type="button" value="Sterge"/>

            <!-- Table form -->
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
                <tr class="maintable__tr service-1">
                    <td class="col-md-4"><input type="text" class="form-control" id="piese" name="piese[]" required>
                    </td>
                    <td class="col-md-1"><input type="text" class="form-control cantitate" id="cantitate"
                                                name="cantitate[]" required></td>
                    <td class="col-md-1"><input type="text" class="form-control pret" name="pret[]" id="pret" required>
                    </td>
                    <td class="col-md-1"><input type="text" class="form-control suma" name="suma[]" id="suma" required>
                    </td>
                    <td class="col-md-2"><input type="text" class="form-control pret_lucru" name="pret_lucru[]"
                                                id="pret_lucru" required></td>
                    <td class="col-md-2"><input type="text" class="form-control suma_totala" name="suma_totala[]"
                                                id="suma_totala" required></td>
                </tr>
                </tbody>
            </table>

            <!-- Create new beneficiar -->
          <?php $test = DB::table('beneficiars')->orderBy('id', 'desc')->first(); ?>
            <input type="hidden" name="beneficiar_id" value="{{ $test->id + 1 }}">
            <input class="btnbtn" type="submit" value="Salveaza">
        </form>
    



</div>
</div>
</div>
</div>
</div>



























    <!-- Style -->
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
            border: 0;
        }

        .btnbtn:hover {
            background: #fa172a;
            background-image: linear-gradient(to bottom, #1b374c, #223848);
            text-decoration: none;
        }

        #delete:hover {
            background-image: linear-gradient(to bottom, #e2150a, #e2150a) !important;
        }

        h5 {
            font-weight: bold;
        }

        hr {
            border: 2px solid #eee;
        }

        .tbl td {
            padding: 5px;
        }

        section.content {
            margin: 100px 15px 0 315px;
        }

        .navbar {
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

    <!-- Scripts -->
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

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
@endsection

@section('extra-script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.js"></script>
    <script type="text/javascript">

      $(document).ready(function () {
        $("#state").select2({
          tags: true
        });

        $("#btn-add-state").on("click", function () {
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