<?
session_start(); // ��ʼsession
if(!session_is_registered("userregister")||($userregister==""))
{
header("Location: ../index.php");
exit;
}
?>
<?php
 include "../admin/config.inc.php";
 include "../admin/global.php";
 alter_status($userregister,3);//�ı䵱ǰ״̬
 add_subject_hit($subjectid);//��������
 //���ʻ�
 if ($action=="send_flower"){
 send_flower($threadid);
 }
 //�ӳ�����
 if ($action=="send_egg"){
 send_egg($threadid);
 }
 //ɾ������
 if ($action=="del_thread"){
 del_thread($threadid);
 }
 //ɾ������
 if ($action=="del_subject"){
 del_subject($subjectid);
 echo "�����Ѿ�ɾ����";
 exit;
 }
 //ѡΪ��Ʒ
 if ($action=="as_highlight"){
 as_highlight($subjectid);
 }
 ?>
<html>
<head>
<title>��ʾ����</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../css/index.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000" background="../image/bj10.gif">
<?
 $SQL_thread=mysql_query("select * from bbs_forum_thread where subjectid='$subjectid'",$db);
 $row=mysql_num_rows($SQL_thread);
 //�������Ϊ�գ�������Ȩɾ��������
 if ($row==0){
  if (($userregister==$webmaster)||(is_master($userregister,$forumid))) {
	       echo "<div align='center'><a href='".$PHP_SELF."?action=del_subject&threadid=".$threadid."&subjectid=".$subjectid."&forumid=".$forumid."' class='black9'>ɾ������!</a></div>";//����ǰ���������Ա��¼����ɾ������Ȩ��
		   }
		  
 }
 for ($i=0;$i<$row;$i++){
  $threadid=mysql_result($SQL_thread,$i,"threadid");
  $forumid=mysql_result($SQL_thread,$i,"forumid");
  $title=mysql_result($SQL_thread,$i,"title");
  $content=mysql_result($SQL_thread,$i,"content");
  $poster_user=mysql_result($SQL_thread,$i,"poster_user");
  $face=User_to_face($poster_user);
  $face='../image/face/icon'.$face;
  $poster_name=mysql_result($SQL_thread,$i,"poster_name");
  $posttime=mysql_result($SQL_thread,$i,"posttime");
  $ip=mysql_result($SQL_thread,$i,"ip");
  $link=mysql_result($SQL_thread,$i,"link");
  $flower=mysql_result($SQL_thread,$i,"flower");
  $egg=mysql_result($SQL_thread,$i,"egg");
  $poster_rank=readrank($poster_user);
  $poster_rank_pic=rank_pic($poster_rank);
  $poster_status=read_status($poster_user);
  $poster_signature=read_signature($poster_user);
  ?>
<table width="99%" border="0" cellspacing="0" cellpadding="0" class="black9" align="center">
  <tr bgcolor="#FFFFE6"> 
    <td height="18" width="41%" class="deepblue10">
      <? echo $title;?>
    </td>
    <td height="18" width="24%"> 
      <? echo $posttime;?>
    </td>
    <td height="18" width="16%"><img src="../image/31.gif" width="20" height="20"> 
      �ʻ���:
      <? echo $flower;?>
    </td>
    <td height="18" width="19%"><img src="../image/32.gif" width="20" height="20"> 
      ����������
      <? echo $egg;?>
    </td>
  </tr>
  <tr bgcolor="#FFFFE6"> 
    <td width="41%"><img src='<? echo $face;?>.gif' width='32' height='32'>
      <? echo "<a href='../member/user.php?user=".$poster_user."' class='black9'>".$poster_name."</a>";?>
    </td>
    <td width="24%">�ȼ�: 
      <? echo $poster_rank;?>
      <span class="red9"> 
      <? echo $poster_rank_pic;?>
      </span></td>
    <td width="16%">ip: 
      <? echo $ip;?>
    </td>
    <td width="19%">��ǰ״̬:
      <? echo $poster_status;?>
    </td>
  </tr>
  <tr> 
    <td colspan="4" bgcolor="#F5F5F5">
		  <? echo $content;?><BR>
		  ������ӣ�<a href="<? echo $link;?>" target="_blank" class="black9"><? echo $link;?></a>
		  </td>
  </tr>
  <tr> 
    <td colspan="4"> 
      <div align="right"><? echo $poster_signature;?></div>
    </td>
  </tr>
  <tr> 
    <td colspan="4"> 
      <div align="center"><a href="reply.php?forumid=<? echo $forumid;?>&subjectid=<? echo $subjectid;?>&threadtitle=<? echo $title;?>" class="black9">�ظ�</a>|
		  <? if (($poster_user==$userregister)||($userregister==$webmaster)||(is_master($userregister,$forumid))) {
	       echo "<a href='".$PHP_SELF."?action=del_thread&threadid=".$threadid."&subjectid=".$subjectid."&forumid=".$forumid."' class='black9'>ɾ������</a>|";//����Ƿ����˱��˵�¼�������ǰ���������Ա��¼����ɾ��Ȩ��
		   }
		  ?>
			  <? if (($userregister==$webmaster)||(is_master($userregister,$forumid))) {
	       echo "<a href='".$PHP_SELF."?action=del_subject&threadid=".$threadid."&subjectid=".$subjectid."&forumid=".$forumid."' class='black9'>ɾ������!</a>|";//����ǰ���������Ա��¼����ɾ������Ȩ��
		   }
		  ?>
		  <?
	       if (($userregister==$webmaster)||(is_master($userregister,$forumid))){
		   echo "<a href='".$PHP_SELF."?action=as_highlight&threadid=".$threadid."&subjectid=".$subjectid."&forumid=".$forumid."' class='black9'>ѡΪ��Ʒ</a>|";//��Ϊ����������Ա��¼����ѡΪ��Ʒ
		  }
		  ?>		  
	<? if ($poster_user!=$userregister) { ?>	  
	  <a href="<? echo $PHP_SELF."?action=send_flower&threadid=".$threadid."&subjectid=".$subjectid."&forumid=".$forumid; ?>" class="black9">���ʻ�</a>|
		  <a href="<? echo $PHP_SELF."?action=send_egg&threadid=".$threadid."&subjectid=".$subjectid."&forumid=".$forumid; ?>" class="black9">�ӳ�����</a>
	<? }
			  ?>		  
		  </div>
    </td>
  </tr>
</table>
<?
}
?>
</body>
</html>
