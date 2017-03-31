<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
C('SHOW_PAGE_TRACE','');  
class IndexController extends Controller {
	/**
     * index索引函数
     * @return 登录界面 
     */
    public function index(){
		$this->display();
    }
    /**
     * login登录函数
     * @param user 用户表
     * @return 用户登录 
     */
    public function login(){
    	$username=$_POST['username'];
    	$password=sha1($_POST['password']);
    	$user=M('User');
    	$where['username']=$username;
    	$where['password']=$password;
    	$i=$user->where($where)->count();
    	if ($i>0) {
            $_SESSION['username']=$username;
            $arr=$user->where("username='$username'")->find();
            $count=$user->where($where)->count();
    		if ($count>0) {
                echo '<script>alert("欢迎访问实验室设备报障后台管理系统！")</script>';
                $this->redirect('Manage/index');
            } else {
                echo '<script>alert("登录失败！")</script>';
                $this->redirect('Index/index');
            }
    	} else {
    	   echo '<script>alert("该用户不存在！")</script>';
            $this->redirect('Index/index');
    	}
    }
}
?>