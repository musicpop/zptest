<?
session_start(); // 开始session
if(!session_is_registered("userregister")||($userregister==""))
{
header("Location: ../index.php");
exit;
}
?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<TITLE>当前在线人员</TITLE>
<link rel="stylesheet" href="../css/index.css" type="text/css">
</HEAD>
<BODY BGCOLOR="#FFFFFF">
<?php
 include "../admin/config.inc.php";
 include "../admin/global.php";
 UpdateMember();
 alter_status($userregister,6);
 $bbs_online_member=Readbbs_onlineName();
 $bbs_online_number=sizeof($bbs_online_member);
 ?>
<table width="82%" border="0" cellspacing="0" cellpadding="0" align="center" height="315">
  <tr>
    <td>
      <div align="center"><b class="redlarge">当前在线
        <? echo $bbs_online_number; ?>
        人</b> </div>
      <table width="600" border="1" cellspacing="0" cellpadding="0" align="center" bordercolorlight="#0099FF" bordercolordark="#FFFFFF" class="black9" height="15">
        <tr> 
          <td width="9%" height="15"> 
            <div align="center">用户名</div>
          </td>
          <td width="9%" height="15"> 
            <div align="center">姓名</div>
          </td>
          <td width="7%" height="15"> 
            <div align="center">性别</div>
          </td>
          <td width="11%" height="15"> 
            <div align="center">等级</div>
          </td>
          <td width="15%" height="15"> 
            <div align="center">oicq</div>
          </td>
          <td width="24%" height="15"> 
            <div align="center">email</div>
          </td>
          <td width="11%" height="15">
            <div align="center">当前状态</div>
          </td>
          <td width="14%" height="15"> 
            <div align="center">发短信</div>
          </td>
        </tr>
        <? 
   if ($bbs_online_number>0){
   while (list($id,$member)=each($bbs_online_member)){
   $SQL_bbs_online="select * from bbs_class_member where user='$member'";
   $res_bbs_online=mysql_query($SQL_bbs_online,$db);
   $user=$member;
   $name=mysql_result($res_bbs_online,0,"name");
   $sex=mysql_result($res_bbs_online,0,"sex");
   $rank=mysql_result($res_bbs_online,0,"rank");
   $oicq=mysql_result($res_bbs_online,0,"oicq");
   $email=mysql_result($res_bbs_online,0,"email");
    $status_name=read_status($member);
   echo "<tr>";
   echo "<td align='center'><a href='user.php?user=$user' class='black9'>".$user."</a></td>";
   echo "<td align='center'>".$name."</td>";
   echo "<td align='center'>".$sex."</td>";
    echo "<td align='center'>".$rank."</td>";
   echo "<td align='center'>&nbsp;".$oicq."</td>";
   echo "<td align='center'>"."<a href='mailto:".$email."' class='black9'>".$email."</a></td>";
   echo "<td align='center'>".$status_name."</td>";
   echo "<td align='center'>"."<a href='sendsms.php?reciever_user=$user'>"."<img src='../image/sms.gif' width='13' height='15' border='0'>"."</a></td>";
   echo "</tr>";
   }
  }
  ?>
      </table>
    </td>
  </tr>
</table>
<div align="center"></div>
</BODY>
</HTML>