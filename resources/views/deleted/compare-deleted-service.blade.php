@extends('index')

@section('title')

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

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <b>Nr masinei : <span>{{$deletedParents->Beneficiar->nr_masina}}</span> </b>
                            </h2>

                        </div>
                        <div class="body">
                             <form method="POST" action="/reglarea/search/">
                    {{ csrf_field() }}
                    {{-- <label>Selectati o data pentru sortare</label>
                    <input type="text" name="daterange" value=""/>
                    <input type="submit" name=""> --}}
                </form>
                            <div class="table-responsive">
                        


                    <table class="table table-bordered table-striped table-hover dataTable">
                                    <thead> <h4>Actul sters nr. <span style="color:#d01a44">{{$deletedParents->old_parent_id}}</span> la data : <span style="color:#d01a44">{{$deletedParents->created_at}}</span> </h4>
                                           
                                            <th>Piese</th>
                                            <th>Cantitate</th>
                                            <th>Pret</th>
                                            <th>Suma</th>
                                            <th>Pret lucru</th>
                                            <th>Suma totala</th>
                                            <d
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>  <tr> 
                                            <?php $sumaTotala = 0; ?>
                                            <?php foreach ($deletedParents->DeletedService as $deletedParent) { ?>
                                            
                                            <td>{{$deletedParent->piese}}</td>
                                            <td>{{$deletedParent->cantitate}}</td>
                                            <td>{{$deletedParent->pret}} lei</td>
                                            <td>{{$deletedParent->suma}} lei</td>
                                            <td>{{$deletedParent->pret_lucru}} lei</td>
                                            <td>{{$deletedParent->suma_totala}} lei</td>
                                            
                                        </tr>
                                        
                                         <?php $sumaTotala += $deletedParent->suma_totala;
                                          } ?>
                                          <tr>
                                            <td><b>Total</b></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>{{$sumaTotala}} lei</b></td>
                                        </tr>
                                    </tbody>
                    </table>
                                          

                <?php if($parentServices){ ?>
                    <table class="table table-bordered table-striped table-hover dataTable">
                                    <thead> <h4 style="margin-top:30px;">Actul nou nr. <span style="color:#d01a44">{{$parentServices->Service['0']->parent_id}}</span> la data : <span style="color:#d01a44">{{$parentServices->Service['0']->created_at}}</span></h4></h4>

                                       
                                    
                                            
                                            <th>Piese</th>
                                            <th>Cantitate</th>
                                            <th>Pret</th>
                                            <th>Suma</th>
                                            <th>Pret lucru</th>
                                            <th>Suma totala</th>
                                  

                                    </thead>
                                    <tbody>
                                        <tr onclick="window.location='/service/show/{{$parentServices->id}}'">  <?php $sumaTotala2 = 0;
                                        foreach ($parentServices->Service as $parentService) { ?>
                                            
                                            <td>{{$parentService->piese}}</td>
                                            <td>{{$parentService->cantitate}}</td>
                                            <td>{{$parentService->pret}} lei</td>
                                            <td>{{$parentService->suma}} lei</td>
                                            <td>{{$parentService->pret_lucru}} lei</td>
                                            <td>{{$parentService->suma_totala}} lei</td>
                                            <?php $sumaTotala2 += $parentService->suma_totala;  ?>
                                        </tr>
                                        
                                         <?php  }?>

                                        <tr>
                                            <td><b>Total</b></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>{{$sumaTotala2}} lei</b></td>
                                        </tr>

                                          <?php } else{ ?>
                                            <h2>Nu au fost gasite gasite acte asemanatoare !!!</h2>
                                        <?php } ?>
                                    </tbody>
                    </table>
<?php if($parentServices){ ?>
                        <h2>Actul sters - Actul actual = <span style="color:#d01a44"><?php echo $sumaTotala - $sumaTotala2; ?> lei </span></h2>

<?php } ?>


                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@section('extra-script')
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
    $('a.Delete').on('click', function() {
    var choice = confirm('Do you really want to delete this record?');
    if(choice === true) {
        return true;
    }
    return false;
});
</script>
@endsection