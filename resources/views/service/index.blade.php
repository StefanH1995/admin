
    @extends('index')

    @section('title')

    @endsection

    @section('extra-css')
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="/bsbmd/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="/bsbmd/plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="/bsbmd/plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- JQuery DataTable Css -->
        <link href="/bsbmd/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

        <!-- Custom Css -->
        <link href="/bsbmd/css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="/bsbmd/css/themes/all-themes.css" rel="stylesheet" />
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
        </style>
    @endsection



    @section('content')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="header">
                <div class="card">
                    <div class="header">
                        <h2>
                            Raport 
                        </h2>
                      
                    </div>
                 <style type="text/css"> td,th{ border: 1px solid black; }</style>   
    <div class="body">
      <form method="POST" action="/raport/search">
                                        {{ csrf_field() }}
                                    <label>Selectati o data pentru sortare</label>
                                    <input type="text" name="daterange" value="" />
                                    <input type="submit" name="">
                                </form>
     <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                      
                    <?php foreach ($mecanics as $mecanic) { ?>
                        <tr> 
                                <th><h3>
                                      <?php echo $mecanic->nume .' '. $mecanic->prenume; ?>
                                      <span style="font-size: 12px; font-weight: normal; vertical-align: middle;"> 
                                          (Service)
                                      </span>:
                                </h3></th>
                        <?php $suma_mecanic = 0;
                      
                              foreach ($mecanic->Service->where('mecanic_id', '=', $mecanic->id)->where('created_at','<', $to)->where('created_at', '>', $from) as $value) {
                              $suma_mecanic += $value->suma_totala;
                              } 
                        
                        ?>
                              <th><h3> <?php if($suma_mecanic != 0){
                              echo $suma_mecanic; } else { echo '-';} ?></h3></th>
                        </tr>
                    <?php    } ?>           
                
                
                    <?php foreach ($reglarea_mecanics as $reglarea_mecanic) { ?>
                                    <tr> 
                                      <td><h3>
                                      <?php echo $reglarea_mecanic->nume .' '. $reglarea_mecanic->prenume; ?>
                                        <span style="font-size: 12px; font-weight: normal; vertical-align: middle;"> (Reglarea)
                                        </span>:
                                      </h3></td>

                                      
                                      <?php 
                                          $suma_reglare_unghi = 0;
                                              foreach ($reglarea_mecanic->ReglareaUnghiului->where('mecanic_id',  $reglarea_mecanic->id)->where('created_at','<', $to)->where('created_at', '>', $from) as $suma_reglarii){
                                              $suma_reglare_unghi += $suma_reglarii->pret_lucru;  
                                              } 
                                      ?>
                                      <th><h3> <?php if($suma_reglare_unghi != 0){
                              echo $suma_reglare_unghi; } else { echo '-';} ?></h3></th>
                                     </tr> 
                    
                    <?php    } ?>
                

                    <?php foreach ($vulcanizators as $vulcanizator) { ?>
                                    <tr>
                                          <td><h3>
                                              <?php echo $vulcanizator->nume; ?>
                                              <span style="font-size: 12px; font-weight: normal; vertical-align: middle;"> 
                                                    (Vulcanizare)
                                              </span>:
                                          </h3></td>

                                          <?php 
                                              $suma_serviciilor_vulcanizare = 0;
                                              foreach ($vulcanizator->Vulcanizare->where('vulcanizator_id', $vulcanizator->id)->where('created_at','<', $to)->where('created_at', '>', $from) as $suma_vulcanizarii ) {
                                                $suma_serviciilor_vulcanizare += $suma_vulcanizarii->suma;
                                              }

                                          ?>
                                          <th><h3> <?php if($suma_serviciilor_vulcanizare != 0){
                              echo $suma_serviciilor_vulcanizare; } else { echo '-';} ?></h3></th>
                                    </tr>
                    <?php    } ?>
                

              <tr>
                <td><h3>Service:</h3></td>
                <td><?php $suma_serviciu = 0; 
                          $suma_reglarea = 0;
                          $suma_totala_service = 0;

                              foreach ($services as $service) { 
                                
                                  $suma_serviciu += $service->suma_totala;
                                
                                  
                              } 


                                foreach ($reglareas as $reglarea) { 
                                
                                  $suma_reglarea += $reglarea->pret_lucru;
                                
                              }
                                  $suma_totala_service = $suma_serviciu + $suma_reglarea;

                              ?> 
                    <h3><?php echo $suma_totala_service;?></h3> 
                </td>
              </tr>
             
              <tr>
                <td><h3>Vulcanizare:</h3></td>
                <td>
                    <?php $suma_vulcanizare = 0; 
                              foreach ($vulcanizares as $vulcanizare) { 
                                if($vulcanizare->Beneficiar->category == '0'){
                                  $suma_vulcanizare += $vulcanizare->suma;
                                }
                              } ?> 
                    <h3><?php echo $suma_vulcanizare; ?></h3> 
                </td>
              </tr>
              <tr>
                <td><h3>Vulcanizare Transfer:</h3></td>
                <td>
                    <?php $suma_vulcanizare_transfer = 0; 
                              foreach ($vulcanizares as $vulcanizare) { 
                                if($vulcanizare->Beneficiar->category == '1'){
                                  $suma_vulcanizare_transfer += $vulcanizare->suma;
                                }
                              } ?> 
                    <h3><h3><?php echo $suma_vulcanizare_transfer; ?></h3> </h3> 
                </td>
              </tr>
                        <tr>
                          <td><h3>Total:</h3></td>
                          <td><h3>
                              <?php
                                $total = $suma_vulcanizare_transfer+$suma_vulcanizare+$suma_totala_service;
                                echo $total;
                              ?>
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

        <!-- Bootstrap Core Js -->
        <script src="/bsbmd/plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Select Plugin Js -->
        <script src="/bsbmd/plugins/bootstrap-select/js/bootstrap-select.js"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="/bsbmd/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="/bsbmd/plugins/node-waves/waves.js"></script>

        <!-- Jquery DataTable Plugin Js -->
        <script src="/bsbmd/plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script src="/bsbmd/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
        <script src="/bsbmd/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
        <script src="/bsbmd/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
        <script src="/bsbmd/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
        <script src="/bsbmd/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
        <script src="/bsbmd/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
        <script src="/bsbmd/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
        <script src="/bsbmd/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

        <!-- Custom Js -->
        <!-- <script src="../bsbmd/js/admin.js"></script> -->
        <script src="/bsbmd/js/pages/tables/jquery-datatable.js"></script>


        <!-- Demo Js -->
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
    @endsection