<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<TITLE>����ͬѧ¼-ע��ڶ���</TITLE>
<link rel="stylesheet" href="../css/index.css" type="text/css">
</HEAD>
<BODY BGCOLOR="#FFFFFF">
<?php

include "../admin/config.inc.php";
if ($submit){
 if (!$username||!$psw||!$psw2||!$name||!$ad||!$ph||!$email||!$oicq||!$account){           //����Ƿ���д����
      echo "�Բ�����2���������д�*����Ŀ!<BR>"."<a href='javascript:history.back()'>����</a>";
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
 $account=strip_tags(trim($account));//ȥ����β�ո�html���
 $signature=strip_tags(trim($signature));
//����������Ƿ��ѱ�ע��
$result = mysql_query("SELECT name FROM bbs_class_member where name='$name'",$db);
if (mysql_num_rows($result)!=0){  
echo "������������ע�ᣡ"."<a href='javascript:history.back()'>������д</a>&nbsp;"."�������룬�����Ա<a href='querypsw.php'>��Ҫ����</a>";
exit;
}
//�����û����Ƿ�ʹ��
$result = mysql_query("SELECT user FROM bbs_class_member where user='$username'",$db);//�������е���Ŀ��Ϊ0��˵�����û���������ʹ��
if (mysql_num_rows($result)!=0){  
echo "���û���������ʹ�ã�"."<a href='javascript:history.back()'>������д</a>";
exit;
}
//��������ظ��Ƿ���ȷ
if (!$psw==$psw2){
 echo "��ȷ������,<a href='javascript:history.back()'>����</a>";
 exit;
}
//���email�ĺϷ���
if(!ereg('^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+'.'@'.'[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\.'.'[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$',$email)&&$email){
	   echo "email���Ϸ�!<BR>"."<a href='javascript:history.back()'>����</a><BR>";
	   exit;}
//д�����ݿ� 
 $reg_time=date("Y-m-d H:i:s");
  $sql="INSERT INTO bbs_class_member (user,psw,name,sex,birth,work,ad,post,ph,bp,email,oicq,account,signature,face,reg_time) VALUES ('$username','$psw','$name','$sex','$birth','$work','$ad','$post','$ph','$bp','$email','$oicq','$account','$signature','$face','$reg_time')";
 $result = mysql_query($sql,$db);
 mysql_close($db);
 //��ף���ʼ�
 $subject="ף����ɹ�ע��".$sitename."��";//����
 $message=$name.",��ã�<BR>&nbsp;&nbsp;ף����ɹ�ע��ͬѧ¼�������û���Ϊ".$username.",����Ϊ".$psw."<BR>���ڵ�½<a href='$url'>$sitename</a>";//�ż�����
 $headers .= "Content-Type: text/html; charset=gb2312\n"; // Mime type
 mail($email,$subject,$message,$headers);//����״̬�µ���ʱ����һ����ܻ�������ع����������������ϼ��ɡ�
 echo "��ϲ��ע��ɹ���һ�⻶ӭ���ѷ����������䣬��ע����ա�","<a href='../index.php'>���ڵ�¼</a>"; 
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
      <div align="center">ע��ڶ���-��д��������<br>
        ע�ⲻҪ�пո�,��*����ĿΪ���</div>
    </td>
  </tr>
  <tr> 
    <td colspan="2"> 
      <form method='post' action='<? echo $PHP_SELF;?>?answer=right'>
        <table width="95%" border="1" cellspacing="1" cellpadding="0" align="center" bordercolor="#FFCC00">
          <tr> 
            <td height="153" width="60%" class="brown9"> 
              <div align="center"><br>
                �û����� 
                <input type='Text' name='username' size='12'>
                *<br>
                (Ӣ����ĸ������֣����Ȳ�����12)<br>
                ���룺 
                <input type='password' name='psw' size='8' maxlength='8'>
                *<br>
                (Ӣ����ĸ������֣����Ȳ�����8���ַ�)<br>
                ȷ�����룺 
                <input type='password' name='psw2' size='8' maxlength='8'>
                *<br>
                ������ 
                <input type='Text' name='name' size='8'>
                *<br>
                �Ա��� 
                <input type='radio' name='sex' value='��' checked>
                Ů 
                <input type='radio' name='sex' value='Ů'>
                <br>
                ���գ� 
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
                �� 
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
                �� 
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
                ��<br>
                ������λ�� 
                <input type='Text' name='work' size='30' maxlength='50'>
                <br>
                ͨѶ��ַ�� 
                <input type='Text' name='ad' size='30' maxlength='50'>
                *<br>
                �ʱࣺ 
                <input type='Text' name='post' size='6' maxlength='6'>
                <br>
                �绰�� 
                <input type='Text' name='ph' size='15' maxlength='30'>
                *<br>
                ������ 
                <input type='Text' name='bp' size='15' maxlength='20'>
                <br>
                Email�� 
                <input type='Text' name='email' size='15' maxlength='35'>
                *<br>
                QQ�� 
                <input type='Text' name='oicq' size='12' maxlength='12'>
                *<br>
                ְҵ��(��ͨѶ¼����ʾ��������125������) *<BR>
                <textarea name='account' cols='50' rows='5'></textarea>
                 <br>
                ����ǩ����������̳���Զ�ǩ����������125�����֣�<br>
                <textarea name="signature" cols="50" rows="5"></textarea>
                <br>
                ѡ��һ���Լ�ϲ����ͷ��:<br>
                <br>
                <?php
			   if (!$iconpage){$iconpage=1;}
			   $min=10*($iconpage-1)+1;
			   $max=10*$iconpage;
			    for ($i=$min;$i<=$max;$i++){
                  echo "<img src='../image/face/icon$i.gif' width='32' height='32'> <input type='radio' name='face' value='$i'>";
				  if (($i%3)==0) {echo "<BR>";}
				 }
			   echo "<BR>��";
			   for ($n=1;$n<=10;$n++){
		  echo "<a href=$PHP_SELF?answer=right&iconpage=$n>$n</a>&nbsp;";
		  }
		  echo "ҳ";
			  ?>
              </div>
            </td>
          </tr>
        </table>
        <div align="center">
          <br>
          <input type='Submit' name='submit' value='�ύ'>
          <input type='reset' name='Reset' value='��д '>
        </div>
      </form>
    </td>
  </tr>
</table>
</BODY>
</HTML>
<?php die();?>