<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
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
    <div class="container-fluid" >
      <div class="row">
        <div class="col-lg-12">

          <ol class="breadcrumb">
            <li>
              <i class="fa fa-dashboard"></i>  <a href="/admin.php?c=content">文章管理</a>
            </li>
            <li class="active">
              <i class="fa fa-table"></i>文章列表
            </li>
          </ol>
        </div>
      </div>
      <div >
        <button  id="button-add" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>添加 </button>
      </div>
      <div class="row">
        <form action="/admin.php" method="get">
          <div class="col-md-3">
            <div class="input-group">
              <span class="input-group-addon">栏目</span>
              <select class="form-control" name="catid">
                <option value='' >全部分类</option>
                <option value="" ></option>
              </select>
            </div>
          </div>
          <input type="hidden" name="c" value="content"/>
          <input type="hidden" name="a" value="index"/>
          <div class="col-md-3">
            <div class="input-group">
              <input class="form-control" name="title" type="text" value="" placeholder="文章标题" />
                <span class="input-group-btn">
                  <button id="sub_data" type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
                </span>
            </div>
          </div>
        </form>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <h3></h3>
          <div class="table-responsive">
            <form id="singcms-listorder">
              <table class="table table-bordered table-hover singcms-table">
                <thead>
                <tr>
                  <th id="singcms-checkbox-all" width="10"><input type="checkbox"/></th>
                  <th width="14">排序</th>
                  <th>id</th>
                  <th>标题</th>
                  <th>栏目</th>
                  <th>来源</th>
                  <th>封面图</th>
                  <th>时间</th>
                  <th>状态</th>
                  <th>操作</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><input type="checkbox" name="pushcheck" value="<?php echo ($new["news_id"]); ?>"></td>
                    <td><input size=4 type='text'  name='' value=""/></td><!--6.7-->
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                    </td>
                    <td></td>
                    <td><span  attr-status=""  attr-id="" class="sing_cursor singcms-on-off" id="singcms-on-off" ></span></td>
                    <td><span class="sing_cursor glyphicon glyphicon-edit" aria-hidden="true" id="singcms-edit" attr-id="" ></span>
                      <a href="javascript:void(0)" id="singcms-delete"  attr-id=""  attr-message="删除">
                        <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
              <nav>
              <ul >
              </ul>
            </nav>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  var SCOPE = {
    'edit_url' : '/admin.php/content/edit',
    'add_url' : '/admin.php/content/add',
    'set_status_url' : '/admin.php/content/setStatus',
    'sing_news_view_url' : '/index.php/view',
    'listorder_url' : '/admin.php/content/listorder',
    'push_url' : '/admin.php/content/push',
  }
</script>
<script src="/Public/js/admin/common.js"></script>
</body>
</html>