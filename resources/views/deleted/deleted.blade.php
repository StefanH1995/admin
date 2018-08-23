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
                                Servicii sterse
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
                                    <thead>
                                        <tr> <H2>REGLAREA</H2>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Beneficiar</th>
                                            <th>Nr masina</th>
                                            <th>Data</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Beneficiar</th>
                                            <th>Nr masina</th>
                                            <th>Data</th>
                                        
                                        </tr>
                                    </tfoot>
                                       @foreach($reglarea as $reglareas)
        
                                    <tbody>
                                       <tr> 
                                            <td>{{$reglareas->id}}</td>
                                            <td>{{Auth::user()->name}}</td>
                                            <td>{{$reglareas->Beneficiar->nume}}</td>
                                            <td>{{$reglareas->Beneficiar->nr_masina}}</td>
                                            <td>{{$reglareas->created_at}}</td>
                                        </tr>
                                        
                        @endforeach

                        </tbody>
                    </table>




                    <table class="table table-bordered table-striped table-hover dataTable">
                                    <thead>
                                        <tr> <H2>VULCANIZARE</H2>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Beneficiar</th>
                                            <th>Nr masina</th>
                                            <th>Data</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Beneficiar</th>
                                            <th>Nr masina</th>
                                            <th>Data</th>
                                    
                                        </tr>
                                    </tfoot>
                                       @foreach($vulcanizare as $vulcanizares)
        
                                    <tbody>
                                       <tr> 
                                            <td>{{$vulcanizares->id}}</td>
                                            <td>{{Auth::user()->name}}</td>
                                            <td>{{$vulcanizares->Beneficiar->nume}}</td>
                                            <td>{{$vulcanizares->Beneficiar->nr_masina}}</td>
                                            <td>{{$vulcanizares->created_at}}</td>
                                        </tr>
                                        
                        @endforeach

                        </tbody>
                    </table>




                    <table class="table table-bordered table-striped table-hover dataTable">
                                    <thead>
                                        <tr> <H2>SERVICE</H2>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Beneficiar</th>
                                            <th>Nr masina</th>
                                            <th>Data</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Beneficiar</th>
                                            <th>Nr masina</th>
                                            <th>Data</th>
                                        
                                        </tr>
                                    </tfoot>
                                       @foreach($service as $services)
        
                                    <tbody>
                                       <tr onclick="window.location='/compare-deleted-service/{{$services->id}}'"> 
                                            <td>{{$services->id}}</td>
                                            <td>{{Auth::user()->name}}</td>
                                            <td>{{$services->Beneficiar->nume}}</td>
                                            <td>{{$services->Beneficiar->nr_masina}}</td>
                                            <td>{{$services->created_at}}</td>
                                        </tr>
                                        
                        @endforeach

                        </tbody>
                    </table>






                 
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