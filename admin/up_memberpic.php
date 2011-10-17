<?
session_start();
if(!session_is_registered("superlogin"))//检查是否注册
{
 header("Location: index.php");//跳转到首页进行登陆
exit;
}
?>
<?php
//文件上传。
include "config.inc.php";
if ($upload){
 if ($picurl=="none"){
 echo "你没有上传任何文件.";
 exit;
 }
 $v=opendir("../image/member"); 
  if ($v==0) 
  { mkdir("../image/member"); //若目录不存在，则新建一个
  $v=opendir("../image/member"); //取得目录handle
  } 
 $up=copy("$picurl","../image/member/$picurl_name"); 
 if($up==1) 
  {
  //初始化写入内容
 $res_user = mysql_query("SELECT user FROM bbs_class_member where name='$user_name'",$db);//查找会员用户名
 $up_user= mysql_result($res_user,0,'user');  
  $pic_id=time();
  $up_name="webmaster";
  $pic_size=$picurl_size;
  $pic_discribe=htmlspecialchars($pic_discribe);
  $pic_discribe=nl2br(strip_tags($pic_discribe));
  $pic_time=date("Y-m-d H:i:s");
  $pic_name=$picurl_name;
  mysql_query("insert into bbs_photo (pic_id,pic_kind,up_user,up_name,pic_name,pic_size,pic_discribe,pic_time) VALUES ('$pic_id','$pic_kind','$up_user','$up_name','$pic_name','$pic_size','$pic_discribe','$pic_time')",$db);//写入数据库
  mysql_close($db);
  echo "<div align='center'>文件上传成功!<BR>";
  echo "文件名:$picurl_name 文件大小:$picurl_size byte 文件类型:$picurl_type<BR>";
  echo "<a href='../photo/index.php'>看照片</a></div>";
  } 
  else 
  {echo "文件上传失败.";} 
 unlink ($picurl); //从临时文件夹中删除档案$picurl
 closedir ($v); //关闭目录handle
 exit;
 }
?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<TITLE>上传会员照片</TITLE>
<link rel="stylesheet" href="../css/index.css" type="text/css">
</HEAD>
<BODY BGCOLOR="#FFFFFF">
<br>
<br>
<table width="74%" border="0" height="46" cellpadding="0" cellspacing="0" align="center" class="purple">
  <tr> 
    <td> 
      <div align="center" class="redlarge">上传照片 </div>
    </td>
  </tr>
  <tr> 
    <td height="19"> 1.严禁上传反动、淫秽照片！</td>
  </tr>
  <tr> 
    <td height="23">2,用jpg图片格式，照片不要超过100k大小。 </td>
  </tr>
  <tr>
    <td height="18">3.文件名不要用中文，否则不能正常显示。</td>
  </tr>
  <tr> 
    <td height="18">4.照片描述不要超过100个字，否则系统自动删减。</td>
  </tr>
  <tr> 
    <td> 
      <form action="<? echo $PHP_DELF; ?>" method="post" enctype="multipart/form-data" name="UL">
        <!--注意：这里必须加上‘enctype="multipart/form-data" ’，否则不会产生上
传动作-->
        <div align="center"><br>
          选择照片<br>
          <input type="file" name="picurl" size="15" accept="image/x-png,image/gif,image/jpeg">
          <br>
          选择照片类型<br>
          <select name="pic_kind">
            <option>个人照片</option>
            <option>班级照片</option>
            <option>校园风光</option>
          </select>
          <br>
          选择会员<br>
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
          照片描述<br>
          <textarea name="pic_discribe" cols="35" rows="5"></textarea>
          <br>
          <input type="Submit" name="upload" value="上传">
          <input type="reset" name="Reset" value="重置">
        </div>
      </form>
    </td>
  </tr>
</table>

</BODY>
</HTML>

