<?php
include "../admin/config.inc.php";
if ($Submit){
 $answers1=trim(iconv('gbk', 'utf-8',$answers1));
 $answers2=trim(iconv('gbk', 'utf-8',$answers2));
 if (!($answers1==$answer1)||!($answers2==$answer2)){
 echo "�ش����<a href='javascript:history.back()'>����</a>";
 exit;
 }
  header("Location: register_step2.php?answer=right");
exit;
}
?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<TITLE>����ͬѧ¼-ע���һ��</TITLE>
<link rel="stylesheet" href="../css/index.css" type="text/css">
</HEAD>
<BODY BGCOLOR="#FFFFFF">
<table width="73%" border="0" cellspacing="0" cellpadding="0" align="center" height="190" class="brown9">
  <tr> 
    <td height="76">
      <div align="center"><img src="../image/classlogo.gif" width="224" height="60"></div>
    </td>
  </tr>
  <tr>
    <td height="32"> 
      <div align="center">ע���һ��-�����֤</div>
    </td>
  </tr>
  <tr>
    <td height="153">
      <p align="center">��ش���������</p>
      <form name="form1" method="post" action="<? echo $PHP_SELF;?>">
        <div align="center">1.<? echo  iconv('utf-8', 'gbk',$question1)?><br>
          ���Ļش� 
          <input type="text" name="answers1">
          <br>
          2.<? echo iconv('utf-8', 'gbk',$question2)?><br>
          ���Ļش� 
          <input type="text" name="answers2">
          <br>
          <input type="submit" name="Submit" value="ȷ��">
          <input type="reset" name="cancel" value="��д">
        </div>
      </form>
      <p align="center"><br>
        <br>
        ʵ���벻�����ˣ����ʹ���Ա�ɡ�<br>
      </p>
    </td>
  </tr>
</table>
</BODY>
</HTML>
<?php die();?>