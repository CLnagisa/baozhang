<?php 
 /** 
 * Created by sirius.
 * IndexModel.class.php 信息表编辑模块  
 */ 
 namespace Home\Model; 
 use Think\Model; 
 class IndexModel extends Model { 
    //自动验证 
    protected $_validate=array( 
        //array(验证字段，验证规则，错误提示，验证条件，附加规则，验证时间) 
        array('lab','require','名称不能为空',self::EXISTS_VALIDATE), 
        array('computer', '2,8', '名称长度2-8位！', self::EXISTS_VALIDATE,'length'),
        array('fault','require','内容不能为空',self::EXISTS_VALIDATE), 
        array('ps', '2,200', '内容长度2-100位！', self::EXISTS_VALIDATE,'length'),
    ); 
}
?>