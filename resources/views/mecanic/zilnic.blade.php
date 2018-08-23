@extends('index')

@section('title')
    Ghervas
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
	                    <?php echo $mecanic->nume .' '. $mecanic->prenume; ?>
	                </h2>
	            </div>
                
        <div class="body">
            <form method="POST" action="/mecanic/raport-zilnic/{{$mecanic->id}}">
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
                            <th>Data</th>
                            <th>Nr. masinii</th>
                            <th>Model</th>
                            <th>Suma</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $suma = 0; ?>
                             @foreach ($mecanic->Parent_Service as $value) 
                                <tr onclick="window.location='/service/show/{{$value->id}}'">
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->created_at}}</td>
                                    <td>{{$value->Beneficiar->model}}</td>
                                    <td>{{$value->Beneficiar->nr_masina}}</td>
                                    <td class="price">{{$value->suma}}</td>
                                </tr>
                             @endforeach
                  
                            @foreach($raport as $rapoarte)

                              <?php if($rapoarte->is_free == '1')
                                    {
                                        $suma += '30';
                                    }
                                    
                                    $suma += $rapoarte->suma; ?>
                            @endforeach 
                  <h1 id="sumaa" value="">Suma : <?php echo $suma . ' lei'; ?></h1>
                    </tbody>
                </table>
            </div>
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
@endsection