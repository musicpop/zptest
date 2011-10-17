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
 $user=$userregister;
?>
<html>
<head>
<title>聊天室</title>
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
   <input type="hidden" name="receive_name" value="大家">
  <input type="text" name="receive_name1" size="10" value="大家" disabled>
	    <select name="secret">
      <option value=0 selected>公开发言</option>
      <option value=1>悄悄话</option>
    </select>
    颜色
<select name="color" size="1">
	  <option value="#3388aa" selected>默认</option>
      <option value="#000000">黑色 </option>
      <option value="#880000">咖啡 </option>
      <option value="#0088ff">海蓝 </option>
      <option value="#0000ff">亮蓝 </option>
      <option value="#000088">深蓝 </option>
      <option value="#888800">黄绿 </option>
      <option value="#008888">蓝绿 </option>
      <option value="#008800">橄榄 </option>
      <option value="#8888ff">淡紫 </option>
      <option value="#aa00cc">紫色 </option>
      <option value="#8800ff">蓝紫 </option>
      <option value="#888888">灰色 </option>
      <option value="#ccaa00">土黄 </option>
      <option value="#ff8800">金黄 </option>
      <option value="#ff0088">玫瑰 </option>
      <option value="#ff00ff">紫红 </option>
      <option value="#ff0000">大红 </option>
    </select>
    表情
<select name="face" size="1">
	  <option value="说" selected>说 </option>
      <option value="微微笑">微笑 </option>
      <option value="温柔地说">温柔 </option>
      <option value="轻轻地唱">轻唱 </option>
      <option value="红着脸说">脸红 </option>
      <option value="哈！哈！哈！笑着说">大笑 </option>
      <option value="神秘兮兮地说">神秘 </option>
      <option value="战战兢兢地说">战兢 </option>
      <option value="毛手毛脚地说">毛手 </option>
      <option value="嘟着嘴地说">嘟嘴 </option>
      <option value="慢条斯理地说">慢条 </option>
      <option value="同情地说">同情 </option>
      <option value="幸灾乐祸地说">乐祸 </option>
      <option value="快要哭地说">快哭 </option>
      <option value="哭着说">哭 </option>
      <option value="拳打脚踢">拳打 </option>
      <option value="不怀好意地说">坏意 </option>
      <option value="遗憾地说">遗憾 </option>
      <option value="瞪大了眼睛，很诧异">诧异 </option>
      <option value="幸福地说">幸福 </option>
      <option value="翻箱倒柜地说">翻箱 </option>
      <option value="悲伤地说">悲伤 </option>
      <option value="流着口水">流口水 </option>
      <option value="正义凛然">正义 </option>
      <option value="严肃地说">严肃 </option>
      <option value="生气地说">生气 </option>
      <option value="大声地说">大声 </option>
      <option value="傻乎乎地说">傻 </option>
      <option value="很满足地说">满足 </option>
      <option value="手足无措">无措 </option>
      <option value="很无辜地说">无辜 </option>
      <option value="喃喃自语">自语 </option>
      <option value="恶狠狠地瞪着眼">瞪眼 </option>
      <option value="快要吐地说">想吐 </option>
      <option value="无精打采地说">无采 </option>
      <option value="依依不舍地说">不舍 </option>
      <option value="口吐白沫">白沫</option>
    </select>
    动作
<select name=emote_id size=1 >
      <option value="0"></option>
      <option value="1">红包</option>
      <option value="2">拜年</option>
      <option value="3">惊讶</option>
      <option value="4">同意</option>
      <option value="5">鼓掌</option>
      <option value="6">生日</option>
      <option value="7">头来了</option>
      <option value="8">道别</option>
      <option value="9">天气真好</option>
      <option value="10">安慰</option>
      <option value="11">不知道</option>
      <option value="12">昏</option>
      <option value="13">原谅</option>
      <option value="14">知音</option>
      <option value="15">goodbye</option>
      <option value="16">打招呼</option>
      <option value="17">摇头</option>
      <option value="18">委曲</option>
      <option value="19">跳</option>
      <option value="20">踢</option>
      <option value="21">吻</option>
      <option value="22">慢</option>
      <option value="23">大笑</option>
      <option value="24">化妆</option>
      <option value="25">恶心</option>
      <option value="26">无奈</option>
      <option value="27">害羞</option>
      <option value="28">唱歌</option>
      <option value="29">有事</option>
      <option value="30">看</option>
      <option value="31">茶</option>
      <option value="32">道谢</option>
      <option value="33">想</option>
      <option value="34">反对</option>
      <option value="35">清醒</option>
      <option value="36">挥手</option>
      <option value="37">欢迎</option>
      <option value="38">玫瑰</option>
      <option value="39">闪电</option>
      <option value="40">困</option>
    </select>
    <br>
    <input type="text" name="input" size="61"><BR>
    <input type="submit" name="submit" value="发言">
    <input type="reset" name="cacel" value="重写">
	<INPUT TYPE="BUTTON" NAME="open" value="刷新" onClick="openclk()">
	 </div>
</form>
</body>
</html>
