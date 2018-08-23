@extends('index')

@section('title')

@endsection

@section('extra-css')
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="/bsbmd/plugins/node-waves/waves.css" rel="stylesheet"/>
    <link href="/bsbmd/plugins/animate-css/animate.css" rel="stylesheet"/>
    <link href="/bsbmd/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/bsbmd/css/themes/all-themes.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css"/>
    <style type="text/css">
        .buttons-csv {
            display: none;
        }

        .buttons-copy {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel panel-headline">
                    <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead style="background-color: #2b333e;color: #e4dfdf;">
                                        <tr>
                                            <th>Act</th>
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
                                    <tfoot style="background-color: #2b333e;color: #e4dfdf;">
                                        <tr>
                                            <th>Act</th>
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
                                       @foreach($reglarea as $reglareas)
        
                                    <tbody><?php $suma = 0; ?>
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
                                        <td>{{$reglareas->pret_lucru}} lei</td>
                                        @if( Auth::user()->role == '1' )
                                        <td class=" center">
                            <a href="/reglarea/edit/{{$reglareas->id}}" class="editor_edit">Edit</a> / 
                            <a href="/reglarea/destroy/{{$reglareas->id}}" style="color:red;" class="editor_remove" onclick="return confirm('Delete this record?')">Delete
                            </a></td>@endif
                                       </tr> <?php $suma += $reglareas->pret_lucru; ?>
                        @endforeach

<div class="col-md-12">
                                <div class="panel-heading" style="padding-bottom: 60px">
                                    <div class="col-md-6">
                                        <form method="POST" action="/service/search">
                                            {{ csrf_field() }}
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="daterange">
                                                <span class="input-group-btn">
                                                    <input class="btn btn-primary" type="submit">Go!</input>
                                                </span>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-md-6">
                                        <h4 style="float: right;">
                                            <strong>Suma totala : {{ $suma }} lei</strong>
                                        </h4>
                                    </div>
                                </div>

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
            <script type="text/javascript"
                    src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
            <script type="text/javascript">
              $('input[name="daterange"]').daterangepicker(
                {
                  locale: {
                    format: 'YYYY-MM-DD'
                  },

                });
            </script>
            <script type="text/javascript">
              $('a.Delete').on('click', function () {
                var choice = confirm('Do you really want to delete this record?');
                if (choice === true) {
                  return true;
                }
                return false;
              });
            </script>
@endsection