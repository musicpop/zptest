<?php
#------------����������------------------
//��õ�ǰʱ��
function get_now_time(){
return date("Y-m-d H:i:s");
}
//********************��Ա������*******************begin
//ͨ���û������һ�Ա����
function User_to_name($user){
global $db;
$Sql="select name from bbs_class_member where user='$user'";
$result=mysql_query($Sql,$db);
$name=mysql_result($result,0,"name");
return $name;
}
//ͨ����Ա���������û���
function Name_to_user($name){
global $db;
$Sql="select user from bbs_class_member where name='$name'";
$result=mysql_query($Sql,$db);
return mysql_result($result,0,"user");
}
//ͨ���û�������ͷ��
function User_to_face($user){
global $db;
$Sql="select face from bbs_class_member where user='$user'";
$result=mysql_query($Sql,$db);
$face=mysql_result($result,0,"face");
return $face;
}
//��ѯ����ǩ��
function read_signature($user){
global $db;
$Sql="select signature from bbs_class_member where user='$user'";
$result=mysql_query($Sql,$db);
return mysql_result($result,0,"signature");
}
//********************��Ա������*******************end
//********************������Ա������***************begin
//�����û�
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
//���������û����� 
function UpdateMember(){ 
global $db;
$current_time=time();
$SQL="delete from bbs_online where lasttime<($current_time-60)"; //1���Ӳ��������˳� 
mysql_query($SQL,$db);
}
//��������״̬ 
function Updatebbs_online($user){ 
global $db;
$current_time=time();
$SQL="update bbs_online set lasttime='$current_time' where user='$user'"; 
$res=mysql_query($SQL,$db); 
$now_time=date("Y-m-d H:i:s");
$SQL="update bbs_class_member set last_time='$now_time' where user='$user'"; 
$res=mysql_query($SQL,$db); 
} 
//ɾ���û�
function OutOneUser($user){ 
global $db;
$SQL="delete from bbs_online where user='$user'"; 
mysql_query($SQL,$db); 
return true;
} 
//����Ƿ����� 
function CheckUser($user){ 
global $db;
$SQL="select user from bbs_online where user='$user'"; 
$res=mysql_query($SQL,$db); 
$row=mysql_num_rows($res); 
if($row>0) return true; 
else return false; 
} 
//ȡ�������� 
function Readbbs_onlineName(){ 
global $db; 
$SQL="select * from bbs_online";
$res=mysql_query($SQL,$db);
while($row=mysql_fetch_array($res)){ 
$result[]=$row[user]; 
} 
return $result; 
} 
//********************������Ա������***************end
//********************�ȼ�������*******************bigin
//��ȡ�û��ȼ�
function readrank($user){
global $db;
$SQL="select experience from bbs_class_member where user='$user'";
$res=mysql_query($SQL,$db);
$experience=mysql_result($res,0,'experience');
if ($experience>100000) {$rank='��������';} 
 elseif ($experience>50000){$rank='����';}
 elseif ($experience>20000){$rank='��������';}
 elseif ($experience>5000){$rank='����ʹ��';}
 elseif ($experience>3000){$rank='����';}
 elseif ($experience>1000){$rank='����';}
 elseif ($experience>500){$rank='կ��';}
 elseif ($experience>200){$rank='��ͷ';}
 elseif ($experience>50){$rank='��ʦ';}
 else {$rank='���ŵ���';}
mysql_query("UPDATE bbs_class_member SET rank='$rank' where user='$user'",$db);
return $rank;
}
//��ȡ�ȼ��Ǽ�
function rank_pic($rank){
	switch ($rank) {
	case '���ŵ���':
		return '*';
	break;
	case '��ʦ':
		return '**';
	break;
	case '��ͷ':
		return '***';
	break;
	case 'կ��':
		return '****';
	break;
	case '����':
		return '*****';
	break;
	case '����':
		return '******';
	break;
	case '����ʹ��':
		return '*******';
	break;
	case '��������':
		return '********';
	break;
	case '����':
		return '*********';
	break;
	case '��������':
		return '**********';
	break;
    default:
	    return 'δ֪����';
     break;
	}
}
//********************�ȼ�������****************************end
//***************����״̬������*************
//��ȡ��ǰ״̬
function read_status($user){
global $db;
$SQL="select status from bbs_online where user='$user'";
$res_status=mysql_query($SQL,$db);
$row=mysql_num_rows($res_status);
if ($row==0){
 $status_name="����"; 
 return $status_name;
 } else {
$status_num=mysql_result($res_status,0,"status");
switch ($status_num) {
 case 1:
	 $status_name="�����ķ�";
     break;
 case 2:
	 $status_name="�鿴����Ϣ";
     break;
 case 3:
	 $status_name="��̳����";
     break;
 case 4:
	 $status_name="����Ƭ";
     break;
 case 5:
	 $status_name="����";
     break;
 case 6:
	 $status_name="�鿴��Ϣ";
     break;
default:
	 $status_name="����";
     break;
  }
return $status_name;
}
}
//�ı䵱ǰ״̬
function alter_status($user,$status_num){
global $db;
$SQL="update bbs_online set status=$status_num where user='$user'";
mysql_query($SQL,$db);
}
//***************����״̬������*************end
//********************���Ӿ���ֵ****************************
function add_experience($user,$value){
global $db;
mysql_query("update bbs_class_member set experience=(experience+$value) where user='$user' ",$db);
}
//********************���Ӿ���ֵ**************************end
//********************��̳������************************
//������̳���� 
function read_forumname($forumid) {
global $db;
$result=mysql_query("select forum_name from bbs_class_forum where forumid='$forumid'",$db);
$forum_name=mysql_result($result,0,"forum_name");
return $forum_name;
}
//���Ұ��� 
function read_master($forumid) {
global $db;
$result=mysql_query("select master from bbs_class_forum where forumid='$forumid'",$db);
$master=mysql_result($result,0,"master");
return $master;
}
//��ѯĳ��Ա�Ƿ�Ϊĳ������
function is_master($check_user,$forumid){
global $db;
$result=mysql_query("select master from bbs_class_forum where forumid='$forumid'",$db);
$master=mysql_result($result,0,"master");
$array_master=explode(" ",$master); //����ж���������Կո�Ϊ��Ƿֿ�����һ�������û�������
while (list($id,$member)=each($array_master)){
 if ($check_user==$member){
   return true;
  break;
  } 
 }
}
//���ʻ�
function send_flower($threadid){
global $db;
mysql_query("update bbs_forum_thread set flower=flower+1 where threadid='$threadid'",$db);
$result=mysql_query("select poster_user from bbs_forum_thread where threadid='$threadid'",$db);
$poster_user=mysql_result($result,0,"poster_user");
mysql_query("update bbs_class_member set experience=experience+5",$db);//�����յ�һ֧�ʻ�����������5��
return true;
}
//�ӳ�����
function send_egg($threadid){
global $db;
mysql_query("update bbs_forum_thread set egg=egg+1 where threadid='$threadid'",$db);
return true;
}
//ѡΪ��Ʒ
function as_highlight($subjectid){
global $db;
mysql_query("update bbs_forum_subject set high_light=1 where subjectid='$subjectid'",$db);
$res_poster_user=mysql_query("select poster_user from bbs_forum_subject where subjectid='$subjectid'",$db);
$poster_user=mysql_result($res_poster_user,0,"poster_user");
add_experience($poster_user,200);//���Ӿ���ֵ200
}
//ɾ������
function del_subject($subjectid){
global $db;
mysql_query("delete from bbs_forum_subject where subjectid='$subjectid'",$db);
mysql_query("delete from bbs_forum_thread where subjectid='$subjectid'",$db);
}
//ɾ������
function del_thread($threadid){
global $db;
mysql_query("delete from bbs_forum_thread where threadid='$threadid'",$db);
}
//��������
function add_subject_hit($subjectid) {
global $db;
mysql_query("update bbs_forum_subject set hit=hit+1 where subjectid='$subjectid'",$db);
return true;
}
//���ӻ�Ӧ
function add_reply($subjectid){
global $db;
mysql_query("update bbs_forum_subject set reply=reply+1 where subjectid='$subjectid'");
return true;
}
//********************��̳������************************end
//********************�ÿͺ�����************************begin
//��ӷÿͼ�¼
function add_visit($user){
global $db;
$visit_time=get_now_time();
$visit_id=time();
$visit_ip=$REMOTE_ADDR;
$res_name=mysql_query("select name from bbs_class_member where user='$user'",$db);
$visit_name=mysql_result($res_name,0,"name");
mysql_query("insert into visit (visit_id,visit_user,visit_name,visit_ip,visit_time) values ('$visit_id','$user','$visit_name','$visit_ip','$visit_time')",$db);
}
//����¼���Ƿ񳬹�200
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
mysql_query("optimize table visit",$db);//�Ż����ݱ�
}
//********************�ÿͺ�����************************end
//********************�����Һ�����************************
//�����������
function add_chat ($send_name,$receive_name,$input,$color,$face,$secret){ //�������������������������������ݣ�������ɫ�����飬��̸����
 global $db;
 $chat_id=time();
 $chat_time=get_now_time();
 if ($secret==1){
 $chat_content="<font color=$color>�����Ļ���".$send_name."��".$receive_name.$face.":".$input."</font>";
 $sql="insert into bbs_chatinfo (chat_id,secret,secret_send,secret_receive,chat_content,chat_time) values($chat_id,1,'$send_name','$receive_name','$chat_content','$chat_time')";
 }else{
 $chat_content="<font color=$color>".$send_name."��".$receive_name.$face.":".$input."</font>";
 $sql="insert into bbs_chatinfo (chat_id,secret,secret_send,secret_receive,chat_content,chat_time) values($chat_id,0,'','','$chat_content','$chat_time')";
  }
 mysql_query($sql,$db);
}
//���ϵͳ����
function add_system_message ($send_name,$message_kind){
global $db;
$chat_id=time();
$chat_time=get_now_time();
switch ($message_kind) {
	case "����":
	  $chat_content="��ϵͳ���桿 ".$send_name."�����������ˣ���һ�ӭ��";
	break;
	case "�뿪":
      $chat_content="��ϵͳ���桿 ".$send_name."�뿪��������.";
	break;
}
$sql="insert into bbs_chatinfo (chat_id,chat_content,chat_time) values($chat_id,'$chat_content','$chat_time')";
 mysql_query($sql,$db);
}
//��Ӷ�������
function add_emote ($emote_content){
global $db;
$chat_id=time();
$chat_time=get_now_time();
$chat_content="�������� ".$emote_content;
$sql="insert into bbs_chatinfo (chat_id,chat_content,chat_time) values($chat_id,'$chat_content','$chat_time')";
   mysql_query($sql,$db);
}
//��������
function emote ($send_name,$receive_name,$emote_id){
 global $db;
 $result=mysql_query("select emote_content from bbs_emote where emote_id='$emote_id'",$db);
 $emote_content=mysql_result($result,0,"emote_content");
 $emote_content=str_replace("%%%%",$send_name,$emote_content);//��%%%%�滻Ϊ�������û���
 $emote_content=str_replace("****",$receive_name,$emote_content);//��****�滻Ϊ�������û���
 return $emote_content;
}
//����¼���Ƿ񳬹�200
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
mysql_query("optimize table bbs_chatinfo",$db);//�Ż����ݱ�
}
//********************�����Һ�����************************end
?>