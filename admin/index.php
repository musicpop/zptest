<?php
include ("config.inc.php");
if ($superadmin){      //����Ѿ����й���Ա��½������������֤
  if (!($supername==$supervisor)||!($superpass==$superpsw)){ 
   echo "�������";
   exit;
   }else{ //��session��¼����Ա��½
   session_start(); // ��ʼsession
   session_register("superlogin");
   $superlogin=$supername;  
   }
}else{
session_start();
if(!session_is_registered("superlogin")){
//����Ա��½
echo "<form name='form1' method='post' action='$PHP_SELF'>";
echo "<div align='center'> ���������Ա����<br>";
echo "����Ա"; 
echo "<input type='text' name='supername'><br>";
echo "����";
echo "<input type='password' name='superpass'><br>";
echo "<input type='submit' name='superadmin' value='����'><br>";
echo "<input type='reset' name='cancel' value='��д'></div>";  
echo "</form>";
exit;
}
}
?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<TITLE>������ҳ </TITLE>
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
        <div align="center" class="redlarge">������ҳ </div>
      </td>
    </tr>
    <tr> 
      <td width="25%"> 
        <div align="center"><a href="member_list.php" class="black9">�û�����</a></div>
      </td>
      <td width="26%"> 
        <div align="center"><a href="up_memberpic.php" class="black9">�ϴ���Ƭ</a></div>
      </td>
      <td width="26%"> 
        <div align="center"><a href="forum_manage.php" class="black9">��̳����</a></div>
      </td>
      <td width="23%"> 
        <div align="center"><a href="email.php" class="black9">��Ⱥ���ʼ�</a></div>
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