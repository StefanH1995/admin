@extends('index')

@section('title')
  Dashboard
@endsection

@section('extra-css')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
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

.btnbtn:hover {
  background: #fa172a;
  background-image: linear-gradient(to bottom, #1b374c, #223848);
  text-decoration: none;
}
</style>
  <div class="col-md-12">
              <div class="box-header with-border">
                <h2 class="box-title" style="color: #b92929; font-weight: bold">ADAUGA LUCRARI</h2>
                <hr>
              </div>





<form method="POST" action="/reglarea/update/{{$reglarea->id}}/{{$reglarea->Beneficiar->id}}">
  {{ csrf_field() }}

<input name="_method" type="hidden" value="PUT">

<div class="col-md-2" style="padding: 0">

<h4 style="font-weight: bold"> Selecteaza categorie beneficar</h4>

<select class="form-control show-tick selectpicker" name='category'>
<?php if($reglarea->Beneficiar->category == 0){ ?>
     <option value='0'>Persoana fizica</option>
     <option value='1' >Persoana juridica</option>
     <?php } else{ ?>
     <option value='1'>Persoana juridica</option>
     <option value='0' >Persoana fizica</option>
    <?php  } ?>
</select>


<h4 style="font-weight: bold"> Selecteaza mecanic</h4>


<select class="form-control show-tick selectpicker" name='mecanic_id' data-live-search="true">

	<option value="{{$reglarea->Reglarea_mecanic->id}}">{{$reglarea->Reglarea_mecanic->nume.' '. $reglarea->Reglarea_mecanic->prenume}}</option>
@foreach($reglareaMecanic as $mecanics)
    <option value='{{ $mecanics->id }}'>{{$mecanics->nume .' '. $mecanics->prenume}}</option>
@endforeach
     </select>


</div>
<div class="col-md-10" style="margin-bottom: 30px;">
<h4 style="font-weight: bold; margin-left: 50px;">Adauga beneficiar</h4>

<div class="col-md-3" style="margin-left: 50px;">
<h5>Beneficiar</h5>
<input type="text" class="form-control" id="nume" name="nume" value="{{$reglarea->Beneficiar->nume}}">

<h5>Telefon</h5>
<input type="text" class="form-control" id="telefon" name="telefon" value="{{$reglarea->Beneficiar->telefon}}"></div>

<div class="col-md-3">
<h5>Model</h5>
<input type="text" class="form-control" id="model" name="model" value="{{$reglarea->Beneficiar->model}}" required>

<h5>Nr. masina</h5>
<input type="text" class="form-control" id="nr_masina" name="nr_masina" value="{{$reglarea->Beneficiar->nr_masina}}">
</div>

<div class="col-md-3">
<h5>KM</h5>
<input type="text" class="form-control" id="km" name="km" value="{{$reglarea->Beneficiar->km}}">

<h5>Pret</h5>
<input type="text" class="form-control" id="pret_lucru" name="pret_lucru" value="{{$reglarea->pret_lucru}}">

</div>

</div>

<hr>

<?php $test=  DB::table('beneficiars')->orderBy('id', 'desc')->first(); ?>
<input type="hidden" name="beneficiar_id" value="{{ $test->id}}"> 


<input class="btnbtn" type="submit" value="Salveaza">
</form>
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
@endsection
