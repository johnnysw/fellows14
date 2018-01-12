/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2012/2/15 22:13:49                           */
/*==============================================================*/
SET NAMES utf8;

DROP TABLE IF EXISTS T_BLOG_CATALOGS;

DROP TABLE IF EXISTS T_BLOGS;

DROP TABLE IF EXISTS T_COMMENTS;

DROP TABLE IF EXISTS T_MESSAGES;

DROP TABLE IF EXISTS T_USERS;

/*==============================================================*/
/* Table: BLOG_CATALOGS                                         */
/*==============================================================*/
CREATE TABLE T_BLOG_CATALOGS
(
   CATALOG_ID           INT NOT NULL AUTO_INCREMENT COMMENT '编号',
   NAME                 VARCHAR(50) COMMENT '分类名称',
   PRIMARY KEY (CATALOG_ID)
) DEFAULT CHARSET=utf8;

/*==============================================================*/
/* Table: BLOGS                                                 */
/*==============================================================*/
CREATE TABLE T_BLOGS
(
   BLOG_ID              INT NOT NULL AUTO_INCREMENT COMMENT '编号',
   CATALOG_ID           INT COMMENT '所属分类',
   WRITER               INT COMMENT '作者',
   TITLE                VARCHAR(100) COMMENT '标题',
   CONTENT              TEXT COMMENT '内容',
   ADD_TIME             DATETIME COMMENT '添加时间',
   CLICK_RATE           INT COMMENT '点击率',
   PRIMARY KEY (BLOG_ID)
) DEFAULT CHARSET=utf8;



/*==============================================================*/
/* Table: COMMENTS                                              */
/*==============================================================*/
CREATE TABLE T_COMMENTS
(
   COMMENT_ID           INT NOT NULL AUTO_INCREMENT COMMENT '编号',
   COMMENTATOR          INT COMMENT '评论人',
   BLOG_ID              INT COMMENT '评论博客',
   CONTENT              TEXT COMMENT '评论内容',
   ADD_TIME             DATETIME COMMENT '评论时间',
   PRIMARY KEY (COMMENT_ID)
) DEFAULT CHARSET=utf8;


/*==============================================================*/
/* Table: MESSAGES                                              */
/*==============================================================*/
CREATE TABLE T_MESSAGES
(
   MSG_ID               INT NOT NULL AUTO_INCREMENT COMMENT '编号',
   REPLY_ID             INT COMMENT '回复编号',
   SENDER               INT COMMENT '留言人',
   RECEIVER             INT COMMENT '留言对象',
   CONTENT              TEXT COMMENT '留言内容',
   ADD_TIME             DATETIME COMMENT '留言时间',
   PRIMARY KEY (MSG_ID)
) DEFAULT CHARSET=utf8;

/*==============================================================*/
/* Table: USERS                                                 */
/*==============================================================*/
CREATE TABLE T_USERS
(
   USER_ID              INT NOT NULL AUTO_INCREMENT COMMENT '编号',
   ACCOUNT              VARCHAR(50) COMMENT '登录帐号',
   PASSWORD             VARCHAR(20) COMMENT '登录密码',
   NAME                 VARCHAR(50) COMMENT '姓名',
   GENDER               VARCHAR(2) COMMENT '性别',
   BIRTHDAY             VARCHAR(20) COMMENT '生日',
   PROVINCE             VARCHAR(20) COMMENT '居住地区',
   CITY                 VARCHAR(20) COMMENT '居住城市',
   SIGNATURE            VARCHAR(200) COMMENT '个性签名',
   IMG                  VARCHAR(100) COMMENT '个人头像',
   MOOD                 VARCHAR(100) COMMENT '我的心情',
   PRIMARY KEY (USER_ID)
) DEFAULT CHARSET=utf8;

ALTER TABLE T_BLOGS ADD CONSTRAINT FK_CATALOGS_BLOGS FOREIGN KEY (CATALOG_ID)
      REFERENCES T_BLOG_CATALOGS (CATALOG_ID) ON DELETE CASCADE ON UPDATE RESTRICT;

ALTER TABLE T_BLOGS ADD CONSTRAINT FK_USERS_BLOGS FOREIGN KEY (WRITER)
      REFERENCES T_USERS (USER_ID) ON DELETE CASCADE ON UPDATE RESTRICT;

ALTER TABLE T_COMMENTS ADD CONSTRAINT FK_BLOGS_COMMENTS FOREIGN KEY (BLOG_ID)
      REFERENCES T_BLOGS (BLOG_ID) ON DELETE CASCADE ON UPDATE RESTRICT;

ALTER TABLE T_COMMENTS ADD CONSTRAINT FK_USERS_COMMENTS FOREIGN KEY (COMMENTATOR)
      REFERENCES T_USERS (USER_ID) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE T_MESSAGES ADD CONSTRAINT FK_MESSAGES_REPLY FOREIGN KEY (REPLY_ID)
      REFERENCES T_MESSAGES (MSG_ID) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE T_MESSAGES ADD CONSTRAINT FK_USERS_RECEIVE_MESSAGES FOREIGN KEY (RECEIVER)
      REFERENCES T_USERS (USER_ID) ON DELETE CASCADE ON UPDATE RESTRICT;

ALTER TABLE T_MESSAGES ADD CONSTRAINT FK_USERS_SEND_MESSAGES FOREIGN KEY (SENDER)
      REFERENCES T_USERS (USER_ID) ON DELETE CASCADE ON UPDATE RESTRICT;

