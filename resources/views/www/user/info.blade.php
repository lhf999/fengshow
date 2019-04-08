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
<style>
    label.error{color: red;}
</style>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5 style="text-align: center">修改资料</h5>
                </div>
                <div class="ibox-content">
                    <form method="post" action="#" class="form-horizontal" id="editForm">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">姓名：</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name" name="username" placeholder="admin" value="{{$arr['username']}}" disabled="disabled">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label for="registertime" class="col-sm-2 control-label">注册时间：</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="registertime" name="created" value="{{$arr['created']}}" disabled="disabled">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label for="sex" class="col-sm-2 control-label">性别：</label>
                            <div class="col-sm-7" style="padding: 6px 12px;">
                                <input type="radio" id="sex" name="sex" value="1" @if ($arr['sex'] == 1) {{'checked="checked"'}} @endif> 男
                                <input type="radio" id="sex" name="sex" value="2" @if ($arr['sex'] == 2) {{'checked="checked"'}} @endif> 女
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label for="birthday" class="col-sm-2 control-label">生日：</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="birthday" name="birthday" value="{{$arr['birthday']}}"  placeholder="请输入您的生日">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email：</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="email" name="email" value="{{$arr['email']}}" placeholder="请输入您的Email">
                                @if(!empty($arr['email']) && $arr['verify'] == 1)
                                    <a href="verify?type=1&value={{$arr['email']}}">去验证邮箱</a>
                                @endif
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label for="mobile" class="col-sm-2 control-label">手机：</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="mobile" name="mobile" value="{{$arr['mobile']}}" placeholder="请输入您的手机">
                                @if(!empty($arr['mobile']) && $arr['verify'] == 1)
                                    <a href="verify?type=2&value={{$arr['mobile']}}">去验证手机号</a>
                                @endif
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label for="qq" class="col-sm-2 control-label">QQ：</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="qq" name="qq" value="{{$arr['qq']}}" placeholder="请输入您的QQ">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">地址：</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="address" name="address" value="{{$arr['address']}}" placeholder="请输入您的地址">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">头像：</label>
                            <div class="col-sm-7">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-8">
                                            @if (isset($arr['image']) && $arr['image'])
                                                <div class="fileupload-new thumbnail controls" style="max-width:900px;max-height:500px;">
                                                    <img src='{{$arr["image"]}}' style="max-width:450px;max-height:250px;">
                                                </div>
                                            @endif
                                            <span class="btn btn-file">
                                                <input type="file" class="default uploadcover" name="files[]" />
                                            </span>
                                            <input type="hidden" name="image" value="{{$arr['image']}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-7 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary" id="sumbit">保存内容</button>
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
    $('#editForm').validate({
        rules:{
            mobile:{
                required:true,
                rangelength:[11,11]
            },
            email:{
                required:true,
                email:true,
            }
        },
        messages: {
            mobile:{
                required: "这是必填字段",
                rangelength:'长度有误'
            },
            email:{
                required: "这是必填字段",
                email: "请输入有效的电子邮件地址",
            }
        },
        submitHandler:function(form){
            var addAdmin=$('#editForm').serialize();
            $.ajax({
                type:"post",
                url:"editinfo",
                cache:false,
                dataType: "json",
                data:addAdmin,
                success:function(msg) {
                    if (msg) {
                        layer.msg(msg.message, {icon: 1});
                        document.getElementById("butModel").click();
                        $table.bootstrapTable('refresh');
                    } else {
                        layer.msg(msg.message, {icon: 1});
                        document.getElementById("butModel").click();
                        $table.bootstrapTable('refresh');
                    }
                },
                error:function(data, textStatus, xhr){
                    $('#errorMsg').html(data);
                }
            });
        }
    });
    $.validator.addMethod("numletter",function(value,element,params){
        var checkName = /^wx+[a-z0-9]{16}$/;
        return this.optional(element)||(checkName.test(value));
    },"请输入正确的appid");
</script>
</html>
