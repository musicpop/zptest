<?
session_start(); // ��ʼsession
session_register("userregister");
include "admin/config.inc.php";
include "admin/global.php";
 
$result = mysql_query("SELECT psw FROM bbs_class_member where user='$user'",$db);
if (mysql_num_rows($result)==0){  //�������е���ĿΪ0��˵���޴�����
echo "�޴��û���";
exit;}
$userpsw=strtoupper(trim($psw));
$password=trim(mysql_result($result,0,'psw'));
$password=strtoupper($password);//ȡ������,ת���ɴ�д
$userpsw=strtoupper($userpsw);
if (!($userpsw==$password)){
echo "�������";
mysql_close($db);
exit;
}
$userregister=$user;
UpdateMember();      //���������û�����
AddUser($user);      //���������û�
add_experience($user,10);//���Ӿ���ֵ
add_visit($user);    //��ӷÿͼ�¼
?>
<html>
<head>
<title>��ӭ��������ͬѧ¼</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<frameset cols="153,*" border="0" framespacing="0" rows="*" frameborder="NO"> 
  <frameset rows="85,*" frameborder="NO" border="0" framespacing="0" cols="*"> 
    <frame name="top" scrolling="NO" noresize src="top.php?session_id=<? echo session_id();?>" >
    <frame name="left" src="left.php?session_id=<? echo session_id();?>" scrolling='yes'>
  </frameset>
  <frame name="right" src="main.php">
</frameset>
<noframes> 
<body bgcolor="#FFFFFF" text="#000000">
<div align='center'>�����������֧�ֿ��</div>
</body>
</noframes> 
</html>
