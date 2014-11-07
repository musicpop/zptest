  <?
session_cache_limiter('private, must-revalidate');
session_start(); // 开始session
$session_id=session_id();
?>
<html>
<head>
<title>导航</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="css/index.css" type="text/css">
<script language="JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
</head>
<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" background="image/bj17.gif">
<table width="89%" border="0" cellspacing="0" cellpadding="0" height="311" align="center" class="purple">
  <tr> 
    <td> 
      <div align="center"><img src="image/navimg5.gif" width="25" height="25"> 
        <a href="main.php" class="purple" target="right">社区首页</a></div>
    </td>
  </tr>
  <tr> 
    <td height="26" align="center"> <img src="image/navimg3.gif" width="24" height="25">><a href='bbs/index.php?session_id=<? echo $session_id;?>' target='right' class='purple'>论坛导航</a><BR>
      <table width="70%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr> 
          <td> 
            <?
		 include "admin/config.inc.php";
		 include "admin/global.php";
		 $session_id=session_id();
		 $SQL_select_forum="select * from bbs_class_forum";
		 $res_select_forum=mysql_query($SQL_select_forum,$db);
		 $row_select_forum=mysql_num_rows($res_select_forum);
		 if ($row_select_forum>0) {
		  for ($i=0;$i<$row_select_forum;$i++){
		  $select_forumid=mysql_result($res_select_forum,$i,"forumid");
		  $select_forum_name=mysql_result($res_select_forum,$i,"forum_name");
		  echo "<img src='image/tp18.gif' width='16' height='16'><a href='bbs/forum.php?forumid=$select_forumid&session_id=$session_id' target='right' class='purple'>$select_forum_name</a><BR>";
		   }
		  }
		  ?>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td> 
      <div align="center"><img src="image/navimg11.gif" width="25" height="25"> 
        <a href="member/online.php" class="purple" target="right">在线会员</a></div>
    </td>
  </tr>

  <tr> 
    <td> 
      <div align="center"><img src="image/navimg8.gif" width="25" height="25"> 
        <a href="member/member_edit.php" class="purple" target="right">资料修改</a></div>
    </td>
  </tr>
  <tr> 
    <td> 
      <div align="center"><img src="image/navimg6.gif" width="27" height="25"> 
        <a href="member/address.php" class="purple" target="right">班通讯录</a></div>
    </td>
  </tr>
  <tr> 
    <td height="27"> 
      <div align="center"><img src="image/navimg7.gif" width="26" height="25"><a href="member/visit.php" class="purple" target="right">访问记录</a></div>
    </td>
  </tr>
  <tr> 
    <td> 
      <div align="center"><img src="image/navimg2.gif" width="22" height="25"> 
        <a href="photo/index.php" class="purple" target="right">班级照片</a></div>
    </td>
  </tr>
  <tr> 
    <td height="20"> 
      <div align="center"> <img src="image/navimg12.gif" width="25" height="25"> 
        <a href="photo/member_photo.php?user=<? echo $userregister; ?>" class="purple" target="right">个人照片</a></div>
    </td>
  </tr>
  <tr> 
    <td height="20"> 
      <div align="center"> <img src="image/navimg10.gif" width="25" height="25"> 
        <a href="photo/up_photo.php" class="purple" target="right">上传照片</a></div>
    </td>
  </tr>

  <tr>
    <td height="30">
      <div align="center"><img src="image/navimg13.gif" width="25" height="25"> 
        友情链接</div>
    </td>
  </tr>
  <tr> 
    <td height="30"> 
      <div align="center"><a href="admin/index.php" class="purple" target="right">★班级管理</a></div>
    </td>
  </tr>
</table>
</body>
</html>
