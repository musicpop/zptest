<?
session_start(); // 开始session
if(!session_is_registered("userregister")||($userregister==""))
{
header("Location: ../index.php");
exit;
}
?>
<?php
 include "../admin/config.inc.php";
 include "../admin/global.php";
 alter_status($userregister,3);//改变当前状态
 add_subject_hit($subjectid);//增加人气
 //送鲜花
 if ($action=="send_flower"){
 send_flower($threadid);
 }
 //扔臭鸡蛋
 if ($action=="send_egg"){
 send_egg($threadid);
 }
 //删除帖子
 if ($action=="del_thread"){
 del_thread($threadid);
 }
 //删除主题
 if ($action=="del_subject"){
 del_subject($subjectid);
 echo "主题已经删除！";
 exit;
 }
 //选为精品
 if ($action=="as_highlight"){
 as_highlight($subjectid);
 }
 ?>
<html>
<head>
<title>显示主题</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../css/index.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000" background="../image/bj10.gif">
<?
 $SQL_thread=mysql_query("select * from bbs_forum_thread where subjectid='$subjectid'",$db);
 $row=mysql_num_rows($SQL_thread);
 //如果主题为空，版主有权删除此主题
 if ($row==0){
  if (($userregister==$webmaster)||(is_master($userregister,$forumid))) {
	       echo "<div align='center'><a href='".$PHP_SELF."?action=del_subject&threadid=".$threadid."&subjectid=".$subjectid."&forumid=".$forumid."' class='black9'>删除主题!</a></div>";//如果是版主、管理员登录，有删除主题权限
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
      鲜花数:
      <? echo $flower;?>
    </td>
    <td height="18" width="19%"><img src="../image/32.gif" width="20" height="20"> 
      臭鸡蛋数：
      <? echo $egg;?>
    </td>
  </tr>
  <tr bgcolor="#FFFFE6"> 
    <td width="41%"><img src='<? echo $face;?>.gif' width='32' height='32'>
      <? echo "<a href='../member/user.php?user=".$poster_user."' class='black9'>".$poster_name."</a>";?>
    </td>
    <td width="24%">等级: 
      <? echo $poster_rank;?>
      <span class="red9"> 
      <? echo $poster_rank_pic;?>
      </span></td>
    <td width="16%">ip: 
      <? echo $ip;?>
    </td>
    <td width="19%">当前状态:
      <? echo $poster_status;?>
    </td>
  </tr>
  <tr> 
    <td colspan="4" bgcolor="#F5F5F5">
		  <? echo $content;?><BR>
		  相关链接：<a href="<? echo $link;?>" target="_blank" class="black9"><? echo $link;?></a>
		  </td>
  </tr>
  <tr> 
    <td colspan="4"> 
      <div align="right"><? echo $poster_signature;?></div>
    </td>
  </tr>
  <tr> 
    <td colspan="4"> 
      <div align="center"><a href="reply.php?forumid=<? echo $forumid;?>&subjectid=<? echo $subjectid;?>&threadtitle=<? echo $title;?>" class="black9">回复</a>|
		  <? if (($poster_user==$userregister)||($userregister==$webmaster)||(is_master($userregister,$forumid))) {
	       echo "<a href='".$PHP_SELF."?action=del_thread&threadid=".$threadid."&subjectid=".$subjectid."&forumid=".$forumid."' class='black9'>删除帖子</a>|";//如果是发贴人本人登录，或者是版主、管理员登录，有删除权限
		   }
		  ?>
			  <? if (($userregister==$webmaster)||(is_master($userregister,$forumid))) {
	       echo "<a href='".$PHP_SELF."?action=del_subject&threadid=".$threadid."&subjectid=".$subjectid."&forumid=".$forumid."' class='black9'>删除主题!</a>|";//如果是版主、管理员登录，有删除主题权限
		   }
		  ?>
		  <?
	       if (($userregister==$webmaster)||(is_master($userregister,$forumid))){
		   echo "<a href='".$PHP_SELF."?action=as_highlight&threadid=".$threadid."&subjectid=".$subjectid."&forumid=".$forumid."' class='black9'>选为精品</a>|";//若为版主、管理员登录，可选为精品
		  }
		  ?>		  
	<? if ($poster_user!=$userregister) { ?>	  
	  <a href="<? echo $PHP_SELF."?action=send_flower&threadid=".$threadid."&subjectid=".$subjectid."&forumid=".$forumid; ?>" class="black9">送鲜花</a>|
		  <a href="<? echo $PHP_SELF."?action=send_egg&threadid=".$threadid."&subjectid=".$subjectid."&forumid=".$forumid; ?>" class="black9">扔臭鸡蛋</a>
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
