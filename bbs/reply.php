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
 alter_status($userregister,3);
 if ($submit){
 $threadid=time();
 $posttime=get_now_time();
 $lasttime=$posttime;
 $ip=$REMOTE_ADDR;
 $content=htmlspecialchars($content);
 $content=nl2br(strip_tags($content));
 $title=trim(htmlspecialchars($title));
 $link=trim(htmlspecialchars($link));
 $poster_user=$userregister;
 $poster_name=User_to_name($poster_user);
mysql_query("insert into bbs_forum_thread (threadid,forumid,subjectid,title,content,poster_user,poster_name,posttime,ip,link) values ('$threadid','$forumid','$subjectid','$title','$content','$poster_user','$poster_name','$posttime','$ip','$link')",$db);
mysql_query("update bbs_forum_subject set last_user='$poster_user',last_name='$poster_name',lasttime='$lasttime' where subjectid='$subjectid'",$db);//更改最后回复人
add_reply($subjectid);//增加回复
add_experience($userregister,20);//经验值加20
header("Location: subject.php?subjectid=$subjectid");
exit;
 }
 ?> 
<script language="JavaScript">
<!--
function Juge(theForm)
{

	if (theForm.title.value == "")
	{
		alert("标题不能为空！");
		theForm.title.focus();
		return (false);
	}
	if (theForm.content.value == "")
	{
		alert("内容不能为空！");
		theForm.content.focus();
		return (false);
	}	
}

-->
</script>
<html>
<head>
<title>回复文章</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../css/index.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000">
<table width="99%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td height="67">
      <div align="center" class="redlarge">回复文章</div>
    </td>
  </tr>
  <tr>
    <td height="178">
      <form name="form1" method="post" action="<? echo $PHP_SELF;?>" onsubmit="javascript:return Juge(this);">
        <div align="center">题目<br>
          <input type="text" name="title" size="50" maxlength="255" value="<? echo "Re:".$threadtitle;?>">
          <br>
          正文<br>
          <textarea name="content" cols="50" rows="8"></textarea>
          <br>
          相关链接(网址)<br>
          <input type="text" name="link" size="50" maxlength="100">
          <input type=hidden name="subjectid" value="<? echo $subjectid;?>">
          <input type=hidden name="forumid" value="<? echo $forumid;?>">
          <br>
          <input type="submit" name="submit" value="提交">
          <input type="reset" name="cancel" value="重写">
        </div>
      </form>
    </td>
  </tr>
</table>
</body>
</html>
