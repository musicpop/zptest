<?
session_start(); // ��ʼsession
if(!session_is_registered("userregister")||($userregister==""))
{
header("Location: ../index.php");
exit;
}?>
<script language="JavaScript">
<!--
function Juge(theForm)
{

	if (theForm.psw.value == "")
	{
		alert("���������룡");
		theForm.psw.focus();
		return (false);
	}
	if (theForm.ad.value == "")
	{
		alert("������ͨѶ��ַ��");
		theForm.ad.focus();
		return (false);
	}
	if (theForm.ph.value == "")
	{
		alert("������绰��");
		theForm.ph.focus();
		return (false);
	}
    if (theForm.email.value == "")
	{
		alert("������email��");
		theForm.email.focus();
		return (false);
	}
}

-->
</script>
<?
include "../admin/config.inc.php";
include "../admin/global.php";
alter_status($userregister,6);
if ($submit){
 $psw=trim($psw);
 $birth=trim($birth);
 $work=trim($work);
 $ad=trim($ad);
 $post=trim($post);
 $ph=trim($ph);
 $bp=trim($bp);
 $email=trim($email);
 $oicq=trim($oicq);
 $account=nl2br(strip_tags(trim($account)));//ȥ����β�ո�html���
 $signature=nl2br(strip_tags(trim($signature)));
//���email�ĺϷ���
if(!ereg('^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+'.'@'.'[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\.'.'[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$',$email)&&$email){
	   echo "email���Ϸ�!<BR>"."<a href='javascript:history.back()'>����</a><BR>";
	   exit;}
//д�����ݿ�
 $sql="UPDATE bbs_class_member SET psw='$psw',sex='$sex',birth='$birth',work='$work',ad='$ad',post='$post',ph='$ph',bp='$bp',email='$email',oicq='$oicq',account='$account',signature='$signature',face='$face' where user='$userregister'";
 $result = mysql_query($sql,$db);
 mysql_close($db);
echo "<div align='center'>�޸ĳɹ���<a href='user.php?user=$userregister'>�鿴��������</a></div>";
exit;
}
?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<TITLE>���������޸�</TITLE>
<link rel="stylesheet" href="../css/index.css" type="text/css">
</HEAD>
<BODY BGCOLOR="#FFFFFF">
<?php
$result = mysql_query("SELECT * FROM bbs_class_member where user='$userregister'",$db);
   $name=mysql_result($result,0,'name');
   $psw=mysql_result($result,0,'psw');
   $sex=mysql_result($result,0,'sex');
   $birth=mysql_result($result,0,'birth');
   $ph=mysql_result($result,0,'ph');
   $bp=mysql_result($result,0,'bp');
   $email=mysql_result($result,0,'email');
   $oicq=mysql_result($result,0,'oicq');
   $work=mysql_result($result,0,'work');
   $ad=mysql_result($result,0,'ad');
   $post=mysql_result($result,0,'post');
   $account=mysql_result($result,0,'account');
   $signature=mysql_result($result,0,'signature');
   $face=mysql_result($result,0,'face');
  ?>
<BR>
<table width='92%' border='0' cellspacing='0' cellpadding='0' align='center' height="646" class="purple">
  <tr> 
    <td height="36" colspan="3"> 
      <div align="center" class="redlarge">���������޸�</div>
    </td>
  </tr>
  <tr> 
    <td width="34%">&nbsp;</td>
    <td width="44%">ע�ⲻҪ�пո�,<br>
      ��*����ĿΪ���</td>
    <td width="22%">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="3"> 
      <form method='post' action="<? echo $PHP_SELF;?>" onsubmit="javascript:return Juge(this);">
        <div align="center">�û�����<? echo $userregister;?>&nbsp;<font color="#FF0000">(���ɸ��ģ�)</font><br>
          ������<? echo $name;?>&nbsp;<font color="#FF0000">(���ɸ��ģ�)</font><br>
          ���룺 
          <input type='password' name='psw' size='8' maxlength='8' value="<? echo $psw; ?>">
          *(Ӣ����ĸ������֣����Ȳ�����8���ַ�)<br>
          <br>
          �Ա��� 
          <input type='radio' name='sex' value='��' <? if ($sex=='��'){echo "checked";} ?>>
          Ů 
          <input type='radio' name='sex' value='Ů' <? if ($sex=='Ů'){echo "checked";} ?>>
          <br>
          ���գ� 
          <input type="text" name="birth" size="12" maxlength="12" value="<? echo $birth; ?>">
          <br>
          ������λ�� 
          <input type='Text' name='work' size='30' maxlength='50' value="<? echo $work; ?>">
          <br>
          ͨѶ��ַ�� 
          <input type='Text' name='ad' size='30' maxlength='50' value="<? echo $ad; ?>">
          *<br>
          �ʱࣺ 
          <input type='Text' name='post' size='6' maxlength='6' value="<? echo $post; ?>">
          <br>
          �绰�� 
          <input type='Text' name='ph' size='15' maxlength='30' value="<? echo $ph; ?>">
          *<br>
          
          Email�� 
          <input type='Text' name='email' size='15' maxlength='35' value="<? echo $email; ?>">
          *<br>
          QQ�� 
          <input type='Text' name='oicq' size='12' maxlength='12' value="<? echo $oicq; ?>">
          <br>
          ְҵ��(������125������)<BR>
          <textarea name='account' cols='50' rows='5'><? echo $account; ?></textarea>
          <br>
          ����ǩ����������̳���Զ�ǩ����������125�����֣�<br>
          <textarea name="signature" cols="50" rows="5"><? echo $signature; ?></textarea>
          <br>
          ѡ��һ���Լ�ϲ����ͷ��:<br>
          <BR>
          <?php
			   if (!$iconpage){$iconpage=1;}
			   $min=10*($iconpage-1)+1;
			   $max=10*$iconpage;
			    for ($i=$min;$i<=$max;$i++){
                  echo "<img src='../image/face/icon$i.gif' width='32' height='32'> <input type='radio' name='face' value='$i'>";
				  if (($i%3)==0) {echo "<BR>";}
				 }
			   echo "<BR>��";
			   for ($n=1;$n<=10;$n++){
		  echo "<a href=$PHP_SELF?iconpage=$n>$n</a>&nbsp;";
		  }
		  echo "ҳ";
			  ?>
          <br>
          ��ǰѡ�� 
          <? echo "<img src='../image/face/icon$face.gif' width='32' height='32'> <input type='radio' name='face' value='$face' checked>";?>
          <br>
          <input type='Submit' name='submit' value='�ύ'>
          <input type='reset' name='Reset' value='��д '>
        </div>
      </form>
    </td>
  </tr>
   <tr> 
    <td height="36" colspan="3"> 
      <div align="center" class="black9">
	  <a href="../photo/member_photo.php?user=<? echo $userregister;?>" class='black9'>������Ƭ</a>&nbsp;
	  <a href='../photo/up_photo.php' class='black9'>�ϴ���Ƭ</a></div>
    </td>
  </tr>
</table>
</BODY>
</HTML>
