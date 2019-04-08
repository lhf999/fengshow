<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    {{--<link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">--}}
    {{--<link href="{{url('/')}}/static/www/css/bootstrap.min.css" rel="stylesheet">--}}
    <link href="{{url('/')}}/css/app.css" rel="stylesheet">
</head>
<body>
<div style="margin-left: 200px;margin-top: 100px">
    @yield('content')
</div>

@yield('script')
</body>
</html>