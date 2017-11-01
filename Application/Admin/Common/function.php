<?php

/**
 * 公共方法
 * 
 */

function show($status, $mess, $data=array()){

	$result = array(
		'status'	=>	$status,
		'mess'		=>	$mess,
		'data'		=>	$data,
	);

	exit(json_encode($result));
}

function md5Pass($pass){
	return md5($pass . C('MD5_PRE'));
}

function getMenuType($type)
{
	return $type == 1 ? '后端菜单' : '前端导航';
}

function getStatus($status)
{
	if($status == 0){
		$str = '关闭';
	}elseif($status == 1){
		$str = '启用';
	}elseif($status == -1){
		$str = '已删除';
	}
	return $str;
}

function getActive($control)
{
	$c = strtolower(CONTROLLER_NAME);
	if($control['c'] == $c)
	{
		return 'class = "active"';
	}
	return "";
}

function showKind($status, $data)
{
	header('Content-type:application/json;charset=UTF-8');
	if($status == 0)
	{
		exit(json_encode(array('error' => 0, 'url' => $data)));
	}
	exit(json_encode(array('error' =>1 ,'message' => '上传失败' )));
}




