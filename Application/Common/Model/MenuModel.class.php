<?php
namespace Common\Model;
use Think\Model;

/**
* 
*/
class MenuModel extends Model
{
	protected $db='';
	public function __construct()
	{
		$this -> db = M('menu');
	}

	public function insert($data = array())
	{
		if(!$data || !is_array($data)){
			return 0;
		}
		return $this -> db -> add($data);
	}

	public function getMenus($data, $page, $pageSize = 3)
	{
		$data['status'] = array('neq', -1);
		$offset = ($page - 1) * $pageSize;
		$pageList = $this -> db -> where($data) -> order('menu_id') -> limit($offset, $pageSize) -> select();
		return $pageList;
	}

	public function getMenuCount($data = array())
	{
		return $this -> db -> where($data) -> Count();
	}

	public function findMenu($id)
	{
		if(!$id && !is_numeric($id))
		{
			return array();
		}
		return $this -> db -> where('menu_id='.$id) -> find();
	}

	public function updateMenuById($id, $data)
	{
		if(!$id || !is_numeric($id))
		{
			throw_exception('ID 不合法');
		}
		if(!$data || !is_array($data))
		{
			throw_exception('更新的数据不合法');
		}
		return $this -> db -> where('menu_id=' . $id) -> save($data);

	}

	public function updateStatusById($id, $status)
	{

		if(!$id || !is_numeric($id))
		{
			throw_exception('ID 不合法');
		}
		if(!$status)
		{
			throw_exception('状态不合法');
		}
		$data['status'] = $status;
		return $this -> db -> where('menu_id=' . $id) -> save($data);

	}

	public function  getAdminMenus()
	{
		$data = array(
			'status' => 1,
			'type'   => 1,
		);
		return $this -> db -> where($data) -> order('menu_id') -> select();
	}

	public function getBarMenus() {
	    $data = array(
	        'status' => 1,
	        'type' => 1,
	    );
	    $res = $this-> db -> where($data)
	        ->order('listorder desc,menu_id desc')
	        ->select();
	    return $res;
	}

}	