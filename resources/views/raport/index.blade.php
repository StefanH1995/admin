@extends('index')

@section('title')

@endsection

@section('extra-css')
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<link href="/bsbmd/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="/bsbmd/plugins/node-waves/waves.css" rel="stylesheet" />
<link href="/bsbmd/plugins/animate-css/animate.css" rel="stylesheet" />
<link href="/bsbmd/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<link href="/bsbmd/css/style.css" rel="stylesheet">
<link href="/bsbmd/css/themes/all-themes.css" rel="stylesheet" />
<link href="/bsbmd/css/print.css" rel="stylesheet" media="print" type="text/css">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

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

  #customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  }

  #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
  }

  #customers tr:nth-child(even){
    background-color: #f2f2f2;
  }

  #customers tr:hover {
    background-color: #ddd;
  }

  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    /*background-color: #4CAF50;*/
    color: #555;
  }
  h3{
    margin: 0;
  }
  td,th{ 
    border: 1px solid black; 
  }
  .print{
    display: inline-block;
    margin: 12px;
    background-color: #607D8B;
    color: #fff;
    padding: 7px 12px;
    margin-right: 5px;
    text-decoration: none;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.16), 0 2px 10px rgba(0, 0, 0, 0.12);
    border-radius: 2px;
    border: none;
    font-size: 13px;
    outline: none;
    }
    .cred{
        display: none;
    }
    .pagina_print{
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
                        Raport 
                    </h2>
                </div>
                <p class="print">Print</p>

<div class="body">
  <form method="POST" action="/raport/search">
    {{ csrf_field() }}
    <label>Selectati o data pentru sortare</label>
    <input type="text" name="daterange" value="" />
    <input type="submit" name="">
  </form>
  <table id="customers">

    <!-- **************************** Suma pentru mecanici ****************************** -->
    <!-- ******************************************************************************** -->
    <?php foreach ($mecanics as $mecanic) { ?>
        <tr> 
          <th>
            <h3><?php echo $mecanic->nume .' '. $mecanic->prenume; ?>
                <span style="font-size: 12px; font-weight: normal; vertical-align: middle;"> 
                    (Service)
                </span>:
            </h3>
          </th>
              <?php $suma_mecanic = 0;
                foreach ($mecanic->Service->where('mecanic_id', '=', $mecanic->id) as $value) {
                  $suma_mecanic += $value->suma_totala;
                } ?>
          <th>
            <h3> <?php if($suma_mecanic != 0){
                      echo $suma_mecanic . ' lei'; } else { echo '-';} ?></h3></th>
        </tr>
     <?php } ?>           
            
  <!-- **************************** Suma pentru reglarea_mecanici ****************************** -->
  <!-- ******************************************************************************** -->
  <?php foreach ($reglarea_mecanics as $reglarea_mecanic) { ?>
            <tr> 
              <td>
                <h3><?php echo $reglarea_mecanic->nume .' '. $reglarea_mecanic->prenume; ?>
                <span style="font-size: 12px; font-weight: normal; vertical-align: middle;">
                 (Reglarea)
                </span>:
                </h3>
              </td>

              <?php $suma_reglare_unghi = 0;
                  foreach ($reglarea_mecanic->ReglareaUnghiului->where('mecanic_id',  $reglarea_mecanic->id) as $suma_reglarii){
                    $suma_reglare_unghi += $suma_reglarii->pret_lucru;  
                  } ?>
              <th>
                <h3> <?php if($suma_reglare_unghi != 0){
                            echo $suma_reglare_unghi . ' lei'; } 
                            else { 
                              echo '-';
                            } ?>        
                </h3>
              </th>
            </tr> 
         <?php  } ?>
            
  <!-- **************************** Suma pentru vulcanizatori ****************************** -->
  <!-- ******************************************************************************** -->
<?php foreach ($vulcanizators as $vulcanizator) { ?>
        <tr>
          <td>
            <h3>
              <?php echo $vulcanizator->nume; ?>
              <span style="font-size: 12px; font-weight: normal; vertical-align: middle;"> 
                    (Vulcanizare)
              </span>:
            </h3>
          </td>

          <?php $suma_serviciilor_vulcanizare = 0;
              foreach ($vulcanizator->Vulcanizare->where('vulcanizator_id', $vulcanizator->id) as $suma_vulcanizarii ) {
                $suma_serviciilor_vulcanizare += $suma_vulcanizarii->suma;
              } ?>
          <th>
            <h3> 
              <?php if($suma_serviciilor_vulcanizare != 0){
                      echo $suma_serviciilor_vulcanizare  . ' lei'; 
                    } else { 
                      echo '-';
                    } ?>      
            </h3>
          </th>
        </tr>
      <?php } ?>
            
    <!-- **************************** Suma pentru Servicii ****************************** -->
    <!-- ******************************************************************************** -->
    <tr>
      <td>
        <h3>Service:</h3>
      </td>
      <td>
        <?php $suma_serviciu = 0; 
              $suma_reglarea = 0;
              $suma_totala_service = 0;

              foreach ($services as $service) { 
                $suma_serviciu += $service->suma_totala;
              } 
              
              foreach ($reglareas as $reglarea) { 
                $suma_reglarea += $reglarea->pret_lucru;
              }
                $suma_totala_service = $suma_serviciu + $suma_reglarea; ?> 

          <h3><?php echo $suma_totala_service . ' lei';?></h3> 
      </td>
    </tr>
          
    <!-- **************************** Suma pentru Vulcanizare ****************************** -->
    <!-- ******************************************************************************** -->
    <tr>
      <td><h3>Vulcanizare:</h3></td>
      <td>
          <?php $suma_vulcanizare = 0; 
                  foreach ($vulcanizares as $vulcanizare) 
                  { 
                    if($vulcanizare->Beneficiar->category == '0')
                    {
                      $suma_vulcanizare += $vulcanizare->suma;
                    }
                  } ?> 
          <h3><?php echo $suma_vulcanizare . ' lei'; ?></h3> 
      </td>
    </tr>
    <!-- **************************** Suma pentru Vulcanizare Transfer ****************** -->
    <!-- ******************************************************************************** -->
    <tr>
      <td>
        <h3>Vulcanizare Transfer:</h3></td>
      <td>
        <?php $suma_vulcanizare_transfer = 0; 
          foreach ($vulcanizares as $vulcanizare) 
          { 
            if($vulcanizare->Beneficiar->category == '1'){
              $suma_vulcanizare_transfer += $vulcanizare->suma;
            }
          } ?> 
            <h3><?php echo $suma_vulcanizare_transfer . ' lei'; ?></h3>
      </td>
    </tr>
    <!-- **************************** Suma TOTALA ****************************** -->
    <!-- ******************************************************************************** -->  
    <tr>
      <td>
        <h3>Total:</h3>
      </td>

      <td>
        <h3>
          <?php
            $total = $suma_vulcanizare_transfer+$suma_vulcanizare+$suma_totala_service;
            echo $total . ' lei'; ?>
          </h3>
      </td>
    </tr>
  </table>

</div>
        </div>
    </div>
</div>


<!--****************************** Pagina Print *************************************** -->
<!--****************************** Pagina Print *************************************** -->
<!--****************************** Pagina Print *************************************** -->
<!--****************************** Pagina Print *************************************** -->
<!--****************************** Pagina Print *************************************** -->
<!--****************************** Pagina Print *************************************** -->

<div class="pagina_print">
<div class="cred">
    <div class="text">
    <h5>SRL "GHERVAS-PETROL"</h5>
    <h5>CF 100360100635   TVA 6700275</h5>
    <h5>TVA 6700275</h5>
    <h5>IBAN MD37VI000000222442413MDL</h5>
    <h5>B.C. VictoriaBank Fil. n. 24 Ialoveni</h5>
    <h5>VICBMD2X479</h5>
    <h5>Adresa: or. Ialoveni, str. Testimiteanu 10</h5>
    <h5>Telefon: 0(268) 2-41-87  0(68) 297 333</h5>
</div>
<div class="imagine">
    <img src="/ghervas.png" />
</div>
</div>

<h3 class="act">Raport</h3>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card" style="margin-bottom: 0;">
        <div class="body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                      <!-- **************************** Suma pentru mecanici ****************************** -->
    <!-- ******************************************************************************** -->
    <?php foreach ($mecanics as $mecanic) { ?>
        <tr> 
          <th>
            <h3><?php echo $mecanic->nume .' '. $mecanic->prenume; ?>
                <span style="font-size: 12px; font-weight: normal; vertical-align: middle;"> 
                    (Service)
                </span>:
            </h3>
          </th>
              <?php $suma_mecanic = 0;
                foreach ($mecanic->Service->where('mecanic_id', '=', $mecanic->id) as $value) {
                  $suma_mecanic += $value->suma_totala;
                } ?>
          <th>
            <h3> <?php if($suma_mecanic != 0){
                      echo $suma_mecanic . ' lei'; } else { echo '-';} ?></h3></th>
        </tr>
     <?php } ?>           
            
  <!-- **************************** Suma pentru reglarea_mecanici ****************************** -->
  <!-- ******************************************************************************** -->
  <?php foreach ($reglarea_mecanics as $reglarea_mecanic) { ?>
            <tr> 
              <td>
                <h3><?php echo $reglarea_mecanic->nume .' '. $reglarea_mecanic->prenume; ?>
                <span style="font-size: 12px; font-weight: normal; vertical-align: middle;">
                 (Reglarea)
                </span>:
                </h3>
              </td>

              <?php $suma_reglare_unghi = 0;
                  foreach ($reglarea_mecanic->ReglareaUnghiului->where('mecanic_id',  $reglarea_mecanic->id) as $suma_reglarii){
                    $suma_reglare_unghi += $suma_reglarii->pret_lucru;  
                  } ?>
              <th>
                <h3> <?php if($suma_reglare_unghi != 0){
                            echo $suma_reglare_unghi . ' lei'; } 
                            else { 
                              echo '-';
                            } ?>        
                </h3>
              </th>
            </tr> 
         <?php  } ?>
            
  <!-- **************************** Suma pentru vulcanizatori ****************************** -->
  <!-- ******************************************************************************** -->
<?php foreach ($vulcanizators as $vulcanizator) { ?>
        <tr>
          <td>
            <h3>
              <?php echo $vulcanizator->nume; ?>
              <span style="font-size: 12px; font-weight: normal; vertical-align: middle;"> 
                    (Vulcanizare)
              </span>:
            </h3>
          </td>

          <?php $suma_serviciilor_vulcanizare = 0;
              foreach ($vulcanizator->Vulcanizare->where('vulcanizator_id', $vulcanizator->id) as $suma_vulcanizarii ) {
                $suma_serviciilor_vulcanizare += $suma_vulcanizarii->suma;
              } ?>
          <th>
            <h3> 
              <?php if($suma_serviciilor_vulcanizare != 0){
                      echo $suma_serviciilor_vulcanizare  . ' lei'; 
                    } else { 
                      echo '-';
                    } ?>      
            </h3>
          </th>
        </tr>
      <?php } ?>
            
    <!-- **************************** Suma pentru Servicii ****************************** -->
    <!-- ******************************************************************************** -->
    <tr>
      <td>
        <h3>Service:</h3>
      </td>
      <td>
        <?php $suma_serviciu = 0; 
              $suma_reglarea = 0;
              $suma_totala_service = 0;

              foreach ($services as $service) { 
                $suma_serviciu += $service->suma_totala;
              } 
              
              foreach ($reglareas as $reglarea) { 
                $suma_reglarea += $reglarea->pret_lucru;
              }
                $suma_totala_service = $suma_serviciu + $suma_reglarea; ?> 

          <h3><?php echo $suma_totala_service . ' lei';?></h3> 
      </td>
    </tr>
          
    <!-- **************************** Suma pentru Vulcanizare ****************************** -->
    <!-- ******************************************************************************** -->
    <tr>
      <td><h3>Vulcanizare:</h3></td>
      <td>
          <?php $suma_vulcanizare = 0; 
                  foreach ($vulcanizares as $vulcanizare) 
                  { 
                    if($vulcanizare->Beneficiar->category == '0')
                    {
                      $suma_vulcanizare += $vulcanizare->suma;
                    }
                  } ?> 
          <h3><?php echo $suma_vulcanizare . ' lei'; ?></h3> 
      </td>
    </tr>
    <!-- **************************** Suma pentru Vulcanizare Transfer ****************** -->
    <!-- ******************************************************************************** -->
    <tr>
      <td>
        <h3>Vulcanizare Transfer:</h3></td>
      <td>
        <?php $suma_vulcanizare_transfer = 0; 
          foreach ($vulcanizares as $vulcanizare) 
          { 
            if($vulcanizare->Beneficiar->category == '1'){
              $suma_vulcanizare_transfer += $vulcanizare->suma;
            }
          } ?> 
            <h3><?php echo $suma_vulcanizare_transfer . ' lei'; ?></h3>
      </td>
    </tr>
    <!-- **************************** Suma TOTALA ****************************** -->
    <!-- ******************************************************************************** -->  
    <tr>
      <td>
        <h3>Total:</h3>
      </td>

      <td>
        <h3>
          <?php
            $total = $suma_vulcanizare_transfer+$suma_vulcanizare+$suma_totala_service;
            echo $total . ' lei'; ?>
          </h3>
      </td>
    </tr>
  </table>
            </div>
        </div>
    </div>
</div>
</div>


@endsection

@section('extra-script')
<script src="/bsbmd/plugins/jquery/jquery.min.js"></script>
<script src="/bsbmd/plugins/bootstrap/js/bootstrap.js"></script>
<script src="/bsbmd/plugins/bootstrap-select/js/bootstrap-select.js"></script>
<script src="/bsbmd/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="/bsbmd/plugins/node-waves/waves.js"></script>
<script src="/bsbmd/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="/bsbmd/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="/bsbmd/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="/bsbmd/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="/bsbmd/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="/bsbmd/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="/bsbmd/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="/bsbmd/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="/bsbmd/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<script src="/bsbmd/js/pages/tables/jquery-datatable.js"></script>
<script src="/bsbmd/js/demo.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>

<script type="text/javascript">
  $('input[name="daterange"]').daterangepicker(
      {
          locale: {
            format: 'YYYY-MM-DD'
          },
          
      });
</script>
<script type="text/javascript">
    $('.print').click(function() {
    window.print();
    });
</script>
@endsection