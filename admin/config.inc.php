<?php
 #-------杏林同学录1.2版配置文件-------#
 #             作者 neo                #

# 1 数据库连接
# 这里改为自己的管理用户名和密码,如果你的用户名为abc，密码为123，数据库名为xyz,应该改为：$db = mysql_connect("localhost", "abc","123"); mysql_select_db("xyz",$db);
 $db = mysql_connect("174.139.45.115","sq_musicpop","kydnzz");
 mysql_select_db("sq_musicpop",$db);
# 2 管理员帐号
# 为了更加安全，另外设置了超级管理员及密码，独立于会员系统之外，用于班级管理界面。
# 网管帐号-这个帐号是应用于论坛管理，使用网管帐号登录后，能够对所有论坛进行管理。
$supervisor="demo";         //超级管理员名             
$superpsw="demo";           //超级管理员密码
$superemail="demo@demo.com";//超级管理员email
$webmaster="neo";           //网管帐号            
# 3 页面主题数
$page_size=10;              //每页显示的题目数-用于论坛、短消息等页面
# 4 注册问题及答案,可以在注册时避免外人进入
$question1="高中所在城市";                      //注册提示问题1
$answer1="济宁";                        //注册提示答案1
$question2="高中班主任";                      //注册提示问题2
$answer2="刘静伟";                        //注册提示答案2
?>