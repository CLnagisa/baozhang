<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
C('SHOW_PAGE_TRACE','');  
class RegisterController extends Controller {
    /**
     * create索引函数
     * @param array $ins_rec 班级表记录
     * @return 注册界面 
     */
    public function index(){
        $this->display();
    }
    /**
     * register注册函数
     * @param 用户表
     * @return 注册界面 
     */
    public function register(){
        $user=M('User');
        $user->username=$_POST['username'];
        $user->password=sha1($_POST['password']);
        $user->reg_time=date('Y-m-d H:i:s');
        $idnum=$user->add();
        if ($idnum > 0) {
            $this->redirect('Index/index', array('cate_id' => 2), 3, '注册成功！');
        } else {
            $this->error('注册失败！');
        }  
    }
}
?>