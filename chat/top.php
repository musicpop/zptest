<?
session_start(); // ��ʼsession
if(!session_is_registered("userregister")||($userregister==""))
{
header("Location: ../index.php");
exit;
}
 include "../admin/config.inc.php";
 include "../admin/global.php";
 alter_status($userregister,5);
 $user=$userregister;
?>
<html>
<head>
<title>������</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../css/index.css" type="text/css">
</head>

<body bgcolor="#FFCCFF" text="#000000" class="black9" leftmargin="0">
<script language="JavaScript">
function chksend(){
document.sendmsg.message.value=document.sendmsg.input.value;
document.sendmsg.input.value="";
document.sendmsg.input.focus();
if(document.sendmsg.message.value){
sends=true;
}
return sends;
}
function openclk() {
another=open('top.php','upframe');
}
</script>
<form name="sendmsg" method="post" action="chat.php" target="mainframe" OnSubmit="return chksend();">
  <div align="center">
  <input type="hidden" name="message" value="">
   <input type="hidden" name="receive_name" value="���">
  <input type="text" name="receive_name1" size="10" value="���" disabled>
	    <select name="secret">
      <option value=0 selected>��������</option>
      <option value=1>���Ļ�</option>
    </select>
    ��ɫ
<select name="color" size="1">
	  <option value="#3388aa" selected>Ĭ��</option>
      <option value="#000000">��ɫ </option>
      <option value="#880000">���� </option>
      <option value="#0088ff">���� </option>
      <option value="#0000ff">���� </option>
      <option value="#000088">���� </option>
      <option value="#888800">���� </option>
      <option value="#008888">���� </option>
      <option value="#008800">��� </option>
      <option value="#8888ff">���� </option>
      <option value="#aa00cc">��ɫ </option>
      <option value="#8800ff">���� </option>
      <option value="#888888">��ɫ </option>
      <option value="#ccaa00">���� </option>
      <option value="#ff8800">��� </option>
      <option value="#ff0088">õ�� </option>
      <option value="#ff00ff">�Ϻ� </option>
      <option value="#ff0000">��� </option>
    </select>
    ����
<select name="face" size="1">
	  <option value="˵" selected>˵ </option>
      <option value="΢΢Ц">΢Ц </option>
      <option value="�����˵">���� </option>
      <option value="����س�">�ᳪ </option>
      <option value="������˵">���� </option>
      <option value="������������Ц��˵">��Ц </option>
      <option value="���������˵">���� </option>
      <option value="սս������˵">ս�� </option>
      <option value="ë��ë�ŵ�˵">ë�� </option>
      <option value="������˵">��� </option>
      <option value="����˹���˵">���� </option>
      <option value="ͬ���˵">ͬ�� </option>
      <option value="�����ֻ���˵">�ֻ� </option>
      <option value="��Ҫ�޵�˵">��� </option>
      <option value="����˵">�� </option>
      <option value="ȭ�����">ȭ�� </option>
      <option value="���������˵">���� </option>
      <option value="�ź���˵">�ź� </option>
      <option value="�ɴ����۾����ܲ���">���� </option>
      <option value="�Ҹ���˵">�Ҹ� </option>
      <option value="���䵹���˵">���� </option>
      <option value="���˵�˵">���� </option>
      <option value="���ſ�ˮ">����ˮ </option>
      <option value="������Ȼ">���� </option>
      <option value="�����˵">���� </option>
      <option value="������˵">���� </option>
      <option value="������˵">���� </option>
      <option value="ɵ������˵">ɵ </option>
      <option value="�������˵">���� </option>
      <option value="�����޴�">�޴� </option>
      <option value="���޹���˵">�޹� </option>
      <option value="������">���� </option>
      <option value="��ݺݵص�����">���� </option>
      <option value="��Ҫ�µ�˵">���� </option>
      <option value="�޾���ɵ�˵">�޲� </option>
      <option value="���������˵">���� </option>
      <option value="���°�ĭ">��ĭ</option>
    </select>
    ����
<select name=emote_id size=1 >
      <option value="0"></option>
      <option value="1">���</option>
      <option value="2">����</option>
      <option value="3">����</option>
      <option value="4">ͬ��</option>
      <option value="5">����</option>
      <option value="6">����</option>
      <option value="7">ͷ����</option>
      <option value="8">����</option>
      <option value="9">�������</option>
      <option value="10">��ο</option>
      <option value="11">��֪��</option>
      <option value="12">��</option>
      <option value="13">ԭ��</option>
      <option value="14">֪��</option>
      <option value="15">goodbye</option>
      <option value="16">���к�</option>
      <option value="17">ҡͷ</option>
      <option value="18">ί��</option>
      <option value="19">��</option>
      <option value="20">��</option>
      <option value="21">��</option>
      <option value="22">��</option>
      <option value="23">��Ц</option>
      <option value="24">��ױ</option>
      <option value="25">����</option>
      <option value="26">����</option>
      <option value="27">����</option>
      <option value="28">����</option>
      <option value="29">����</option>
      <option value="30">��</option>
      <option value="31">��</option>
      <option value="32">��л</option>
      <option value="33">��</option>
      <option value="34">����</option>
      <option value="35">����</option>
      <option value="36">����</option>
      <option value="37">��ӭ</option>
      <option value="38">õ��</option>
      <option value="39">����</option>
      <option value="40">��</option>
    </select>
    <br>
    <input type="text" name="input" size="61"><BR>
    <input type="submit" name="submit" value="����">
    <input type="reset" name="cacel" value="��д">
	<INPUT TYPE="BUTTON" NAME="open" value="ˢ��" onClick="openclk()">
	 </div>
</form>
</body>
</html>
