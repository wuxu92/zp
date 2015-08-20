DROP TABLE  IF EXISTS `apps`;
CREATE TABLE apps (
  `id` INT not NULL  PRIMARY KEY AUTO_INCREMENT COMMENT '自增id',
  `product_id` VARCHAR(32) NOT NULL UNIQUE COMMENT '产品id',
  `product_name` VARCHAR(64) NOT NULL COMMENT '产品名称',
  `version` VARCHAR(96) COMMENT '产品版本',
  `cp` VARCHAR(128) COMMENT '所属CP（全名)',
  `country` varchar(32) DEFAULT '国内' COMMENT '国界，值为海外或国内',
  `platform` VARCHAR(16) COMMENT '平台，ios, Android等',
  `product_type` VARCHAR(32) DEFAULT 'game' COMMENT '产品类型',
  `network_type` VARCHAR(16) DEFAULT '单机' COMMENT '联网类型',
  `app_encode` VARCHAR(32) DEFAULT '' COMMENT '应用编码',
  `status` INT(2) DEFAULT 1 COMMENT '状态，是否可用，备用，默认1代表可用，0表示不可用'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

load data local infile '/home/wuxu/tmp/app_manage.csv' into table `apps` fields terminated by ',' lines terminated by '\r\n' ignore 1 lines;


DROP TABLE IF EXISTS channel;
CREATE TABLE channel (
  `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT '自增id',
  `channel_id` VARCHAR(32) NOT NULL UNIQUE COMMENT '掌游id，一个掌游id与mmid，通过channel_mmid表对应',
  `channel_name` VARCHAR(64) COMMENT '渠道名称',
  `channel_company` VARCHAR(64) COMMENT '渠道公司名称',
  `channel_type` VARCHAR(16) COMMENT '渠道类型，终端/自有/硬核联盟等',
  `country` VARCHAR(32) COMMENT '国界',
  `manger` VARCHAR(32) COMMENT '负责人姓名',
  `password` VARCHAR(128) COMMENT '密码',
  `dbqdfc` VARCHAR(10) COMMENT '点播渠道分成',
  `dbqdsjffbl` VARCHAR(10) COMMENT '点播渠道数据分发比例',
  `ggqdfc` VARCHAR(10) COMMENT '广告渠道分成',
  `ggqdsjffbl` VARCHAR(10) COMMENT '广告渠道数据分发比例',
  INDEX `channel_idx` (channel_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
LOAD DATA LOCAL INFILE '/home/wuxu/tmp/channel-manage.csv' INTO TABLE `channel` FIELDS TERMINATED BY ',' LINES TERMINATED BY '\r\n' IGNORE 0 LINES ;

DROP TABLE IF EXISTS channel_mmid;
CREATE TABLE channel_mmid (
  `channel_id` VARCHAR(32) NOT NULL COMMENT '掌游渠道id，不是channel表的id',
  `mmid` VARCHAR(32) NOT NULL UNIQUE COMMENT 'mmid',
  INDEX `mmid_idx` (mmid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
LOAD DATA LOCAL INFILE '/home/wuxu/tmp/channel_mmid.csv' INTO TABLE `channel_mmid` FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 0 LINES ;

DROP TABLE IF EXISTS `language`;
CREATE TABLE language (
  `abbr` VARCHAR(16) NOT NULL UNIQUE COMMENT '语言简称',
  `lang` VARCHAR(32) NOT NULL COMMENT '语言名称',
  INDEX `abbr_idx` (abbr)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
LOAD DATA LOCAL INFILE '/home/wuxu/tmp/language.csv' INTO TABLE `language` FIELDS TERMINATED BY ',' LINES TERMINATED BY '\r\n' IGNORE 1 LINES ;

DROP TABLE IF EXISTS `country`;
CREATE TABLE country (
  `name` VARCHAR(64) NOT NULL UNIQUE COMMENT '国家名称',
  `code` VARCHAR(16) COMMENT '国家代码',
  `abbr` VARCHAR(16) COMMENT '国家简称',
  `money` VARCHAR(16) COMMENT '货币类型',
  `lang_abbr` VARCHAR(16) COMMENT '国家语言简称',
  `lang_name` VARCHAR(32) COMMENT '国家语言名称',
  INDEX `code_idx` (code),
  INDEX `lang_abbr_idx` (lang_abbr)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
LOAD DATA LOCAL INFILE '/home/wuxu/tmp/country.csv' INTO TABLE `country` FIELDS TERMINATED BY ',' LINES TERMINATED BY '\r\n' IGNORE 1 LINES;

DROP TABLE IF EXISTS `sp`;
CREATE TABLE `sp` (
  `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT '自增id',
  `name` VARCHAR(64) NOT NULL COMMENT '运营商名称',
  `code` VARCHAR(16) NOT NULL COMMENT '运营商代码',
  `country` VARCHAR(64) COMMENT '国家',
  `plmn` VARCHAR(16) COMMENT 'PLMN',
  INDEX `code_idx` (code),
  INDEX `name_idx` (name)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '运营商管理';
LOAD DATA LOCAL INFILE '/home/wuxu/tmp/sp.csv' INTO TABLE `sp` FIELDS TERMINATED BY ',' LINES TERMINATED BY '\r\n' IGNORE 1 LINES;

