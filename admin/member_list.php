<?
session_start();
if(!session_is_registered("superlogin"))//����Ƿ�ע��
{
 header("Location: index.php");//��ת����ҳ���е�½
exit;
}
?>
<html>
<head>
<title>�û��б�</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../css/index.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000">
<table width="90%" border="0" cellspacing="0" cellpadding="0" align="center" height="418">
  <tr> 
    <td height="29">
      <div align="center" class="redlarge">�û��б�</div>
    </td>
  </tr>
  <tr>
    <td>
      <div align="center">
	  <?php
 include "config.inc.php";
 $result = mysql_query("SELECT * FROM bbs_class_member",$db);
 $row=mysql_num_rows($result);//�鿴����ж�����
 echo "<table width='99%' border='1' cellspacing='0' cellpadding='0' bordercolorlight='#330099' bordercolordark='#FFFFFF' align='center' class='blue9'> <tr bgcolor='#3399FF'> <td colspan='8'>      <div class='white12'>.........��������Ÿ��л���һ��ͨѶ¼��.........</div>    </td> </tr>";
 for ($i=0;$i<=($row-1);$i++) {
   $name=mysql_result($result,$i,'name');
   $user=mysql_result($result,$i,'user');
   $psw=mysql_result($result,$i,'psw');
   echo "<tr><td width='33%'>������$name</td> <td colspan='6'>�û���:$user</td><td width='35%'>���룺$psw</td></tr>"; 
 }
 echo "</table>";
?>
	  </div>
    </td>
  </tr>
</table>
</body>
</html>
