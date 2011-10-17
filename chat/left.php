
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
?>
<html>
<head>
<title>up</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<frameset rows="80,*" frameborder="NO" border="0" framespacing="0"> 
  <frame name="upframe" scrolling="NO" noresize src="top.php?session_id=<? echo $session_id;?>" >
  <frame name="mainframe" src="chat.php?session_id=<? echo $session_id;?>">
</frameset>
<noframes> 
<body bgcolor="#FFFFFF" text="#000000">
</body>
</noframes> 
</html>
