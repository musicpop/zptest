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
?>
<html>
<head>
<title>�ҷ��͵Ķ���Ϣ</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../css/index.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000">
<table border="0" cellspacing="0" cellpadding="0" align="center" height="182" class="black9">
  <tr> 
    <td height="410"> 
      <div align='center'> 
        <table width="78%" border="0" cellspacing="0" cellpadding="0" class="purple">
          <tr> 
            <td width="49%"> 
			<?
			 if (!$page){$page=1;}
	     $result_total = mysql_query("SELECT * FROM sms where send_user='$userregister'",$db);
		 $row=mysql_num_rows($result_total);//�鿴����ж�����
		 $page_count=ceil($row/$page_size);   //ҳ������
		 $offset=($page-1)*$page_size;                  //ÿһҳ����ʼ��
		 $result_sms = mysql_query("SELECT * FROM bbs_sms where send_user='$userregister' order by id desc limit $offset, $page_size",$db);
         $num_sms=mysql_num_rows($result_sms);//��ҳ������
			?>
              <div align="center"><a href="sms.php" class="purple">���յ��Ķ���Ϣ</a></div>
            </td>
            <td width="51%"> 
              <div align="center">�ҷ��͵Ķ���Ϣ ��<? echo $row;?>��</div>
            </td>
          </tr>
        </table>
        <? if ($message) {echo $message;}?>
      </div>
      <table width="586" border="1" cellspacing="0" cellpadding="0" align="center" bordercolorlight="#6699FF" bordercolordark="#FFFFFF" class="black9">
        <tr> 
          <td width="161"> 
            <div align="center">ʱ��</div>
          </td>
          <td width="70"> 
            <div align="center">������</div>
          </td>
          <td width="347"> 
            <div align="center">����</div>
          </td>
        </tr>
        <?php
		  if ($num_sms>0){
		  for ($i=0;$i<=($num_sms-1);$i++) {
	      $id=mysql_result($result_sms,$i,'id');
		  $reciever_user=mysql_result($result_sms,$i,'reciever_user');
		  $time=mysql_result($result_sms,$i,'time');
		  $content=mysql_result($result_sms,$i,'content');
		  	$res_name= mysql_query("select name from bbs_class_member where user='$reciever_user'",$db);
			$reciever_name=mysql_result($res_name,0,'name');
		  echo "<tr>";
		  echo "<td width='161'>".$time."</td>";
		  echo "<td width='70' align='center'><a href=user.php?user=".$send_user." class='black9' >".$reciever_name."</a></td>";
	      echo "<td width='347'>".$content."</td>";
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
            echo "<a href='$PHP_SELF?page=1'>��һҳ</a>";
        }
        echo "&nbsp;";
        if ($prev_page<1){
            echo "��һҳ";
        }
        else{
            echo "<a href='$PHP_SELF?page=$prev_page'>��һҳ</a>";
        }
        echo "&nbsp;";
        if ($next_page>$page_count){
            echo "��һҳ";
        }
        else{
            echo "<a href='$PHP_SELF?page=$next_page'>��һҳ</a>";
        }
        echo "&nbsp;";
        if ($page>=$page_count){
            echo "���һҳ";
        }
        else{
            echo "<a href='$PHP_SELF?page=$page_count'>���һҳ</a>";
        }    
?>
      </div>
      
    </td>
  </tr>
</table>
</body>
</html>
