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
   CATALOG_ID           INT NOT NULL AUTO_INCREMENT COMMENT '���',
   NAME                 VARCHAR(50) COMMENT '��������',
   PRIMARY KEY (CATALOG_ID)
) DEFAULT CHARSET=utf8;

/*==============================================================*/
/* Table: BLOGS                                                 */
/*==============================================================*/
CREATE TABLE T_BLOGS
(
   BLOG_ID              INT NOT NULL AUTO_INCREMENT COMMENT '���',
   CATALOG_ID           INT COMMENT '��������',
   WRITER               INT COMMENT '����',
   TITLE                VARCHAR(100) COMMENT '����',
   CONTENT              TEXT COMMENT '����',
   ADD_TIME             DATETIME COMMENT '���ʱ��',
   CLICK_RATE           INT COMMENT '�����',
   PRIMARY KEY (BLOG_ID)
) DEFAULT CHARSET=utf8;



/*==============================================================*/
/* Table: COMMENTS                                              */
/*==============================================================*/
CREATE TABLE T_COMMENTS
(
   COMMENT_ID           INT NOT NULL AUTO_INCREMENT COMMENT '���',
   COMMENTATOR          INT COMMENT '������',
   BLOG_ID              INT COMMENT '���۲���',
   CONTENT              TEXT COMMENT '��������',
   ADD_TIME             DATETIME COMMENT '����ʱ��',
   PRIMARY KEY (COMMENT_ID)
) DEFAULT CHARSET=utf8;


/*==============================================================*/
/* Table: MESSAGES                                              */
/*==============================================================*/
CREATE TABLE T_MESSAGES
(
   MSG_ID               INT NOT NULL AUTO_INCREMENT COMMENT '���',
   REPLY_ID             INT COMMENT '�ظ����',
   SENDER               INT COMMENT '������',
   RECEIVER             INT COMMENT '���Զ���',
   CONTENT              TEXT COMMENT '��������',
   ADD_TIME             DATETIME COMMENT '����ʱ��',
   PRIMARY KEY (MSG_ID)
) DEFAULT CHARSET=utf8;

/*==============================================================*/
/* Table: USERS                                                 */
/*==============================================================*/
CREATE TABLE T_USERS
(
   USER_ID              INT NOT NULL AUTO_INCREMENT COMMENT '���',
   ACCOUNT              VARCHAR(50) COMMENT '��¼�ʺ�',
   PASSWORD             VARCHAR(20) COMMENT '��¼����',
   NAME                 VARCHAR(50) COMMENT '����',
   GENDER               VARCHAR(2) COMMENT '�Ա�',
   BIRTHDAY             VARCHAR(20) COMMENT '����',
   PROVINCE             VARCHAR(20) COMMENT '��ס����',
   CITY                 VARCHAR(20) COMMENT '��ס����',
   SIGNATURE            VARCHAR(200) COMMENT '����ǩ��',
   IMG                  VARCHAR(100) COMMENT '����ͷ��',
   MOOD                 VARCHAR(100) COMMENT '�ҵ�����',
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

