<?
session_start(); // ��ʼsession
if(!session_is_registered("userregister")||($userregister==""))
{
header("Location: ../index.php");
exit;
}
include "../admin/config.inc.php";
include "../admin/global.php";
alter_status($userregister,4);
//-----------------ɾ����Ƭ---------------
if ($action='del'){
 mysql_query("delete FROM bbs_photo where pic_id='$pic_id'",$db);
}
//-----------------ɾ����Ƭ---------------end
?>
<html>
<head>
<title>����Ƭ</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../css/index.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000">
<table width="99%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
    <td height="38" colspan="4"> 
      <div align="center" class="redlarge">�鿴��Ƭ</div>
    </td>
  </tr>
  <tr> 
    <td height="27" width="26%"> 
      <div align="center"><a href="<? echo $PHP_SELF;?>" class="purple">ȫ����Ƭ</a></div>
    </td>
    <td height="27" width="25%"> 
      <div align="center"><a href="<? echo $PHP_SELF;?>?kind=������Ƭ" class="purple">������Ƭ</a></div>
    </td>
    <td height="27" width="25%"> 
      <div align="center"><a href="<? echo $PHP_SELF;?>?kind=�༶��Ƭ" class="purple">�༶��Ƭ</a></div>
    </td>
    <td height="27" width="24%"> 
      <div align="center"><a href="<? echo $PHP_SELF;?>?kind=У԰���" class="purple">У԰���</a></div>
    </td>
  </tr>
  <tr> 
    <td height="360" colspan="4"> 
	<?
		 if (!$page){$page=1;}
		 if (!$kind){
		  $res_photo=mysql_query("SELECT pic_id FROM bbs_photo",$db);
		  }else{
		 $res_photo=mysql_query("SELECT pic_id FROM bbs_photo where pic_kind='$kind'",$db);
		 }
		 $row=mysql_num_rows($res_photo);
		 $page_count=ceil($row/$page_size);
		 $offset=($page-1)*$page_size; 
		 if (!$kind){
		 $result_photo = mysql_query("SELECT * FROM bbs_photo order by pic_id desc limit $offset, $page_size",$db);
		  }else{
		 $result_photo = mysql_query("SELECT * FROM bbs_photo where pic_kind='$kind' order by pic_id desc limit $offset, $page_size",$db);
		  }
		 $num_photo=mysql_num_rows($result_photo);		 
		 ?>
      <div align='center' class='deepblue10'>  <? echo $kind."����:".$row."��";?></div>
      <table width="99%" border="1" cellspacing="0" cellpadding="0" align="center" class="black9" bordercolorlight="#6699FF" bordercolordark="#FFFFFF">
        <tr> 
          <td width="10%"> 
            <div align="center">�ϴ���</div>
          </td>
          <td width="10%"> 
            <div align="center">��Ƭ���</div>
          </td>
          <td width="12%"> 
            <div align="center">��С(byte)</div>
          </td>
          <td width="19%"> 
            <div align="center">�ϴ�ʱ��</div>
          </td>
          <td width="33%"> 
            <div align="center">��Ƭ����</div>
          </td>
          <td width="6%"> 
            <div align="center">����</div>
          </td>
          <td width="10%"> 
            <div align="center">����Ƭ</div>
          </td>
		  <?
		   if ($userregister==$webmaster) //����������ʺŵ�¼����ɾ��Ȩ��
		   {
            echo "<td align='center'>ɾ��</td>";
		  }
		  ?>
        </tr>
        <?
		  if ($num_photo>0){
		  for ($i=0;$i<=($num_photo-1);$i++) {
	      $pic_id=mysql_result($result_photo,$i,'pic_id');
		  $pic_kind=mysql_result($result_photo,$i,'pic_kind');
		  $up_user=mysql_result($result_photo,$i,'up_user');
		  $up_name=mysql_result($result_photo,$i,'up_name');
		  $pic_name=mysql_result($result_photo,$i,'pic_name');
		  $pic_size=mysql_result($result_photo,$i,'pic_size');
		  $pic_discribe=mysql_result($result_photo,$i,'pic_discribe');
		  $pic_time=mysql_result($result_photo,$i,'pic_time');
		  $hit=mysql_result($result_photo,$i,'hit');
		  $pic_discribe=substr($pic_discribe,0,20)."...";//��ȡ20���ַ�����Ƭ����
		  ?>
        <tr> 
          <td align='center' width="10%"> 
            <? echo $up_name;?>
          </td>
          <td align='center' width="10%"> 
            <? echo $pic_kind;?>
          </td>
          <td align='center' width="12%"> 
            <? echo $pic_size;?>
          </td>
          <td align='center' width="19%"> 
            <? echo $pic_time;?>
          </td>
          <td align='center' width="33%"> 
            <? echo $pic_discribe;?>
          </td>
		  <td align='center' width="6%"> 
            <? echo $hit;?>
          </td>
          <td align="center" width="10%"> <a href="photo_detail.php?pic_id=<? echo $pic_id;?>"><img src="../image/view.gif" width="15" height="15" border='0'></a> 
          </td>
		  <?
		   if ($userregister==$webmaster) //����������ʺŵ�¼����ɾ��Ȩ��
		   {
		   echo  "<td align='center'>"; 
           echo  "<a href='$PHP_SELF?action=del&pic_id=$pic_id' class='black9'>ɾ��</a>";
           echo "</td>";
		   }
		  ?>
        </tr>
      <? }
		  }
		  ?>
      </table>
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
    </td>
  </tr>
</table>
</body>
</html>
