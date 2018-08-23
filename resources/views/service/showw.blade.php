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
   <link href="/bsbmd/css/print.css" rel="stylesheet" media="print" type="text/css">
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

        .avoid{
            page-break-inside: avoid;
        }
        .butoane p {
    display: inline-block;
}
        .raport{
            float: right;
    padding: 7px 12px;
    margin-right: 5px;
    margin: 12px;
    background-color: #bd2a2a;
    color: white;
    border-radius: 6px;
        }
        .butoane{
            padding: 0 20px;
        }
        p.raport:hover {
    background-color: red;
}
    </style>
@endsection

@section('content')

<!-- 
////////////////////////////////////////// Print Page ///////////////////////////////////////////////////
-->
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


<h3 class="act">Servicii de reglarea unghiurilor</h3>
<h4 style="text-align: center;">Act de indeplinire Nr: {{$parents->id}}</h4>
<h4 style="text-align: right;">Data: {{$parents->created_at->format('d-m-Y H:i:s')}}</h4>
<h4 style="text-align: right;">Mecanic: {{$parents->Mecanic->nume.' '. $parents->Mecanic->prenume}} </h4>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" style="margin-bottom: 0;">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Beneficiar</th>
                                            <th>Telefon</th>
                                            <th>Masina</th>
                                            <th>Nr. masina</th>
                                            <th>KM</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr> 
                                        <td>{{$parents->Beneficiar->nume}}</td>
                                        <td>{{$parents->Beneficiar->telefon}}</td>
                                        <td>{{$parents->Beneficiar->model}}</td>
                                        <td>{{$parents->Beneficiar->nr_masina}}</td>
                                        <td>{{$parents->Beneficiar->km}}</td>
                                        </tr>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                        </div>
                        </div>




<div class="mecanic">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Piese</th>
                                            <th>Cantitate</th>
                                            <th>Pret</th>
                                            <th>Suma</th>
                                            <th>Pret lucru</th>
                                            <th>Suma totala</th>
                                        </tr>
                                    </thead><?php
                         $pret = 0;
                         $suma = 0;
                         $pret_lucru = 0;
                         $suma_totala = 0; 
                         $suma_finala = 0;
                         ?>
                                    <tbody>@foreach ($parents->Service as $parent)
                                        <tr> 
                                            <td>{{$parent->id}}</td>
                                            <td>{{$parent->piese}}</td>
                                            <td>{{$parent->cantitate}}</td>
                                            <td>{{$parent->pret}} lei</td>
                                            <td>{{$parent->suma}} lei</td>
                                            <td>{{$parent->pret_lucru}} lei</td>
                                            <td>{{$parent->suma_totala}} lei</td>
                                            <?php
                                  $suma_finala += $parent->suma_totala;  
                                  $pret += $parent->pret;
                                  $suma += $parent->suma;
                                  $pret_lucru += $parent->pret_lucru;
                                  $suma_totala += $parent->suma_totala;
                                 ?>
                                        </tr>@endforeach
                                        <tr>
                                <td><b>Total</b></td>
                                <td>-</td>
                                <td>-</td>
                                
                                <td><b>{{ $pret }} lei</b></td>
                                <td><b>{{ $suma }} lei</b></td>
                                <td><b>{{ $pret_lucru }} lei</b></td>
                                <td><b>{{ $suma_totala }} lei</b></td>
                            </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        </div>
                        <h4 style="text-align: right;">Semnatura _________________</h4>
                        <hr>
                        </div>
</div>


<div class="mecanic avoid">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Mecanic</th>
                                            <th>Comanda</th>
                                            <th>Data</th>
                                            <th>Suma lucrarilor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr> 
                                            <td>{{$parents->Mecanic->nume.' '.$parents->Mecanic->prenume}}</td>
                                            <td>{{$parents->id}}</td>
                                            <td>{{$parents->created_at->format('d-m-Y H:i:s')}}</td>
                                            <?php $suma_mecanic = 0; ?>
                                            @foreach ($parents->Service as $parent)
                                           <?php  $suma_mecanic += $parent->suma_totala;  ?>
                                            @endforeach
                                            <td>{{$suma_mecanic}} lei</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                        <div style="display: inline-block; width: 100%;">
                            <img src="/ghervas.png" / width="200px" height="auto" style="display: inline-block;">

                            <h4 style="float: right; display: inline-block;">Semnatura _________________</h4>
                        </div>
                        </div>
