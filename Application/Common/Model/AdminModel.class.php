<?php
namespace Common\Model;
use Think\Model;

/**
* 校验登录用户
*/
class AdminModel extends Model
{
	protected $db='';
	public function __construct()
	{
		$this -> db = M('admin');
	}

	public function getAdminInfo($username)
	{
		$admin = $this -> db -> where('username ="'.$username.'"') -> find();
		return $admin;
	}
	
}

?>