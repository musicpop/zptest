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
 $subjectid=time();
 $threadid=$subjectid;
 $posttime=get_now_time();
 $lasttime=$posttime;
 $ip=$REMOTE_ADDR;
 $text_number=strlen($content);
 $content=htmlspecialchars($content);
 $content=nl2br(strip_tags($content));
 $title=trim(htmlspecialchars($title));
 $link=trim(htmlspecialchars($link));
 $poster_user=$userregister;
 $poster_name=User_to_name($poster_user);
 $last_user=$poster_user;
 $last_name=$poster_name;
mysql_query("insert into bbs_forum_subject (subjectid,forumid,title,text_number,poster_user,poster_name,last_user,last_name,lasttime) values ('$subjectid','$forumid','$title','$text_number','$poster_user','$poster_name','$last_user','$last_name','$lasttime')",$db);
mysql_query("insert into bbs_forum_thread (threadid,forumid,subjectid,title,content,poster_user,poster_name,posttime,ip,link) values ('$threadid','$forumid','$subjectid','$title','$content','$poster_user','$poster_name','$posttime','$ip','$link')",$db);
//经验值加40
add_experience($userregister,40);
header("Location: forum.php?forumid=$forumid");
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
<title>发新帖子</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../css/index.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0">
<table width="99%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
    <td height="79"> 
      <div align="center" class="redlarge">发新帖子</div>
    </td>
  </tr>
  <tr>
    <td height="266"> 
      <div align="center">
        <form name="form1" method="post" action="<? echo $PHP_SELF;?>" onsubmit="javascript:return Juge(this);">
          <p class="black9">标题 <br>
            <input type="text" name="title" size="50" maxlength="255">
            <br>
            内容 <br>
            <textarea name="content" cols="50" rows="8"></textarea>
            <br>
            相关链接(网址)<br>
            <input type="text" name="link" size="50" maxlength="100">
            <br>
			<input type=hidden name="forumid" value="<? echo $forumid;?>">
            <input type="submit" name="submit" value="提交">
            <input type="reset" name="cancel" value="重写">
          </p>
        </form>
      </div>
    </td>
  </tr>
</table>
</body>
</html>
