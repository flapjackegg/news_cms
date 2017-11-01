<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    
    public function index()
    {
        if (session()) 
        {
            $this -> redirect('/index');
        }
        $this -> assign();
        $this -> display();
    }

    public function check()
    {
    	$admin = I();
    	$username = $admin['username'];
    	$password = $admin['password'];

    	if(!trim($username))
        {
    		show(0,'用户名不能为空');
    	}

    	if(!trim($password))
        {
    		show(0,'密码不能为空');
    	}

    	$res = D('Admin') -> getAdminInfo($username);
    	if(!$res)
        {
    		return show(0, '用户不存在');
    	}
    	if($res[password] != md5Pass($password))
        {
    		return show(0, '密码错误');
    	}

    	session('adminUser', $res);
    	return show(1, '登录成功');
    }

     public function logout()
     {
            session('adminUser', null);
            $this -> redirect('/login');
    }
}