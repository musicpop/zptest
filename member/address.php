<?
session_start(); // ��ʼsession
if(!session_is_registered("userregister")||($userregister==""))
{
header("Location: ../index.php");
exit;
}
include "../admin/config.inc.php";
include "../admin/global.php";
alter_status($userregister,6);
?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<TITLE>�༶ͨѶ¼</TITLE>
<link rel="stylesheet" href="../css/index.css" type="text/css">
</HEAD>
<BODY BGCOLOR="#FFFFFF">
<table width="90%" border="0" cellspacing="0" cellpadding="0" align="center" height="384">
  <tr>
    <td align="center">
	<?php
 $result = mysql_query("SELECT * FROM bbs_class_member",$db);
 $row=mysql_num_rows($result);//�鿴����ж�����
 for ($i=0;$i<=($row-1);$i++) {
   $member_user=mysql_result($result,$i,'user');
   $name=mysql_result($result,$i,'name');
   $sex=mysql_result($result,$i,'sex');
   $birth=mysql_result($result,$i,'birth');
   $ph=mysql_result($result,$i,'ph');
   $bp=mysql_result($result,$i,'bp');
   $email=mysql_result($result,$i,'email');
   $oicq=mysql_result($result,$i,'oicq');
   $work=mysql_result($result,$i,'work');
   $ad=mysql_result($result,$i,'ad');
   $post=mysql_result($result,$i,'post');
   $account=mysql_result($result,$i,'account');
   $signature=mysql_result($result,$i,'signature');
   $face=mysql_result($result,$i,'face');
   $face='../image/face/icon'.$face;
   $count=mysql_result($result,$i,'count');
   $experience=mysql_result($result,$i,'experience');
   $last_time=mysql_result($result,$i,'last_time');
   $rank=mysql_result($result,$i,'rank');
   $status_name=read_status($member_user);    
	?>
	<table width='88%' border='1' cellspacing='0' cellpadding='0' bordercolorlight='#330099' bordercolordark='#FFFFFF' align='center' class='black9'>
  <tr bgcolor='#3399FF'> 
    <td colspan='4' align='center' > 
      <div class='white12'>..................��ͬѧ¼-������Ϣ��................</div>
    </td>
  </tr>
  <tr> 
          <td height="31" align='center' width="119"><img src='<? echo $face;?>.gif' width='32' height='32'> 
            <a href="user.php?user=<? echo $member_user;?>" class="black9"><? echo $name;?></a>
          </td>
          <td height="31" align='center' width="34"> 
            <? echo $sex;?>
            </td>
          <td height="31" width="251" ><a href="../photo/member_photo.php?user=<? echo $member_user;?>" class='black9'>����Ƭ</a></td>
          <td height="31" width="191" >���գ� 
            <? echo $birth;?>
          </td>
  </tr>
  <tr> 
    <td colspan='3'>�绰: 
      <? echo $ph;?>
    </td>
         
  </tr>
  <tr> 
    <td colspan='3'>Email:<a href='mailto:$email' class='black9'> 
      <? echo $email;?>
      </a></td>
    <td width='191'>QQ: 
      <? echo $oicq;?>
    </td>
  </tr>
  <tr> 
    <td colspan='3'>������λ: 
      <? echo $work;?>
    </td>
    <td width='191'>�ʱ�: 
      <? echo $post;?>
    </td>
  </tr>
  <tr> 
    <td colspan='4'>ͨѶ��ַ: 
      <? echo $ad;?>
    </td>
  </tr>
  <tr> 
    <td colspan='4'>ְҵ: 
      <? echo $account;?>
    </td>
  </tr>
  <tr> 
    <td colspan='2'>����ֵ: 
      <? echo $experience;?>
    </td>
          <td width="251">�ȼ�: 
            <? echo $rank;?>
          </td>
    <td width="191">��վ����: 
      <? echo $count;?>
    </td>
  </tr>
  <tr> 
    <td colspan='2'>��ǰ״̬: 
      <? echo $status_name;?>
    </td>
          <td width="251">�����¼ʱ��: 
            <? echo $last_time;?>
          </td>
    <td width="191">������Ϣ <a href='sendsms.php?reciever_user=<? echo $user;?>'><img src='../image/sms.gif' width='13' height='15' border='0'></a></td>
  </tr>
</table>
		<BR>
      <?
		}
?>
    </td>
  </tr>
  <tr>
  	<a href="01simple-download-xls.php">����ͨѶ¼</a>
  </tr>
</table>
</BODY>
</HTML>
