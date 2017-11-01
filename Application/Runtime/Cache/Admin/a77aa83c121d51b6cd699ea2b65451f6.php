<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>News 后台管理</title>
    <!-- Bootstrap Core CSS -->
    <link href="/Public/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/Public/css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="/Public/css/plugins/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="/Public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/Public/css/sing/common.css" />
    <link rel="stylesheet" href="/Public/css/party/bootstrap-switch.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/party/uploadify.css">
    <!-- jQuery -->
    <script src="/Public/js/jquery.js"></script>
    <script src="/Public/js/bootstrap.min.js"></script>
    <script src="/Public/js/dialog/layer.js"></script>
    <script src="/Public/js/dialog.js"></script>
    <script type="text/javascript" src="/Public/js/party/jquery.uploadify.js"></script>
</head>

    



<body>
<div id="wrapper">
    <?php
$adminMenu = D('menu') -> getAdminMenus(); $index = array('c' => 'index'); ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="navbar-header">
    <a class="navbar-brand" >新闻管理平台</a>
  </div>
  <ul class="nav navbar-right top-nav">
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li>
          <a href=""><i class="fa fa-fw fa-user"></i> 个人中心</a>
        </li>
        <li class="divider"></li>
        <li>
          <a href="/admin.php/login/logout"><i class="fa fa-fw fa-power-off"></i>退出</a>
        </li>
      </ul>
    </li>
  </ul>
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav nav_list">
      <li <?php echo (getActive($index)); ?>>
        <a href="/admin.php/index"><i class="fa fa-fw fa-dashboard"></i>首页</a>
      </li>
      <?php if(is_array($adminMenu)): foreach($adminMenu as $key=>$vo): ?><li <?php echo (getActive($vo)); ?>>
          <a href="/<?php echo ($vo["m"]); ?>.php/<?php echo ($vo["c"]); ?>/<?php echo ($vo["f"]); ?>"><i class="fa fa-fw fa-bar-chart-o"></i><?php echo ($vo["name"]); ?></a>
        </li><?php endforeach; endif; ?>
    </ul>
  </div>
</nav>
    <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="/admin.php?c=menu">菜单管理</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> 添加
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">

                <form class="form-horizontal" id="singcms-form">
                    <div class="form-group">
                        <label for="inputname" class="col-sm-2 control-label">菜单名:</label>
                        <div class="col-sm-5">
                            <input type="text" name="name" class="form-control" id="inputname" value=<?php echo ($menuInfo["name"]); ?>>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">菜单类型:</label>
                        <div class="col-sm-5">
                            <input type="radio" name="type" id="optionsRadiosInline1" value="1" <?php if($menuInfo["type"] == 1): ?>checked<?php endif; ?>>后台菜单
                            <input type="radio" name="type" id="optionsRadiosInline2" value="0" <?php if($menuInfo["type"] == 0): ?>checked<?php endif; ?>>前端导航
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">模块名:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="m" id="inputPassword3" value=<?php echo ($menuInfo["m"]); ?>>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">控制器:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="c" id="inputPassword3" value=<?php echo ($menuInfo["c"]); ?>>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">方法:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="f" id="inputPassword3" value=<?php echo ($menuInfo["f"]); ?>>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">状态:</label>
                        <div class="col-sm-5">
                            <input type="radio" name="status" id="optionsRadiosInline1" value="1" <?php if($menuInfo["status"] == 1): ?>checked<?php endif; ?>> 开启
                            <input type="radio" name="status" id="optionsRadiosInline2" value="0" <?php if($menuInfo["status"] == 0): ?>checked<?php endif; ?>> 关闭
                        </div>
                    </div>
                    <input type="hidden" name="menu_id" value="<?php echo ($menuInfo["menu_id"]); ?>">  
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" class="btn btn-default" id="singcms-button-submit">更新</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script>

    var SCOPE = {
        'save_url' : '/admin.php/menu/add',
        'jump_url' : '/admin.php/menu/index',
    }
</script>
<script src="/Public/js/admin/common.js"></script>
</body>
</html>