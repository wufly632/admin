<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>运营中心 - 句逗——新零售，用句逗</title>
    <meta name="title" content="运营中心 - 句逗——新零售，用句逗">
    <meta name="keywords" content="全渠道零售、全渠道解决方案、线上线下相融合、句逗新零售、多网点、一键小程序、小程序开发、微商城开发、杭州句逗科技有限公司、句逗科技">
    <meta name="description" content="句逗，专注新零售（全渠道零售）解决方案,提供全渠道完美互通、深度融合的信息化管理工具。解决线上线下渠道拓展、打通，覆盖线上商城、线下多网点门店、线下加盟连锁、微信公众号商城、小程序、APP等">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link type="image/x-icon" rel="shortcut icon" href="common/images/icon.png">
    <?php css('admin', 'bootstrap.min'); ?>
    <?php css('admin', 'reset'); ?>
    <?php css('admin', 'style'); ?>

    <?php js('admin', 'jquery-1.10.2'); ?>
    <?php js('admin', 'bootstrap.min'); ?>
    <?php js('admin', 'jquery.validate.min'); ?>
    <?php js('admin', 'jquery.validate.messages_zh'); ?>
    <?php js('admin', 'index'); ?>
</head>
<body class="back">
<div class="logon-admin">
    <div class="message">cucoe科技 - 用户登录</div>
    <form class="logon-form" method="post">
        <div class="logon-input">
            <input type="text" name="username" class="required" placeholder="用户名">
        </div>
        <div class="logon-input">
            <input type="password" name="password" class="required" placeholder="密码">
        </div>
        <div class="logon-input clearfix">
            <div class="proving">
                <input type="text" name="captcha" class="required" placeholder="验证码">
            </div>
            <a href="javascript:;" class="proving-png">
            </a>
        </div>
        <div class="forget clearfix">
            <label class="clearfix">
                <input type="checkbox" name="remember" value="1" checked="checked"/>
                <div class="logon-icon">
                    <i class="iconfont yes">&#xe6d3;</i>
                    <i class="iconfont no">&#xe6e4;</i>
                </div>
                <p>记住密码</p>
            </label>
            <a href="javascript:;">忘记密码？</a>
        </div>
        <button type="submit" class="login-submit">登 录</button>
    </form>
    <p class="account">还没有账号？请联系<a href="javascript:;">龙渊</a></p>
</div>
</body>
</html>
<script type="text/javascript">
    $(function(){
        //登录验证码
        $('.logon-form').on('click', '.proving-png', function(event){
            $.ajax({
                type: 'post',
                dataType : 'json',
                url: hostUrl()+'/account/ajaxJsonCaptcha',
                success: function(json) {
                    $('.proving-png').html(json.image);
                },
                error : function(xhq, status, error) {
                    console.log(status+'-'+error);
                }
            });
            event.preventDefault();
        });

        $('.logon-form').submit(function(e) {
            e.preventDefault();
        }).validate({
            messages: {
                captcha: {
                    required: '请输入验证码'
                }
            },
            submitHandler: function(f) {
                $.ajax({
                    type: 'post',
                    async: false,
                    dataType : 'json',
                    url: hostUrl()+'/account/loginPost',
                    data: $('.logon-form').serialize(),
                    beforeSend: function() {
                        $('button.login-submit').text('登录中...').attr('disabled', true);
                    },
                    success: function(json) {
                        if (json.status) {
                            window.location.href = json.messages;
                        } else {
                            alert(json.messages);
                            $('button.login-submit').text('登　录').removeAttr('disabled');
                        }
                    }
                });
                return false;
            }
        });

    });
</script>