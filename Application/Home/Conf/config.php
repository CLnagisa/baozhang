<?php
$arr=include './Public/config.php';
$arr2=array(

	'SHOW_PAGE_TRACE'=>true,  // 开启页面trace
	
	'TMPL_PARSE_STRING'=>array(           // 添加自己的模板变量规则
		'__CSS__'=>__ROOT__.'/Public/Css',
		'__JS__'=>__ROOT__.'/Public/Js',
	),

	// 开启路由
    'URL_ROUTER_ON'   => true, 
    // 配置路由 定义路由规则
    'URL_ROUTE_RULES'=>array(
        // 'route'=>'UserGroup/index',   // 静态地址路由  http://localhost/index/thinkphp_3.2.3_full/index.php/Home/route
        // ':id/:num'=>'UserGroup/index',// 动态地址路由  http://localhost/index/thinkphp_3.2.3_full/index.php/Home/10/100
        // 'route/:num$'=>'UserGroup/index', // 混合地址路由  http://localhost/index/thinkphp_3.2.3_full/index.php/Home/route/100  $表示URL地址的最后部分
        // 'year/:year\d/:month\d/:day\d' => 'UserGroup/index', // 规则路由方式 http://localhost/index/thinkphp_3.2.3_full/index.php/Home/year/2016/10/28  \d强制要求只能是数字
        '/^year\/(\d{4})\/(\d{2})\/(\d{2})/'=>'UserGroup/index?year=:1&month=:2&day=:3'
    ),
);
return array_merge($arr, $arr2);