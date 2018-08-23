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
                                <th>Beneficiar</th>
                                <th>Categorie</th>
                                <th>Model</th>
                                <th>Nr. masinii</th>
                                <th>Telefon</th>
                                <th>Suma</th>
                                <th>Mecanic</th>
                                <th>Data</th>
                                @if( Auth::user()->role == '1' )
                                    <th aria-label="Edit: activate to sort column ascending">Edit</th>
                                    <th aria-label="Delete: activate to sort column ascending">Delete</th>
                                @endif
                            </tr>
                            </thead>
                            <tfoot style="background-color: #2b333e;color: #e4dfdf;">
                            <tr>
                                <th>Act</th>
                                <th>Beneficiar</th>
                                <th>Categorie</th>
                                <th>Model</th>
                                <th>Nr. masinii</th>
                                <th>Telefon</th>
                                <th>Suma</th>
                                <th>Mecanic</th>
                                <th>Data</th>
                                @if( Auth::user()->role == '1' )
                                    <th aria-label="Edit: activate to sort column ascending">Edit</th>
                                    <th aria-label="Delete: activate to sort column ascending">Delete
                                    </th>                            @endif
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach ($parents as $key => $parent) { ?>

                            <tr onclick="window.location='/service/show/{{$parent->id}}'">
                                <td>{{ $parent->id}}</td>
                                <td>{{ $parent->Beneficiar->nume}}</td>
                                <td>
                                  <?php  if ($parent->Beneficiar->category == 0) {
                                    echo "Persoana Fizica";
                                  } else {
                                    echo "Persoana Juridica";
                                  } ?>
                                </td>
                                <td>{{ $parent->Beneficiar->model }}</td>
                                <td>{{ $parent->Beneficiar->nr_masina }}</td>
                                <td>{{ $parent->Beneficiar->telefon }}</td>
                                <td>{{ $parent->suma }} lei</td>
                                <td>{{ $parent->Mecanic->nume.' '.$parent->Mecanic->prenume  }}</td>
                                <td>{{ $parent->created_at}}</td>
                                @if( Auth::user()->role == '1' )
                                    <td class=" center">
                                        <a href="/service/edit/{{$parent->id}}" class="editor_edit">Edit</a></td>
                                    <td class=" center">
                                        <a href="/service/destroy/{{$parent->id}}" style="color:red;"
                                                           class="editor_remove"
                                                           onclick="return confirm('Delete this record?')">Delete
                                        </a>
                                    </td>
                                @endif

                            </tr>
                            <?php } ?>
                            <?php $suma_totala = 0;
                            foreach ($parents as $value) {
                              foreach ($value->Service as $parent) {
                                $suma_totala += $parent->suma_totala;
                              }
                            }
                            ?>
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
                                            <strong>Suma totala : {{ $suma_totala }} lei</strong>
                                        </h4>
                                    </div>
                                </div>
                            </tbody>
                        </table>
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