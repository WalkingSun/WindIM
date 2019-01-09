<?php
/**
 * Created by PhpStorm.
 * User: WalkingSun
 * Date: 2019/1/8
 * Time: 19:14
 */


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>vue</title>
    <style>
        *, *:before, *:after {
            box-sizing: border-box;
        }
        body, html {
            height: 100%;
            overflow: hidden;
        }
        body, ul {
            margin: 0;
            padding: 0;
        }
        body {
            color: #4d4d4d;
            font: 14px/1.4em 'Helvetica Neue', Helvetica, 'Microsoft Yahei', Arial, sans-serif;
            background: #f5f5f5 url('dist/images/bg.jpg') no-repeat center;
            background-size: cover;
            font-smoothing: antialiased;
        }
        ul {
            list-style: none;
        }
        #chat {
            margin: 20px auto;
            width: 800px;
            height: 600px;
        }
    </style>
    <style type="text/css">#chat{overflow:hidden;border-radius:3px}#chat .main,#chat .sidebar{height:100%}#chat .sidebar{float:left;width:200px;color:#f4f4f4;background-color:#2e3238}#chat .main{position:relative;overflow:hidden;background-color:#eee}#chat .m-text{position:absolute;width:100%;bottom:0;left:0}#chat .m-message{height:calc(100% - 10pc)}</style><style type="text/css">.m-card{padding:9pt;border-bottom:1px solid #24272c}.m-card footer{margin-top:10px}.m-card .avatar,.m-card .name{vertical-align:middle}.m-card .avatar{border-radius:2px}.m-card .name{display:inline-block;margin:0 0 0 15px;font-size:1pc}.m-card .search{padding:0 10px;width:100%;font-size:9pt;color:#fff;height:30px;line-height:30px;border:1px solid #3a3a3a;border-radius:4px;outline:0;background-color:#26292e}</style><style type="text/css">.m-list li{padding:9pt 15px;border-bottom:1px solid #292c33;cursor:pointer;-webkit-transition:background-color .1s;transition:background-color .1s}.m-list li:hover{background-color:hsla(0,0%,100%,.03)}.m-list li.active{background-color:hsla(0,0%,100%,.1)}.m-list .avatar,.m-list .name{vertical-align:middle}.m-list .avatar{border-radius:2px}.m-list .name{display:inline-block;margin:0 0 0 15px}</style><style type="text/css">.m-text{height:10pc;border-top:1px solid #ddd}.m-text textarea{padding:10px;height:100%;width:100%;border:none;outline:0;font-family:Micrsofot Yahei;resize:none}</style><style type="text/css">.m-message{padding:10px 15px;overflow-y:scroll}.m-message li{margin-bottom:15px}.m-message .time{margin:7px 0;text-align:center}.m-message .time>span{display:inline-block;padding:0 18px;font-size:9pt;color:#fff;border-radius:2px;background-color:#dcdcdc}.m-message .avatar{float:left;margin:0 10px 0 0;border-radius:3px}.m-message .text{display:inline-block;position:relative;padding:0 10px;max-width:calc(100% - 40px);min-height:30px;line-height:2.5;font-size:9pt;text-align:left;word-break:break-all;background-color:#fafafa;border-radius:4px}.m-message .text:before{content:" ";position:absolute;top:9px;right:100%;border:6px solid transparent;border-right-color:#fafafa}.m-message .self{text-align:right}.m-message .self .avatar{float:right;margin:0 0 0 10px}.m-message .self .text{background-color:#b2e281}.m-message .self .text:before{right:inherit;left:100%;border-right-color:transparent;border-left-color:#b2e281}</style></head>
<body style="">

<div id="chat"><div class="sidebar">
        <div class="m-card">
            <header>
                <img class="avatar" width="40" height="40" alt="Coffce" src="dist/images/1.jpg">
                <p class="name">Coffce</p>
            </header>
<!--            <footer>-->
<!--                <input class="search" placeholder="search user...">-->
<!--            </footer>-->
        </div>
        <!--v-component-->
        <div class="m-list">
            <ul><!--v-for-start-->
                <?php
                if ($userList){
                    foreach ($userList as $v){
                       echo ' <li class="active">
                    <img class="avatar" width="30" height="30" alt="" src="'.$v['avatar'].'">
                    <p class="name">'.$v['username'].'</p>
                </li>';
                    }
                }
                ?>
            </ul>
        </div><!--v-component-->
    </div>
    <div class="main">
        <div class="m-message">
            <ul><!--v-for-start-->
                <li>
                    <p class="time"><span>13:42</span></p>
                    <div class="main">
                        <img class="avatar" width="30" height="30" src="dist/images/2.png">
                        <div class="text">Hello，这是一个基于Vue + Webpack构建的简单chat示例，聊天记录保存在localStorge。简单演示了Vue的基础特性和webpack配置。</div>
                    </div>
                </li>
                <li>
                    <p class="time"><span>13:42</span></p>
                    <div class="main">
                        <img class="avatar" width="30" height="30" src="dist/images/2.png">
                        <div class="text">项目地址: https://github.com/coffcer/vue-chat</div>
                    </div>
                </li><!--v-for-end-->
            </ul>
        </div><!--v-component-->
        <div class="m-text">
            <textarea placeholder="按 Ctrl + Enter 发送"></textarea>
        </div><!--v-component-->
    </div>
</div>
<script src="dist/vue.js"></script>
<script src="dist/main.js"></script>

</body>
</html>
