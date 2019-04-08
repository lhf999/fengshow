<!DOCTYPE html>
<html>
<head>

    <script src="{{url('/')}}/static/www/js/vendor/jquery-1.11.2.min.js"></script>
    <link rel="stylesheet" href="{{url('/')}}/static/www/css/bootstrap.min.css">
    <link href="{{url('/')}}/static/www/css/fontawesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{url('/')}}/static/www/css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/')}}/static/www/css/bootstrap-theme.min.css">
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{url('/')}}/static/www/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/')}}/static/www/css/bootstrap-theme.min.css">
    <!-- 外部插件——JQ表单验证插件JS-->
    <script src="{{url('/')}}/static/www/js/jquery.validate.js/jquery.validate.min.js"></script>
    <script src="{{url('/')}}/static/www/js/jquery.validate.js/messages_zh.min.js"></script>
    <!-- 外部插件——消息提示插件JS-->
    <script src="{{url('/')}}/static/www/js/layer-v2.4/layer/layer.js"></script>

    <script src="{{url('/')}}/static/www/js/jqueryUi/jquery-ui.min.js"></script>
</head>
<body class="gray-bg">
<style type="text/css">
    label.error{color: red;}
</style>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row" style="margin-top: 20px">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5 style="text-align: center">验证账号</h5>
                </div>
                <div class="ibox-content">
                    <form method="post" action="/" class="form-horizontal" id="verifyForm" style="margin-left: 700px;margin-top:30px">
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        @csrf
                        <input type="hidden" name="type" id="type" value="{{$arr['type']}}" />
                        <div class="hr-line-dashed"></div>
                        @if($arr['type'] == 1)
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email：</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="email" name="email" value="{{$arr['value']}}" disabled="disabled" >
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                       @else
                        <div class="form-group">
                            <label for="mobile" class="col-sm-2 control-label">手机：</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="mobile" name="mobile" value="{{$arr['value']}}" disabled="disabled" >
                            </div>
                        </div>
                        @endif
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label for="qq" class="col-sm-2 control-label">  </label>
                            <div class="col-sm-1">
                                <input type="button" class="btn btn-primary" id="send" name="send" value="点击发送验证码" >
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label for="qq" class="col-sm-2 control-label">验证码：</label>
                            <div class="col-sm-1">
                                <input type="text" class="form-control" id="code" name="code" value="">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-1 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary" id="sumbit">验证</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!--ibox  end-->
        </div><!--col-sm-12 end-->
    </div><!--row end-->
</div><!--wrapper end-->
</div>
</body>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
        $("#send").click(function(){
            //发送请求
            var type = $('#type').val();
            if(type == 1){
                var value = $('#email').val();
            }else{
                var value = $('#mobile').val();
            }
            $("#send").attr('disabled',true);
            var times = 120;
            var st = setInterval(function () {
                times--;
                if(times<0){
                    clearInterval(st);
                    $("#send").val("点击发送验证码");
                    $("#send").attr('disabled',false);
                }else{
                    $("#send").val(times+"s");
                }
            },1000)
            $.ajax({
                type:"post",
                url:"sendmessage",
                cache:false,
                dataType: "json",
                data:{type:type,value:value},
                success:function(msg) {
                    if (msg) {
                        layer.msg(msg.message, {icon: 1});
                    } else {
                        layer.msg(msg.message, {icon: 1});
                    }
                },
                error:function(data, textStatus, xhr){
                    $('#errorMsg').html(data);
                }
            });
        });
    });


</script>
</html>
