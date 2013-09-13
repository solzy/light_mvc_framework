
--Database backup
--Count 16 tables
--Date:2013-01-231358945792
--From:大连工业大学网络期刊

DROP TABLE admininfo;

CREATE TABLE `admininfo` (
  `adusername` varchar(10) CHARACTER SET utf8 NOT NULL COMMENT '用户名',
  `typeid` char(2) CHARACTER SET utf8 NOT NULL COMMENT '用户类别编号',
  `name` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT '姓名',
  `password` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT '用户密码',
  `sex` char(2) CHARACTER SET utf8 NOT NULL COMMENT '性别',
  `tel` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '电话',
  `mail` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT '邮箱',
  `address` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT '地址',
  `remark` tinyint(1) DEFAULT '1' COMMENT '备注',
  PRIMARY KEY (`adusername`),
  KEY `typeid` (`typeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='管理员信息表';




DROP TABLE bulletin;

CREATE TABLE `bulletin` (
  `bulletinid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',
  `subject` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '主题',
  `content` text CHARACTER SET utf8 COMMENT '内容',
  `edusername` varchar(10) CHARACTER SET utf8 DEFAULT NULL COMMENT '编辑用户名',
  `date` date DEFAULT NULL COMMENT '日期',
  `remark` tinyint(1) DEFAULT '1' COMMENT '备注',
  PRIMARY KEY (`bulletinid`),
  KEY `edusername` (`edusername`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='公告表';

INSERT INTO `bulletin` VALUES("3","sdf","    @charset \"utf-8\";\n/* CSS Document */\n\nbody{ margin:0px; padding:0px; font-size:12px; font-family:\"宋体\"; color:white; background:url(../images/000.jpg)}\n*{ margin:0px; padding:0px;}\ndiv,ul,ol,li,p,h1,h2,h3,h4,h5,h6,input,select,textarea,form,a{ margin:0px; padding:0px;}\nul,ol,li{ list-style:none;}\na{ text-decoration:none; color:#333;}\na:hover{ text-decoration:underline;}\nimg{ border:none;}\n.clear{ clear:both;}\n\n.container{ width:961px; margin:0px auto; padding:0px; background:#FFF;}\n.header{ width:960px; height:96px; background:url(../images/header.jpg) no-repeat; border-top:1px solid #FFF;}\n.logo{ width:200px; height:53px; margin:100px 0px 0px 55px;}\n.nav{ width:962px; height:34px; line-height:34px; margin:0px 0px; background:url(../images/navbg.jpg) no-repeat; font-size:13px;}\n.nav ul{ margin-left:20px; _margin-left:10px;}\n.nav ul li{ float:left;}\n.nav ul li a{ color:white; font-weight:bold; width:100px; height:34px; display:block; text-align:center; border-right:#DDD solid 1px;}\n.nav ul li a:hover{ background:url(../images/navbg_now.jpg) repeat-x; text-decoration:none; color:#FFF;}\n.content{ width:962px;}\n.left{ width:250px; float:left;}\n.ad1{ width:216px; height:105px; background:#C69; margin-bottom:10px; text-align:center;}\n.part1{ width:250px; background:url(../images/title1.gif) no-repeat; position:relative; margin-bottom:10px;}\n.part1 h3{ width:216px; height:31px; line-height:31px; font-size:14px; text-indent:30px; color:white;}\n.part1 h6{ width:186px; height:273px; padding:10px 15px; overflow:hidden; font-weight:normal; font-size:12px;}\n.part1 p{ width:186px; line-height:20px; overflow:hidden;}\n.part1 em{ width:216px; height:6px; background:url(../images/title1.gif) 0px -420px no-repeat; position:absolute; bottom:0px; left:0px; font-size:0px; line-height:0px;}\n.part1 ul{ width:186px; padding:15px; line-height:25px;}\n.part1 ul li{ background:url(../images/arrow1.jpg) 0px 9px no-repeat; text-indent:15px;}\n.part1 ul li a{}\n.site_search{ width:156px; height:80px; overflow:hidden; padding:15px 30px; line-height:20px;}\n.site_search select{ margin-bottom:5px;}\n.site_search input{ margin-bottom:5px;}\n.daohang{ width:216px; margin-bottom:5px;}    ","currentUse","2012-12-09","1");
INSERT INTO `bulletin` VALUES("4","com","    Bit Twiddling Hacks\n\nBy Sean Eron Anderson\nseander@cs.stanford.edu\n\nIndividually, the code snippets here are in the public domain (unless otherwise noted) — feel free to use them however you please. The aggregate collection and descriptions are © 1997-2005 Sean Eron Anderson. The code and descriptions are distributed in the hope that they will be useful, but WITHOUT ANY WARRANTY and without even the implied warranty of merchantability or fitness for a particular purpose. As of May 5, 2005, all the code has been tested thoroughly. Thousands of people have read it. Moreover, Professor Randal Bryant, the Dean of Computer Science at Carnegie Mellon University, has personally tested almost everything with his Uclid code verification system. What he hasn\'t tested, I have checked against all possible inputs on a 32-bit machine. To the first person to inform me of a legitimate bug in the code, I\'ll pay a bounty of US$10 (by check or Paypal). If directed to a charity, I\'ll pay US$20.\nContents","currentUse","2012-12-09","1");



DROP TABLE editorinfo;

CREATE TABLE `editorinfo` (
  `edusername` varchar(10) CHARACTER SET utf8 NOT NULL COMMENT '用户名',
  `typeid` char(2) CHARACTER SET utf8 NOT NULL COMMENT '用户类别编号',
  `name` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT '姓名',
  `password` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT '用户密码',
  `sex` char(2) CHARACTER SET utf8 NOT NULL COMMENT '性别',
  `tel` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '电话',
  `mail` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT '邮箱',
  `address` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT '地址',
  `remark` tinyint(1) DEFAULT '1' COMMENT '备注',
  PRIMARY KEY (`edusername`),
  KEY `typeid` (`typeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='编辑信息表';

INSERT INTO `editorinfo` VALUES("ed","2","普通编辑","e10adc3949ba59abbe56e057f20f883e","女","13443543534","sfsdfdsfsssdfsd","sdfds","0");
INSERT INTO `editorinfo` VALUES("ed1","2","普通编辑","e10adc3949ba59abbe56e057f20f883e","女","13443543534","ddd@gmail.com","大连","1");
INSERT INTO `editorinfo` VALUES("ed3","2","修改","e10adc3949ba59abbe56e057f20f883e","男","13443543534","ddd@gmail.com","大连","1");
INSERT INTO `editorinfo` VALUES("ed4","2","普通编辑","670b14728ad9902aecba32e22fa4f6bd","女","13591200000","soster@gmail.com"," 大连","1");
INSERT INTO `editorinfo` VALUES("ed5","2","普通编辑","e10adc3949ba59abbe56e057f20f883e","女","13443543534","ddd@gmail.com","大连","1");
INSERT INTO `editorinfo` VALUES("ed6","2","普通编辑","e10adc3949ba59abbe56e057f20f883e","女","13443543534","ddd@gmail.com","大连","1");
INSERT INTO `editorinfo` VALUES("ed8","2","普通编辑","e10adc3949ba59abbe56e057f20f883e","女","13443543534","ddd@gmail.com","大连","1");
INSERT INTO `editorinfo` VALUES("ed9","2","普通编辑","e10adc3949ba59abbe56e057f20f883e","女","13443543534","ddd@gmail.com","大连","1");
INSERT INTO `editorinfo` VALUES("eda","2","普通编辑","e10adc3949ba59abbe56e057f20f883e","女","13443543534","ddd@gmail.com","大连","1");
INSERT INTO `editorinfo` VALUES("edb","2","普通编辑","e10adc3949ba59abbe56e057f20f883e","女","13443543534","ddd@gmail.com","大连","1");
INSERT INTO `editorinfo` VALUES("edc","2","普通编辑","e10adc3949ba59abbe56e057f20f883e","女","13443543534","ddd@gmail.com","大连","1");
INSERT INTO `editorinfo` VALUES("edd","2","普通编辑","e10adc3949ba59abbe56e057f20f883e","女","13443543534","ddd@gmail.com","大连","1");
INSERT INTO `editorinfo` VALUES("ede","2","张三","e10adc3949ba59abbe56e057f20f883e","女","13443543534","ddd@gmail.com","大连","1");
INSERT INTO `editorinfo` VALUES("editor","4","编辑","e10adc3949ba59abbe56e057f20f883e","男","13591224324","sssssssr@gmail.com","大连","1");
INSERT INTO `editorinfo` VALUES("editor1","4","副编辑","e10adc3949ba59abbe56e057f20f883e","男","13591224324","sssssssr@gmail.com","北京","1");
INSERT INTO `editorinfo` VALUES("readminist","2","添加","e10adc3949ba59abbe56e057f20f883e","男","13591200000","sssssssr@gmail.com","dsfsfds","1");



DROP TABLE expertinfo;

CREATE TABLE `expertinfo` (
  `exusername` varchar(10) CHARACTER SET utf8 NOT NULL COMMENT '用户名',
  `typeid` char(2) CHARACTER SET utf8 NOT NULL COMMENT '用户类别编号',
  `name` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT '姓名',
  `password` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT '用户密码',
  `fieldid` char(3) CHARACTER SET utf8 NOT NULL COMMENT '所属领域编号',
  `majorid` char(7) CHARACTER SET utf8 NOT NULL COMMENT '所属专业编号',
  `schoolid` char(5) CHARACTER SET utf8 NOT NULL COMMENT '所属学院编号',
  `sex` char(2) CHARACTER SET utf8 NOT NULL COMMENT '性别',
  `tel` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '电话',
  `mail` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT '邮箱',
  `address` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT '地址',
  `remark` tinyint(1) DEFAULT '1' COMMENT '备注',
  PRIMARY KEY (`exusername`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='专家信息表';

INSERT INTO `expertinfo` VALUES("admin","3","专家一","e10adc3949ba59abbe56e057f20f883e","2","100101","1001","男","13591224324","soster@gmail.com","大连","0");
INSERT INTO `expertinfo` VALUES("admin2","3","普通","e10adc3949ba59abbe56e057f20f883e","1","100301","1003","男","13591200000","sssssssr@gmail.com","dsfsfds","1");
INSERT INTO `expertinfo` VALUES("adminhh","3","普通","e10adc3949ba59abbe56e057f20f883e","1","100601","1006","男","13591200000","sssssssr@gmail.com","aaaaaaaaaaa","1");
INSERT INTO `expertinfo` VALUES("adminq","3","张三","e10adc3949ba59abbe56e057f20f883e","1","100801","1008","男","13591224324","sssssssr@gmail.com","aaaaaaaaaaa","1");
INSERT INTO `expertinfo` VALUES("expert","3","专家","e10adc3949ba59abbe56e057f20f883e","1","100301","1003","女","13591200000","sssssssr@gmail.com","大连","1");
INSERT INTO `expertinfo` VALUES("hhrewq","3","普通","e10adc3949ba59abbe56e057f20f883e","1","100901","1009","男","13591200000","sssssssr@gmail.com","fdgdfgdfgdf","1");
INSERT INTO `expertinfo` VALUES("itatz","3","我啊","e10adc3949ba59abbe56e057f20f883e","1","100501","1005","男","13591224324","sssssssr@gmail.com","大连","1");
INSERT INTO `expertinfo` VALUES("readminist","3","李四","e10adc3949ba59abbe56e057f20f883e","1","100102","1001","男","13591224324","soster@gmail.com"," 大连","1");
INSERT INTO `expertinfo` VALUES("root11","3","张三","e10adc3949ba59abbe56e057f20f883e","2","100101","1001","男","13591200000","sssssssr@gmail.com","dfgdf","1");
INSERT INTO `expertinfo` VALUES("root111","3","修改","e10adc3949ba59abbe56e057f20f883e","1","100401","1004","男","13591224324","cloud.poster@gmail.com","dfsfsdfsdfds","1");
INSERT INTO `expertinfo` VALUES("root1111","3","到沙","e10adc3949ba59abbe56e057f20f883e","1","100901","1009","男","13591224324","sssssssr@gmail.com","r","1");
INSERT INTO `expertinfo` VALUES("root11f","3","李四","e10adc3949ba59abbe56e057f20f883e","1","100302","1003","男","13591224324","sssssssr@gmail.com","大连","1");
INSERT INTO `expertinfo` VALUES("root11fff","3","我啊","e10adc3949ba59abbe56e057f20f883e","1","100301","1003","男","13591200000","sssssssr@gmail.com","大连","1");
INSERT INTO `expertinfo` VALUES("root11mm","3","我啊","e10adc3949ba59abbe56e057f20f883e","1","100401","1004","男","13591224324","cloud.poster@gmail.com","dsfsfds","1");
INSERT INTO `expertinfo` VALUES("root11ss","3","普通","e10adc3949ba59abbe56e057f20f883e","2","100801","1008","男","13591224324","sssssssr@gmail.com","dsfsfds","1");
INSERT INTO `expertinfo` VALUES("root11sse","3","普通","e10adc3949ba59abbe56e057f20f883e","2","100601","1006","男","13591224324","sssssssr@gmail.com","大连","1");
INSERT INTO `expertinfo` VALUES("root11sss","3","我啊","e10adc3949ba59abbe56e057f20f883e","1","100801","1008","女","13591224324","soster@gmail.com","fdgdfgdfgdf","0");
INSERT INTO `expertinfo` VALUES("root11t","3","普通","e10adc3949ba59abbe56e057f20f883e","1","100501","1005","男","13591224324","cloud.poster@gmail.com","大连","1");
INSERT INTO `expertinfo` VALUES("rootr","3","我啊","e10adc3949ba59abbe56e057f20f883e","1","100401","1004","男","13591224324","sssssssr@gmail.com","dsfsfds","0");



DROP TABLE fieldinfo;

CREATE TABLE `fieldinfo` (
  `fieldid` char(3) CHARACTER SET utf8 NOT NULL COMMENT '领域编号',
  `fieldname` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '领域名称',
  `remark` tinyint(1) DEFAULT '1' COMMENT '备注',
  PRIMARY KEY (`fieldid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='领域信息表';

INSERT INTO `fieldinfo` VALUES("1","计算机","1");
INSERT INTO `fieldinfo` VALUES("2","生物","1");
INSERT INTO `fieldinfo` VALUES("3","NO生物","1");



DROP TABLE fundinfo;

CREATE TABLE `fundinfo` (
  `fundid` char(3) CHARACTER SET utf8 NOT NULL COMMENT '基金编号',
  `fundname` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '基金名称',
  `fundcategory` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '基金种类',
  `remark` tinyint(1) DEFAULT '1' COMMENT '备注',
  PRIMARY KEY (`fundid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='基金信息表';

INSERT INTO `fundinfo` VALUES("1","基金","s","0");
INSERT INTO `fundinfo` VALUES("201","15","","1");
INSERT INTO `fundinfo` VALUES("333","qqq","wwwwwwwww","0");
INSERT INTO `fundinfo` VALUES("344","ff","fhghhhh","1");
INSERT INTO `fundinfo` VALUES("666","modify","dsfsd","1");



DROP TABLE issueinfo;

CREATE TABLE `issueinfo` (
  `issueid` int(4) unsigned NOT NULL AUTO_INCREMENT COMMENT '刊期号',
  `year` varchar(4) COLLATE utf8_bin DEFAULT NULL COMMENT '年',
  `pmount` int(3) NOT NULL COMMENT '文章数',
  `remark` tinyint(1) DEFAULT '1' COMMENT '备注',
  PRIMARY KEY (`issueid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='期刊表';

INSERT INTO `issueinfo` VALUES("1","2012","10","1");
INSERT INTO `issueinfo` VALUES("2","2011","20","1");
INSERT INTO `issueinfo` VALUES("3","2013","15","1");
INSERT INTO `issueinfo` VALUES("4","2014","11","1");
INSERT INTO `issueinfo` VALUES("5","2015","13","1");
INSERT INTO `issueinfo` VALUES("6","2015","50","1");
INSERT INTO `issueinfo` VALUES("7","2222","999","0");
INSERT INTO `issueinfo` VALUES("8","2222","333","0");



DROP TABLE majorinfo;

CREATE TABLE `majorinfo` (
  `majorid` char(7) CHARACTER SET utf8 NOT NULL COMMENT '专业编号',
  `majorname` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '专业名称',
  `schoolid` char(5) CHARACTER SET utf8 NOT NULL COMMENT '学院编号',
  `remark` tinyint(1) DEFAULT '1' COMMENT '备注',
  PRIMARY KEY (`majorid`),
  KEY `schoolid` (`schoolid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='专业信息表';

INSERT INTO `majorinfo` VALUES("100101","微生物","1001","1");
INSERT INTO `majorinfo` VALUES("100102","生物化工","1001","1");
INSERT INTO `majorinfo` VALUES("100103","制糖工程","1002","1");
INSERT INTO `majorinfo` VALUES("100104","发酵工程","1002","1");
INSERT INTO `majorinfo` VALUES("100201","食品科学与工程","1002","1");
INSERT INTO `majorinfo` VALUES("100301","化学工程与技术","1003","1");
INSERT INTO `majorinfo` VALUES("100302","轻工技术与工程","1003","1");
INSERT INTO `majorinfo` VALUES("100303","化学工程","1003","1");
INSERT INTO `majorinfo` VALUES("100304","环境科学与工程","1003","1");
INSERT INTO `majorinfo` VALUES("100401","材料科学与工程","1004","1");
INSERT INTO `majorinfo` VALUES("100402","纺织科学与工程","1004","1");
INSERT INTO `majorinfo` VALUES("100501","机械工程","1005","1");
INSERT INTO `majorinfo` VALUES("100502","化工过程机械","1005","1");
INSERT INTO `majorinfo` VALUES("100601","光学工程","1005","1");
INSERT INTO `majorinfo` VALUES("100602","控制科学与工程","1005","1");
INSERT INTO `majorinfo` VALUES("100701","美术学","1007","1");
INSERT INTO `majorinfo` VALUES("100702","设计学","1007","1");
INSERT INTO `majorinfo` VALUES("100801","纺织科学与工程","1008","1");
INSERT INTO `majorinfo` VALUES("100901","工商管理","1009","1");
INSERT INTO `majorinfo` VALUES("999999","TEST","1001","1");



DROP TABLE paperattachment;

CREATE TABLE `paperattachment` (
  `attachmentid` char(12) CHARACTER SET utf8 NOT NULL COMMENT '论文附件编号',
  `originalname` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '原文件名',
  `targetname` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '目标文件名',
  `paperid` char(12) CHARACTER SET utf8 NOT NULL COMMENT '论文编号',
  `remark` tinyint(1) DEFAULT '1' COMMENT '备注',
  PRIMARY KEY (`attachmentid`,`paperid`),
  KEY `paperid` (`paperid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='论文附件表';

INSERT INTO `paperattachment` VALUES("1","test.pdf","201301020001.pdf","201301020001","1");
INSERT INTO `paperattachment` VALUES("1","IPMD_2012__How_to_claim_PDUs_1153135.pdf","201301030001.pdf","201301030001","1");
INSERT INTO `paperattachment` VALUES("2","test.pdf","201301030001.pdf","201301030001","1");



DROP TABLE paperfee;

CREATE TABLE `paperfee` (
  `paperid` char(12) CHARACTER SET utf8 NOT NULL COMMENT '稿件编号',
  `exusername` varchar(10) CHARACTER SET utf8 DEFAULT NULL COMMENT '专家用户名',
  `fee` int(10) DEFAULT NULL COMMENT '费用',
  `date` date DEFAULT NULL COMMENT '付费日期',
  `remark` tinyint(1) DEFAULT '1' COMMENT '备注',
  PRIMARY KEY (`paperid`),
  KEY `paperid` (`paperid`),
  KEY `exusername` (`exusername`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='费用表';




DROP TABLE paperinfo;

CREATE TABLE `paperinfo` (
  `paperid` char(12) CHARACTER SET utf8 NOT NULL COMMENT '稿件编号',
  `cntitle` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '中文题目',
  `entitle` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT '英文题目',
  `cnabstract` text CHARACTER SET utf8 NOT NULL COMMENT '中文摘要',
  `enabstract` text CHARACTER SET utf8 NOT NULL COMMENT '英文摘要',
  `cnkey` varchar(60) CHARACTER SET utf8 NOT NULL COMMENT '中文关键字',
  `enkey` varchar(120) CHARACTER SET utf8 NOT NULL COMMENT '英文关键字',
  `schoolid` char(5) CHARACTER SET utf8 NOT NULL COMMENT '学院id',
  `majorid` char(7) CHARACTER SET utf8 NOT NULL COMMENT '专业id',
  `fieldid` char(3) CHARACTER SET utf8 NOT NULL COMMENT '领域编号',
  `firstauthor` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '第一作者',
  `secondauthor` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '第二作者',
  `fundid` char(3) CHARACTER SET utf8 NOT NULL COMMENT '基金id',
  `date` date NOT NULL COMMENT '投稿日期',
  `edusername` varchar(10) CHARACTER SET utf8 DEFAULT NULL COMMENT '编辑用户名',
  `exusername` varchar(10) CHARACTER SET utf8 DEFAULT NULL COMMENT '专家用户名',
  `issueid` char(3) CHARACTER SET utf8 DEFAULT NULL COMMENT '刊期号',
  `wusername` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '用户名',
  `statusid` char(1) CHARACTER SET utf8 NOT NULL COMMENT '稿件状态',
  `remark` tinyint(1) DEFAULT '1' COMMENT '备注',
  PRIMARY KEY (`paperid`),
  KEY `schoolid` (`schoolid`),
  KEY `majorid` (`majorid`),
  KEY `fieldid` (`fieldid`),
  KEY `fundid` (`fundid`),
  KEY `edusername` (`edusername`),
  KEY `exusername` (`exusername`),
  KEY `issueid` (`issueid`),
  KEY `wusername` (`wusername`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='稿件基本信息';

INSERT INTO `paperinfo` VALUES("201301030001","信息录入","d"," ddddddddd","ddddddddddddddd","dddddddddd","ddddddddddd","1002","100201","1","ss","sssssssssss","1","2013-01-03","","root1111","","admin","0","1");
INSERT INTO `paperinfo` VALUES("201301030002","信息录入","d"," ddddddddd","ddddddddddddddd","dddddddddd","ddddddddddd","1003","100201","1","ss","sssssssssss","1","2013-01-03","","readminist","","admin1","2","1");
INSERT INTO `paperinfo` VALUES("201301030003","信息录入","d"," ddddddddd","ddddddddddddddd","dddddddddd","ddddddddddd","1002","100202","2","ss222222","sssssssssss2","1","2013-01-03","","","","admin2","0","1");
INSERT INTO `paperinfo` VALUES("201301030004","信息录入","d"," ddddddddd","ddddddddddddddd","dddddddddd","ddddddddddd","1004","100201","1","ss222222","sssssssssss2","1","2013-01-03","","readminist","","admin2","2","1");
INSERT INTO `paperinfo` VALUES("201301030005","信息录入","d"," ddddddddd","ddddddddddddddd","dddddddddd","ddddddddddd","1002","100201","2","ss222222","sssssssssss2","1","2013-01-03","","","","admin2","0","1");
INSERT INTO `paperinfo` VALUES("201301030006","信息录入","d"," ddddddddd","ddddddddddddddd","dddddddddd","ddddddddddd","1002","100201","1","ss222222","sssssssssss2","1","2013-01-03","","readminist","","admin2","2","1");
INSERT INTO `paperinfo` VALUES("201301030007","信息录入","d"," ddddddddd","ddddddddddddddd","dddddddddd","ddddddddddd","1002","100202","1","ss222222","sssssssssss2","1","2013-01-04","","","","admin2","0","1");
INSERT INTO `paperinfo` VALUES("201301030008","信息录入","d"," ddddddddd","ddddddddddddddd","dddddddddd","ddddddddddd","1002","100201","1","ss222222","sssssssssss2","1","2013-01-04","","","","admin2","0","1");
INSERT INTO `paperinfo` VALUES("201301030009","信息录入","d"," ddddddddd","ddddddddddddddd","dddddddddd","ddddddddddd","1003","100201","1","ss222222","sssssssssss2","1","2013-01-04","","","","admin2","0","1");
INSERT INTO `paperinfo` VALUES("201301030010","信息录入","d"," ddddddddd","ddddddddddddddd","dddddddddd","ddddddddddd","1002","100201","1","ss222222","sssssssssss2","1","2013-01-04","","","","admin2","0","1");
INSERT INTO `paperinfo` VALUES("201301030011","dddd","d"," ddddddddd","ddddddddddddddd","dddddddddd","ddddddddddd","1002","100201","3","ss222222","sssssssssss2","1","2013-01-04","","","","admin2","0","1");



DROP TABLE paperreview;

CREATE TABLE `paperreview` (
  `paperid` char(12) CHARACTER SET utf8 NOT NULL COMMENT '稿件编号',
  `exusername` varchar(10) CHARACTER SET utf8 DEFAULT NULL COMMENT '审稿专家',
  `begindate` date NOT NULL COMMENT '开始日期',
  `enddate` date DEFAULT NULL COMMENT '结束日期',
  `statusid` char(1) CHARACTER SET utf8 NOT NULL COMMENT '稿件状态',
  `comment` text CHARACTER SET utf8 COMMENT '审稿意见',
  `remark` tinyint(1) DEFAULT '1' COMMENT '备注',
  PRIMARY KEY (`paperid`),
  KEY `exusername` (`exusername`),
  KEY `statusid` (`statusid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='审稿信息表';

INSERT INTO `paperreview` VALUES("201301030001","root1111","2013-01-01","","0","","1");
INSERT INTO `paperreview` VALUES("201301030002","readminist","2013-01-01","","2","","1");
INSERT INTO `paperreview` VALUES("201301030003","root1111","2013-01-01","","2","","1");
INSERT INTO `paperreview` VALUES("201301030004","readminist","2013-01-01","","2","","1");
INSERT INTO `paperreview` VALUES("201301030005","root1111","2013-01-01","","0","","1");
INSERT INTO `paperreview` VALUES("201301030006","readminist","2013-01-01","","2","","1");
INSERT INTO `paperreview` VALUES("201301030007","","2013-01-01","","0","","1");
INSERT INTO `paperreview` VALUES("201301030008","readminist","2013-01-01","","2","","1");
INSERT INTO `paperreview` VALUES("201301030009","","2013-01-01","","0","","1");
INSERT INTO `paperreview` VALUES("201301030010","","2013-01-01","","0","","1");
INSERT INTO `paperreview` VALUES("201301030011","","2013-01-01","","0","","1");



DROP TABLE paperstatus;

CREATE TABLE `paperstatus` (
  `statusid` char(1) CHARACTER SET utf8 NOT NULL COMMENT '稿件状态id',
  `statusname` varchar(10) CHARACTER SET utf8 NOT NULL COMMENT '稿件状态名',
  `remark` tinyint(1) DEFAULT '1' COMMENT '备注',
  PRIMARY KEY (`statusid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='稿件状态表';

INSERT INTO `paperstatus` VALUES("0","等待审核","1");
INSERT INTO `paperstatus` VALUES("1","初审","1");
INSERT INTO `paperstatus` VALUES("2","专家审核","1");
INSERT INTO `paperstatus` VALUES("3","修改后采用","1");
INSERT INTO `paperstatus` VALUES("4","退稿","1");
INSERT INTO `paperstatus` VALUES("5","修改后再审","1");
INSERT INTO `paperstatus` VALUES("6","采用","1");



DROP TABLE schoolinfo;

CREATE TABLE `schoolinfo` (
  `schoolid` char(5) NOT NULL COMMENT '学院编号',
  `schoolname` varchar(100) NOT NULL COMMENT '学院名称',
  `mail` varchar(200) NOT NULL COMMENT '学院邮箱',
  `tel` varchar(50) NOT NULL COMMENT '学院电话',
  `remark` tinyint(1) DEFAULT '1' COMMENT '备注',
  PRIMARY KEY (`schoolid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学院信息表';

INSERT INTO `schoolinfo` VALUES("0013","remodify","tewr@gdfgdf.com","","1");
INSERT INTO `schoolinfo` VALUES("1001","生物工程学院","swxy@dlpu.edu.cn","","1");
INSERT INTO `schoolinfo` VALUES("1002","食品学院","spxy@dlpu.edu.cn","","1");
INSERT INTO `schoolinfo` VALUES("1003","轻工与化学工程学院","qhxy@dlpu.edu.cn","","1");
INSERT INTO `schoolinfo` VALUES("1004","纺织与材料工程学院","fcxy@dlpu.edu.cn","","1");
INSERT INTO `schoolinfo` VALUES("1005","机械与自动化学院","jxxy@dlpu.edu.cn","","1");
INSERT INTO `schoolinfo` VALUES("1006","信息科学与工程学院","xxxy@dlpu.edu.cn","","1");
INSERT INTO `schoolinfo` VALUES("1007","艺术设计学院","ysxy@dlpu.edu.cn","","1");
INSERT INTO `schoolinfo` VALUES("1008","服装学院","fzxy@dlpu.edu.cn","","1");
INSERT INTO `schoolinfo` VALUES("1009","管理学院","glxy@dlpu.edu.cn","","1");
INSERT INTO `schoolinfo` VALUES("1010","外国语学院","wyxy@dlpu.edu.cn","","1");



DROP TABLE usertype;

CREATE TABLE `usertype` (
  `typeid` char(2) CHARACTER SET utf8 NOT NULL COMMENT '用户类别编号',
  `typename` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '用户类别名',
  `remark` tinyint(1) DEFAULT '1' COMMENT '备注',
  PRIMARY KEY (`typeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='用户类型表';

INSERT INTO `usertype` VALUES("1","writer","1");
INSERT INTO `usertype` VALUES("2","editor","1");
INSERT INTO `usertype` VALUES("3","expert","1");
INSERT INTO `usertype` VALUES("4","adeditor","1");
INSERT INTO `usertype` VALUES("99","admin","1");



DROP TABLE writerinfo;

CREATE TABLE `writerinfo` (
  `wusername` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '用户名',
  `typeid` char(2) CHARACTER SET utf8 NOT NULL COMMENT '用户类别编号',
  `password` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT '密码',
  `name` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT '姓名',
  `sex` char(2) CHARACTER SET utf8 NOT NULL COMMENT '性别',
  `mail` varchar(60) CHARACTER SET utf8 NOT NULL COMMENT '邮箱',
  `address` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT '地址',
  `tel` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '电话',
  `schoolid` char(5) CHARACTER SET utf8 NOT NULL COMMENT '学院id',
  `majorid` char(7) CHARACTER SET utf8 NOT NULL COMMENT '专业id',
  `remark` tinyint(1) DEFAULT '1' COMMENT '备注',
  PRIMARY KEY (`wusername`),
  KEY `schoolid` (`schoolid`),
  KEY `majorid` (`majorid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='作者信息';

INSERT INTO `writerinfo` VALUES("admin","","96e79218965eb72c92a549dd5a330112","士大夫是","女","sssssssr@gmail.com"," aaaaaaaaaaa","13591200000","1003","100301","1");
INSERT INTO `writerinfo` VALUES("itatzhangyun","1","96e79218965eb72c92a549dd5a330112","到沙","男","563727990@qq.com","ttt","13591200000","1001","100102","1");
INSERT INTO `writerinfo` VALUES("readministrator","","96e79218965eb72c92a549dd5a330112","李四","男","sssssssr@gmail.com","dsf ","13591200000","1002","100201","1");
INSERT INTO `writerinfo` VALUES("root11","","d41d8cd98f00b204e9800998ecf8427e","我啊","女","sssssssr@gmail.com","","13591224324","","","1");
INSERT INTO `writerinfo` VALUES("root113","","d41d8cd98f00b204e9800998ecf8427e","负担","女","sssssssr@gmail.com","sdasfdsfs","13591224324","","","1");
INSERT INTO `writerinfo` VALUES("root1132","","d41d8cd98f00b204e9800998ecf8427e","负担","女","sssssssr@gmail.com","sdasfdsfs","13591224324","","","1");



