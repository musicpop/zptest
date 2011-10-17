<?
session_start(); // 开始session
if(!session_is_registered("userregister")||($userregister==""))
{
header("Location: ../index.php");
exit;
}
 include "../admin/config.inc.php";
 include "../admin/global.php";
 alter_status($userregister,6);
 $res_visit=mysql_query("select * from bbs_visit order by visit_time desc limit 0,20",$db);
 $row=mysql_num_rows($res_visit);
?>
<HTML>
<HEAD>
<TITLE>访问记录</TITLE>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
<link rel="stylesheet" href="../css/index.css" type="text/css">
</HEAD>
<BODY BGCOLOR="#FFFFFF">
<table width="93%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
    <td height="107"> 
      <div align="center" class="redlarge">访问记录</div>
      </td>
  </tr>
  <tr>
    <td height="179">
      <table width="82%" border="1" cellspacing="0" cellpadding="0" align="center" bordercolorlight="#66CCFF" bordercolordark="#FFFFFF">
        <tr> 
          <td width="21%" class="red9"> 
            <div align="center">用户名</div>
          </td>
          <td width="24%" class="red9"> 
            <div align="center">姓名</div>
          </td>
          <td width="55%" class="red9"> 
            <div align="center">访问时间</div>
          </td>
        </tr>
        <?php
         for ($i=0;$i<$row;$i++){
			 $visit_user=mysql_result($res_visit,$i,"visit_user");
			 $visit_name=mysql_result($res_visit,$i,"visit_name");
			 $visit_time=mysql_result($res_visit,$i,"visit_time");
		 ?>
         <tr> 
          <td width="21%" class="black9" align="center"><a href="user.php?user=<? echo $visit_user?>" class="black9"><? echo $visit_user?></td>
          <td width="24%" class="black9" align="center"><? echo $visit_name?></td>
          <td width="55%" class="black9" align="center"><? echo $visit_time?></td>
        </tr>
		<? } 
		 ?>
      </table>
    </td>
  </tr>
</table>
</BODY>
</HTML>
