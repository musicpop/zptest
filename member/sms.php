<?
session_start(); // 开始session
if(!session_is_registered("userregister")||($userregister==""))
{
header("Location: ../index.php");
exit;
}
include "../admin/config.inc.php";
include "../admin/global.php";
alter_status($userregister,2);
//-------------添加留言---------------
if ($submit){
 $id=time();
 $time=date("Y年m月d日 H:i:s A");
 $content=htmlspecialchars($content);
 $content=nl2br(strip_tags($content));
  $SQL_reciever="select user from bbs_class_member where name='$reciever_name'";//查找接受人用户名
  $res_reciever=mysql_query($SQL_reciever,$db);
  $reciever_user=mysql_result($res_reciever,0,"user");
  $send_user=$userregister;
  $SQL_send="select name from bbs_class_member where user='$userregister'";//查找发送人姓名
  $res_send=mysql_query($SQL_send,$db);
  $send_name=mysql_result($res_send,0,"name");
 //写入数据库
 $Sql_submit="INSERT INTO bbs_sms (id,reciever_user,send_user,send_name,time,content) VALUES ('$id','$reciever_user','$send_user','$send_name','$time','$content')";
 mysql_query($Sql_submit,$db);
 $message="您成功地给".$reciever_name."发送一条短信！"; 
 //-------------添加留言--------------end
 }
 //-------------删除留言-----------------
 if ($action=='del'){
  $Sql_del="delete from sms where id='$id' ";
  mysql_query($Sql_del,$db);
  $message="删除成功!";
  }
 //-------------删除留言--------------end
?>
<HTML>
<HEAD>
<TITLE>站内短消息</TITLE>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
<link rel="stylesheet" href="../css/index.css" type="text/css">
</HEAD>
<BODY BGCOLOR="#FFFFFF">
<table border="0" cellspacing="0" cellpadding="0" align="center" height="316" class="black9" width="603">
  <tr>
    <td height="421"> 
      <div align='center'>
        <table width="90%" border="0" cellspacing="0" cellpadding="0" class="purple">
          <tr> 
            <td width="49%">
<?
 if (!$page){$page=1;}
	     $result_total = mysql_query("SELECT id FROM bbs_sms where reciever_user='$userregister'",$db);
		 $row=mysql_num_rows($result_total);//查看结果有多少行
		 $page_count=ceil($row/$page_size);   //页面总数
		 $offset=($page-1)*$page_size;                  //每一页的起始行
		 $result_sms = mysql_query("SELECT * FROM bbs_sms where reciever_user='$userregister' order by id desc limit $offset, $page_size",$db);
         $num_sms=mysql_num_rows($result_sms);//本页留言数
