<?php
include "../admin/config.inc.php";
if ($Submit){
 $answers1=trim(iconv('gbk', 'utf-8',$answers1));
 $answers2=trim(iconv('gbk', 'utf-8',$answers2));
 if (!($answers1==$answer1)||!($answers2==$answer2)){
 echo "回答错误！<a href='javascript:history.back()'>返回</a>";
 exit;
 }
  header("Location: register_step2.php?answer=right");
exit;
}
?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<TITLE>杏林同学录-注册第一步</TITLE>
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
      <div align="center">注册第一步-身份验证</div>
    </td>
  </tr>
  <tr>
    <td height="153">
      <p align="center">请回答以下问题</p>
      <form name="form1" method="post" action="<? echo $PHP_SELF;?>">
        <div align="center">1.<? echo  iconv('utf-8', 'gbk',$question1)?><br>
          您的回答 
          <input type="text" name="answers1">
          <br>
          2.<? echo iconv('utf-8', 'gbk',$question2)?><br>
          您的回答 
          <input type="text" name="answers2">
          <br>
          <input type="submit" name="Submit" value="确认">
          <input type="reset" name="cancel" value="重写">
        </div>
      </form>
      <p align="center"><br>
        <br>
        实在想不起来了，问问管理员吧。<br>
      </p>
    </td>
  </tr>
</table>
</BODY>
</HTML>
<?php die();?>