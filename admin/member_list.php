<?
session_start();
if(!session_is_registered("superlogin"))//检查是否注册
{
 header("Location: index.php");//跳转到首页进行登陆
exit;
}
?>
<html>
<head>
<title>用户列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../css/index.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000">
<table width="90%" border="0" cellspacing="0" cellpadding="0" align="center" height="418">
  <tr> 
    <td height="29">
      <div align="center" class="redlarge">用户列表</div>
    </td>
  </tr>
  <tr>
    <td>
      <div align="center">
	  <?php
 include "config.inc.php";
 $result = mysql_query("SELECT * FROM bbs_class_member",$db);
 $row=mysql_num_rows($result);//查看结果有多少行
 echo "<table width='99%' border='1' cellspacing='0' cellpadding='0' bordercolorlight='#330099' bordercolordark='#FFFFFF' align='center' class='blue9'> <tr bgcolor='#3399FF'> <td colspan='8'>      <div class='white12'>.........○济宁育才高中基地一班通讯录○.........</div>    </td> </tr>";
 for ($i=0;$i<=($row-1);$i++) {
   $name=mysql_result($result,$i,'name');
   $user=mysql_result($result,$i,'user');
   $psw=mysql_result($result,$i,'psw');
   echo "<tr><td width='33%'>姓名：$name</td> <td colspan='6'>用户名:$user</td><td width='35%'>密码：$psw</td></tr>"; 
 }
 echo "</table>";
?>
	  </div>
    </td>
  </tr>
</table>
</body>
</html>
