<?php
/**
 * 菜单管理
 * 
 */

namespace Admin\Controller;
use Think\Controller;
class MenuController extends CommonController 
{
	public function index()
	{
		$data = array();
		if(isset($_REQUEST['type']) && in_array($_REQUEST['type'], array('0', '1')))
		{
			$data['type'] = $_REQUEST['type'];
			$this -> assign('type', $data['type']);
		}else{
			//unset($data['type']);
			$this -> assign('type', -1);
		}
		$page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
		$pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
		$menus = D('menu') -> getMenus($data, $page, $pageSize);
		$menuCount = D('menu') -> getMenuCount($data);
		$res = new \Think\Page($menuCount, $pageSize);
		$pageList = $res -> show();

		$this -> assign('menus', $menus);
		$this -> assign('pageList', $pageList);
		$this -> display();
	}

	public function add()
	{
		$postData = I();
		if($postData)
		{
			if(!isset($postData['name']) || !$postData['name'])
			{
				return show(0, '菜单名不能为空');
			}
			if(!isset($postData['m']) || !$postData['m'])
			{
				return show(0, '模块名不能为空');
			}
			if(!isset($postData['c']) || !$postData['c'])
			{
				return show(0, '控制器名不能为空');
			}
			if(!isset($postData['f']) || !$postData['f'])
			{
				return show(0, '方法名不能为空');
			}

			if($postData['menu_id'])
			{
				return $this -> save($postData);
			}

			$menuId = D('Menu') -> insert($postData);

			if($menuId)
			{
				//return $menuId;
				return show(1, '新增成功');
			}
			
			return show(0, '新增失败');

		}else{
			$this -> display();
		}
	}

	public function edit()
	{
		//if()
		$menuId = $_GET['id'];
		$menuInfo = D('menu') -> findMenu($menuId);

		$this -> assign('menuInfo', $menuInfo);
		$this -> display();
	}

	public function save($data)
	{
		$menuId = $data['menu_id'];
		unset($data['menu_id']);
		try {
			$id = D('menu') -> updateMenuById($menuId, $data);
			if($id === false){
				return show(0, '更新失败');
			}
			return show(1, '更新成功');
		}catch(Exception $e){
			return show(1, $e -> getMessage());
		}
	}

	public function setStatus()
	{
		try{
			if($_POST['id'] && $_POST['status'])
			{
				$id = $_POST['id'];
				$status = $_POST['status'];
				$res = D('menu') -> updateStatusById($id, $status);
			}
			if($res){
				return show(1, '操作成功');
			}
			return show(0, '操作失败');
		}catch(Exception $e){
			return show(0, $e -> getMessage());
		}
		return show(0, '没有提交的数据');
	}
}