</div>












</div>



<!-- 
/////////////////////////////////////// End Print Page ///////////////////////////////////////////////////
-->
       
    


<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Actul numarul {{ $parents->id }}
                            </h2>

                        </div>
                        <div class="butoane">
                        <p class="print">Print</p>
                        
                        </div>
                        <div class="body">
                             <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" style="margin-bottom: 50px !important;">

                        <thead>
                            <tr>
                                <th>Beneficiar</th>
                                <th>Categorie</th>
                                <th>Model</th>
                                <th>Nr.</th>
                                <th>Telefon</th>
                                <th>KM</th>
                                <th>Mecanic</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Beneficiar</th>
                                <th>Categorie</th>
                                <th>Model</th>
                                <th>Nr.</th>
                                <th>Telefon</th>
                                <th>KM</th>
                                <th>Mecanic</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          
                            <tr>
                                <td>{{ $parents->Beneficiar->nume }}</td>
                                
                                <td>
                        <?php if($parents->Beneficiar->category == 0){
                                echo "Persoana Fizica"; 
                              }else{
                                echo "Persoana Juridica";
                            } ?></td>
                            <td>{{ $parents->Beneficiar->model }}</td>
                                <td>{{ $parents->Beneficiar->nr_masina }}</td>
                                <td>{{ $parents->Beneficiar->telefon }}</td>
                                <td>{{ $parents->Beneficiar->km }}</td>
                                <td>{{ $parents->Mecanic->nume .' '. $parents->Mecanic->prenume }}</td>
                            </tr>
                          
                        </tbody>

                                </table>






                                 <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Data</th>
                                <th>Piese/Lucru</th>
                                <th>Cantitate</th>
                                <th>Pret</th>
                                <th>Suma</th>
                                <th>Pret Lucru</th>
                                <th>Suma Totala</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Data</th>
                                <th>Piese/Lucru</th>
                                <th>Cantitate</th>
                                <th>Pret</th>
                                <th>Suma</th>
                                <th>Pret Lucru</th>
                                <th>Suma Totala</th>
                            </tr>
                        </tfoot>
                        <?php
                         $pret = 0;
                         $suma = 0;
                         $pret_lucru = 0;
                         $suma_totala = 0; 
                         $suma_finala = 0;
                         ?>
                        <tbody>@foreach ($parents->Service as $parent)
                            <tr>
                                <td>{{ $parent->id }}</td>
                                <td>{{ $parent->created_at }}</td>
                                <td>{{ $parent->piese }}</td> 
                                <td>{{ $parent->cantitate }}</td> 
                                <td>{{ $parent->pret }} lei</td> 
                                <td>{{ $parent->suma }} lei</td> 
                                <td>{{ $parent->pret_lucru }} lei</td> 
                                <td>{{ $parent->suma_totala }} lei</td> 
                                <?php
                                  $suma_finala += $parent->suma_totala;  
                                  $pret += $parent->pret;
                                  $suma += $parent->suma;
                                  $pret_lucru += $parent->pret_lucru;
                                  $suma_totala += $parent->suma_totala;
                                 ?>

                            </tr>@endforeach
                            <tr>
                                <td><b>Total</b></td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td><b>{{ $pret }} lei</b></td>
                                <td><b>{{ $suma }} lei</b></td>
                                <td><b>{{ $pret_lucru }} lei</b></td>
                                <td><b>{{ $suma_totala }} lei</b></td>
                            </tr>
                              

                        </tbody>
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

    <!-- Demo Js -->
    <script src="/bsbmd/js/demo.js"></script>
        <script type="text/javascript">
        $('.print').click(function() {
    window.print();
});
    </script>


@endsection