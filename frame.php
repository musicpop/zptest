<?
session_start(); // 开始session
session_register("userregister");
include "admin/config.inc.php";
include "admin/global.php";
 
$result = mysql_query("SELECT psw FROM bbs_class_member where user='$user'",$db);
if (mysql_num_rows($result)==0){  //若返回列的数目为0，说明无此资料
echo "无此用户！";
exit;}
$userpsw=strtoupper(trim($psw));
$password=trim(mysql_result($result,0,'psw'));
$password=strtoupper($password);//取得密码,转换成大写
$userpsw=strtoupper($userpsw);
if (!($userpsw==$password)){
echo "密码错误！";
mysql_close($db);
exit;
}
$userregister=$user;
UpdateMember();      //更新在线用户名单
AddUser($user);      //增加在线用户
add_experience($user,10);//增加经验值
add_visit($user);    //添加访客记录
?>
<html>
<head>
<title>欢迎光临杏林同学录</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<frameset cols="153,*" border="0" framespacing="0" rows="*" frameborder="NO"> 
  <frameset rows="85,*" frameborder="NO" border="0" framespacing="0" cols="*"> 
    <frame name="top" scrolling="NO" noresize src="top.php?session_id=<? echo session_id();?>" >
    <frame name="left" src="left.php?session_id=<? echo session_id();?>" scrolling='yes'>
  </frameset>
  <frame name="right" src="main.php">
</frameset>
<noframes> 
<body bgcolor="#FFFFFF" text="#000000">
<div align='center'>您的浏览器不支持框架</div>
</body>
</noframes> 
</html>
