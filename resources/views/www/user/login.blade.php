<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    @include('www.head')
    <!---登录页面-->
    <link rel="stylesheet" href="{{url('/')}}/static/www/css/login.css">
    <script type="text/javascript" src="{{url('/')}}/code/tn_code.js?v=35"></script>
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/code/style.css?v=27" />
    {{--验证码--}}
    <script src="{{url('/')}}/static/www/js/code/jquery.js"></script>
    <script src="{{url('/')}}/static/www/js/code/gt.js"></script>
    {{--base64加密--}}
    <script type="text/javascript" src="{{url('/')}}/js/jquery.base64.js"></script>
</head>
<body>
<div class="container">
    <div class="form row">
        <div class="form-horizontal col-md-offset-3" id="login_form">
            <h3 class="form-title">LOGIN</h3>
            <form action="dologin" method="post" autocomplete="off">
                <meta name="csrf-token" content="{{ csrf_token() }}" />
                @csrf
                @if(!empty($error))
                    <P style="color: red">{{$error}}</P>
                @endif
                <div class="col-md-9">
                    <div class="form-group">
                        <i class="fa fa-user fa-lg"></i>
                        <input class="form-control required" type="text"  placeholder="Username" id="username" name="username" autofocus="autofocus" maxlength="20"/>
                    </div>
                    <div class="form-group" style="margin-bottom: 30px">
                        <i class="fa fa-lock fa-lg"></i>
                        <input class="form-control required" type="password" placeholder="Password" id="password" name="password" maxlength="8"/>
                    </div>
                    <div class="form-group" id="embed-submit">
                        <div id="embed-captcha" style="overflow:hidden"></div>
                        <p id="wait" class="show" style="color: #9acfea">正在加载验证码......</p>
                        <p id="notice" class="hide">请先完成验证</p>
                    </div>

                    <div class="form-group col-md-offset-9" style="margin-top: 20px">
                        <a href="/user/register" style="color: #f9f9f9">没有账号？去注册</a>
                        <button type="submit" id="reg_submit" class="btn btn-success pull-right" disabled>登录</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $("#password").blur(function(){
        var pwd = $("#password").val();
        if(pwd != ''){
            var codepwd = $.base64.encode(pwd);
            $("#password").val(codepwd);
        }
    })
</script>
<script>
    $("#reg_submit").removeAttr('disabled')
    var handlerEmbed = function (captchaObj) {
        $("#embed-submit").click(function (e) {
            var validate = captchaObj.getValidate();
            if (!validate) {
                $("#notice")[0].className = "show";
                setTimeout(function () {
                    $("#notice")[0].className = "hide";
                }, 2000);
                e.preventDefault();
            }
        });
        // 将验证码加到id为captcha的元素里，同时会有三个input的值：geetest_challenge, geetest_validate, geetest_seccode
        captchaObj.appendTo("#embed-captcha");
        captchaObj.onReady(function () {
            $("#wait")[0].className = "hide";
        }).onSuccess(function(){
            $("#reg_submit").removeAttr('disabled')
        });
    };
    $.ajax({
        // 获取id，challenge，success（是否启用failback）
        url: "https://www.huifengshow.top/gtcode/web/StartCaptchaServlet.php?t=" + (new Date()).getTime(), // 加随机数防止缓存
        type: "get",
        dataType: "json",
        success: function (data) {
            // 使用initGeetest接口
            // 参数1：配置参数
            // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
            initGeetest({
                gt: data.gt,
                challenge: data.challenge,
                new_captcha: data.new_captcha,
                product: "embed", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
                offline: !data.success // 表示用户后台检测极验服务器是否宕机，一般不需要关注
                // 更多配置参数请参见：http://www.geetest.com/install/sections/idx-client-sdk.html#config
            }, handlerEmbed);
        }
    });

</script>
</html>
