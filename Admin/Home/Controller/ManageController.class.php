<?php
namespace Home\Controller;
use Think\Controller;
C('SHOW_PAGE_TRACE','');  
class ManageController extends Controller {
	/*
    * 前置方法
    */
    public function _before_index(){
        // 做判断，如果没有登录，则跳转到登录页面
        if (!isset($_SESSION['username']) || $_SESSION['username'] == '') {

            // $this->error('非法访问');
            $this->redirect('Index/index');
        }
    }
    /*
    * 后台管理界面
    */
    public function index(){
    	$info = M('Info');
    	$info_rec=$info->select();

        /* 引入GoogChart类
         * 数据统计表
         */
        // import("ORG.Util.GoogChart");
        // $chart = new GoogChart();    
        vendor('Jpgraph.Chart');
        $chart = new \Chart;

        //ThinkPHP写法：
                    
        $firstday=date('Y-m-d', time()-8*24*60*60);//根据实际情况修改到时候直接用变量替换 $_POST['firstday']
                    
        $lastday=date('Y-m-d', time()-24*60*60);//根据实际情况修改到时候直接用变量替换 $_POST['lastday']

        $where['time']=array(array('egt',$firstday),array('elt',$lastday),'AND');

                    
        //以下为导出name数据   
                    
                    
//---------------------------------------name数据--------------------------------

        $info = M('Info');//请将Test修改为你想要获取数据的表
                            
        $engine=$info->field("time")->where($where)->group('time')->order('time ASC')->select();
                                
//                  Print_R($engine);
        //设置$data数组数据;
        foreach($engine as $k=>$value){
            $data0 .= "'".$value[time]."'".",";
        }
        $data0 = substr($data0, 0, -1);
        $this->assign('data0',$data0);  
                                
//---------------------------------------故障数据---------------------------                                
                    
        //以下为导出故障原因数据 
                    
        $m = M('Info');//请将Test修改为你想要获取数据的表
        //解释一下数据的含义：field("求和所有的sale 作为 sum") -> 条件是($where) ->通过('time')分组 -> 按照('time')升序排列       
        $engine = $m -> field(" sum(CASE WHEN fault LIKE '1%' THEN count ELSE 0 END) AS name1")->where($where)->group('time')->order('time ASC')->select();
                                                
//                  var_dump($engine);
        //设置$data数组数据;
        foreach($engine as $k=>$value){
            $data .= $value[name1].",";
        }
        $data = substr($data, 0, -1);
        $this->assign('data',$data);    
                                            
//-------------------------------------故障数据-----------------------------                                
                    
        //以下为导出故障原因数据 
                    
        $m = M('Info');//请将Test修改为你想要获取数据的表
        //解释一下数据的含义：field("求和所有的sale 作为 sum") -> 条件是($where) ->通过('time')分组 -> 按照('time')升序排列       
        $engine = $m -> field("sum(CASE WHEN fault LIKE '%2%' THEN count ELSE 0 END) AS name2")->where($where)->group('time')->order('time ASC')->select();
                                                
//                  var_dump($engine);
        //设置$data数组数据;
        foreach($engine as $k=>$value){
            $data1 .= $value[name2].",";
        }
        $data1 = substr($data1, 0, -1);
        $this->assign('data1',$data1);  
                                            
//-----------------------------------故障数据-------------------------------                                
                    
        //以下为导出故障原因数据 
                    
        $m = M('Info');//请将Test修改为你想要获取数据的表
        //解释一下数据的含义：field("求和所有的sale 作为 sum") -> 条件是($where) ->通过('time')分组 -> 按照('time')升序排列       
        $engine = $m -> field("sum(CASE WHEN fault LIKE '%3%' THEN count ELSE 0 END) AS name3")->where($where)->group('time')->order('time ASC')->select();
                                                
//                  var_dump($engine);
        //设置$data数组数据;
        foreach($engine as $k=>$value){
            $data2 .= $value[name3].",";
        }
        $data2 = substr($data2, 0, -1);

        $this->assign('data2',$data2);  
        $this->assign('info_rec', $info_rec);   
		$this->display();

    }

    /*
    * 后置方法
    */
    public function _after_index(){
        if ($_POST['unique'] == 1) {
            echo '<script>alert("欢迎访问实验室设备报障后台管理系统！")</script>';
        }
    }  
    /**
     * delete删除函数
     * @param array $ins_rec 班级表记录
     * @return 提交 
     */
    public function delete(){
        $m=M('Info');
        $id=$_POST['id'];
        $count=$m->delete($id);
        if ($count > 0) {
            $data['status'] = 1;
            $data['info'] = "数据删除成功！";
            $this->ajaxReturn($data);
        } else {
            $data['status'] = 1;
            $data['info'] = "数据删除失败！";
            $this->ajaxReturn($data);
        }
    }  
    /**
     * update更新函数
     * @param array $ins_rec 班级表记录
     * @return 提交 
     */
    public function update(){
        $m=M('Info');
        $data['id']=$_POST['id'];
        $data['state']=$_POST['state'];
        $count=$m->save($data);
        if ($count > 0) {
            $data['status'] = 1;
            $data['info'] = "状态更新成功！";
            $this->ajaxReturn($data);
/*            echo '<script>alert("状态更新成功！")</script>';
            $this->redirect('Manage/index');*/
        } else {
            $data['status'] = 1;
            $data['info'] = "状态更新失败！";
            $this->ajaxReturn($data);
/*            echo '<script>alert("状态更新失败！")</script>';
            $this->redirect('Manage/index');*/
        }
    }
}
?>