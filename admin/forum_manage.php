<?
session_start();
if(!session_is_registered("superlogin"))//检查是否注册
{
 header("Location: index.php");//跳转到首页进行登陆
exit;
}
?>
<?
include "config.inc.php";
include "global.php";
//添加论坛
if ($add_forum){ 
 $SQL_forum="select forumid from bbs_class_forum order by forumid desc";
 $res_forum=mysql_query($SQL_forum,$db);
 if (mysql_num_rows($res_forum)==0){
  $forumid=1;}else{
  $id_last=mysql_result($res_forum,0,"forumid");//最大的论坛编号
  $forumid=$id_last+1;}
 $forum_name=trim($forum_name);
 mysql_query("insert into bbs_class_forum (forumid,forum_name) values ('$forumid','$forum_name')",$db);
 $message="添加 ".$forum_name." 论坛成功！";
}
//删除论坛
if ($action=="del_forum"){
	mysql_query("delete from bbs_class_forum where forumid='$forumid'",$db);
    $message="删除论坛成功！";
}
//更新版主
if ($edit_master){
$master_name=trim($master_name);
mysql_query("update bbs_class_forum set master='$master_name' where forumid='$forumid'",$db);
$message="更新版主成功！";
}
?>
<html>
<head>
<title>论坛管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../css/index.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000">
<table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
    <td height="34"> 
      <div align="center" class="redlarge">论坛管理</div>
    </td>
  </tr>
  <tr> 
    <td height="34"> 
	<? if($message){
	echo "<div align='center'>".$message."</div>";
	}
	?>
      <div align="center" class="brown9">现有论坛列表</div>
    </td>
  </tr>
  <tr> 
    <td> 
      <table width="96%" border="1" cellspacing="0" cellpadding="0" align="center" bordercolorlight="#0099FF" bordercolordark="#FFFFFF" class="black9">
        <tr> 
            
          <td width="21%"> 
            <div align="center">论坛名称</div>
            </td>
            
          <td width="68%"> 
            <div align="center">版主管理(添加作为版主的用户名,请用空格隔开)</div>
            </td>
            
          <td width="11%"> 
            <div align="center">删除论坛</div>
            </td>
          </tr>
         <? $SQL_forum="select * from bbs_class_forum";
		    $res_forum=mysql_query($SQL_forum,$db);
		    $row=mysql_num_rows($res_forum); 
			if ($row>0){
			 for ($i=0;$i<$row;$i++){
			 $forumid=mysql_result($res_forum,$i,"forumid");
			 $forum_name=mysql_result($res_forum,$i,"forum_name");
			 $master=mysql_result($res_forum,$i,"master");
		 ?>
          <tr>             
          <td width="21%">
            <? echo $forum_name;?>
            <div align="center"></div>
          </td>
            
          <td width="68%" align="center"> 
            <form name="form1" method="post" action="<? echo $PHP_SELF;?>"><input type="text" name="master_name" value="<? echo $master;?>" size="50" maxlength="255">
				<input type="hidden" name="forumid" value="<? echo $forumid;?>">
                <input type="submit" name="edit_master" value="提交">
               </form>
             
            </td>
            
          <td width="11%"> 
            <div align="center"><a href="<? echo $PHP_SELF."?action=del_forum&forumid=".$forumid;?>"><img src="../image/del.gif" width="11" height="11" border='0'></a></div>
            </td>
          </tr>
		  <? }
			}
				?>
        </table>
    </td>
  </tr>
  <tr> 
    <td height="20"> 
      <div align="center" class="brown9">添加论坛</div>
    </td>
  </tr>
  <tr> 
    <td height="20" align="center"> 
        <form name="form2" method="post" action="<? echo $PHP_SELF;?>">
          <input type="text" name="forum_name">
          <br>
          <input type="submit" name="add_forum" value="提交">
          <input type="reset" name="cancel" value="重写">
        </form>
    </td>
  </tr>
</table>
</body>
</html>
