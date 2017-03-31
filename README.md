
> API Prefix

> Admin

> Info - 信息表

###1.1 index页面索引
>
> 展示报障页面
> 

###1.2 create数据添加
>
> string lab 实验室
> string computer 计算机号
> string fault 故障原因
> string ps 备注
> string post_time 提交时间
> \_\_URL__/create/
> /Index/index



> User - 用户表

###2.1 index页面索引
>
> 展示后台管理界面
> 

###2.2 login用户登录
>
> string username 用户名
> string password 密码
> datetime reg_time 注册时间
> \_\_URL__/login/

###2.3 register用户注册
>
> string username 用户名
> string password 密码
> datetime reg_time 注册时间
> \_\_URL__/register/

>> |数据库设计|
>> |RegisterSystem|

>> |数据表设计|
>> |re_info|
>> |id        |lab        |computer   |fault      |ps       |post_time     |state     
>> |Tinyint(4)|Varchar(20)|Varchar(20)|Varchar(20)|Varchar(200)|datetime |tinyint|
>> |PS：state字段：故障维修状态；1、未修复；2、进行中；3、已修复。|
> /Manage/index

>> |数据表设计|
>> |re_user|
>> |id        |username   |password   |reg_time      |level      
>> |Tinyint(4)|Varchar(20)|Varchar(20)|datetime      |tinyint|
>> |PS：level字段：管理员权限。|
> /Manage/index

