<?php
 if ($submit){ 
 $content=nl2br($content);
 $content=$content."<BR>---------------------------------<BR>ɽ��ҽ�ƴ�ѧ�ٴ�94��1��ͬѧ¼ http://m9401.yeah.net<BR>����Ա��wa_gang@sina.com<BR>����һ��ϵͳ�Զ����ɵ��ż����벻Ҫ���š�";
 $headers .= "Content-Type: text/html; charset=gb2312\n";
 include "config.inc.php";
 $result = mysql_query("SELECT * FROM bbs_class_member",$db);
 $row=mysql_num_rows($result);
  for ($i=0;$i<=($row-1);$i++) {
   $name=mysql_result($result,$i,'name');
   $email=mysql_result($result,$i,'email');
   $message=$name.":<BR>&nbsp;&nbsp;���!���ͬѧ¼����֪ͨ��ȫ�����£�<BR><BR>&nbsp;&nbsp;".$content;
   mail($email,$subject,$message,$headers);
   echo "��ϲ�㣬���ɹ��ظ�",$name,"������һ���ʼ���<BR>";
  }
 }
?>
<html>
<head>
<title>��Ⱥ���ʼ�</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>

<body bgcolor="#FFFFFF" text="#000000">
<form name="form1" method="post" action="">
  <p align="center"><font color="#FF0000" size="5">��Ⱥ���ʼ�</font></p>
  <p align="center"> ����
    <input type="text" name="subject" size="50">
    <br>
    ����
    <textarea name="content" cols="50" rows="7"></textarea>
  </p>
  <p align="center"> 
    <input type="submit" name="submit" value="����">
    <input type="reset" name="cancle" value="��д">
  </p>
  </form>
</body>
</html>
