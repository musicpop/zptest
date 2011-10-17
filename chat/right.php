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
 UpdateMember();
 $bbs_online_member=Readbbs_onlineName();
 $bbs_online_number=sizeof($bbs_online_member);
?>
<html>
<head>
<title>right</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<META http-equiv="refresh" content=20;url=right.php>
<link rel="stylesheet" href="../css/index.css" type="text/css">
</head>

<body bgcolor="#6699FF" text="#000000" leftmargin="0" topmargin="0">
<script language="JavaScript">
function focusmember(){
parent.leftframe.upframe.sendmsg.receive_name.value=document.member.chatname.value;
parent.leftframe.upframe.sendmsg.receive_name1.value=document.member.chatname.value;
parent.leftframe.upframe.sendmsg.input.focus();
}
function openclk() {
another=open('right.php','rightframe');
}
</script>
<div align="center" class="yellow18">94级1班聊天室</div>
<div align="center"><span class="deepyellow9">当前在线 
  <? echo $bbs_online_number; ?>
  人</span> 
</div>
<div align="left" class="deepyellow9"> 
<form name="member">
<?php
     if ($bbs_online_number>0){
   while (list($id,$member)=each($bbs_online_member)){
	   $mn=$member.$id;
   echo "<script language=\"JavaScript\">";
   echo "function $member(){";
   echo "parent.leftframe.upframe.sendmsg.receive_name.value=document.member.$mn.value;";
   echo "parent.leftframe.upframe.sendmsg.receive_name1.value=document.member.$mn.value;";
   echo "parent.leftframe.upframe.sendmsg.input.focus();";
   echo "}</script><BR>";
   }
  }
  reset($bbs_online_member);
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='button' name='chatname' value='大家' onClick='focusmember()'><BR>
  <? 
      while (list($id,$member)=each($bbs_online_member)){
   $mn=$member.$id;
   $SQL_bbs_online="select * from bbs_class_member where user='$member'";
   $res_bbs_online=mysql_query($SQL_bbs_online,$db);
   $name=mysql_result($res_bbs_online,0,"name");
   $rank=mysql_result($res_bbs_online,0,"rank");
   $rank_pic=rank_pic($rank);
   $face=mysql_result($res_bbs_online,0,"face");
   $face='../image/face/icon'.$face;
      echo "<img src='$face.gif' width='32' height='32'><input type='button' name='$mn' value='$name' onClick='$member()'> ".$rank." ".$rank_pic."<br>";
   }
   ?>
   <BR>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE="BUTTON" NAME="open" value="刷新" onClick="openclk()">
  </form>
</div>
</body>
</html>