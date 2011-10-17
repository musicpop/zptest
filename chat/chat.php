<?
session_start(); // 开始session
if(!session_is_registered("userregister")||($userregister==""))
{
header("Location: ../index.php");
exit;
}
 include "../admin/config.inc.php";
 include "../admin/global.php";
 alter_status($userregister,5);
?>
<html>
<head>
<title>chat</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<META http-equiv="refresh" content=6;url=chat.php?session_id=<? echo $session_id;?>>
<link rel="stylesheet" href="../css/index.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000">
<?
$user=$userregister;
$send_name=User_to_name($user);
if ($submit){
 if ($emote_id=="0"){
  add_chat($send_name,$receive_name,$message,$color,$face,$secret);
 } else{
  $emote_content=emote($send_name,$receive_name,$emote_id);
  add_emote($emote_content);
 }
}
$name=User_to_name($user);
$res_chat=mysql_query("select * from bbs_chatinfo order by chat_time desc limit 0,20",$db);
$row=mysql_num_rows($res_chat);
for ($i=0;$i<$row;$i++){
 $chat_content=mysql_result($res_chat,$i,"chat_content");
 $chat_time=mysql_result($res_chat,$i,"chat_time");
 $secret=mysql_result($res_chat,$i,"secret");
 $secret_send=mysql_result($res_chat,$i,"secret_send");
 $secret_receive=mysql_result($res_chat,$i,"secret_receive");
 if ($secret==1){
   if ($secret_send==$name||$secret_receive==$name){
   echo $chat_content."(".$chat_time.")<br>";
   }
  }else{
  echo $chat_content."(".$chat_time.")<br>";
 }
}
?>
</body>
</html>
