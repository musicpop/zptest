create table bbs_class_member (id char(2),user char(20) UNIQUE,psw char(20),name char(20),sex char(2),birth char(10),work varchar(50),ad varchar(50),post char(6),ph varchar(30),bp varchar(20),email varchar(35),oicq char(12),account varchar(255),count int(4),signature varchar(255),face char(2) default '1',experience int(8) default 0,rank char(12) default 'rm',reg_time datetime,last_time datetime);
#成员资料表 id 记录号 user 用户名 psw 密码 name 姓名 sex 性别 birth 生日 work 工作单位 ad 通讯地址 post 邮编 ph 电话 bp 传呼 email 电子信箱 oicq oicq  account 个人说明 signature 个人签名 face 头像 count 访问次数 experience 经验值 rank 等级 reg_time 注册时间 last_time 最后登录时间
create table bbs_online (user char(20),ip char(15),lasttime int(12),status int(2) default 0); 
#当前在线数据表 user 用户名 ip 登录ip地址 lasttime 最后登录时间 status 当前状态 默认为0，离线；1，环顾四方；2，查看短消息；3，论坛发贴；4，上传照片；5，聊天;6,查看信息
create table bbs_sms (id int(10),reciever_user char(20),send_user char(20),send_name char(20),time char(30),content text,isread char(1) default '0');
#站内短消息 id 记录号 reciever_user 接受人用户名 send_user 发送人用户名 send_name 发送人姓名 time 留言时间 content 留言内容 isread 是否已读 
create table bbs_photo (pic_id int(10),pic_kind char(8),up_user char(20),up_name char(20),pic_name varchar(30),pic_size int(8),pic_discribe varchar(255),pic_time datetime,hit int(8) default 1);
#上传照片数据表 pic_id 索引 pic_kind 类别：个人照片、班级照片、校园风光 up_user 上传人用户名 up_name 上传人姓名 pic_name 照片名称 pic_size 照片大小 pic_discribe 照片描述 pic_time 上传时间 hit 人气
create table bbs_remark (pic_id int(10),remark_user char(20),remark_name char(20),remark_time datetime,content text);
#照片评论数据表 pic_id 索引 remark_user 评论人用户名 remark_name 评论人姓名 remark_time 评论时间 content 评论内容 
create table bbs_class_forum (forumid int(3) primary key,forum_name varchar(30),master varchar(255));
#论坛列表 forumid 论坛板块索引 forum_name 论坛板块名称 master 论坛版主
create table bbs_forum_subject (subjectid int(10) primary key,forumid int(3),title varchar(255),text_number int(6),poster_user char(20),poster_name char(20),last_user char(20),last_name char(20),lasttime datetime,hit int(6) default 0,reply int(4) default 0,high_light int(1) default 0);
#主题列表 subjectid 主题记录号 forumid 论坛板块索引  title 帖子标题 text_number 内容字数 poster_user 发贴人用户名 poster_name 发贴人姓名 last_user 最后发贴人用户名 last_name 最后发贴人姓名 lasttime 最后发贴时间 hit 点击次数,默认为0 reply 回复帖子数目,默认为0 high_light 精品，默认为0，精品为1 
create table bbs_forum_thread (threadid int(10) primary key,forumid int(3),subjectid int(10),title varchar(255),content text,poster_user char(20),poster_name char(20),posttime datetime,ip char(16),link varchar(100),flower int(5) default 0,egg int(5) default 0);
#论坛帖子 threadid 帖子记录号 forumid 论坛板块索引 subjectid 主题序号 title 帖子标题  content 帖子内容 poster_user 发贴人用户名 poster_name 发贴人姓名 posttime 发贴时间 ip 发贴人ip link 链接地址  flower 鲜花数目，默认为0 egg 臭鸡蛋数目，默认为0 
create table bbs_visit (visit_id int(10) primary key,visit_user char(20),visit_name char(20),visit_ip char(16),visit_time datetime);
#访客数据表 visit_id 记录号 visit_user 访客用户名 visit_name 访客姓名 visit_ip ip visit_time 访问时间
create table bbs_chatinfo (chat_id int(10),secret int(1) default 0,secret_send char(20),secret_receive char(20),chat_content text,chat_time datetime);
#聊天信息数据库 chat_id 记录号 secret 密谈，默认为0,密谈时为1 secret_user 接受密谈者用户名 chat_content 聊天内容 chat_time 发言时间 
create table bbs_emote (emote_id int(4) primary key,emote_name varchar(18),emote_content varchar(250));
#动作数据表 emote_id 记录号 emote_name 动作名称 emote_content 动作内容
#以下为添加动作到emote数据表
insert into bbs_emote (emote_id,emote_name,emote_content) values (1,'红包','%%%%很慷慨地递给****一个大红包，****一打开，里面孤零零一个钢蹦。'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (2,'2','%%%%春风满面地对****说：****新春快乐，给您拜年啦！');  
insert into bbs_emote (emote_id,emote_name,emote_content) values (3,'惊讶','%%%%吃惊地看着****，嘴巴张大得足以塞进一个鸡腿汉堡。'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (4,'同意','%%%%完全同意****的看法。'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (5,'鼓掌','%%%%对****鼓掌赞许！'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (6,'生日','%%%%和在场的人一起向****致以衷心的祝福，祝****生日快乐，大家一起唱：祝你生日快乐，祝你生日快乐．．');
insert into bbs_emote (emote_id,emote_name,emote_content) values (7,'头来了','%%%%对着****惊呼：头来了 !开溜）-（-）-（-）'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (8,'道别','其时明月在天，清风吹叶，树巅乌鸦呀啊而鸣，%%%%再也忍耐不住，望着****的背影，泪珠夺眶而出。'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (9,'天气真好','%%%%朝着****一抱拳，说道：哈哈哈，这个，今天，... 这个天气真好！'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (10,'安慰','%%%%安慰****道：别怕，面包会有的，什么都会有的！'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (11,'不知道','%%%%问****:你说什麽我不懂耶...');  
insert into bbs_emote (emote_id,emote_name,emote_content) values (12,'昏','%%%%被****气得昏了过去。'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (13,'原谅','%%%%终于原谅了****，****激动地要请大家的客。算了吧，就那点钱．．．'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (14,'知音','%%%%感叹道：****真是我的知音啊！'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (15,'goodbye','%%%%凄婉地说道：世上没有不散的宴席，我先走一步了，大家保重。'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (16,'打招呼','%%%%愉快地跟****打招呼：吃了吗？'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (17,'摇头','%%%%对著****猛摇头：孺子不可教也！'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (18,'委曲','%%%%的眼中充满泪水，无辜的望著****。'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (19,'跳','%%%%高兴地拉起****的小手跳起老高，在空中停了好一会才掉下来。'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (20,'踢','%%%%一脚把****踢出门外：你真不受欢迎！'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (21,'吻','%%%%轻轻地亲了****一下，好深情呦．．．．．．'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (22,'慢','%%%%挥动双手大叫道「哇... ****,慢得跟蜗牛似的.... 快啊....HURRY UP...'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (23,'大笑','%%%%指著****的鼻子讥笑。'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (24,'化妆','%%%%翻箱倒柜拿出脂粉、眉笔、口红，准备化妆。'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (25,'恶心','%%%%突然觉得一阵恶心，对****喊道：拜托拜托，我都起鸡皮疙瘩了。'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (26,'无奈','%%%%看著****，很无奈地耸了耸肩。'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (27,'害羞','%%%%刮着****的鼻子说：不羞，不羞．．．．'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (28,'唱歌','%%%%对****含情脉脉地唱起歌来! 「我能想到最浪漫的事，就是和你一起慢慢变老....');
insert into bbs_emote (emote_id,emote_name,emote_content) values (29,'有事','%%%%对****说:“我现在有事，等会儿再来！”'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (30,'看','%%%%用很奇怪的眼神瞄****。'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (31,'茶','%%%%端出一杯热茶，笑嘻嘻地对****说：来，渴了吧，喝杯热茶暖暖再说。'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (32,'道谢','%%%%由衷地向****道谢。'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (33,'想',' %%%%开始考虑要杀了****。');
insert into bbs_emote (emote_id,emote_name,emote_content) values (34,'反对','%%%%向****摇摇食指，「小朋友，这样不可以喔！」');
insert into bbs_emote (emote_id,emote_name,emote_content) values (35,'清醒','%%%%摇著****试著把****叫醒。大声在****耳边大叫：猪！起来了！');
insert into bbs_emote (emote_id,emote_name,emote_content) values (36,'挥手','%%%%对著****挥了挥手。');
insert into bbs_emote (emote_id,emote_name,emote_content) values (37,'欢迎','%%%%左手拼命挥动着小旗，右手拿着扩音器，语音哽咽地对****喊到：欢迎，欢迎，热烈欢迎！'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (38,'玫瑰','%%%%突然从身后拿出一朵玫瑰献给 的心上人****。');
insert into bbs_emote (emote_id,emote_name,emote_content) values (39,'闪电','%%%%从天上召来一道闪电把****化为一堆灰烬。');
insert into bbs_emote (emote_id,emote_name,emote_content) values (40,'困','%%%%轻轻地拍着****,唱道：睡吧，睡吧...');