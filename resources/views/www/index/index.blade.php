<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="{{url('/')}}/static/www/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/')}}/static/www/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="{{url('/')}}/static/www/css/fontAwesome.css">
    <link rel="stylesheet" href="{{url('/')}}/static/www/css/hero-slider.css">
    <link rel="stylesheet" href="{{url('/')}}/static/www/css/owl-carousel.css">
    <link rel="stylesheet" href="{{url('/')}}/static/www/css/templatemo-style.css">
    <link rel="stylesheet" href="{{url('/')}}/static/www/css/lightbox.css">

    <script src="{{url('/')}}/static/www/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

    <title>峰秀</title>
</head>
<body>
<div class="header">
    <div class="container">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                    <span class="sr-only">切换导航</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="https://www.huifengshow.top" class="navbar-brand scroll-top"><em>首</em>页</a>
            </div>
            <!--/.navbar-header-->
            <div id="main-nav" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    @if(Session::has('memberInfo'))
                        <li><a href="/user/info" class="scroll-top"><h4 style="margin-top: 31px;color: red">{{Session::get('memberInfo')['username']}}</h4></a></li>
                        <li><a href="/user/outlogin" class="scroll-top">退出</a></li>
                    @else
                        <li><a href="/user/login" class="scroll-top">登录</a></li>
                    @endif
                    <li><a href="/news" class="scroll-link">文章</a></li>
                    <li><a href="/video" class="scroll-link">视频</a></li>
                    <li><a href="/audio" class="scroll-link">音频</a></li>
                    <li><a href="/image" class="scroll-link">图片</a></li>
                </ul>
            </div>
            <!--/.navbar-collapse-->
        </nav>
        <!--/.navbar-->
    </div>
    <!--/.container-->
</div>
<!--/.header-->


<div class="parallax-content baner-content" id="home">
    <div class="container">
        <div class="text-content">
            <!--<h2>Awesome <span>HTML5</span> Template <em>TINKER</em></h2>
            <p>Phasellus aliquam finibus est, id tincidunt mauris fermentum a. In elementum diam et dui congue, ultrices bibendum mi lacinia. Aliquam lobortis dapibus nunc, nec tempus odio posuere quis. </p>-->
            <div class="primary-white-button">
                <a href="/all" class="scroll-link" data-id="about">Let's Start</a>
            </div>
        </div>
    </div>
</div>


</body>
<script src="{{url('/')}}/static/www/js/vendor/jquery-1.11.2.min.js"></script>
<script>window.jQuery || document.write('<script src="{{url('/')}}/static/www/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

<script src="{{url('/')}}/static/www/js/vendor/bootstrap.min.js"></script>

<script src="{{url('/')}}/static/www/js/plugins.js"></script>
<script src="{{url('/')}}/static/www/js/main.js"></script>


<script type="text/javascript">

</script>
</html>