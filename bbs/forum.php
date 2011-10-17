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
 $res_total=mysql_query("select subjectid from bbs_forum_subject where forumid='$forumid' order by lasttime desc",$db);
 $row=mysql_num_rows($res_total);//主题总数
 $master=read_master($forumid);
 $forum_name=read_forumname($forumid);
 ?>
<html>
<head>
<title>论坛首页</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../css/index.css" type="text/css">
<script language="JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
</head>

<body bgcolor="#FFFFFF" text="#000000" background="../image/bj10.gif" leftmargin="0" topmargin="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="black9">
  <tr> 
    <td align="center" width="13%" ><a href="add_thread.php?forumid=<? echo $forumid;?>"><img src="../image/newtr.gif" width="67" height="25" border="0"></a></td>
    <td align="center" width="33%" bgcolor="#FFCC66" ><marquee direction=left><? echo $forum_name;?> 论坛-斑竹:<? echo $master;?></marquee></td>
    <td align="center" width="16%" bgcolor="#FFCC66" >主题数: <? echo $row;?></td>
    <td align="center" width="27%" bgcolor="#FFCC66" > 
      <form name="form1">
        <select name="menu1" onChange="MM_jumpMenu('self',this,0)">
		<option>请选择论坛</option>
		<?
		 $SQL_select_forum="select * from bbs_class_forum";
		 $res_select_forum=mysql_query($SQL_select_forum,$db);
		 $row_select_forum=mysql_num_rows($res_select_forum);
		 if ($row_select_forum>0) {
		  for ($i=0;$i<$row_select_forum;$i++){
		  $select_forumid=mysql_result($res_select_forum,$i,"forumid");
		  $select_forum_name=mysql_result($res_select_forum,$i,"forum_name");
		  echo "<option value='$PHP_SELF?forumid=$select_forumid'>$select_forum_name</option>";
		   }
		  }
		  ?>          
        </select>
      </form>
    </td>
    <td align="center" width="11%" > 
      <div align="right"><a href="<? echo $PHP_SELF."?action=view_highlight&forumid=".$forumid;?>"><img src="../image/jp.gif" width="76" height="35" border="0"></a></div>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
    <td height="385">
      <table width="99%" border="1" cellspacing="0" cellpadding="0" align="center" bordercolorlight="#FF66CC" bordercolordark="#FFFFFF" class="black9">
        <tr> 
          <td width="12%"> 
            <div align="center">作者</div>
          </td>
          <td width="32%"> 
            <div align="center">题目</div>
          </td>
          <td width="6%"> 
            <div align="center">字数</div>
          </td>
          <td width="5%"> 
            <div align="center">精品</div>
          </td>
          <td width="17%"> 
            <div align="center">最后更新时间</div>
          </td>
          <td width="8%"> 
            <div align="center">回应</div>
          </td>
          <td width="10%"> 
            <div align="center">最后回复</div>
          </td>
          <td width="10%"> 
            <div align="center">人气</div>
          </td>
        </tr>
		<?
		if (!$page){$page=1;}		
		$page_count=ceil($row/$page_size);   //页面总数
        $page_size=15;
		$offset=($page-1)*$page_size;                  //每一页的起始行
		$res_thread=mysql_query("select * from bbs_forum_subject where forumid='$forumid' order by lasttime desc limit $offset, $page_size",$db);
		if ($action=="view_highlight"){$res_thread=mysql_query("select * from bbs_forum_subject where forumid='$forumid' and high_light=1 order by lasttime desc limit $offset, $page_size",$db);}
        $row_thread=mysql_num_rows($res_thread);
        if ($row_thread>0) {
		 for ($i=0;$i<$row_thread;$i++) {
			 $subjectid=mysql_result($res_thread,$i,'subjectid');
			 $title=mysql_result($res_thread,$i,'title');
			 $text_number=mysql_result($res_thread,$i,'text_number');
			 $poster_user=mysql_result($res_thread,$i,'poster_user');
			 $poster_name=mysql_result($res_thread,$i,'poster_name');
             $last_user=mysql_result($res_thread,$i,'last_user');
			 $last_name=mysql_result($res_thread,$i,'last_name');
			 $lasttime=mysql_result($res_thread,$i,'lasttime');
			 $hit=mysql_result($res_thread,$i,'hit');
			 $reply=mysql_result($res_thread,$i,'reply');
			 $high_light=mysql_result($res_thread,$i,'high_light');
		  		 
		 ?>
        <tr> 
         <td align="center"><a href='../member/user.php?user=<? echo $poster_user;?>' class='black9'><? echo $poster_name;?></a></td>
         <td align="center"><a href='subject.php?subjectid=<? echo $subjectid;?>&forumid=<? echo $forumid; ?>' class='black9'><? echo $title;?></a></td>
         <td align="center"><? echo $text_number;?></td>
         <td align="center">
			 <? if ($high_light==1){
		  echo "<span  class='red9'>★</span>";
		  } else echo "&nbsp;";
			 ?> 
           
         </td>
         <td align="center"><? echo $lasttime;?></td>
         <td align="center"><? echo $reply;?></td>
		 <td align="center"><a href='../member/user.php?user=<? echo $last_user;?>' class='black9'><? echo $last_name;?></a></td>
         <td align="center"><? echo $hit;?></td>
        </tr>
		<?
		 }
		} 
		?>
      </table>
	  <div align="center"> 
                    <?php
        $prev_page=$page-1;
        $next_page=$page+1;
        if ($page<=1){
            echo "第一页";
        }
        else{
            echo "<a href='$PHP_SELF?page=1&forumid=$forumid' class='black9'>第一页</a>";
        }
        echo "&nbsp;";
        if ($prev_page<1){
            echo "上一页";
        }
        else{
            echo "<a href='$PHP_SELF?page=$prev_page&forumid=$forumid' class='black9'>上一页</a>";
        }
        echo "&nbsp;";
        if ($next_page>$page_count){
            echo "下一页";
        }
        else{
            echo "<a href='$PHP_SELF?page=$next_page&forumid=$forumid' class='black9'>下一页</a>";
        }
        echo "&nbsp;";
        if ($page>=$page_count){
            echo "最后一页";
        }
        else{
            echo "<a href='$PHP_SELF?page=$page_count&forumid=$forumid' class='black9'>最后一页</a>";
        }    
?>
                  </div>
    </td>
  </tr>
</table>
</body>
</html>
