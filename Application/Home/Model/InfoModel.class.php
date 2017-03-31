<?php 
 /** 
 * Created by sirius.
 * IndexModel.class.php 信息表编辑模块  
 */ 
 namespace Home\Model; 
 use Think\Model; 
 class InfoModel extends Model { 
    //自动验证 
    protected $_validate=array( 
        //array(验证字段，验证规则，错误提示，验证条件，附加规则，验证时间) 
        array('lab','require','实验室号不能为空',self::EXISTS_VALIDATE), 
        array('computer', '1,3', '机器号长度1-3位！', self::EXISTS_VALIDATE,'length'),
        array('fault','require','故障原因不能为空',self::EXISTS_VALIDATE), 
    ); 
}
?>