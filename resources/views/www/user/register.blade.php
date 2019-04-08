<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
    <!--bootstrap基本样式-->
    <script src="{{url('/')}}/static/www/js/vendor/jquery-1.11.2.min.js"></script>
    <link href="{{url('/')}}/static/www/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{url('/')}}/static/www/js/vendor/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{url('/')}}/static/www/css/login.css">
    <script type="text/javascript" src="{{url('/')}}/code/tn_code.js?v=35"></script>
    <script type="text/javascript" src="{{url('/')}}/js/jquery.base64.js"></script>
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/code/style.css?v=27" />
</head>
<body>
<div class="container">
    <div class="form row" style="width: 500px">
        <div class="form-horizontal col-md-offset-3" id="login_form" style="width: 300px">
            <h3 class="form-title">注册</h3>
            @if(!empty($message))
                <p style="color: red">{{$message}}</p>
            @endif
            <form action="addmember" method="post" autocomplete="off">
                <div class="col-md-9">
                    <div class="form-group">
                        <i class="fa fa-user fa-lg"></i>
                        <input class="form-control required" type="text" placeholder="昵称" id="username" name="username" autofocus="autofocus" maxlength="20"/>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-lock fa-lg"></i>
                        <input class="form-control required" type="password" placeholder="密码" id="password" name="password" maxlength="8"/>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-lock fa-lg"></i>
                        <input class="form-control required" type="password" placeholder="确认密码" id="passwordtwo" name="passwordtwo" maxlength="8"/>
                    </div>
                    <div  class="tncode" style="text-align: center;height: 50px ;width: 250px;background: #0c5460;margin-left:-15px;margin-top: 40px" id="verify"></div>
                    <div class="form-group">
                        <div class="form-group col-md-offset-9" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-success pull-right" id="reg_submit" disabled >注册</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $("input").blur(function(){
        var value = $(this).val();
        if(value == ''){
            $(this).after("<p style='color: red'>该项不可为空</p>");
        }
    });
    $("input").click(function () {
        $("p").remove();
    })

    $("#passwordtwo").blur(function(){
        var pwd = $("#password").val();
        var pwd2 = $("#passwordtwo").val();
        if(pwd != pwd2){
            $("#passwordtwo").after("<p style='color: red'>俩次密码不一致</p>");
        }else{
            $code = $("#passwordtwo").val();
            var aa = $.base64.encode($code);
            $("#password").val(aa);
            $("#passwordtwo").val(aa);
        }
    })
</script>
</html>