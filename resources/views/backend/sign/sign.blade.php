<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>Sign Form</title>
    <link rel="stylesheet" href="{{asset('assets/login/css/style.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
</head>


<body>
<div class="login">
    <form action="{{url('admin/sign')}}" method="post" id="myform">
        {{csrf_field()}}
        @if(session('error'))
            <p style="background: #FF5722" align="center">{{session('error')}}</p>
        @endif
        <div class="login-screen">
            <div class="app-title">
                <h1>添加管理员</h1>
            </div>

            <div class="login-form">
                <div class="control-group">
                    <input type="text" class="login-field" value="" placeholder="用户名" id="login-name" name="username" autocomplete="off">
                    <label class="login-field-icon fui-user" for="login-name"></label>
                    <span></span>
                </div>

                <div class="control-group">
                    <input type="password" class="login-field" value="" placeholder="密码" id="login-pass" name="password">
                    <label class="login-field-icon fui-lock" for="login-pass"></label>
                    <span></span>
                </div>

                <div class="control-group">
                    <input type="password" class="login-field" value="" placeholder="确认密码" id="login-repass" name="repassword">
                    <label class="login-field-icon fui-lock" for="login-pass"></label>
                    <span></span>
                </div>

                <button type="submit" class="btn btn-primary btn-large btn-block">添加管理员</button>
                {{--<a class="login-link" href="#">Lost your password?</a>--}}
            </div>
        </div>
    </form>

</div>
</body>
<script type="text/javascript">
    var us1 = us2 = us3 = us4 = false;
        $('#login-name').blur(function () {
            var preg_username = /^[0-9a-zA-Z_]{5,16}$/;
            var username = $('#login-name').val();
            if(preg_username.test(username)){
                $('span:eq(0)').html('√').css('color','green');
                us1 = true;
            }else{
                $('span:eq(0)').html('用户名为5-16位数字字母下划线').css('color','red');
                us1 = false;
            }
        });

    $('#login-pass').blur(function () {
        var preg_password = /^[0-9a-zA-Z_]{5,16}$/;
        var password = $('#login-pass').val();
        if(preg_password.test(password)){
            $('span:eq(1)').html('√').css('color','green');
            us2 = true;
        }else{
            $('span:eq(1)').html('密码为5-16位数字字母下划线').css('color','red');
            us2 = false;
        }
    });

    $('#login-repass').blur(function () {
       var repassword = $('#login-repass').val();
       if (repassword !== $('#login-pass').val()){
           $('span:eq(2)').html('两次密码不一致').css('color','red');
           us3 = false;
       }else{
           $('span:eq(2)').html('√').css('color','green');
           us3 = true;
       }
    });


    $('#myform').submit(function () {
        var data = $('#login-name').val();
        // alert(data);
        $.ajax({
            type:'POST',
            url:'/admin/checkAdmin',
            data:{
                'data':data,
                '_token':'{{csrf_token()}}'
            },
            async:false,
            success:function (data) {
                if (data == 0){
                    $('span:eq(0)').html('用户名已存在').css('color','red');
                    us4 = false;
                } else{
                    us4 = true;
                }
            }
        });
        return (us1 && us2 && us3 && us4);
    });
</script>



</html>
