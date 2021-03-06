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
	                    <?php echo $reglareaMecanic->nume .' '. $reglareaMecanic->prenume; ?>
	                </h2>
	            </div>
	           
                        <div class="body">
                            <form method="POST" action="/reglarea-mecanic/raport-zilnic/{{$reglareaMecanic->id}}">
                                    {{ csrf_field() }}
                                <label>Selectati o data pentru sortare</label>
                                <input type="text" name="daterange" value="" />
                                <input type="submit" name="">
                            </form>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Model</th>
                                            <th>Nr. masinii</th>
                                            <th>Data</th>
                                            <th>Suma</th>

                                        </tr>
                                    </thead>

                                    <tbody><?php $suma = 0; ?>
                                     @foreach ($reglareaMecanic->ReglareaUnghiului as $value) 

                                       <tr onclick="window.location='/reglarea/show/{{$value->id}}'">
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->created_at}}</td>
                                            <td>{{$value->Beneficiar->model}}</td>
                                            <td>{{$value->Beneficiar->nr_masina}}</td>
                                            <td class="price">{{$value->pret_lucru}}</td>
                                        </tr>
                                        <?php 
                                        
                                        $suma += $value->pret_lucru; 
                                        ?>
                                     @endforeach

                                    </tbody>
                                </table>
                                        <h1 id="sumaa" value="">Total: <?php echo $suma . ' lei'; ?></h1>
                            </div>
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