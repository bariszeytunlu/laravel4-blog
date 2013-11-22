<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Barıs's Blog" content="">
    <meta name="Barış Zeytünlü" content="">
    <title>Barış's Blog Login</title>


@section('assets')
    {{-- Bootstrap core CSS --}}
    {{ HTML::style('_assets/css/bootstrap.min.css') }}
    {{ HTML::style('_assets/css/bootstrap-theme.min.css') }}




    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
@show
</head>

<body>

    @yield('content')


{{-- Bootstrap & another js files --}}
{{ HTML::script('_assets/js/bootstrap.min.js') }}
{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}
</body>
</html>
