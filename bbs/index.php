<?
session_start(); // 开始session
if(!session_is_registered("userregister")||($userregister==""))
{
header("Location: ../index.php");
exit;
}
 include "../admin/config.inc.php";
 include "../admin/global.php";
 alter_status($userregister,3);
 ?>
<html>
<head>
<title>论坛列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../css/index.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" background="../image/bj10.gif">
<table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td height="103"> 
      <div align="center" class="redlarge">论坛列表</div>
    </td>
  </tr>
</table>
<table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
    <td height="154"> 
      <table width="98%" border="1" cellspacing="0" cellpadding="0" align="center" bordercolorlight="#FF00CC" bordercolordark="#FFFFFF" class="purple">
        <tr> 
          <td width="4%">&nbsp;</td>
          <td width="12%"> 
            <div align="center">论坛名称</div>
          </td>
          <td width="13%"> 
            <div align="center">版主</div>
          </td>
          <td width="11%"> 
            <div align="center">主题总数</div>
          </td>
          <td width="32%"> 
            <div align="center">最新主题</div>
          </td>
          <td width="16%"> 
            <div align="center">回复人</div>
          </td>
          <td width="12%"> 
            <div align="center">本版精华</div>
          </td>
        </tr>
        <?
		 $SQL_forum="select * from bbs_class_forum";
		 $res_forum=mysql_query($SQL_forum,$db);
		 $row=mysql_num_rows($res_forum);
		 if ($row>0) {
		  for ($i=0;$i<$row;$i++){
		  $forumid=mysql_result($res_forum,$i,"forumid");
		  $forum_name=mysql_result($res_forum,$i,"forum_name");
		  $master=mysql_result($res_forum,$i,"master");
		  $res_subject_total=mysql_query("select subjectid from bbs_forum_subject where forumid='$forumid'",$db);
          $subject_total=mysql_num_rows($res_subject_total);
          $res_lastpost=mysql_query("select * from bbs_forum_subject where forumid='$forumid' order by lasttime desc",$db);
		  if (mysql_num_rows($res_lastpost)>0) {
		  $last_title=mysql_result($res_lastpost,0,"title");
		  $last_subjectid=mysql_result($res_lastpost,0,"subjectid");
		  $last_name=mysql_result($res_lastpost,0,"last_name");
		   }else {
		   $last_title="";
		   $last_subjectid="";
		   $last_name="";
		   }
		  $res_highlight=mysql_query("select subjectid from bbs_forum_subject where forumid='$forumid' and high_light=1",$db);
		  $hight_light_num=mysql_num_rows($res_highlight);
		 ?>
        <tr bgcolor="#F5F5F5"> 
          <td width="4%" align="center"> <img src="../image/navimg3.gif" width="24" height="25"> 
          </td>
          <td width="12%" align="center"><a href="forum.php?forumid=<? echo $forumid;?>" class="purple">
            <? echo $forum_name;?>
            </a></td>
          <td width="13%">&nbsp;
            <? echo $master;?>
          </td>
          <td width="11%" align="center">
            <? echo $subject_total;?>
          </td>
          <td width="32%">&nbsp;<a href="subject.php?subjectid=<? echo $last_subjectid?>&forumid=<? echo $forumid?>" class='purple'>
            <? echo $last_title;?>
            </a></td>
          <td width="16%" align="center">&nbsp;
            <? echo $last_name;?>
          </td>
          <td width="12%" align="center"><a href="forum.php?action=view_highlight&forumid=<? echo $forumid;?>" class="purple">
            <? echo $hight_light_num;?>
            篇</a></td>
        </tr>
        <?
		  }
		 }
		?>
      </table>
    </td>
  </tr>
  <tr>
    <td height="132">
      <div align="center"><a href="../member/rank.htm"><span class="purple">会员积分规则</span></a><span class="purple"><br>
        <br>
        <a href="guide_master.htm" class="purple">版主守则</a></span></div>
      </td>
  </tr>
</table>
</body>
</html>
