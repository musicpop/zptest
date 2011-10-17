<?
session_start(); // 开始session
if(!session_is_registered("userregister")||($userregister==""))
{
header("Location: ../index.php");
exit;
}
 include "../admin/config.inc.php";
 include "../admin/global.php";
 alter_status($userregister,5);
 $user=$userregister;
 $name=User_to_name($user);
 check_chat_num();//如果聊天记录大于200，删除多余记录
 add_system_message($name,"进入");//添加系统公告 
?>
<html>
<head>
<title>94级1班聊天室</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<frameset cols="*,154" frameborder="NO" border="0" framespacing="0" rows="*"> 
  <frame name="leftframe" src="left.php?session_id=<? echo $session_id;?>">
  <frame name="rightframe" scrolling="yes" noresize src="right.php?session_id=<? echo $session_id;?>">
</frameset>
<noframes>
<body bgcolor="#FFFFFF" text="#000000">
</body>
</noframes> 
</html>
