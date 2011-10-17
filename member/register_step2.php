<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<TITLE>杏林同学录-注册第二步</TITLE>
<link rel="stylesheet" href="../css/index.css" type="text/css">
</HEAD>
<BODY BGCOLOR="#FFFFFF">
<?php

include "../admin/config.inc.php";
if ($submit){
 if (!$username||!$psw||!$psw2||!$name||!$ad||!$ph||!$email||!$oicq||!$account){           //检查是否填写完整
      echo "对不起，您2必须填所有带*的项目!<BR>"."<a href='javascript:history.back()'>返回</a>";
	  exit;
    }
 $username=trim($username);
 $psw=trim($psw);
 $psw2=trim($psw2);
 $name=trim($name);
 $birth=$year.'-'.$month.'-'.$day;
 $work=trim($work);
 $ad=trim($ad);
 $post=trim($post);
 $ph=trim($ph);
 $bp=trim($bp);
 $email=trim($email);
 $oicq=trim($oicq);
 $account=strip_tags(trim($account));//去掉首尾空格及html标记
 $signature=strip_tags(trim($signature));
//检验此名字是否已被注册
$result = mysql_query("SELECT name FROM bbs_class_member where name='$name'",$db);
if (mysql_num_rows($result)!=0){  
echo "此名字已有人注册！"."<a href='javascript:history.back()'>重新填写</a>&nbsp;"."忘记密码，向管理员<a href='querypsw.php'>索要密码</a>";
exit;
}
//检验用户名是否被使用
$result = mysql_query("SELECT user FROM bbs_class_member where user='$username'",$db);//若返回列的数目不为0，说明此用户名已有人使用
if (mysql_num_rows($result)!=0){  
echo "此用户名已有人使用！"."<a href='javascript:history.back()'>重新填写</a>";
exit;
}
//检查密码重复是否正确
if (!$psw==$psw2){
 echo "请确认密码,<a href='javascript:history.back()'>返回</a>";
 exit;
}
//检查email的合法性
if(!ereg('^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+'.'@'.'[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\.'.'[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$',$email)&&$email){
	   echo "email不合法!<BR>"."<a href='javascript:history.back()'>重填</a><BR>";
	   exit;}
//写入数据库 
 $reg_time=date("Y-m-d H:i:s");
  $sql="INSERT INTO bbs_class_member (user,psw,name,sex,birth,work,ad,post,ph,bp,email,oicq,account,signature,face,reg_time) VALUES ('$username','$psw','$name','$sex','$birth','$work','$ad','$post','$ph','$bp','$email','$oicq','$account','$signature','$face','$reg_time')";
 $result = mysql_query($sql,$db);
 mysql_close($db);
 //发祝贺邮件
 $subject="祝贺你成功注册".$sitename."！";//主题
 $message=$name.",你好：<BR>&nbsp;&nbsp;祝贺你成功注册同学录！您的用户名为".$username.",密码为".$psw."<BR>现在登陆<a href='$url'>$sitename</a>";//信件内容
 $headers .= "Content-Type: text/html; charset=gb2312\n"; // Mime type
 mail($email,$subject,$message,$headers);//离线状态下调试时，这一句可能会出错，不必管它，传到服务器上即可。
 echo "恭喜您注册成功！一封欢迎信已发到您的邮箱，请注意查收。","<a href='../index.php'>现在登录</a>"; 
 exit;
} 
?>
<table width='95%' border='0' cellspacing='0' cellpadding='0' align='center' class="brown9">
  <tr> 
    <td colspan="2"> 
      <div align="center"><img src="../image/classlogo.gif" width="224" height="60"></div>
    </td>
  </tr>
  <tr> 
    <td> 
      <div align="center">注册第二步-填写个人资料<br>
        注意不要有空格,带*的项目为必填。</div>
    </td>
  </tr>
  <tr> 
    <td colspan="2"> 
      <form method='post' action='<? echo $PHP_SELF;?>?answer=right'>
        <table width="95%" border="1" cellspacing="1" cellpadding="0" align="center" bordercolor="#FFCC00">
          <tr> 
            <td height="153" width="60%" class="brown9"> 
              <div align="center"><br>
                用户名： 
                <input type='Text' name='username' size='12'>
                *<br>
                (英文字母或加数字，长度不超过12)<br>
                密码： 
                <input type='password' name='psw' size='8' maxlength='8'>
                *<br>
                (英文字母或加数字，长度不超过8个字符)<br>
                确认密码： 
                <input type='password' name='psw2' size='8' maxlength='8'>
                *<br>
                姓名： 
                <input type='Text' name='name' size='8'>
                *<br>
                性别：男 
                <input type='radio' name='sex' value='男' checked>
                女 
                <input type='radio' name='sex' value='女'>
                <br>
                生日： 
                <select name='year'>
		 <option selected>1992</option>
                  <option selected>1991</option>
                  <option>1990</option>
                  <option>1989</option>
                  <option>1988</option>
                  <option>1987</option>
                  <option>1986</option>
                  <option>1985</option>
                  <option>1984</option>
                  <option>1983</option>
                  <option>1982</option>
                  <option>1981</option>
                  <option>1980</option>
                  <option>1979</option>
                  <option>1978</option>
                  <option>1977</option>
                  <option>1976</option>
                  <option>1975</option>
                  <option>1974</option>
                  <option>1973</option>
                  <option>1972</option>
                  <option>1971</option>
                  <option>1970</option>
                  <option>1969</option>
                  <option>1968</option>
                  <option>1967</option>
                  <option>1966</option>
                  <option>1965</option>
                  <option>1964</option>
                  <option>1963</option>
                  <option>1962</option>
                  <option>1961</option>
                  <option>1960</option>
                  <option>1959</option>
                  <option>1958</option>
                  <option>1957</option>
                  <option>1956</option>
                  <option>1955</option>
                  <option>1954</option>
                </select>
                年 
                <select name='month'>
                  <option selected>01</option>
                  <option>02</option>
                  <option>03</option>
                  <option>04</option>
                  <option>05</option>
                  <option>06</option>
                  <option>07</option>
                  <option>08</option>
                  <option>09</option>
                  <option>10</option>
                  <option>11</option>
                  <option>12</option>
                </select>
                月 
                <select name='day'>
                  <option selected>01</option>
                  <option>02</option>
                  <option>03</option>
                  <option>04</option>
                  <option>05</option>
                  <option>06</option>
                  <option>07</option>
                  <option>08</option>
                  <option>09</option>
                  <option>10</option>
                  <option>11</option>
                  <option>12</option>
                  <option>13</option>
                  <option>14</option>
                  <option>15</option>
                  <option>16</option>
                  <option>17</option>
                  <option>18</option>
                  <option>19</option>
                  <option>20</option>
                  <option>21</option>
                  <option>22</option>
                  <option>23</option>
                  <option>24</option>
                  <option>25</option>
                  <option>26</option>
                  <option>27</option>
                  <option>28</option>
                  <option>29</option>
                  <option>30</option>
                  <option>31</option>
                </select>
                日<br>
                工作单位： 
                <input type='Text' name='work' size='30' maxlength='50'>
                <br>
                通讯地址： 
                <input type='Text' name='ad' size='30' maxlength='50'>
                *<br>
                邮编： 
                <input type='Text' name='post' size='6' maxlength='6'>
                <br>
                电话： 
                <input type='Text' name='ph' size='15' maxlength='30'>
                *<br>
                传呼： 
                <input type='Text' name='bp' size='15' maxlength='20'>
                <br>
                Email： 
                <input type='Text' name='email' size='15' maxlength='35'>
                *<br>
                QQ： 
                <input type='Text' name='oicq' size='12' maxlength='12'>
                *<br>
                职业：(在通讯录里显示，不超过125个汉字) *<BR>
                <textarea name='account' cols='50' rows='5'></textarea>
                 <br>
                个人签名：（在论坛的自动签名，不超过125个汉字）<br>
                <textarea name="signature" cols="50" rows="5"></textarea>
                <br>
                选择一个自己喜欢的头像:<br>
                <br>
                <?php
			   if (!$iconpage){$iconpage=1;}
			   $min=10*($iconpage-1)+1;
			   $max=10*$iconpage;
			    for ($i=$min;$i<=$max;$i++){
                  echo "<img src='../image/face/icon$i.gif' width='32' height='32'> <input type='radio' name='face' value='$i'>";
				  if (($i%3)==0) {echo "<BR>";}
				 }
			   echo "<BR>第";
			   for ($n=1;$n<=10;$n++){
		  echo "<a href=$PHP_SELF?answer=right&iconpage=$n>$n</a>&nbsp;";
		  }
		  echo "页";
			  ?>
              </div>
            </td>
          </tr>
        </table>
        <div align="center">
          <br>
          <input type='Submit' name='submit' value='提交'>
          <input type='reset' name='Reset' value='重写 '>
        </div>
      </form>
    </td>
  </tr>
</table>
</BODY>
</HTML>
<?php die();?>