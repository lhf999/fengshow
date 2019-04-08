<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{$title}}</title>
    <link href="{{url('/')}}/static/www/js/family/jquery.treemenu.css" rel="stylesheet" type="text/css">
    <style>
        *{list-style:none;border:none;}
        body{font-family:Arial;background-color:#2C3E50;}
        .tree {  color:#46CFB0;width:800px;margin:100px auto;}
        .tree li,
        .tree li > a,
        .tree li > span {
            padding: 4pt;
            border-radius: 4px;
        }

        .tree li a {
            color:#46CFB0;
            text-decoration: none;
            line-height: 20pt;
            border-radius: 4px;
        }

        .tree li a:hover {
            background-color: #34BC9D;
            color: #fff;
        }

        .active {
            background-color: #34495E;
            color: white;
        }

        .active a {
            color: #fff;
        }

        .tree li a.active:hover {
            background-color: #34BC9D;
        }
        .a{
            width: 200px;
        }
    </style>
</head>

<body>
<ul class="tree">
    <li>
        <a href="#">爷爷</a>
        <ul>
            <li>
                <a class="active" href="#">爸爸</a>
                <ul>
                    <li>
                        <a class="active" href="#">我</a>
                        <ul>
                            <li>
                                <a class="active" href="#">我儿子</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">叔叔</a>
                <ul>
                    <li><a href="#">jQuery</a></li>
                    <li><a href="#">jQuery UI</a></li>
                    <li><a href="#">jQuery Mobile</a></li>
                </ul>
            </li>
            <li><a href="#">姑姑</a></li>
            <li><a href="#">大爷</a></li>
        </ul>
    </li>
    <li><span>Category</span>
        <ul>
            <li><a href="#">jQuery</a>
                <ul>
                    <li><a href="#">jQuery</a></li>
                    <li><a href="#">jQuery UI</a></li>
                    <li><a href="#">jQuery Mobile</a></li>
                </ul>
            </li>
            <li><a href="#">JavaScript</a>
                <ul>
                    <li><a href="#">AngularJS</a></li>
                    <li><a href="#">React</a></li>
                    <li><a href="#">Backbone</a></li>
                </ul>
            </li>
            <li><a href="#suits">Golang</a></li>
        </ul>
    </li>
</ul>
<script src="{{url('/')}}/static/www/js/family/jquery-1.11.2.min.js"></script>
<script src="{{url('/')}}/static/www/js/family/jquery.treemenu.js"></script>
<script>
    $(function(){
        $(".tree").treemenu({delay:300}).openActive();
    });
</script>
</body>
</html>
