<?
session_start();
if(!session_is_registered("superlogin"))//����Ƿ�ע��
{
 header("Location: index.php");//��ת����ҳ���е�½
exit;
}
?>
<?php
//�ļ��ϴ���
include "config.inc.php";
if ($upload){
 if ($picurl=="none"){
 echo "��û���ϴ��κ��ļ�.";
 exit;
 }
 $v=opendir("../image/member"); 
  if ($v==0) 
  { mkdir("../image/member"); //��Ŀ¼�����ڣ����½�һ��
  $v=opendir("../image/member"); //ȡ��Ŀ¼handle
  } 
 $up=copy("$picurl","../image/member/$picurl_name"); 
 if($up==1) 
  {
  //��ʼ��д������
 $res_user = mysql_query("SELECT user FROM bbs_class_member where name='$user_name'",$db);//���һ�Ա�û���
 $up_user= mysql_result($res_user,0,'user');  
  $pic_id=time();
  $up_name="webmaster";
  $pic_size=$picurl_size;
  $pic_discribe=htmlspecialchars($pic_discribe);
  $pic_discribe=nl2br(strip_tags($pic_discribe));
  $pic_time=date("Y-m-d H:i:s");
  $pic_name=$picurl_name;
  mysql_query("insert into bbs_photo (pic_id,pic_kind,up_user,up_name,pic_name,pic_size,pic_discribe,pic_time) VALUES ('$pic_id','$pic_kind','$up_user','$up_name','$pic_name','$pic_size','$pic_discribe','$pic_time')",$db);//д�����ݿ�
  mysql_close($db);
  echo "<div align='center'>�ļ��ϴ��ɹ�!<BR>";
  echo "�ļ���:$picurl_name �ļ���С:$picurl_size byte �ļ�����:$picurl_type<BR>";
  echo "<a href='../photo/index.php'>����Ƭ</a></div>";
  } 
  else 
  {echo "�ļ��ϴ�ʧ��.";} 
 unlink ($picurl); //����ʱ�ļ�����ɾ������$picurl
 closedir ($v); //�ر�Ŀ¼handle
 exit;
 }
?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<TITLE>�ϴ���Ա��Ƭ</TITLE>
<link rel="stylesheet" href="../css/index.css" type="text/css">
</HEAD>
<BODY BGCOLOR="#FFFFFF">
<br>
<br>
<table width="74%" border="0" height="46" cellpadding="0" cellspacing="0" align="center" class="purple">
  <tr> 
    <td> 
      <div align="center" class="redlarge">�ϴ���Ƭ </div>
    </td>
  </tr>
  <tr> 
    <td height="19"> 1.�Ͻ��ϴ�������������Ƭ��</td>
  </tr>
  <tr> 
    <td height="23">2,��jpgͼƬ��ʽ����Ƭ��Ҫ����100k��С�� </td>
  </tr>
  <tr>
    <td height="18">3.�ļ�����Ҫ�����ģ�������������ʾ��</td>
  </tr>
  <tr> 
    <td height="18">4.��Ƭ������Ҫ����100���֣�����ϵͳ�Զ�ɾ����</td>
  </tr>
  <tr> 
    <td> 
      <form action="<? echo $PHP_DELF; ?>" method="post" enctype="multipart/form-data" name="UL">
        <!--ע�⣺���������ϡ�enctype="multipart/form-data" �������򲻻������
������-->
        <div align="center"><br>
          ѡ����Ƭ<br>
          <input type="file" name="picurl" size="15" accept="image/x-png,image/gif,image/jpeg">
          <br>
          ѡ����Ƭ����<br>
          <select name="pic_kind">
            <option>������Ƭ</option>
            <option>�༶��Ƭ</option>
            <option>У԰���</option>
          </select>
          <br>
          ѡ���Ա<br>
          <select name="user_name">
            <?php
			   $result = mysql_query("SELECT name FROM bbs_class_member",$db);
               if ($result){
			   $row=mysql_num_rows($result);
			   for ($i=0;$i<=($row-1);$i++) {
			    $name=mysql_result($result,$i,'name');
				echo "<option>".$name."</option> ";
			    }
			   } 
			   ?>
          </select>
          <br>
          ��Ƭ����<br>
          <textarea name="pic_discribe" cols="35" rows="5"></textarea>
          <br>
          <input type="Submit" name="upload" value="�ϴ�">
          <input type="reset" name="Reset" value="����">
        </div>
      </form>
    </td>
  </tr>
</table>

</BODY>
</HTML>

