<?
session_start(); // 开始session
if(!session_is_registered("userregister")||($userregister==""))
{
header("Location: ../index.php");
exit;
}
include "../admin/config.inc.php";
include "../admin/global.php";
alter_status($userregister,6);
?>
<html>
<head>
<title>个人信息</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../css/index.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000">
<?php
  $result = mysql_query("SELECT * FROM bbs_class_member where user='$user'",$db);
    $name=mysql_result($result,0,'name');
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
   $face='../image/face/icon'.$face;
   $count=mysql_result($result,0,'count');
   $experience=mysql_result($result,0,'experience');
   $last_time=mysql_result($result,0,'last_time');
   $rank=mysql_result($result,0,'rank');
   $status_name=read_status($user);
   $rank_pic=rank_pic($rank);
   ?>
<br>
<br>
<br>
<table width="99%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
    <td width="63%" height="185"> 
      <table border="1" cellspacing="1" cellpadding="1" align="center" height="100%" bordercolor="#33CC00" width="85%">
        <tr> 
          <td class="black9" bgcolor="#33CC00" height="20"> 
            <div align="center"><font color="#FFFFFF">自我介绍</font></div>
          </td>
        </tr>
        <tr> 
          <td class="black9" bgcolor="#D9FFD9"> 
            <table width="99%" border="0" cellspacing="0" cellpadding="0" align="center" class="black9">
              <tr>
                <td>
                  <? echo $account;?>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
    <td width="37%" rowspan="2"> 
      <table width="97%" border="1" cellspacing="1" cellpadding="1" align="center" bordercolor="#FFCC00" height="100%">
        <tr> 
          <td height="16" bgcolor="#FDB953" class="black9"> 
            <div align="center"><font color="#FFFFFF">会员信息</font></div>
          </td>
        </tr>
        <tr> 
          <td bgcolor="#FFF7D2" class="black9" > 
            <table width="260" border="0" cellspacing="0" cellpadding="0" class="black9" height="100%">
              <tr> 
                <td colspan="2" height="20"> 
                  <div align="center"><img src='<? echo $face;?>.gif' width='32' height='32'></div>
                </td>
              </tr>
              <tr> 
                <td width="80" height="20">用户名:</td>
                <td width="67%" height="20"> 
                  <? echo $user;?>
                </td>
              </tr>
              <tr> 
                <td width="80" height="17">姓名:</td>
                <td width="67%" height="17"><a href="../photo/member_photo.php?user=<? echo $user;?>" class='black9'> 
                  </a> 
                  <? echo $name;?>
                </td>
              </tr>
              <tr> 
                <td width="80" height="15">性别:</td>
                <td width="67%" height="15">
                  <? echo $sex;?></td>
              </tr>
              <tr> 
                <td width="80" height="16">经验值: </td>
                <td width="67%" height="16"> 
                  <? echo $experience;?>
                </td>
              </tr>
              <tr> 
                <td width="80" height="18">等级:</td>
                <td width="67%" height="18"> 
                  <? echo $rank." <span class='red9'>".$rank_pic."</span>";?>
                </td>
              </tr>
              <tr> 
                <td width="80" height="17">生日:</td>
                <td width="67%" height="17"> 
                  <? echo $birth;?>
                </td>
              </tr>
              <tr> 
                <td width="80" height="15">工作单位:</td>
                <td width="67%" height="15"> 
                  <? echo $work;?>
                </td>
              </tr>
              <tr> 
                <td width="80" height="15">通讯地址:</td>
                <td width="67%" height="15"> 
                  <? echo $ad;?>
                </td>
              </tr>
              <tr> 
                <td width="80" height="15">邮编:</td>
                <td width="67%" height="15"> 
                  <? echo $post;?>
                </td>
              </tr>
              <tr> 
                <td width="80" height="16">电话:</td>
                <td width="67%" height="16"> 
                  <? echo $ph;?>
                </td>
              </tr>
              <tr> 
                <td width="80" height="14">传呼:</td>
                <td width="67%" height="14"> 
                  <? echo $bp;?>
                </td>
              </tr>
              <tr> 
                <td width="80" height="15">email:</td>
                <td width="67%" height="15"><a href='mailto:$email' class='black9'> 
                  <? echo $email;?>
                  </a></td>
              </tr>
              <tr> 
                <td width="80" height="16"> oicq:</td>
                <td width="67%" height="16"> 
                  <? echo $oicq;?>
                </td>
              </tr>
              <tr> 
                <td width="80" height="15">上站次数:</td>
                <td width="67%" height="15"> 
                  <? echo $count;?>
                </td>
              </tr>
              <tr> 
                <td width="80" height="14">最近登录时间:</td>
                <td width="67%" height="14"> 
                  <? echo $last_time;?>
                </td>
              </tr>
              <tr> 
                <td width="80" height="13">当前状态:</td>
                <td width="67%" height="13"> 
                  <? echo $status_name;?>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      <div align="center"><a href="../photo/member_photo.php?user=<? echo $user;?>" class='black9'>看照片</a><br>
        <span class="black9">发短消息</span><a href='sendsms.php?reciever_user=<? echo $user;?>'><img src='../image/sms.gif' width='13' height='15' border='0'></a> 
      </div>
    </td>
  </tr>
  <tr>
    <td width="63%" height="157"> 
      <table border="1" cellspacing="1" cellpadding="1" height="100%" align="center" bordercolor="#66CCFF" width="85%">
        <tr> 
          <td height="21" bgcolor="#0099FF" class="black9" width="342"> 
            <div align="center"><font color="#FFFFFF">最新论坛发贴 </font></div>
          </td>
        </tr>
        <tr> 
          <td bgcolor="#e4f2fc" class="black9">             
			<?
			 $res_thread=mysql_query("select * from bbs_forum_thread where poster_user='$user' order by posttime desc limit 0,2",$db);//读取最近两条帖子
			 $row=mysql_num_rows($res_thread);
			 if ($row>0){
			  if ($row==1){$limit=1;}else{$limit=2;} 
			 for ($i=0;$i<$limit;$i++){
			 $title=mysql_result($res_thread,$i,"title");
			 $posttime=mysql_result($res_thread,$i,"posttime");
             $subjectid=mysql_result($res_thread,$i,"subjectid");
			 echo "题目：<a href='../bbs/subject.php?subjectid=$subjectid' class='black9'>".$title."</a><BR>";
			 echo "发表时间:".$posttime."<BR><BR>";
			  }
			 }
			?>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
