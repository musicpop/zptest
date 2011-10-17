<?php
 if ($submit){ 
 $content=nl2br($content);
 $content=$content."<BR>---------------------------------<BR>山东医科大学临床94级1班同学录 http://m9401.yeah.net<BR>管理员：wa_gang@sina.com<BR>这是一封系统自动生成的信件，请不要回信。";
 $headers .= "Content-Type: text/html; charset=gb2312\n";
 include "config.inc.php";
 $result = mysql_query("SELECT * FROM bbs_class_member",$db);
 $row=mysql_num_rows($result);
  for ($i=0;$i<=($row-1);$i++) {
   $name=mysql_result($result,$i,'name');
   $email=mysql_result($result,$i,'email');
   $message=$name.":<BR>&nbsp;&nbsp;你好!贵班同学录有新通知，全文如下：<BR><BR>&nbsp;&nbsp;".$content;
   mail($email,$subject,$message,$headers);
   echo "恭喜你，您成功地给",$name,"发送了一封邮件！<BR>";
  }
 }
?>
<html>
<head>
<title>发群体邮件</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>

<body bgcolor="#FFFFFF" text="#000000">
<form name="form1" method="post" action="">
  <p align="center"><font color="#FF0000" size="5">发群体邮件</font></p>
  <p align="center"> 主题
    <input type="text" name="subject" size="50">
    <br>
    正文
    <textarea name="content" cols="50" rows="7"></textarea>
  </p>
  <p align="center"> 
    <input type="submit" name="submit" value="发送">
    <input type="reset" name="cancle" value="重写">
  </p>
  </form>
</body>
</html>
