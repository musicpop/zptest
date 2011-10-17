<?
session_start(); // 开始session
if(!session_is_registered("userregister")||($userregister==""))
{
header("Location: ../index.php");
exit;
}
include "../admin/config.inc.php";
include "../admin/global.php";
alter_status($userregister,4);
//-----------------提交评论-----------------
if ($remark){
$remark_user=$userregister;
 $res_name=mysql_query("select name from bbs_class_member where user='$userregister'",$db);
 $remark_name=mysql_result($res_name,0,'name');
$remark_time=date("Y-m-d H:i:s");
$content=htmlspecialchars($content);
$content=nl2br(strip_tags($content));
mysql_query("insert into bbs_remark (pic_id,remark_user,remark_name,remark_time,content) values ('$pic_id','$remark_user','$remark_name','$remark_time','$content') ",$db);
//经验值加20
add_experience($userregister,20);
}
//-----------------提交评论-----------------end
$res_pic=mysql_query("select * from bbs_photo where pic_id='$pic_id'",$db);
$pic_name=mysql_result($res_pic,0,"pic_name");
$up_name=mysql_result($res_pic,0,"up_name");
$pic_size=mysql_result($res_pic,0,"pic_size");
$pic_kind=mysql_result($res_pic,0,"pic_kind");
$pic_time=mysql_result($res_pic,0,"pic_time");
$hit=mysql_result($res_pic,0,"hit");
$pic_discribe=mysql_result($res_pic,0,"pic_discribe");
//人气值加1
$hit++;
mysql_query("update bbs_photo set hit=$hit where pic_id='$pic_id'",$db);
?>
<html>
<head>
<title>查看照片</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../css/index.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0">
<table width="88%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
    <td height="22"> 
      <div align="center" class="redlarge">查看照片</div>
    </td>
  </tr>
  <tr> 
    <td height="32"> 
      <div align="center"><img src="../image/member/<? echo $pic_name;?>"></div>
    </td>
  </tr>
  <tr> 
    <td height="81"> 
      <table width="44%" border="1" cellspacing="0" cellpadding="0" align="center" class="brown9" bordercolorlight="#33FF66" bordercolordark="#FFFFFF">
        <tr> 
          <td colspan="2">
            <div align="center">照片信息</div>
          </td>
        </tr>
        <tr> 
          <td width="39%">上传人:</td>
          <td width="61%"> 
            <? echo $up_name;?>
          </td>
        </tr>
        <tr> 
          <td width="39%">照片类别:</td>
          <td width="61%"> 
            <? echo $pic_kind;?>
          </td>
        </tr>
        <tr> 
          <td width="39%"> 照片大小: </td>
          <td width="61%"> 
            <? echo $pic_size;?>
            byte </td>
        </tr>
        <tr> 
          <td width="39%"> 人气:</td>
          <td width="61%"> 
            <? echo $hit;?>
          </td>
        </tr>
        <tr> 
          <td width="39%">上传时间:</td>
          <td width="61%"> 
            <? echo $pic_time;?>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td height="35" class="purple"> 
      <div align="center">对此照片的描述：
        <table width="89%" border="0" cellspacing="0" cellpadding="0" class="brown9">
          <tr>
            <td bgcolor="#F3F3F3"> 
              <? echo $pic_discribe;?>
            </td>
          </tr>
        </table>
        
      </div>     
    </td>
  </tr>
  <tr> 
    <td height="21" class="purple"> 
      <div align="center">对此照片的评论 
	         <table width="90%" border="0" cellspacing="0" cellpadding="0" background="../image/bj17.gif">
          <tr> 
            <td>
              <? 
	   $res_remark=mysql_query("select * from bbs_remark where pic_id='$pic_id'",$db);
	   $row=mysql_num_rows($res_remark);
	   if ($row>0){
	   for($i=0;$i<$row;$i++){
	   $remark_name=mysql_result($res_remark,$i,"remark_name");
       $remark_time=mysql_result($res_remark,$i,"remark_time");
	   $content=mysql_result($res_remark,$i,"content");
	   echo "评论人：".$remark_name." 时间:".$remark_time."<BR>";
	   echo "内容：".$content;
	   echo "<hr align='center' noshade size='1' color='#9900FF'>";
	    }
       }
	  ?>
            </td>
          </tr>
        </table>
      </div>
    </td>
  </tr>
  <tr> 
    <td height="107" class="purple"> 
      <div align="center">对此照片发表评论 
        <form name="form1" method="post" action="<? echo $PHP_SELF; ?>">
          <textarea name="content" cols="30" rows="3"></textarea>
          <br>
		  <input type="hidden" name="pic_id" value="<? echo $pic_id; ?>">
          <input type="submit" name="remark" value="提交">
          <input type="reset" name="cancel" value="重写">
        </form>
      </div>
    </td>
  </tr>
</table>
</body>
</html>
