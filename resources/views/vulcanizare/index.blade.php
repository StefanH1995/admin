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
                    

                <form method="POST" action="/vulcanizare/search/">
                    {{ csrf_field() }}
                    <label>Selectati o data pentru sortare</label>
                    <input type="text" name="daterange" value=""/>
                    <input type="submit" name="">
                </form>
                <div class="table-responsive">

                    <table id="example"
                           class="table display table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Beneficiar</th>
                            <th>Categorie</th>
                            <th>Model</th>
                            <th>Nr.masinii</th>
                            <th>Data</th>
                            <th>Mecanic</th>
                            <th>Suma</th>
                            @if( Auth::user()->role == '1' )
                            <th aria-label="Edit / Delete: activate to sort column ascending">Edit / Delete</th>
                            @endif
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Beneficiar</th>
                            <th>Categorie</th>
                            <th>Model</th>
                            <th>Nr.masinii</th>
                            <th>Data</th>
                            <th>Mecanic</th>
                            <th>Suma</th>
                            @if( Auth::user()->role == '1' )
                            <th aria-label="Edit / Delete: activate to sort column ascending">Edit / Delete</th>
                            @endif
                        </tr>
                        </tfoot>
                        <tbody>
                                <?php $suma = 0; ?>
                        @foreach($vulcanizare as $key => $vulcanizares)
                        <tr onclick="window.location='/vulcanizare/show/{{$vulcanizares->id}}'">
                            <td>{{$vulcanizares->id}}</td>
                            <td>{{$vulcanizares->Beneficiar->nume}}</td>
                            <td>
                                <?php if ($vulcanizares->Beneficiar->category == 0) {
                                    echo "Persoana Fizica";
                                } else {
                                    echo "Persoana Juridica";
                                } ?></td>
                            <td>{{$vulcanizares->Beneficiar->model}}</td>
                            <td>{{$vulcanizares->Beneficiar->nr_masina}}</td>
                            <td>{{$vulcanizares->created_at}}</td>
                            <td>{{$vulcanizares->Vulcanizator->nume}}</td>
                            <td>{{$vulcanizares->suma}} lei</td>
                             @if( Auth::user()->role == '1' )
                            <td class=" center">
                            <a href="/vulcanizare/edit/{{$vulcanizares->id}}" class="editor_edit">Edit</a> / 
                            <a href="/vulcanizare/destroy/{{$vulcanizares->id}}" style="color:red;" class="editor_remove" onclick="return confirm('Delete this record?')">Delete
                            </a></td>
                            @endif
                        </tr> <?php $suma += $vulcanizares->suma; ?>
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