<?
session_start(); // ��ʼsession
if(!session_is_registered("userregister")||($userregister==""))
{
header("Location: index.php");
exit;
}
?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<TITLE>��ӭ��������1��ͬѧ¼</TITLE>
<link rel="stylesheet" href="css/index.css" type="text/css">
</HEAD>
<BODY BGCOLOR="#FFFFFF" leftmargin="0" topmargin="0">
<table width="483" border="1" height="65" cellpadding="0" cellspacing="0" bordercolorlight="#B062FF" bordercolordark="#FFFFFF" align="center">
  <tr> 
    <td colspan="2"> 
      <div align="center"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=4,0,2,0" width="480" height="60">
          <param name=movie value="image/forum.swf">
          <param name=quality value=high>
          <embed src="image/forum.swf" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="480" height="60">
          </embed> 
        </object></div>
    </td>
  </tr>
</table>
<table width="562" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
    <td class="black9" width="267"> ����ʱ�� 
      <? echo date("Y��m��d��");?>
    </td>
    <td class="black9" width="295"> 
      <?php  
	        include "admin/config.inc.php";
            include "admin/global.php";
            $user=$userregister;
            $result = mysql_query("SELECT * FROM bbs_class_member where user='$user'",$db);
			  echo "���ã�", mysql_result($result,0,"name"),"��";
			  $count=mysql_result($result,0,"count")+1;
			  echo "��ӭ����", $count,"�ι��ٱ�վ��";
              mysql_query("UPDATE bbs_class_member SET count=$count where user='$user'",$db);
			   ?>
    </td>
  </tr>
