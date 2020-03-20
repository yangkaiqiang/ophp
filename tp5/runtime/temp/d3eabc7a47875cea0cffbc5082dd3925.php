<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:41:"../application/admin\view\index\home.html";i:1584631698;s:44:"../application/admin/view/common/header.html";i:1584682647;s:44:"../application/admin/view/common/footer.html";i:1584682065;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>layout 后台大布局 - Layui</title>
  <link rel="stylesheet" href="/tp/public/static//layui/css/layui.css">
  <script src="/tp/public/static//layui/layui.js"></script>
  <script src="/ophp/tp5/public/static/js/vue.js"></script>
  <style type="text/css">
/*    .layui-input{
      width:50%;
    }
    .layui-upload-button input {
        position: absolute;
        left: 0;
        top: 0;
        z-index: 10;
        font-size: 100px;
        width: 100%;
        height: 100%;
    }
    .layui-upload-icon {
    display: block;
    margin: 0 15px;
    text-align: center;
}
*/  </style>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">layui 后台布局</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item"><a href="/tp/public/index.php/admin/index/index">控制台</a></li>
      <li class="layui-nav-item"><a href="">商品管理</a></li>
      <li class="layui-nav-item"><a href="">用户</a></li>
      <li class="layui-nav-item">
        <a href="javascript:;">其它系统</a>
        <dl class="layui-nav-child">
          <dd><a href="">邮件管理</a></dd>
          <dd><a href="">消息管理</a></dd>
          <dd><a href="">授权管理</a></dd>
        </dl>
      </li>
    </ul>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="/tp/public/static/img/<?php echo $userinfo['user_img']; ?>" class="layui-nav-img">
          <?php echo $userinfo['username']; ?>
        </a>
        <dl class="layui-nav-child">
          <dd><a href="">基本资料</a></dd>
          <dd><a href="">安全设置</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="/tp/public/index.php/admin/login/loginOut">退出</a></li>
    </ul>
  </div>
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <li class="layui-nav-item layui-nav-itemed">
          <a href="javascript:;">用户管理</a>
          <dl class="layui-nav-child">
            <dd><a href="/tp/public/index.php/admin/user/index">用户信息</a></dd>
            <dd><a href="/tp/public/index.php/admin/user/add">用户添加</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">解决方案</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;">列表一</a></dd>
            <dd><a href="javascript:;">列表二</a></dd>
            <dd><a href="">超链接</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item"><a href="">云市场</a></li>
        <li class="layui-nav-item"><a href="">发布商品</a></li>
      </ul>
    </div>
  </div>
  
  <div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;text-align:center"><h1>欢迎来到后台首页！</h1></div>
  </div>
  <div class="layui-footer">
    <!-- 底部固定区域 -->
    © layui.com - 底部固定区域
  </div>
</div>
<script>
//JavaScript代码区域
layui.use('element', function(){
  var element = layui.element;
  
});
</script>
</body>
</html>