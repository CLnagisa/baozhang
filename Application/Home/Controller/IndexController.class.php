<?php
namespace Home\Controller;
use Think\Controller;
C('SHOW_PAGE_TRACE','');  
class IndexController extends Controller {
	/**
     * @param array 信息表记录
     * @return 报障界面
     */
    public function index(){
		$this->display();
    }
    /**
     * create索引函数
     * @param array $ins_rec 班级表记录
     * @return 提交 
     */
    public function create(){
    	$info=M('Info');
        $info->lab=I('post.lab');
        $info->computer=I('post.computer');
        $fault = I('post.checkbox');
        $info->fault=implode($fault);
        $info->ps=I('post.ps');
        $info->post_time=date('Y-m-d H:i:s');
        $info->time=date('Y-m-d');
        $count=$info->add();
        if ($count > 0) {
            echo '<script>alert("提交成功！")</script>';
            $this->redirect('Index/index');
        } else {
            echo '<script>alert("提交失败！")</script>';
            $this->redirect('Index/index');
        }
    }
}