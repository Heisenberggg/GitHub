<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    {{$name}}
     <form action="api/login" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
            用户名：<input type="text" name="username">
             密码：<input type="password" name="password">
            <input type="submit" value="提交">
    </form>
</body>
</html>