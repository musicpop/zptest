<HTML>
<HEAD>
<TITLE>添加用户名</TITLE>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
</HEAD>
<BODY BGCOLOR="#FFFFFF">
<?php
include "config.inc.php";
$res_total=mysql_query("select * from bbs_class_member",$db);
$row=mysql_num_rows($res_total);
for ($i=0;$i<$row;$i++){
$user=mysql_result($res_total,$i,"user");
$id=mysql_result($res_total,$i,"id");
if ($user==''){
mysql_query("update bbs_class_member set user='$id' where id='$id' ",$db);
 }
}
?>
</BODY>
</HTML>
