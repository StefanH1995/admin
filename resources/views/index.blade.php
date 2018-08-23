<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Ghervas | Server</title>
    <!-- Favicon-->
    <link rel="icon" href="ghervas.png" type="image/x-icon">

    <!-- Bootstrap Core Css -->
    @section('css')
        {{-- {{ Html::style('bsbmd/plugins/bootstrap/css/bootstrap.css') }} --}}
        {{-- {{ Html::style('bsbmd/plugins/node-waves/waves.css') }} --}}
        {{-- {{ Html::style('bsbmd/plugins/animate-css/animate.css') }} --}}
        {{-- {{ Html::style('bsbmd/plugins/morrisjs/morris.css') }} --}}
        {{-- {{ Html::style('bsbmd/css/style.css') }} --}}
        {{-- {{ Html::style('bsbmd/css/themes/all-themes.css') }} --}}

<!-- NEW ADDED ********************************************************* -->
        {{ Html::style('assets/vendor/bootstrap/css/bootstrap.min.css') }}
        {{ Html::style('assets/vendor/font-awesome/css/font-awesome.min.css') }}
        {{ Html::style('assets/vendor/linearicons/style.css') }}
        {{ Html::style('assets/vendor/chartist/css/chartist-custom.css') }}
        {{ Html::style('assets/css/main.css') }}
        {{ Html::style('assets/css/demo.css') }}
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet" type="text/css">
        {{-- <style type="text/css">            
            td, th{
                text-align: center;
                vertical-align: middle !important;
            }
            th{
                padding: 10px !important;
            }
        </style> --}}
<!-- NEW ADDED ********************************************************* -->

         <!-- Google Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css"> --}}
        {{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css"> --}}
    @show

    @yield('extra-css')
</head>

<?php $url = url()->current(); 
if($url == 'http://127.0.0.1:8000')
    { ?>
<body>
<?php    }else{ ?>
<body class="layout-fullwidth">
<?php }
?>

    @include('layouts.partials.loader')
    {{-- <div class="overlay"></div> --}}
    @include('layouts.partials.header')
    @include('layouts.partials.sidebar')

    {{-- <section class="content"> --}}
        @yield('content')
    {{-- </section> --}}

    @section('script')
    {{Html::script('bsbmd/plugins/jquery/jquery.min.js')}}
       {{--  {{Html::script('bsbmd/plugins/jquery/jquery.min.js')}}
        {{Html::script('bsbmd/plugins/bootstrap/js/bootstrap.js')}}
        {{Html::script('bsbmd/plugins/bootstrap-select/js/bootstrap-select.js')}}
        {{Html::script('bsbmd/plugins/jquery-slimscroll/jquery.slimscroll.js')}}
        {{Html::script('bsbmd/plugins/node-waves/waves.js')}}  --}}
    @show    
    @yield('extra-script')
    @section('script-bottom')

        {{-- {{Html::script('bsbmd/js/admin.js')}} --}}
<!-- NEW ADDED **************************** -->
        {{-- {{Html::script('assets/vendor/jquery/jquery.min.js')}} --}}
        {{Html::script('assets/vendor/bootstrap/js/bootstrap.min.js')}}
        {{Html::script('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}
        {{Html::script('assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}
        {{Html::script('assets/vendor/chartist/js/chartist.min.js')}}
        {{Html::script('assets/scripts/klorofil-common.js')}} 
    <script>
    $(function() {
        var data, options;

        // headline charts
        data = {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            series: [
                [23, 29, 24, 40, 25, 24, 35],
                [14, 25, 18, 34, 29, 38, 44],
            ]
        };

        options = {
            height: 300,
            showArea: true,
            showLine: false,
            showPoint: false,
            fullWidth: true,
            axisX: {
                showGrid: false
            },
            lineSmooth: false,
        };

        new Chartist.Line('#headline-chart', data, options);


        // visits trend charts
        data = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            series: [{
                name: 'series-real',
                data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
            }, {
                name: 'series-projection',
                data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
            }]
        };

        options = {
            fullWidth: true,
            lineSmooth: false,
            height: "270px",
            low: 0,
            high: 'auto',
            series: {
                'series-projection': {
                    showArea: true,
                    showPoint: false,
                    showLine: false
                },
            },
            axisX: {
                showGrid: false,

            },
            axisY: {
                showGrid: false,
                onlyInteger: true,
                offset: 0,
            },
            chartPadding: {
                left: 20,
                right: 20
            }
        };

        new Chartist.Line('#visits-trends-chart', data, options);


        // visits chart
        data = {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            series: [
                [6384, 6342, 5437, 2764, 3958, 5068, 7654]
            ]
        };

        options = {
            height: 300,
            axisX: {
                showGrid: false
            },
        };

        new Chartist.Bar('#visits-chart', data, options);


        // real-time pie chart
        var sysLoad = $('#system-load').easyPieChart({
            size: 130,
            barColor: function(percent) {
                return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
            },
            trackColor: 'rgba(245, 245, 245, 0.8)',
            scaleColor: false,
            lineWidth: 5,
            lineCap: "square",
            animate: 800
        });

        var updateInterval = 3000; // in milliseconds

        setInterval(function() {
            var randomVal;
            randomVal = getRandomInt(0, 100);

            sysLoad.data('easyPieChart').update(randomVal);
            sysLoad.find('.percent').text(randomVal);
        }, updateInterval);

        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

    });
    </script>

    @show
</body>

</html>