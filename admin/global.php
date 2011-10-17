<?php
#------------公共函数库------------------
//获得当前时间
function get_now_time(){
return date("Y-m-d H:i:s");
}
//********************会员函数库*******************begin
//通过用户名查找会员姓名
function User_to_name($user){
global $db;
$Sql="select name from bbs_class_member where user='$user'";
$result=mysql_query($Sql,$db);
$name=mysql_result($result,0,"name");
return $name;
}
//通过会员姓名查找用户名
function Name_to_user($name){
global $db;
$Sql="select user from bbs_class_member where name='$name'";
$result=mysql_query($Sql,$db);
return mysql_result($result,0,"user");
}
//通过用户名查找头像
function User_to_face($user){
global $db;
$Sql="select face from bbs_class_member where user='$user'";
$result=mysql_query($Sql,$db);
$face=mysql_result($result,0,"face");
return $face;
}
//查询个人签名
function read_signature($user){
global $db;
$Sql="select signature from bbs_class_member where user='$user'";
$result=mysql_query($Sql,$db);
return mysql_result($result,0,"signature");
}
//********************会员函数库*******************end
//********************在线人员函数库***************begin
//增加用户
function AddUser($user){ 
global $db;
$ip=$REMOTE_ADDR;
$current_time=time();
$SQL="select user from bbs_online where user='$user'"; 
$res=mysql_query($SQL,$db); 
$row=mysql_num_rows($res); 
if($row==0) {
$SQL="insert into bbs_online (user,ip,lasttime) values('$user','$ip','$current_time')"; 
mysql_query($SQL,$db);
 }
}
//更新在线用户名单 
function UpdateMember(){ 
global $db;
$current_time=time();
$SQL="delete from bbs_online where lasttime<($current_time-60)"; //1分钟不发言则退出 
mysql_query($SQL,$db);
}
//更新在线状态 
function Updatebbs_online($user){ 
global $db;
$current_time=time();
$SQL="update bbs_online set lasttime='$current_time' where user='$user'"; 
$res=mysql_query($SQL,$db); 
$now_time=date("Y-m-d H:i:s");
$SQL="update bbs_class_member set last_time='$now_time' where user='$user'"; 
$res=mysql_query($SQL,$db); 
} 
//删除用户
function OutOneUser($user){ 
global $db;
$SQL="delete from bbs_online where user='$user'"; 
mysql_query($SQL,$db); 
return true;
} 
//检查是否在线 
function CheckUser($user){ 
global $db;
$SQL="select user from bbs_online where user='$user'"; 
$res=mysql_query($SQL,$db); 
$row=mysql_num_rows($res); 
if($row>0) return true; 
else return false; 
} 
//取在线名单 
function Readbbs_onlineName(){ 
global $db; 
$SQL="select * from bbs_online";
$res=mysql_query($SQL,$db);
while($row=mysql_fetch_array($res)){ 
$result[]=$row[user]; 
} 
return $result; 
} 
//********************在线人员函数库***************end
//********************等级函数库*******************bigin
//读取用户等级
function readrank($user){
global $db;
$SQL="select experience from bbs_class_member where user='$user'";
$res=mysql_query($SQL,$db);
$experience=mysql_result($res,0,'experience');
if ($experience>100000) {$rank='武林盟主';} 
 elseif ($experience>50000){$rank='掌门';}
 elseif ($experience>20000){$rank='光明护法';}
 elseif ($experience>5000){$rank='风云使者';}
 elseif ($experience>3000){$rank='舵主';}
 elseif ($experience>1000){$rank='堂主';}
 elseif ($experience>500){$rank='寨主';}
 elseif ($experience>200){$rank='教头';}
 elseif ($experience>50){$rank='武师';}
 else {$rank='入门弟子';}
mysql_query("UPDATE bbs_class_member SET rank='$rank' where user='$user'",$db);
return $rank;
}
//读取等级星级
function rank_pic($rank){
	switch ($rank) {
	case '入门弟子':
		return '*';
	break;
	case '武师':
		return '**';
	break;
	case '教头':
		return '***';
	break;
	case '寨主':
		return '****';
	break;
	case '堂主':
		return '*****';
	break;
	case '舵主':
		return '******';
	break;
	case '风云使者':
		return '*******';
	break;
	case '光明护法':
		return '********';
	break;
	case '掌门':
		return '*********';
	break;
	case '武林盟主':
		return '**********';
	break;
    default:
	    return '未知类型';
     break;
	}
}
//********************等级函数库****************************end
//***************在线状态函数库*************
//读取当前状态
function read_status($user){
global $db;
$SQL="select status from bbs_online where user='$user'";
$res_status=mysql_query($SQL,$db);
$row=mysql_num_rows($res_status);
if ($row==0){
 $status_name="离线"; 
 return $status_name;
 } else {
$status_num=mysql_result($res_status,0,"status");
switch ($status_num) {
 case 1:
	 $status_name="环顾四方";
     break;
 case 2:
	 $status_name="查看短消息";
     break;
 case 3:
	 $status_name="论坛发贴";
     break;
 case 4:
	 $status_name="看照片";
     break;
 case 5:
	 $status_name="聊天";
     break;
 case 6:
	 $status_name="查看信息";
     break;
default:
	 $status_name="离线";
     break;
  }
return $status_name;
}
}
//改变当前状态
function alter_status($user,$status_num){
global $db;
$SQL="update bbs_online set status=$status_num where user='$user'";
mysql_query($SQL,$db);
}
//***************在线状态函数库*************end
//********************增加经验值****************************
function add_experience($user,$value){
global $db;
mysql_query("update bbs_class_member set experience=(experience+$value) where user='$user' ",$db);
}
//********************增加经验值**************************end
//********************论坛函数库************************
//查找论坛名称 
function read_forumname($forumid) {
global $db;
$result=mysql_query("select forum_name from bbs_class_forum where forumid='$forumid'",$db);
$forum_name=mysql_result($result,0,"forum_name");
return $forum_name;
}
//查找斑竹 
function read_master($forumid) {
global $db;
$result=mysql_query("select master from bbs_class_forum where forumid='$forumid'",$db);
$master=mysql_result($result,0,"master");
return $master;
}
//查询某会员是否为某板块版主
function is_master($check_user,$forumid){
global $db;
$result=mysql_query("select master from bbs_class_forum where forumid='$forumid'",$db);
$master=mysql_result($result,0,"master");
$array_master=explode(" ",$master); //如果有多个版主，以空格为标记分开产生一个版主用户名阵列
while (list($id,$member)=each($array_master)){
 if ($check_user==$member){
   return true;
  break;
  } 
 }
}
//送鲜花
function send_flower($threadid){
global $db;
mysql_query("update bbs_forum_thread set flower=flower+1 where threadid='$threadid'",$db);
$result=mysql_query("select poster_user from bbs_forum_thread where threadid='$threadid'",$db);
$poster_user=mysql_result($result,0,"poster_user");
mysql_query("update bbs_class_member set experience=experience+5",$db);//帖子收到一支鲜花，积分增加5分
return true;
}
//扔臭鸡蛋
function send_egg($threadid){
global $db;
mysql_query("update bbs_forum_thread set egg=egg+1 where threadid='$threadid'",$db);
return true;
}
//选为精品
function as_highlight($subjectid){
global $db;
mysql_query("update bbs_forum_subject set high_light=1 where subjectid='$subjectid'",$db);
$res_poster_user=mysql_query("select poster_user from bbs_forum_subject where subjectid='$subjectid'",$db);
$poster_user=mysql_result($res_poster_user,0,"poster_user");
add_experience($poster_user,200);//增加经验值200
}
//删除主题
function del_subject($subjectid){
global $db;
mysql_query("delete from bbs_forum_subject where subjectid='$subjectid'",$db);
mysql_query("delete from bbs_forum_thread where subjectid='$subjectid'",$db);
}
//删除帖子
function del_thread($threadid){
global $db;
mysql_query("delete from bbs_forum_thread where threadid='$threadid'",$db);
}
//增加人气
function add_subject_hit($subjectid) {
global $db;
mysql_query("update bbs_forum_subject set hit=hit+1 where subjectid='$subjectid'",$db);
return true;
}
//增加回应
function add_reply($subjectid){
global $db;
mysql_query("update bbs_forum_subject set reply=reply+1 where subjectid='$subjectid'");
return true;
}
//********************论坛函数库************************end
//********************访客函数库************************begin
//添加访客记录
function add_visit($user){
global $db;
$visit_time=get_now_time();
$visit_id=time();
$visit_ip=$REMOTE_ADDR;
$res_name=mysql_query("select name from bbs_class_member where user='$user'",$db);
$visit_name=mysql_result($res_name,0,"name");
mysql_query("insert into visit (visit_id,visit_user,visit_name,visit_ip,visit_time) values ('$visit_id','$user','$visit_name','$visit_ip','$visit_time')",$db);
}
//检查记录数是否超过200
function check_visit_num(){
global $db;
$res_num=mysql_query("select visit_id from bbs_visit",$db);
$visit_num=mysql_num_rows($res_num);
 while ($visit_num>200){
  $res_last=mysql_query("select visit_id from bbs_visit",$db);
  $last_id=mysql_result($res_last,0,"visit_id");
  mysql_query("delete from bbs_visit where visit_id='$last_id'",$db);
  $res_num=mysql_query("select visit_id from bbs_visit",$db);
  $visit_num=mysql_num_rows($res_num);
  }
mysql_query("optimize table visit",$db);//优化数据表
}
//********************访客函数库************************end
//********************聊天室函数库************************
//添加聊天内容
function add_chat ($send_name,$receive_name,$input,$color,$face,$secret){ //发出者姓名，接收者姓名，输入内容，文字颜色，表情，密谈代码
 global $db;
 $chat_id=time();
 $chat_time=get_now_time();
 if ($secret==1){
 $chat_content="<font color=$color>【悄悄话】".$send_name."对".$receive_name.$face.":".$input."</font>";
 $sql="insert into bbs_chatinfo (chat_id,secret,secret_send,secret_receive,chat_content,chat_time) values($chat_id,1,'$send_name','$receive_name','$chat_content','$chat_time')";
 }else{
 $chat_content="<font color=$color>".$send_name."对".$receive_name.$face.":".$input."</font>";
 $sql="insert into bbs_chatinfo (chat_id,secret,secret_send,secret_receive,chat_content,chat_time) values($chat_id,0,'','','$chat_content','$chat_time')";
  }
 mysql_query($sql,$db);
}
//添加系统公告
function add_system_message ($send_name,$message_kind){
global $db;
$chat_id=time();
$chat_time=get_now_time();
switch ($message_kind) {
	case "进入":
	  $chat_content="【系统公告】 ".$send_name."进入聊天室了，大家欢迎！";
	break;
	case "离开":
      $chat_content="【系统公告】 ".$send_name."离开了聊天室.";
	break;
}
$sql="insert into bbs_chatinfo (chat_id,chat_content,chat_time) values($chat_id,'$chat_content','$chat_time')";
 mysql_query($sql,$db);
}
//添加动作内容
function add_emote ($emote_content){
global $db;
$chat_id=time();
$chat_time=get_now_time();
$chat_content="【动作】 ".$emote_content;
$sql="insert into bbs_chatinfo (chat_id,chat_content,chat_time) values($chat_id,'$chat_content','$chat_time')";
   mysql_query($sql,$db);
}
//发出动作
function emote ($send_name,$receive_name,$emote_id){
 global $db;
 $result=mysql_query("select emote_content from bbs_emote where emote_id='$emote_id'",$db);
 $emote_content=mysql_result($result,0,"emote_content");
 $emote_content=str_replace("%%%%",$send_name,$emote_content);//将%%%%替换为发出者用户名
 $emote_content=str_replace("****",$receive_name,$emote_content);//将****替换为接收者用户名
 return $emote_content;
}
//检查记录数是否超过200
function check_chat_num(){
global $db;
$res_num=mysql_query("select chat_id from bbs_chatinfo",$db);
$chat_num=mysql_num_rows($res_num);
 while ($chat_num>200){
  $res_last=mysql_query("select chat_id from bbs_chatinfo",$db);
  $last_id=mysql_result($res_last,0,"chat_id");
  mysql_query("delete from bbs_chatinfo where chat_id='$last_id'",$db);
  $res_num=mysql_query("select chat_id from bbs_chatinfo",$db);
  $chat_num=mysql_num_rows($res_num);
  }
mysql_query("optimize table bbs_chatinfo",$db);//优化数据表
}
//********************聊天室函数库************************end
?>