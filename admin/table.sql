create table bbs_class_member (id char(2),user char(20) UNIQUE,psw char(20),name char(20),sex char(2),birth char(10),work varchar(50),ad varchar(50),post char(6),ph varchar(30),bp varchar(20),email varchar(35),oicq char(12),account varchar(255),count int(4),signature varchar(255),face char(2) default '1',experience int(8) default 0,rank char(12) default 'rm',reg_time datetime,last_time datetime);
#��Ա���ϱ� id ��¼�� user �û��� psw ���� name ���� sex �Ա� birth ���� work ������λ ad ͨѶ��ַ post �ʱ� ph �绰 bp ���� email �������� oicq oicq  account ����˵�� signature ����ǩ�� face ͷ�� count ���ʴ��� experience ����ֵ rank �ȼ� reg_time ע��ʱ�� last_time ����¼ʱ��
create table bbs_online (user char(20),ip char(15),lasttime int(12),status int(2) default 0); 
#��ǰ�������ݱ� user �û��� ip ��¼ip��ַ lasttime ����¼ʱ�� status ��ǰ״̬ Ĭ��Ϊ0�����ߣ�1�������ķ���2���鿴����Ϣ��3����̳������4���ϴ���Ƭ��5������;6,�鿴��Ϣ
create table bbs_sms (id int(10),reciever_user char(20),send_user char(20),send_name char(20),time char(30),content text,isread char(1) default '0');
#վ�ڶ���Ϣ id ��¼�� reciever_user �������û��� send_user �������û��� send_name ���������� time ����ʱ�� content �������� isread �Ƿ��Ѷ� 
create table bbs_photo (pic_id int(10),pic_kind char(8),up_user char(20),up_name char(20),pic_name varchar(30),pic_size int(8),pic_discribe varchar(255),pic_time datetime,hit int(8) default 1);
#�ϴ���Ƭ���ݱ� pic_id ���� pic_kind ��𣺸�����Ƭ���༶��Ƭ��У԰��� up_user �ϴ����û��� up_name �ϴ������� pic_name ��Ƭ���� pic_size ��Ƭ��С pic_discribe ��Ƭ���� pic_time �ϴ�ʱ�� hit ����
create table bbs_remark (pic_id int(10),remark_user char(20),remark_name char(20),remark_time datetime,content text);
#��Ƭ�������ݱ� pic_id ���� remark_user �������û��� remark_name ���������� remark_time ����ʱ�� content �������� 
create table bbs_class_forum (forumid int(3) primary key,forum_name varchar(30),master varchar(255));
#��̳�б� forumid ��̳������� forum_name ��̳������� master ��̳����
create table bbs_forum_subject (subjectid int(10) primary key,forumid int(3),title varchar(255),text_number int(6),poster_user char(20),poster_name char(20),last_user char(20),last_name char(20),lasttime datetime,hit int(6) default 0,reply int(4) default 0,high_light int(1) default 0);
#�����б� subjectid �����¼�� forumid ��̳�������  title ���ӱ��� text_number �������� poster_user �������û��� poster_name ���������� last_user ��������û��� last_name ����������� lasttime �����ʱ�� hit �������,Ĭ��Ϊ0 reply �ظ�������Ŀ,Ĭ��Ϊ0 high_light ��Ʒ��Ĭ��Ϊ0����ƷΪ1 
create table bbs_forum_thread (threadid int(10) primary key,forumid int(3),subjectid int(10),title varchar(255),content text,poster_user char(20),poster_name char(20),posttime datetime,ip char(16),link varchar(100),flower int(5) default 0,egg int(5) default 0);
#��̳���� threadid ���Ӽ�¼�� forumid ��̳������� subjectid ������� title ���ӱ���  content �������� poster_user �������û��� poster_name ���������� posttime ����ʱ�� ip ������ip link ���ӵ�ַ  flower �ʻ���Ŀ��Ĭ��Ϊ0 egg ��������Ŀ��Ĭ��Ϊ0 
create table bbs_visit (visit_id int(10) primary key,visit_user char(20),visit_name char(20),visit_ip char(16),visit_time datetime);
#�ÿ����ݱ� visit_id ��¼�� visit_user �ÿ��û��� visit_name �ÿ����� visit_ip ip visit_time ����ʱ��
create table bbs_chatinfo (chat_id int(10),secret int(1) default 0,secret_send char(20),secret_receive char(20),chat_content text,chat_time datetime);
#������Ϣ���ݿ� chat_id ��¼�� secret ��̸��Ĭ��Ϊ0,��̸ʱΪ1 secret_user ������̸���û��� chat_content �������� chat_time ����ʱ�� 
create table bbs_emote (emote_id int(4) primary key,emote_name varchar(18),emote_content varchar(250));
#�������ݱ� emote_id ��¼�� emote_name �������� emote_content ��������
#����Ϊ��Ӷ�����emote���ݱ�
insert into bbs_emote (emote_id,emote_name,emote_content) values (1,'���','%%%%�ܿ����صݸ�****һ��������****һ�򿪣����������һ���ֱġ�'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (2,'2','%%%%��������ض�****˵��****�´����֣�������������');  
insert into bbs_emote (emote_id,emote_name,emote_content) values (3,'����','%%%%�Ծ��ؿ���****������Ŵ����������һ�����Ⱥ�����'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (4,'ͬ��','%%%%��ȫͬ��****�Ŀ�����'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (5,'����','%%%%��****��������'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (6,'����','%%%%���ڳ�����һ����****�������ĵ�ף����ף****���տ��֣����һ�𳪣�ף�����տ��֣�ף�����տ��֣���');
insert into bbs_emote (emote_id,emote_name,emote_content) values (7,'ͷ����','%%%%����****������ͷ���� !���-��-��-��-��'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (8,'����','��ʱ�������죬��紵Ҷ��������ѻѽ��������%%%%��Ҳ���Ͳ�ס������****�ı�Ӱ��������������'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (9,'�������','%%%%����****һ��ȭ��˵��������������������죬... ���������ã�'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (10,'��ο','%%%%��ο****�������£�������еģ�ʲô�����еģ�'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (11,'��֪��','%%%%��****:��˵ʲ���Ҳ���Ү...');  
insert into bbs_emote (emote_id,emote_name,emote_content) values (12,'��','%%%%��****���û��˹�ȥ��'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (13,'ԭ��','%%%%����ԭ����****��****������Ҫ���ҵĿ͡����˰ɣ����ǵ�Ǯ������'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (14,'֪��','%%%%��̾����****�����ҵ�֪������'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (15,'goodbye','%%%%�����˵��������û�в�ɢ����ϯ��������һ���ˣ���ұ��ء�'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (16,'���к�','%%%%���ظ�****���к���������'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (17,'ҡͷ','%%%%����****��ҡͷ�����Ӳ��ɽ�Ҳ��'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (18,'ί��','%%%%�����г�����ˮ���޹�������****��'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (19,'��','%%%%���˵�����****��С�������ϸߣ��ڿ���ͣ�˺�һ��ŵ�������'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (20,'��','%%%%һ�Ű�****�߳����⣺���治�ܻ�ӭ��'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (21,'��','%%%%���������****һ�£��������ϣ�����������'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (22,'��','%%%%�Ӷ�˫�ִ�е�����... ****,���ø���ţ�Ƶ�.... �찡....HURRY UP...'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (23,'��Ц','%%%%ָ��****�ı��Ӽ�Ц��'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (24,'��ױ','%%%%���䵹���ó�֬�ۡ�ü�ʡ��ں죬׼����ױ��'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (25,'����','%%%%ͻȻ����һ����ģ���****���������а��У��Ҷ���Ƥ����ˡ�'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (26,'����','%%%%����****�������ε������ʼ硣'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (27,'����','%%%%����****�ı���˵�����ߣ����ߣ�������'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (28,'����','%%%%��****���������س������! �������뵽���������£����Ǻ���һ����������....');
insert into bbs_emote (emote_id,emote_name,emote_content) values (29,'����','%%%%��****˵:�����������£��Ȼ����������'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (30,'��','%%%%�ú���ֵ�������****��'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (31,'��','%%%%�˳�һ���Ȳ裬Ц�����ض�****˵���������˰ɣ��ȱ��Ȳ�ůů��˵��'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (32,'��л','%%%%���Ե���****��л��'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (33,'��',' %%%%��ʼ����Ҫɱ��****��');
insert into bbs_emote (emote_id,emote_name,emote_content) values (34,'����','%%%%��****ҡҡʳָ����С���ѣ�����������ร���');
insert into bbs_emote (emote_id,emote_name,emote_content) values (35,'����','%%%%ҡ��****������****���ѡ�������****���ߴ�У��������ˣ�');
insert into bbs_emote (emote_id,emote_name,emote_content) values (36,'����','%%%%����****���˻��֡�');
insert into bbs_emote (emote_id,emote_name,emote_content) values (37,'��ӭ','%%%%����ƴ���Ӷ���С�죬�����������������������ʵض�****��������ӭ����ӭ�����һ�ӭ��'); 
insert into bbs_emote (emote_id,emote_name,emote_content) values (38,'õ��','%%%%ͻȻ������ó�һ��õ���׸� ��������****��');
insert into bbs_emote (emote_id,emote_name,emote_content) values (39,'����','%%%%����������һ�������****��Ϊһ�ѻҽ���');
insert into bbs_emote (emote_id,emote_name,emote_content) values (40,'��','%%%%���������****,������˯�ɣ�˯��...');