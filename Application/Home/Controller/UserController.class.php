<?php
namespace Home\Controller;
use Think\Controller;

class UserController extends Controller{
	
	public function index(){
		$DB = M('users');
		if (IS_GET) {
			$map = I();
			$map = array_filter($map);
			$map['username'] = array('LIKE', "%{$map['username']}%");
		}
		$user = $DB -> where($map) -> select();
		$this -> assign('user',$user);
		$this -> assign('map',$map);
		$this -> display();
	}

	public function add(){
		if (IS_POST) {
			$user = $_POST;
			$user['password'] = md5($user['password']);
			$user['createTime'] = time();
			//dump($user);
			$DB = M('users');
			$res = $DB -> add($user);
			if ($res) {
				$this -> success('用户添加成功', 'index');
			}else{
				$this -> error('添加失败','index');
			}
			exit();
		}
		$this -> display();
	}

	public function del($id){
		$DB = M('users');
		$res = $DB -> delete($id);
		if($res){
			$this  -> success('删除成功');
		}else{
			$this  -> error('删除失败');
		}
	}

	public function mod($id = 0){
		$DB = M('users');
		if(IS_POST){
			$user = I();
			if ($user['password']) {
				$user['password'] = md5($user['password']);
			}else{
				unset($user['password']);
			}
			$res = $DB -> save($user);
			if ($res) {
				$this -> success('修改成功','index');
			}else{
				$this -> error('修改失败','index');
			}
		}
		$data = $DB -> find($id);
		$this -> assign('user', $data);
		$this -> display();
	}
}