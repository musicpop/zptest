<?
session_start(); // ��ʼsession
$session_id=session_id();
?>
<html>
<head>
<title>top</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<META http-equiv="refresh" content=15;url=top.php?session_id=<? echo $session_id;?>>
<link rel="stylesheet" href="css/index.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0">
<img src="image/classlogo1.gif" width="150" height="40"> <br>
<?php
include "admin/config.inc.php";
include "admin/global.php";
$user=$userregister;
if (!CheckUser($user)){      //����Ƿ�����
AddUser($user);
}
Updatebbs_online($user);
UpdateMember();
$bbs_online_member=Readbbs_onlineName();
$bbs_online_number=sizeof($bbs_online_member);
 $Sql_sms="select id from bbs_sms where reciever_user='$userregister' and isread='0' ";//δ������Ϣ
 $res_sms=mysql_query($Sql_sms,$db);
 $sms_new=mysql_num_rows($res_sms);
 if ($sms_new>0){
 echo "<div align='center'><a href='member/sms.php' target='right'><img src='image/sms1.gif' width='100' height='30' border='0' alt='����$sms_new ���¶���Ϣ!'></a></div>";
 exit;
 }
 ?>
<div align="center">��ǰ����<a href="member/bbs_online.php" class="black9" target='right'><? echo $bbs_online_number; ?></a>��</div>

</body>
</html>