?>
              <div align="center">我收到的短消息 共<? echo $row;?>条</div>
            </td>
            <td width="51%">
              <div align="center"><a href="mysendsms.php" class="purple">我发送的短消息</a></div>
            </td>
          </tr>
        </table>
        <? if ($message) {echo $message;}?>
      </div>
      <table width="599" border="1" cellspacing="0" cellpadding="0" align="center" bordercolorlight="#6699FF" bordercolordark="#FFFFFF" class="black9" height="14">
        <tr> 
          <td width="99"> 
            <div align="center">时间</div>
          </td>
          <td width="51"> 
            <div align="center">留言人</div>
          </td>
          <td width="375"> 
            <div align="center">内容</div>
          </td>
          <td width="29">回复</td>
          <td width="33"> 
            <div align="center">删除</div>
          </td>
        </tr>
        <?php		 
		  if ($num_sms>0){
		  for ($i=0;$i<=($num_sms-1);$i++) {
	      $id=mysql_result($result_sms,$i,'id');
		  $send_user=mysql_result($result_sms,$i,'send_user');
		  $send_name=mysql_result($result_sms,$i,'send_name');
		  $time=mysql_result($result_sms,$i,'time');
		  $content=mysql_result($result_sms,$i,'content');
		  $isread=mysql_result($result_sms,$i,'isread');
		   //如果消息未读，设为已读
		   if ($isread=='0'){
		    mysql_query("UPDATE sms SET isread='1' where id='$id'",$db);
			}
		  echo "<tr>";
		  echo "<td width='99'>".$time."</td>";
		  echo "<td width='51' align='center'><a href=user.php?user=".$send_user." class='black9' >".$send_name."</a></td>";
	      echo "<td width='375'>".$content."</td>";
		  echo "<td width='33' align='center'> <a href='sendsms.php?reciever_user=$send_user'><img src='../image/sms.gif' width='13' height='15' border='0' alt='回复'> </a> </td>";
		  echo "<td width='29' align='center'> <a href='$PHP_SELF?action=del&id=$id'><img src='../image/del.gif' width='11' height='11' border='0' alt='删除'> </a> </td>";
		  echo "</tr>";
		  }
		 }
	    ?>
      </table>
      <br>
	   <div align="center"> 
                    <?php
        $prev_page=$page-1;
        $next_page=$page+1;
        ?>
                    <?php
        if ($page<=1){
            echo "第一页";
        }
        else{
            echo "<a href='$PHP_SELF?page=1' class='black9'>第一页</a>";
        }
        echo "&nbsp;";
        if ($prev_page<1){
            echo "上一页";
        }
        else{
            echo "<a href='$PHP_SELF?page=$prev_page' class='black9'>上一页</a>";
        }
        echo "&nbsp;";
        if ($next_page>$page_count){
            echo "下一页";
        }
        else{
            echo "<a href='$PHP_SELF?page=$next_page' class='black9'>下一页</a>";
        }
        echo "&nbsp;";
        if ($page>=$page_count){
            echo "最后一页";
        }
        else{
            echo "<a href='$PHP_SELF?page=$page_count' class='black9'>最后一页</a>";
        }    
?>
                  </div>
      <table width="90%" border="0" cellspacing="0" cellpadding="0" align="center" class="black9">
        <tr> 
          <td> 
            <form name="form1" method="post" action="<? echo $PHP_SELF;?>">
              <div align="center">给班级成员
              <select name="reciever_name">
              <?php
			   $result = mysql_query("SELECT name FROM bbs_class_member",$db);
               if ($result){
			   $row=mysql_num_rows($result);
			   for ($i=0;$i<=($row-1);$i++) {
			    $name=mysql_result($result,$i,'name');
				echo "<option>".$name."</option> ";
			    }
			   } 
			   ?>
                </select>
                发短消息 <br>
                内容 <br>
                <textarea name="content" rows="4" cols="30"></textarea>
                <br>
                <input type="submit" name="submit" value="提交">
                <input type="reset" name="cancel" value="重写">
              </div>
            </form>
          </td>
          <td>
            <form name="form1" method="post" action="<? echo $PHP_SELF;?>">
			<div align="center">给在线人员 
              <select name="reciever_name"><?php
			   $result = mysql_query("SELECT user FROM bbs_online",$db);
               $row=mysql_num_rows($result);
			   for ($i=0;$i<=($row-1);$i++) {
			    $bbs_online_user=mysql_result($result,$i,'user');
				if ($bbs_online_user==$userregister) {continue;}//如果在线人员与本人重复，跳过
				$SQL_bbs_online="select name from bbs_class_member where user='$bbs_online_user'";
                $res_bbs_online=mysql_query($SQL_bbs_online,$db);
                $bbs_online_name=mysql_result($res_bbs_online,0,"name");
				echo "<option>".$bbs_online_name."</option> ";
			   }
			   ?>
              </select>
              发短消息 <br>
              内容<br>
              <textarea name="content" rows="5" cols="30"></textarea>
              <br>
              <input type="submit" name="submit" value="提交">
              <input type="reset" name="cancel" value="重写">
            </div>
			</form>
          </td>
        </tr>
      </table>
      
    </td>
  </tr>
</table>
</BODY>
</HTML>
