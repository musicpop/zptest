<?
session_start(); // ��ʼsession
if(!session_is_registered("userregister")||($userregister==""))
{
header("Location: ../index.php");
exit;
}
include "../admin/config.inc.php";
include "../admin/global.php";
alter_status($userregister,2);
//-------------�������---------------
if ($submit){
 $id=time();
 $time=date("Y��m��d�� H:i:s A");
 $content=htmlspecialchars($content);
 $content=nl2br(strip_tags($content));
  $SQL_reciever="select user from bbs_class_member where name='$reciever_name'";//���ҽ������û���
  $res_reciever=mysql_query($SQL_reciever,$db);
  $reciever_user=mysql_result($res_reciever,0,"user");
  $send_user=$userregister;
  $SQL_send="select name from bbs_class_member where user='$userregister'";//���ҷ���������
  $res_send=mysql_query($SQL_send,$db);
  $send_name=mysql_result($res_send,0,"name");
 //д�����ݿ�
 $Sql_submit="INSERT INTO bbs_sms (id,reciever_user,send_user,send_name,time,content) VALUES ('$id','$reciever_user','$send_user','$send_name','$time','$content')";
 mysql_query($Sql_submit,$db);
 $message="���ɹ��ظ�".$reciever_name."����һ�����ţ�"; 
 //-------------�������--------------end
 }
 //-------------ɾ������-----------------
 if ($action=='del'){
  $Sql_del="delete from sms where id='$id' ";
  mysql_query($Sql_del,$db);
  $message="ɾ���ɹ�!";
  }
 //-------------ɾ������--------------end
?>
<HTML>
<HEAD>
<TITLE>վ�ڶ���Ϣ</TITLE>
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
		 $row=mysql_num_rows($result_total);//�鿴����ж�����
		 $page_count=ceil($row/$page_size);   //ҳ������
		 $offset=($page-1)*$page_size;                  //ÿһҳ����ʼ��
		 $result_sms = mysql_query("SELECT * FROM bbs_sms where reciever_user='$userregister' order by id desc limit $offset, $page_size",$db);
         $num_sms=mysql_num_rows($result_sms);//��ҳ������
?>
              <div align="center">���յ��Ķ���Ϣ ��<? echo $row;?>��</div>
            </td>
            <td width="51%">
              <div align="center"><a href="mysendsms.php" class="purple">�ҷ��͵Ķ���Ϣ</a></div>
            </td>
          </tr>
        </table>
        <? if ($message) {echo $message;}?>
      </div>
      <table width="599" border="1" cellspacing="0" cellpadding="0" align="center" bordercolorlight="#6699FF" bordercolordark="#FFFFFF" class="black9" height="14">
        <tr> 
          <td width="99"> 
            <div align="center">ʱ��</div>
          </td>
          <td width="51"> 
            <div align="center">������</div>
          </td>
          <td width="375"> 
            <div align="center">����</div>
          </td>
          <td width="29">�ظ�</td>
          <td width="33"> 
            <div align="center">ɾ��</div>
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
		   //�����Ϣδ������Ϊ�Ѷ�
		   if ($isread=='0'){
		    mysql_query("UPDATE sms SET isread='1' where id='$id'",$db);
			}
		  echo "<tr>";
		  echo "<td width='99'>".$time."</td>";
		  echo "<td width='51' align='center'><a href=user.php?user=".$send_user." class='black9' >".$send_name."</a></td>";
	      echo "<td width='375'>".$content."</td>";
		  echo "<td width='33' align='center'> <a href='sendsms.php?reciever_user=$send_user'><img src='../image/sms.gif' width='13' height='15' border='0' alt='�ظ�'> </a> </td>";
		  echo "<td width='29' align='center'> <a href='$PHP_SELF?action=del&id=$id'><img src='../image/del.gif' width='11' height='11' border='0' alt='ɾ��'> </a> </td>";
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
            echo "��һҳ";
        }
        else{
            echo "<a href='$PHP_SELF?page=1' class='black9'>��һҳ</a>";
        }
        echo "&nbsp;";
        if ($prev_page<1){
            echo "��һҳ";
        }
        else{
            echo "<a href='$PHP_SELF?page=$prev_page' class='black9'>��һҳ</a>";
        }
        echo "&nbsp;";
        if ($next_page>$page_count){
            echo "��һҳ";
        }
        else{
            echo "<a href='$PHP_SELF?page=$next_page' class='black9'>��һҳ</a>";
        }
        echo "&nbsp;";
        if ($page>=$page_count){
            echo "���һҳ";
        }
        else{
            echo "<a href='$PHP_SELF?page=$page_count' class='black9'>���һҳ</a>";
        }    
?>
                  </div>
      <table width="90%" border="0" cellspacing="0" cellpadding="0" align="center" class="black9">
        <tr> 
          <td> 
            <form name="form1" method="post" action="<? echo $PHP_SELF;?>">
              <div align="center">���༶��Ա
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
                ������Ϣ <br>
                ���� <br>
                <textarea name="content" rows="4" cols="30"></textarea>
                <br>
                <input type="submit" name="submit" value="�ύ">
                <input type="reset" name="cancel" value="��д">
              </div>
            </form>
          </td>
          <td>
            <form name="form1" method="post" action="<? echo $PHP_SELF;?>">
			<div align="center">��������Ա 
              <select name="reciever_name"><?php
			   $result = mysql_query("SELECT user FROM bbs_online",$db);
               $row=mysql_num_rows($result);
			   for ($i=0;$i<=($row-1);$i++) {
			    $bbs_online_user=mysql_result($result,$i,'user');
				if ($bbs_online_user==$userregister) {continue;}//���������Ա�뱾���ظ�������
				$SQL_bbs_online="select name from bbs_class_member where user='$bbs_online_user'";
                $res_bbs_online=mysql_query($SQL_bbs_online,$db);
                $bbs_online_name=mysql_result($res_bbs_online,0,"name");
				echo "<option>".$bbs_online_name."</option> ";
			   }
			   ?>
              </select>
              ������Ϣ <br>
              ����<br>
              <textarea name="content" rows="5" cols="30"></textarea>
              <br>
              <input type="submit" name="submit" value="�ύ">
              <input type="reset" name="cancel" value="��д">
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
