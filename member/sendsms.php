<?
session_start(); // ��ʼsession
if (!session_is_registered("userregister")||($userregister==""))
{
header("Location: ../index.php");
exit;
}
if (!$reciever_user) {
 header("Location: sms.php");
 exit;
 }
include "../admin/config.inc.php";
include "../admin/global.php";
alter_status($userregister,2);
//-------------�������---------------
if ($submit){
 $id=time();
 $time=date("Y��m��d�� H:i:s A");
 $content=htmlspecialchars($content);
 $content=nl2br(strip_tags($content));
  $SQL_reciever="select name from bbs_class_member where user='$reciever_user'";//���ҽ���������
  $res_reciever=mysql_query($SQL_reciever,$db);
  $reciever_name=mysql_result($res_reciever,0,"name");
  $send_user=$userregister;
  $SQL_send="select name from bbs_class_member where user='$userregister'";//���ҷ���������
  $res_send=mysql_query($SQL_send,$db);
  $send_name=mysql_result($res_send,0,"name");
 //д�����ݿ�
 $Sql_submit="INSERT INTO bbs_sms (id,reciever_user,send_user,send_name,time,content) VALUES ('$id','$reciever_user','$send_user','$send_name','$time','$content')";
 mysql_query($Sql_submit,$db);
 $message="���ɹ��ظ�".$reciever_name."����һ�����ţ�"; 
 //-------------�������--------------end
 }
?>
<html>
<head>
<title>���Ͷ���Ϣ</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../css/index.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<table width="512" border="0" cellspacing="0" cellpadding="0" align="center" height="291" class="black9">
  <tr>
    <td height="377"> 
      <div align='center'><? if ($message) {echo $message." <a href='sms.php' class='black9'>�鿴����Ϣ</a>";}?></div>
	<form name="form1" method="post" action="<? echo $PHP_SELF;?>">
			<div align="center">�� 
              <?php
			   include "../admin/config.inc.php";
			   $res_name = mysql_query("SELECT name FROM bbs_class_member where user='$reciever_user'",$db);
               $reciever_name=mysql_result($res_name,0,"name");
			   echo $reciever_name;
			  ?>
              ������Ϣ <br>
              ����<br>
              <textarea name="content" rows="5" cols="30"></textarea>
          <input type="hidden" name="reciever_user" value="<? echo $reciever_user; ?>">
          <br>
              <input type="submit" name="submit" value="�ύ">
              <input type="reset" name="cancel" value="��д">
            </div>
			</form>
	  <div align="center"><br>
        <a href="javascript:history.back()"><img src="../image/backbutton1.gif" width="59" height="40" border="0"></a> 
      </div>
    </td>
  </tr>
</table>
</body>
</html>
