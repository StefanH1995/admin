@extends('index')

@section('title')
  Dashboard
@endsection

@section('extra-css')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
@endsection

@section('content')



          <!-- general form elements -->
  <div class="col-md-12">
              <div class="box-header with-border">
                <h2 class="box-title" style="color: #b92929; font-weight: bold">ADAUGA LUCRARI</h2>
                <hr>
              </div>





<form method="POST" action="/vulcanizare/update/{{$vulcanizare->id}}/{{$vulcanizare->Beneficiar->id}}">
  {{ csrf_field() }}

<input name="_method" type="hidden" value="PUT">

<div class="col-md-2" style="padding: 0">

<h4 style="font-weight: bold"> Selecteaza categorie beneficar</h4>

<select class="form-control show-tick selectpicker" name='category'>
<?php if($vulcanizare->Beneficiar->category == 0){ ?>
     <option value='0'>Persoana fizica</option>
     <option value='1' >Persoana juridica</option>
     <?php } else{ ?>
     <option value='1'>Persoana juridica</option>
     <option value='0' >Persoana fizica</option>
    <?php  } ?>
</select>


<h4 style="font-weight: bold"> Selecteaza vulcanizator</h4>
<select class="form-control show-tick selectpicker" name='vulcanizator_id' data-live-search="true">
<option value="{{$vulcanizare->Vulcanizator->id}}">{{$vulcanizare->Vulcanizator->nume}}</option>
@foreach($vulcanizator as $mecanics)
    <option value='{{ $mecanics->id }}'>{{$mecanics->nume}}</option>
@endforeach
</select>


</div>

<div class="col-md-10" style="margin-bottom: 30px;">
<h4 style="font-weight: bold; margin-left: 50px;">Adauga beneficiar</h4>

<div class="col-md-3" style="margin-left: 50px;">
<h5>Beneficiar</h5>
<input type="text" class="form-control" id="nume" name="nume" value="{{$vulcanizare->Beneficiar->nume}}">

<h5>Pret</h5>
<input type="text" class="form-control" id="suma" name="suma" value="{{$vulcanizare->suma}}">
</div>

<div class="col-md-3">


<h5>Nr. masina</h5>
<input type="text" class="form-control" id="nr_masina" name="nr_masina" value="{{$vulcanizare->Beneficiar->nr_masina}}">
</div>

<div class="col-md-3">


<h5>Model</h5>
<input type="text" class="form-control" id="model" name="model" value="{{$vulcanizare->Beneficiar->model}}">
</div>

</div>

<hr>

<?php $test=  DB::table('beneficiars')->orderBy('id', 'desc')->first(); ?>
<input type="hidden" name="beneficiar_id" value="{{ $test->id }}">

<input class="btnbtn" type="submit" value="Salveaza">
</form>
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
</style>

              
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>


<script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>
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