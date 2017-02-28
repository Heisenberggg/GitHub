<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <style type="text/css">
        body, div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, pre, form, fieldset, input, textarea, p, blockquote, th, td {
            margin: 0;
            padding: 0;
        }
        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        body {
            min-width: 1200px;
            font-family: '微软雅黑';
            background-color: #f5f6fa;
            overflow: hidden;
        }
        li {
            list-style: none;
        }
        img {
            border: none;
        }
        input,
        select,
        textarea {
            outline: none;
            border: none;
            background: none;
        }
        textarea {
            resize: none;
        }
        a {
            text-decoration: none;
        }
        a:hover,
        a:active,
        a:focus {
            text-decoration: none;
            outline: none;
        }
        .clearfix {
            display: block;
            zoom: 1;
        }
        .clearfix:after {
            content: " ";
            display: block;
            font-size: 0;
            height: 0;
            clear: both;
            visibility: hidden;
        }
        .warp{
            width: 465px;
            height: 604px;
            overflow: hidden;
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%,-50%);
            -moz-transform: translate(-50%,-50%);
            -ms-transform: translate(-50%,-50%);
            -o-transform: translate(-50%,-50%);
            transform: translate(-50%,-50%);
            background-color: #fff;
            -webkit-border-radius:8px;
            -moz-border-radius:8px;
            border-radius:8px;
            -webkit-box-shadow:0 0  8px rgba(0,0,0,0.4);
            -moz-box-shadow: 0 0 8px rgba(0,0,0,0.4);
            box-shadow: 0 0 8px rgba(0,0,0,0.4);
            padding-top: 74px;
        }
        .logo{
            width: 148px;
            margin: 0 auto;
        }
        .logo img{
            display: block;
            width: 100%;
            height: auto;
        }
        .line{
            width: 394px;
            height: 2px;
            background-color: #f0f0f0;
            margin: 61px auto;
        }
        .login{
            width: 261px;
            height: 90px;
            margin: 0 auto;
            background-color: #f0f0f0;
            -webkit-border-radius:12px;
            -moz-border-radius:12px;
            border-radius:12px;
            border:2px solid #cfd0d2;
        }
        .login_user{
            height: 44px;
            border-bottom: 2px solid #cfd0d2;
        }
        .login_user input{
            padding-left: 18px;
            padding-right: 6px;
            width: 100%;
            height: 42px;
            line-height: 42px;
        }
        .login_pass{
            height: 42px;
        }
        .login_pass input{
            padding-left: 18px;
            padding-right: 6px;
            width: 100%;
            height: 42px;
            line-height: 42px;
        }
        .btn{
            width: 260px;
            height: 45px;
            font-size: 16px;
            color: #fff;
            background-color: #02bdf2;
            border: 1px solid #cfd0d2;
            margin: 45px auto 0;
            line-height: 43px;
            text-align: center;
            cursor: pointer;
        }
        .warp_bottom{
            height: 44px;
            margin-top: 113px;
            background-image:-webkit-linear-gradient(to left, #485173, #24283E);
            background-image:linear-gradient(to left, #485173, #24283E);
            line-height: 44px;
            font-size: 14px;
            color: #fff;
            text-align: center;
        }
        .leftball{
            width: 900px;
            height: 900px;
            position: absolute;
            top: 50%;
            left: 0;
            -webkit-transform: translate(-50%,-50%);
            -moz-transform: translate(-50%,-50%);
            -ms-transform: translate(-50%,-50%);
            -o-transform: translate(-50%,-50%);
            transform: translate(-50%,-50%);
        }
        .leftball img{
            display: block;
            width: 100%;
            height: auto;
        }
        .rightball{
            width: 900px;
            height: 900px;
            position: absolute;
            top: 50%;
            right: 0;
            -webkit-transform: translate(50%,-50%);
            -moz-transform: translate(50%,-50%);
            -ms-transform: translate(50%,-50%);
            -o-transform: translate(50%,-50%);
            transform: translate(50%,-50%);
        }
        .rightball img{
            display: block;
            width: 100%;
            height: auto;
        }
    </style>
    <script type="text/javascript">
        $(function () {
            $('#ChinaMap').SVGMap({
                mapName: 'china',
                mapWidth: 1366,
                mapHeight: 650,
                stateData: {
                    'heilongjiang': {'stateInitColor': 8},
                    'beijing': {'stateInitColor': 2},
                    'shanghai': {'stateInitColor': 3},
                    'tianjin': {'stateInitColor': 4},
                    'sichuan': {'stateInitColor': 5},
                    'shandong': {'stateInitColor': 6},
                    'shanxi': {'stateInitColor': 3},
                    'zhejiang': {'stateInitColor': 6},
                    'jiangshu': {'stateInitColor': 2},
                    'hunan': {'stateInitColor': 4},
                    'guizou': {'stateInitColor': 5},
                    'neimenggu': {'stateInitColor': 6},
                    'henan': {'stateInitColor': 3},
                    'gansu': {'stateInitColor': 4},
                    'ningxia': {'stateInitColor': 2},
                    'hebei':{'stateInitColor': 7},
                    'jilin': {'diabled': true}
                },
                clickCallback: function(stateData, obj){
                    /*$('#ClickCallback').html('点击了：'+obj.name);*/
                    /*alert('点击了：'+obj.name);*/
                    gjdh(document.querySelector("svg"),"M 420,180 Q 290,300 420,410");
                }
            });
            function gjdh(mysvg,lujing){
                var circleObj=document.createElementNS("http://www.w3.org/2000/svg","circle");
                var animateObj=document.createElementNS("http://www.w3.org/2000/svg","animateMotion");
                var rectObj = document.createElementNS("http://www.w3.org/2000/svg","path");
                var mapPath=document.createElement("mpath");
                if(circleObj){
                    circleObj.setAttribute("cx","420");
                    circleObj.setAttribute("cy","180");
                    circleObj.setAttribute("r","10");
                    circleObj.setAttribute("style","fill:orange;stroke:yellow;stroke-width:2");
                    if(animateObj){
                        animateObj.setAttribute("dur","15s");
                        animateObj.setAttribute("path",lujing);
                    }
                    circleObj.appendChild(animateObj);
                };
                if(rectObj){
                    rectObj.setAttribute("id","line");
                    rectObj.setAttribute("d",lujing);
                    rectObj.setAttribute("style","fill:none;stroke:red;stroke-width:2");
                    /* rectObj.setAttributeNS(null, 'class', 'wukong-svg');*/
                    mysvg.appendChild(rectObj);
                }
                mysvg.appendChild(circleObj);
            }
            function forward(event){
                var e = event || window.event;
                var scrollX = document.documentElement.scrollLeft || document.body.scrollLeft;
                var scrollY = document.documentElement.scrollTop || document.body.scrollTop;
                var x = e.pageX || e.clientX + scrollX;
                var y = e.pageY || e.clientY + scrollY;
                alert(x+","+y); //相对于浏览器
            }
            document.onclick=forward;
        });
    </script>
</head>
<body>
    <div class="leftball">
        <img src="images/map.png">
    </div>
    <div class="rightball">
        <img src="images/map.png">
        </div>
        <section class="warp">
        <div class="logo">
            <img src="images/logo.png">
        </div>
        <div class="line"></div>
        <div class="login">
            <div class="login_user">
                <input type="text" placeholder="用户名" id="username">
            </div>
            <div class="login_pass">
                <input type="password" placeholder="密码" id="password">
            </div>
        </div>
        <div class="btn" id="btnsave">
            登录
        </div>
        <div class="warp_bottom">
            1436578653543
        </div>
    </section>
<script type="text/javascript" src="{{ URL::asset('/js/lib/jquery.js') }}"></script>
<script type="text/javascript">

    $(function(){
        $('#btnsave').on('click',function(){
            $.ajax({
                url: '/api/login',
                type: 'POST',
                dataType: 'json',
                data: {
                        username:$('#username').val(),
                        password:$('#password').val(),
                        _token:"{{csrf_token()}}"
                },
                success: function(data){
                    if(data.status == 1){
                        window.location.href="http://www.laravelapp.com";
                    }else{
                        alert(data.msg);
                    }
                }
            })
        })
    })
</script>
</body>
</html>