<?php
include ("config.inc.php");
if ($superadmin){      //如果已经进行管理员登陆，进行密码验证
  if (!($supername==$supervisor)||!($superpass==$superpsw)){ 
   echo "密码错误";
   exit;
   }else{ //用session记录管理员登陆
   session_start(); // 开始session
   session_register("superlogin");
   $superlogin=$supername;  
   }
}else{
session_start();
if(!session_is_registered("superlogin")){
//管理员登陆
echo "<form name='form1' method='post' action='$PHP_SELF'>";
echo "<div align='center'> 请输入管理员密码<br>";
echo "管理员"; 
echo "<input type='text' name='supername'><br>";
echo "密码";
echo "<input type='password' name='superpass'><br>";
echo "<input type='submit' name='superadmin' value='进入'><br>";
echo "<input type='reset' name='cancel' value='重写'></div>";  
echo "</form>";
exit;
}
}
?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<TITLE>管理首页 </TITLE>
<link rel="stylesheet" href="../css/index.css" type="text/css">
</HEAD>
<BODY BGCOLOR="#FFFFFF">
  <center>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <table width="65%" border="0" cellspacing="0" cellpadding="0" align="center" class="black9">
    <tr> 
      <td colspan="4"> 
        <div align="center" class="redlarge">管理首页 </div>
      </td>
    </tr>
    <tr> 
      <td width="25%"> 
        <div align="center"><a href="member_list.php" class="black9">用户名表</a></div>
      </td>
      <td width="26%"> 
        <div align="center"><a href="up_memberpic.php" class="black9">上传照片</a></div>
      </td>
      <td width="26%"> 
        <div align="center"><a href="forum_manage.php" class="black9">论坛管理</a></div>
      </td>
      <td width="23%"> 
        <div align="center"><a href="email.php" class="black9">发群体邮件</a></div>
      </td>
    </tr>
    <tr> 
      <td width="25%"> 
        <div align="center"></div>
      </td>
      <td width="26%"> 
        <div align="center"></div>
      </td>
      <td width="26%"> 
        <div align="center"></div>
      </td>
      <td width="23%"> 
        <div align="center"></div>
      </td>
    </tr>
    <tr> 
      <td width="25%"> 
        <div align="center"></div>
      </td>
      <td width="26%"> 
        <div align="center"></div>
      </td>
      <td width="26%"> 
        <div align="center"></div>
      </td>
      <td width="23%"> 
        <div align="center"></div>
      </td>
    </tr>
  </table>
</center>
</BODY>
</HTML>