</table>
<table width="577" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr> 
    <td width="61%"> 
      <div align="center"><img src="image/821036.jpg" width="400" height="166" alt="�˴��滻Ϊ�༶��Ƭ"></div>
      <table width="97%" border="1" cellspacing="0" cellpadding="0" align="center" height="109" bordercolorlight="#9999FF" bordercolordark="#FFFFFF">
        <tr> 
          <td class="brown9"> 
            <?php
		   //��ǰ����
 $bbs_online_member=Readbbs_onlineName();
 $bbs_online_number=sizeof($bbs_online_member);
 echo "����".$bbs_online_number."��:";
 if ($bbs_online_number>0){
 while (list($id,$member)=each($bbs_online_member)){
   $SQL_bbs_online="select name from bbs_class_member where user='$member'";
   $res_bbs_online=mysql_query($SQL_bbs_online,$db);
   $bbs_online_name=mysql_result($res_bbs_online,0,"name");
   echo "<a href='member/user.php?user=$member' class='black9'>".$bbs_online_name."</a>  ";
   }
 }
		  ?>
          </td>
        </tr>
        <tr> 
          <td class="brown9"> 
            <div align="center"><b class="redlarge">�༶����</b></div>
          </td>
        </tr>
        <tr> 
          <td class="brown9"><img src="image/bz.gif" width="15" height="16"> ��������ͨ�ˣ�ȫ�µ���̳��ȫ�µĻ�Աϵͳ��ȫ�µĶ���Ϣ���ܣ�ȫ�µ���Ƭ����ϵͳ��</td>
        </tr>
        <tr> 
          <td class="brown9"><img src="image/bz.gif" width="15" height="16"> ͬѧ¼����������Ա�б������Ϣ���ܣ������Ը��������ǽ������ߺ��У�����ʵʱ��ϵ����Ƭ����ģ���Ѿ����Ժã����ϴ�������Ƭ�� 
            �������ʼ�¼��</td>
        </tr>
        <tr> 
          <td class="brown9"> <img src="image/bz.gif" width="15" height="16"> 
            ͬѧ¼���������ҹ��ܡ�</td>
        </tr>
        <tr> 
          <td> 
            <div align="center" class="redlarge">�������»���</div>
          </td>
        </tr>
        <tr> 
          <td class="brown9"> 
            <?php
  $result1 = mysql_query("select * from bbs_forum_subject ORDER BY lasttime DESC limit 0,2",$db);//��ȡ���2������
  $row=mysql_num_rows($result1);
  if ($row>0)
  {
   if ($row==1){$limit=1;} else {$limit=2;}
   for ($i=0;$i<$limit;$i++) {
   $last_name=mysql_result($result1,$i,'last_name');
   $lasttime=mysql_result($result1,$i,'lasttime');
   $title=mysql_result($result1,$i,'title');
   $subjectid=mysql_result($result1,$i,'subjectid');
   echo "�������ˣ�$last_name ʱ�� $lasttime <BR>";
   echo "����:<a href='bbs/subject.php?subjectid=$subjectid' class='purple'>$title</a><BR>";
   }
  }
          ?>
          </td>
        </tr>
      </table>
      <table width="97%" border="0" cellspacing="0" cellpadding="0" align="center" height="57" bgcolor="#FFeeFF">
        <tr> 
          <td class="purple">��������</td>
          <td><a href="http://www.idcfk.com" title="idcfk.com" target="_blank"><img src="image/logo2.gif" width="82" height="31" border=0></a></td>
        </tr>
      </table>
    </td>
    <td valign="top"> 
      <table border="0" cellspacing="0" cellpadding="0" width="71%" align="right">
        <tr> 
          <td background="image/yellowbar3.gif" class="white12" height="19"> 
            <div align="center">����Ϣ</div>
          </td>
        </tr>
        <tr> 
          <td bgcolor="#FFFEEFF" height="18"> 
            <div align="center" class="brown9" > <marquee direction=left scrollamount=1 scrolldelay=30 > 
              <a href="member/sms.php" class="black9"> 
              <?
			  $Sql_sms="select id from bbs_sms where reciever_user='$userregister' ";//ȫ������Ϣ
			 $res_sms=mysql_query($Sql_sms,$db);
			 $sms_total=mysql_num_rows($res_sms);
			 $Sql_sms="select id from bbs_sms where reciever_user='$userregister' and isread='0' ";//δ������Ϣ
			 $res_sms=mysql_query($Sql_sms,$db);
			 $sms_new=mysql_num_rows($res_sms);
			  echo "������".$sms_total."������Ϣ,����".$sms_new."������Ϣ��";
			 ?>
              </a> </marquee> </div>
          </td>
        </tr>
        <tr> 
          <td bgcolor="#FFCC66" class="white12" height="20"> 
            <div align="center">������Ϣ</div>
          </td>
        </tr>
        <tr> 
          <td class="brown9" height="77" bgcolor="#FFFEEFF"> 
            <?
			  alter_status($user,1);
			  $status_name=read_status($user);
			  $result = mysql_query("SELECT * FROM bbs_class_member where user='$user'",$db);
			  $face=mysql_result($result,0,'face');
			  $face='image/face/icon'.$face;
			  $name=mysql_result($result,0,'name');
              $count=mysql_result($result,0,'count');
			  $experience=mysql_result($result,0,'experience');
			  $last_time=mysql_result($result,0,'last_time');
			  $rank=readrank($user);			 
			 ?>
            <table width="90%" border="0" cellspacing="0" cellpadding="0" align="center" class="deepblue9">
              <tr> 
                <td colspan="2" align="center"> <img src="<? echo $face;?>.gif" width="32" height="32"> 
                </td>
              </tr>
              <tr> 
                <td width="39%">�û���</td>
                <td width="61%">
                  <? echo $user; ?>
                </td>
              </tr>
              <tr> 
                <td width="39%">����</td>
                <td width="61%">
                  <? echo $name; ?>
                </td>
              </tr>
              <tr> 
                <td width="39%">����ֵ</td>
                <td width="61%">
                  <? echo $experience; ?>
                </td>
              </tr>
              <tr> 
                <td width="39%">�ȼ�</td>
                <td width="61%">
                  <? echo $rank; ?>
                </td>
				</tr>
				<tr> 
				 <td width="39%" >&nbsp;</td>
                <td width="61%" class='red9'>
                  <? echo rank_pic($rank); ?>
                </td>
		      </tr>
              <tr> 
                <td width="39%">��վ����</td>
                <td width="61%">
                  <? echo $count; ?>
                </td>
              </tr>
              <tr> 
                <td width="39%">�����¼</td>
                <td width="61%">
                  <? echo $last_time;?>
                </td>
              </tr>
			   <tr> 
                <td width="39%">��ǰ״̬</td>
                <td width="61%">
                  <? echo $status_name;?>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr> 
          <td> 
            <table border="0" cellspacing="0" cellpadding="0" bgcolor="#CFBD9B" width="150">
              <tr> 
                <td height="24" colspan="3"><img src="image/noticebar.gif" width="150" height="25"></td>
              </tr>
              <tr> 
                <td height="182" width="6%">&nbsp;</td>
                <td width="88%" bgcolor="#FFFFFF" background="image/fanhor01-1.jpg" class="deepblue10"><marquee direction=up scrollamount=1 scrolldelay=130 ><font color="#FFCC66">��</font>�ڴ���Ӱ༶����<br>
                  <font color="#FFCC66">��</font>��ӭע������ͬѧ¼<br>
                  -webmaster<br>
                  </marqee> 
                </td>
                <td height="182" width="6%">&nbsp;</td>
              </tr>
            </table>
			<div align="center"><a href="admin/index.php" class="black9"><br>
              �༶����</a></div>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<div align="center"> 
  <p class="black9">���ǵ� 
    <?php
$fs = fopen("counter/counter.txt","r+"); 
$hit = fgets($fs,10); 
$hit+=1; 
rewind($fs); 
fwrite($fs,$hit,10); 
$hit = number_format($hit); 
fclose($fs);
echo "<font color='#33FF00'>$hit</font>";
?>
    λ������!<br>
    ��վά����<a href="http://idcfk.com" class="black9">idcfk.com</a><br>
    </p>
</div>
</BODY>
</HTML>
