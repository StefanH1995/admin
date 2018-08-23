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
                                Reglarea Unghiului
                            </h2>

                        </div>
                        <div class="body">
                            <form method="POST" action="/reglarea/search/">
                    {{ csrf_field() }}
                    <label>Selectati o data pentru sortare</label>
                    <input type="text" name="daterange" value=""/>
                    <input type="submit" name="">
                </form>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Benef.</th>
                                            <th>Categorie</th>
                                            <th>Model</th>
                                            <th>Nr.masinii</th>
                                            <th>Telefon</th>
                                            <th>KM</th>
                                            <th>Data</th>
                                            <th>Mecanic</th>
                                            <th>Pret</th>
                                            @if( Auth::user()->role == '1' )
                            <th aria-label="Edit / Delete: activate to sort column ascending">Edit / Delete</th>
                            @endif
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Benef.</th>
                                            <th>Categorie</th>
                                            <th>Model</th>
                                            <th>Nr.masinii</th>
                                            <th>Telefon</th>
                                            <th>KM</th>
                                            <th>Data</th>
                                            <th>Mecanic</th>
                                            <th>Pret</th>
                                         @if( Auth::user()->role == '1' )
                            <th aria-label="Edit / Delete: activate to sort column ascending">Edit / Delete</th>
                            @endif
                                            
                                        </tr>
                                    </tfoot>
        
                                    <tbody><?php $suma = 0; ?>
                                       @foreach($raport as $reglareas)
                                       <tr onclick="window.location='/reglarea/show/{{$reglareas->id}}'"> 
                                        <td>{{$reglareas->id}}</td>
                                        <td>{{$reglareas->Beneficiar->nume}}</td>
                                        <td>
                                            <?php if($reglareas->Beneficiar->category == 0){
                                                echo "Persoana Fizica"; 
                                        }else{
                                            echo "Persoana Juridica";
                                        } ?></td>
                                        <td>{{$reglareas->Beneficiar->model}}</td>
                                        <td>{{$reglareas->Beneficiar->nr_masina}}</td>
                                        <td>{{$reglareas->Beneficiar->telefon}}</td>
                                        <td>{{$reglareas->Beneficiar->km}}</td>
                                        <td>{{$reglareas->created_at}}</td>
                                        <td>{{$reglareas->Reglarea_mecanic->nume.' '. $reglareas->Reglarea_mecanic->prenume}}</td>
                                        <td>{{$reglareas->pret_lucru}}</td>
                                        @if( Auth::user()->role == '1' )
                                        <td class=" center">
                            <a href="/reglarea/edit/{{$reglareas->id}}" class="editor_edit">Edit</a> / 
                            <a href="/reglarea/destroy/{{$reglareas->id}}" style="color:red;" class="editor_remove" onclick="return confirm('Delete this record?')">Delete
                            </a></td>@endif
                                        </tr> <?php $suma += $reglareas->pret_lucru; ?>
                        @endforeach

                        </tbody>
                    </table>
                    <h1 id="sumaa" value="">Total: <?php echo $suma . ' lei'; ?></h1>
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