<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>



    <link rel="stylesheet" href="{{asset('assets/login/css/style.css')}}">


</head>

<body>

<body>
<div class="login">
    <form action="{{url('admin/login')}}" method="post">
        {{csrf_field()}}
        @if(session('error'))
        <p style="background: #FF5722" align="center">{{session('error')}}</p>
        @endif
        <div class="login-screen">
            <div class="app-title">
                <h1>Login</h1>
            </div>

            <div class="login-form">
                <div class="control-group">
                    <input type="text" class="login-field" value="{{$cookie['admin_name'] or ''}}" placeholder="username" id="login-name" name="admin_name">
                    <label class="login-field-icon fui-user" for="login-name"></label>
                </div>
                <div class="control-group">
                    <input type="password" class="login-field" value="{{$cookie['admin_pass'] or ''}}" placeholder="password" id="login-pass" name="admin_pass">
                    <label class="login-field-icon fui-lock" for="login-pass"></label>
                </div>
                <div class="control-group" style="margin-left: 150px">
                    <input type="checkbox"  value="remember" placeholder="password" style="width: 13px" name="remember" checked>
                    <label class="login-field-icon fui-lock" for="login-pass" >记住密码</label>
                </div>

                <button type="submit" class="btn btn-primary btn-large btn-block">login</button>
                <a class="login-link" href="{{url('admin/sign')}}">没有账户?点击注册</a>
                <a class="login-link" href="#">Lost your password?</a>
            </div>
        </div>
    </form>

</div>
</body>



</body>

</html>
