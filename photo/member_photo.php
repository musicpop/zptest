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
 mysql_query("delete FROM photo where pic_id='$pic_id'",$db);
}
//-----------------ɾ����Ƭ---------------end
?>
<html>
<head>
<title>������Ƭ</title>
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

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0">
<br>
<br>
<br>
<table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td> 
      <div align="center" class="redlarge">������Ƭ</div>
    </td>
  </tr>
  <tr> 
    <td> 
      <? 
	     $res_name=mysql_query("SELECT name FROM bbs_class_member where user='$user' ",$db);
		 $name=mysql_result($res_name,0,"name");
		 $result_photo=mysql_query("SELECT * FROM bbs_photo where up_user='$user' and pic_kind='������Ƭ' order by pic_id desc",$db);
		 $row=mysql_num_rows($result_photo);
		 ?>
      <div align='center' class='deepblue10'> 
        <? echo $name."����Ƭ ��:".$row."��";?>
      </div>
      <table width="99%" border="1" cellspacing="0" cellpadding="0" align="center" class="black9" bordercolorlight="#6699FF" bordercolordark="#FFFFFF">
        <tr> 
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
		   if (($user==$userregister)||($userregister==$webmaster)) //���Ϊ���˲鿴���������ʺŵ�¼����ɾ��Ȩ��
		   {
            echo "<td align='center'>ɾ��</td>";
		  }
		  ?>
        </tr>
        <?
		  if ($row>0){
		  for ($i=0;$i<$row;$i++) {
	      $pic_id=mysql_result($result_photo,$i,'pic_id');
		  $pic_name=mysql_result($result_photo,$i,'pic_name');
		  $pic_size=mysql_result($result_photo,$i,'pic_size');
		  $pic_discribe=mysql_result($result_photo,$i,'pic_discribe');
		  $pic_time=mysql_result($result_photo,$i,'pic_time');
		  $hit=mysql_result($result_photo,$i,'hit');
		  $pic_discribe=substr($pic_discribe,0,20)."...";//��ȡ20���ַ�����Ƭ����
		  ?>
        <tr> 
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
		  if (($user==$userregister)||($userregister==$webmaster)) //���Ϊ���˲鿴���������ʺŵ�¼����ɾ��Ȩ��
		   {
		   echo  "<td align='center'>"; 
           echo  "<a href='$PHP_SELF?action=del&pic_id=$pic_id&user=$user' class='black9'>ɾ��</a>";
           echo "</td>";
		   }
		  ?>
        </tr>
        <? }
		  }
		  ?>
      </table>
     </td>
  </tr>
  <tr> 
    <td> 
      <form name="form1">
        <div align="center">
          <p class="black9">���༶��Ա 
            <select name="menu1" onChange="MM_jumpMenu('self',this,0)">
              <option value='$PHP_SELF?user=$user' selected>��ѡ��</option>
              <?php
			   $result = mysql_query("SELECT * FROM bbs_class_member",$db);
               if ($result){
			   $row=mysql_num_rows($result);
			   for ($i=0;$i<=($row-1);$i++) {
			    $name=mysql_result($result,$i,'name');
				$user=mysql_result($result,$i,'user');
				echo "<option value='$PHP_SELF?user=$user'>$name</option>";
			    }
			   } 
			   ?>
            </select>
            ����Ƭ </p>
        </div>
      </form>
    </td>
  </tr>
</table>
</body>
</html>
