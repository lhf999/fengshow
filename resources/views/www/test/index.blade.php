<!DOCTYPE html>
<html>
<head>
    <title>Laravel Geetest</title>
    <script src="https://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
    <script src="https://api.geetest.com/get.php"></script>
</head>
<body>
<div class="container">
    <div class="content" id="container">
        <div class="title">Laravel 5</div>
        <form method="post" action="/verify">
            {{ csrf_field() }}
            <div class="box">
                <label>邮箱：</label>
                <input type="text" name="email" value=""/>
            </div>
            <div class="box">
                <label>密码：</label>
                <input type="password" name="password" />
            </div>
            <div class="box" id="div_geetest_lib">
                <div id="captcha"></div>
                <script src="https://static.geetest.com/static/tools/gt.js"></script>
                <script>
                    var handler = function (captchaObj) {
                        // 将验证码加到id为captcha的元素里
                        captchaObj.appendTo("#captcha");
                        captchaObj.onReady(function(){
                            //your code
                        }).onSuccess(function(){
                            alert(1);
                            //your code
                        }).onError(function(){
                            //your code
                            alert(12);
                        })
                    };
                    $.ajax({
                        // 获取id，challenge，success（是否启用failback）
                        url: "captcha?rand="+Math.round(Math.random()*100),
                        type: "get",
                        dataType: "json", // 使用jsonp格式
                        success: function (data) {
                            // 使用initGeetest接口
                            // 参数1：配置参数，与创建Geetest实例时接受的参数一致
                            // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
                            initGeetest({
                                gt: data.gt,
                                challenge: data.challenge,
                                product: "float", // 产品形式
                                offline: !data.success
                            }, handler);
                        }
                    });
                    /*ajax({
                        url: "API1接口（详见服务端部署）",
                        type: "get",
                        dataType: "json",
                        success: function (data) {
                            //请检测data的数据结构， 保证data.gt, data.challenge, data.success有值
                            initGeetest({
                                // 以下配置参数来自服务端 SDK
                                gt: data.gt,
                                challenge: data.challenge,
                                offline: !data.success,
                                new_captcha: true,
                                product: 'bind'
                            }, function (captchaObj) {
                                captchaObj.onReady(function(){
                                    //your code
                                }).onSuccess(function(){

                                    //your code
                                }).onError(function(){
                                    //your code
                                })
                            })
                        }
                    })*/
                </script>
            </div>
            <div class="box">
                <button id="submit_button">提交</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>