<?php
//升级数据表
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_activity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示',
  `gids` varchar(255) DEFAULT '' COMMENT '活动商品ID',
  `start_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '开始时间',
  `end_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '结束时间',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `act_name` varchar(255) NOT NULL DEFAULT ' ' COMMENT '活动名称',
  `order_end_time` int(10) NOT NULL DEFAULT '0' COMMENT '订单关闭时间',
  `delivery_time` int(10) NOT NULL DEFAULT '0' COMMENT '送达时间',
  `open_auto` int(1) NOT NULL DEFAULT '1' COMMENT '团长是否自动添加商;0=手动;1=自动',
  `shareimg` varchar(255) NOT NULL DEFAULT '' COMMENT '分享图',
  `atv_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8 COMMENT='活动表';

");

if(!pdo_fieldexists('longbing_shequpintuan_activity','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_activity')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_activity','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_activity')." ADD   `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示'");}
if(!pdo_fieldexists('longbing_shequpintuan_activity','gids')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_activity')." ADD   `gids` varchar(255) DEFAULT '' COMMENT '活动商品ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_activity','start_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_activity')." ADD   `start_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '开始时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_activity','end_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_activity')." ADD   `end_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '结束时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_activity','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_activity')." ADD   `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_activity','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_activity')." ADD   `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_activity','act_name')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_activity')." ADD   `act_name` varchar(255) NOT NULL DEFAULT ' ' COMMENT '活动名称'");}
if(!pdo_fieldexists('longbing_shequpintuan_activity','order_end_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_activity')." ADD   `order_end_time` int(10) NOT NULL DEFAULT '0' COMMENT '订单关闭时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_activity','delivery_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_activity')." ADD   `delivery_time` int(10) NOT NULL DEFAULT '0' COMMENT '送达时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_activity','open_auto')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_activity')." ADD   `open_auto` int(1) NOT NULL DEFAULT '1' COMMENT '团长是否自动添加商;0=手动;1=自动'");}
if(!pdo_fieldexists('longbing_shequpintuan_activity','shareimg')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_activity')." ADD   `shareimg` varchar(255) NOT NULL DEFAULT '' COMMENT '分享图'");}
if(!pdo_fieldexists('longbing_shequpintuan_activity','atv_status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_activity')." ADD   `atv_status` int(11) NOT NULL DEFAULT '0'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_actvgoods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示',
  `gid` int(10) NOT NULL DEFAULT '0' COMMENT '商品ID',
  `atv_id` int(10) NOT NULL COMMENT '活动ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6328 DEFAULT CHARSET=utf8 COMMENT='活动关联表';

");

if(!pdo_fieldexists('longbing_shequpintuan_actvgoods','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_actvgoods')." ADD 
  `id` int(10) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_actvgoods','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_actvgoods')." ADD   `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示'");}
if(!pdo_fieldexists('longbing_shequpintuan_actvgoods','gid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_actvgoods')." ADD   `gid` int(10) NOT NULL DEFAULT '0' COMMENT '商品ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_actvgoods','atv_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_actvgoods')." ADD   `atv_id` int(10) NOT NULL COMMENT '活动ID'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `username` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `password` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `is_weiqin` tinyint(4) NOT NULL COMMENT '是否微擎用户',
  `citiy_id` int(11) NOT NULL DEFAULT '0' COMMENT '城市id',
  `c_uniacid` int(11) NOT NULL DEFAULT '0' COMMENT '微擎带过来的uniacid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_admin','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_admin')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_admin','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_admin')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_admin','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_admin')." ADD   `create_time` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_admin','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_admin')." ADD   `update_time` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_admin','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_admin')." ADD   `status` tinyint(4) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('longbing_shequpintuan_admin','username')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_admin')." ADD   `username` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('longbing_shequpintuan_admin','password')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_admin')." ADD   `password` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('longbing_shequpintuan_admin','is_weiqin')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_admin')." ADD   `is_weiqin` tinyint(4) NOT NULL COMMENT '是否微擎用户'");}
if(!pdo_fieldexists('longbing_shequpintuan_admin','citiy_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_admin')." ADD   `citiy_id` int(11) NOT NULL DEFAULT '0' COMMENT '城市id'");}
if(!pdo_fieldexists('longbing_shequpintuan_admin','c_uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_admin')." ADD   `c_uniacid` int(11) NOT NULL DEFAULT '0' COMMENT '微擎带过来的uniacid'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_app_banner` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示',
  `banner_image` varchar(255) NOT NULL DEFAULT '0' COMMENT 'banner',
  `link` varchar(255) NOT NULL DEFAULT '0' COMMENT '跳转地址',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COMMENT='网站配置表';

");

if(!pdo_fieldexists('longbing_shequpintuan_app_banner','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_app_banner')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_app_banner','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_app_banner')." ADD   `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示'");}
if(!pdo_fieldexists('longbing_shequpintuan_app_banner','banner_image')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_app_banner')." ADD   `banner_image` varchar(255) NOT NULL DEFAULT '0' COMMENT 'banner'");}
if(!pdo_fieldexists('longbing_shequpintuan_app_banner','link')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_app_banner')." ADD   `link` varchar(255) NOT NULL DEFAULT '0' COMMENT '跳转地址'");}
if(!pdo_fieldexists('longbing_shequpintuan_app_banner','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_app_banner')." ADD   `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_app_banner','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_app_banner')." ADD   `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_app_notice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示',
  `notice_content` varchar(255) NOT NULL DEFAULT '0' COMMENT '公告内容',
  `link` varchar(255) NOT NULL DEFAULT '0' COMMENT '跳转地址',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='网站配置表';

");

if(!pdo_fieldexists('longbing_shequpintuan_app_notice','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_app_notice')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_app_notice','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_app_notice')." ADD   `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示'");}
if(!pdo_fieldexists('longbing_shequpintuan_app_notice','notice_content')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_app_notice')." ADD   `notice_content` varchar(255) NOT NULL DEFAULT '0' COMMENT '公告内容'");}
if(!pdo_fieldexists('longbing_shequpintuan_app_notice','link')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_app_notice')." ADD   `link` varchar(255) NOT NULL DEFAULT '0' COMMENT '跳转地址'");}
if(!pdo_fieldexists('longbing_shequpintuan_app_notice','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_app_notice')." ADD   `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_app_notice','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_app_notice')." ADD   `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_applycaptain` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `address` varchar(255) DEFAULT '' COMMENT '地址',
  `lng` varchar(255) DEFAULT '' COMMENT '经度',
  `lat` varchar(255) DEFAULT '' COMMENT '纬度',
  `homename` varchar(255) DEFAULT '' COMMENT '小区名称',
  `username` varchar(255) DEFAULT '' COMMENT '团长姓名',
  `mobile` varchar(11) DEFAULT '' COMMENT '联系电话',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '审核状态: 0=未审核;1=审核成功',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `cityid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '城市ID',
  `bank` varchar(32) DEFAULT '' COMMENT '银行卡',
  `bank_username` varchar(15) NOT NULL DEFAULT '' COMMENT '持卡人姓名',
  `lock` int(1) NOT NULL DEFAULT '0' COMMENT '是否封禁',
  `address_info` varchar(255) NOT NULL DEFAULT '' COMMENT '详细地址',
  `freight` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '运费',
  `lift` int(10) NOT NULL DEFAULT '0' COMMENT '0自提1送货',
  `bank_name` varchar(255) NOT NULL DEFAULT '' COMMENT '银行名称',
  `alipay` varchar(255) NOT NULL DEFAULT '' COMMENT '支付宝',
  `tenpay` varchar(255) NOT NULL DEFAULT '' COMMENT '财付通',
  `qrcode` varchar(255) NOT NULL DEFAULT '-1' COMMENT '二维码',
  `new_balance` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '新的佣金',
  `p_id` int(11) NOT NULL DEFAULT '0' COMMENT '上级id',
  `level` int(11) NOT NULL DEFAULT '0' COMMENT '等级',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`uid`) COMMENT '用户ID'
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8 COMMENT='团长申请表';

");

if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','uid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','address')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `address` varchar(255) DEFAULT '' COMMENT '地址'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','lng')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `lng` varchar(255) DEFAULT '' COMMENT '经度'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','lat')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `lat` varchar(255) DEFAULT '' COMMENT '纬度'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','homename')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `homename` varchar(255) DEFAULT '' COMMENT '小区名称'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','username')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `username` varchar(255) DEFAULT '' COMMENT '团长姓名'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','mobile')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `mobile` varchar(11) DEFAULT '' COMMENT '联系电话'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `status` int(1) NOT NULL DEFAULT '0' COMMENT '审核状态: 0=未审核;1=审核成功'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','cityid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `cityid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '城市ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','bank')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `bank` varchar(32) DEFAULT '' COMMENT '银行卡'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','bank_username')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `bank_username` varchar(15) NOT NULL DEFAULT '' COMMENT '持卡人姓名'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','lock')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `lock` int(1) NOT NULL DEFAULT '0' COMMENT '是否封禁'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','address_info')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `address_info` varchar(255) NOT NULL DEFAULT '' COMMENT '详细地址'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','freight')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `freight` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '运费'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','lift')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `lift` int(10) NOT NULL DEFAULT '0' COMMENT '0自提1送货'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','bank_name')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `bank_name` varchar(255) NOT NULL DEFAULT '' COMMENT '银行名称'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','alipay')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `alipay` varchar(255) NOT NULL DEFAULT '' COMMENT '支付宝'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','tenpay')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `tenpay` varchar(255) NOT NULL DEFAULT '' COMMENT '财付通'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','qrcode')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `qrcode` varchar(255) NOT NULL DEFAULT '-1' COMMENT '二维码'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','new_balance')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `new_balance` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '新的佣金'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','p_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `p_id` int(11) NOT NULL DEFAULT '0' COMMENT '上级id'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','level')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   `level` int(11) NOT NULL DEFAULT '0' COMMENT '等级'");}
if(!pdo_fieldexists('longbing_shequpintuan_applycaptain','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_applycaptain')." ADD   PRIMARY KEY (`id`)");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_attachment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '文件名',
  `path` varchar(255) NOT NULL DEFAULT '' COMMENT '文件路径',
  `location` varchar(15) NOT NULL DEFAULT '' COMMENT '文件存储位置(驱动)',
  `path_type` varchar(20) DEFAULT 'picture' COMMENT '路径类型',
  `ext` char(4) NOT NULL DEFAULT '' COMMENT '文件类型',
  `mime_type` varchar(60) NOT NULL DEFAULT '' COMMENT '文件mime类型',
  `size` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `alt` varchar(255) DEFAULT NULL COMMENT '替代文本图像alt',
  `md5` char(32) NOT NULL DEFAULT '' COMMENT '文件md5',
  `sha1` char(40) NOT NULL DEFAULT '' COMMENT '文件sha1编码',
  `download` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上传时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `sort` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `uniacid` int(11) NOT NULL DEFAULT '0' COMMENT '小程序ID',
  `driver` varchar(255) NOT NULL DEFAULT 'local' COMMENT '驱动',
  `src` varchar(500) NOT NULL DEFAULT '' COMMENT '全路径',
  PRIMARY KEY (`id`),
  KEY `idx_paty_type` (`path_type`)
) ENGINE=InnoDB AUTO_INCREMENT=2078 DEFAULT CHARSET=utf8 COMMENT='文件上传表';

");

if(!pdo_fieldexists('longbing_shequpintuan_attachment','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_attachment')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_attachment','name')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_attachment')." ADD   `name` varchar(255) NOT NULL DEFAULT '' COMMENT '文件名'");}
if(!pdo_fieldexists('longbing_shequpintuan_attachment','path')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_attachment')." ADD   `path` varchar(255) NOT NULL DEFAULT '' COMMENT '文件路径'");}
if(!pdo_fieldexists('longbing_shequpintuan_attachment','location')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_attachment')." ADD   `location` varchar(15) NOT NULL DEFAULT '' COMMENT '文件存储位置(驱动)'");}
if(!pdo_fieldexists('longbing_shequpintuan_attachment','path_type')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_attachment')." ADD   `path_type` varchar(20) DEFAULT 'picture' COMMENT '路径类型'");}
if(!pdo_fieldexists('longbing_shequpintuan_attachment','ext')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_attachment')." ADD   `ext` char(4) NOT NULL DEFAULT '' COMMENT '文件类型'");}
if(!pdo_fieldexists('longbing_shequpintuan_attachment','mime_type')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_attachment')." ADD   `mime_type` varchar(60) NOT NULL DEFAULT '' COMMENT '文件mime类型'");}
if(!pdo_fieldexists('longbing_shequpintuan_attachment','size')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_attachment')." ADD   `size` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小'");}
if(!pdo_fieldexists('longbing_shequpintuan_attachment','alt')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_attachment')." ADD   `alt` varchar(255) DEFAULT NULL COMMENT '替代文本图像alt'");}
if(!pdo_fieldexists('longbing_shequpintuan_attachment','md5')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_attachment')." ADD   `md5` char(32) NOT NULL DEFAULT '' COMMENT '文件md5'");}
if(!pdo_fieldexists('longbing_shequpintuan_attachment','sha1')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_attachment')." ADD   `sha1` char(40) NOT NULL DEFAULT '' COMMENT '文件sha1编码'");}
if(!pdo_fieldexists('longbing_shequpintuan_attachment','download')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_attachment')." ADD   `download` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数'");}
if(!pdo_fieldexists('longbing_shequpintuan_attachment','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_attachment')." ADD   `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上传时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_attachment','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_attachment')." ADD   `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_attachment','sort')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_attachment')." ADD   `sort` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '排序'");}
if(!pdo_fieldexists('longbing_shequpintuan_attachment','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_attachment')." ADD   `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态'");}
if(!pdo_fieldexists('longbing_shequpintuan_attachment','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_attachment')." ADD   `uniacid` int(11) NOT NULL DEFAULT '0' COMMENT '小程序ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_attachment','driver')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_attachment')." ADD   `driver` varchar(255) NOT NULL DEFAULT 'local' COMMENT '驱动'");}
if(!pdo_fieldexists('longbing_shequpintuan_attachment','src')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_attachment')." ADD   `src` varchar(500) NOT NULL DEFAULT '' COMMENT '全路径'");}
if(!pdo_fieldexists('longbing_shequpintuan_attachment','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_attachment')." ADD   PRIMARY KEY (`id`)");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_belongcap_goods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL DEFAULT '0',
  `cap_id` int(10) NOT NULL DEFAULT '0' COMMENT '团长ID',
  `gid` int(10) NOT NULL DEFAULT '0' COMMENT '开始时间',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品所属(后期优化可以把longbing_shequpintuan_capgoods表合为一个)';

");

if(!pdo_fieldexists('longbing_shequpintuan_belongcap_goods','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_belongcap_goods')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_belongcap_goods','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_belongcap_goods')." ADD   `uniacid` int(10) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_belongcap_goods','cap_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_belongcap_goods')." ADD   `cap_id` int(10) NOT NULL DEFAULT '0' COMMENT '团长ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_belongcap_goods','gid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_belongcap_goods')." ADD   `gid` int(10) NOT NULL DEFAULT '0' COMMENT '开始时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_belongcap_goods','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_belongcap_goods')." ADD   `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_belongcap_goods','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_belongcap_goods')." ADD   `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_cap_bind` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `cap` int(11) NOT NULL DEFAULT '0' COMMENT '团长id',
  `create_time` varchar(32) NOT NULL DEFAULT '0' COMMENT '绑定时间',
  `nickname` varchar(255) NOT NULL DEFAULT '0' COMMENT '用户姓名',
  `img` varchar(325) NOT NULL DEFAULT '0' COMMENT '头像',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_cap_bind','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_bind')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_bind','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_bind')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_bind','uid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_bind')." ADD   `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户id'");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_bind','cap')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_bind')." ADD   `cap` int(11) NOT NULL DEFAULT '0' COMMENT '团长id'");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_bind','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_bind')." ADD   `create_time` varchar(32) NOT NULL DEFAULT '0' COMMENT '绑定时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_bind','nickname')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_bind')." ADD   `nickname` varchar(255) NOT NULL DEFAULT '0' COMMENT '用户姓名'");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_bind','img')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_bind')." ADD   `img` varchar(325) NOT NULL DEFAULT '0' COMMENT '头像'");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_bind','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_bind')." ADD   `status` int(11) NOT NULL DEFAULT '0' COMMENT '状态'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_cap_level` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0' COMMENT '团长等级',
  `content` varchar(255) NOT NULL DEFAULT '0' COMMENT '团长等级名字',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '状态',
  `balance` varchar(255) NOT NULL DEFAULT '0' COMMENT '比例',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_cap_level','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_level','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_level','level')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level')." ADD   `level` int(11) NOT NULL DEFAULT '0' COMMENT '团长等级'");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_level','content')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level')." ADD   `content` varchar(255) NOT NULL DEFAULT '0' COMMENT '团长等级名字'");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_level','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level')." ADD   `status` int(11) NOT NULL DEFAULT '0' COMMENT '状态'");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_level','balance')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level')." ADD   `balance` varchar(255) NOT NULL DEFAULT '0' COMMENT '比例'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_cap_level_bind` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `cap_id` int(11) NOT NULL DEFAULT '0' COMMENT '团长id',
  `level_id` int(11) NOT NULL DEFAULT '0' COMMENT '团长等级id',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '状态',
  `p_id` int(11) NOT NULL DEFAULT '0' COMMENT '暂留',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_cap_level_bind','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level_bind')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_level_bind','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level_bind')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_level_bind','cap_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level_bind')." ADD   `cap_id` int(11) NOT NULL DEFAULT '0' COMMENT '团长id'");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_level_bind','level_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level_bind')." ADD   `level_id` int(11) NOT NULL DEFAULT '0' COMMENT '团长等级id'");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_level_bind','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level_bind')." ADD   `status` int(11) NOT NULL DEFAULT '0' COMMENT '状态'");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_level_bind','p_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level_bind')." ADD   `p_id` int(11) NOT NULL DEFAULT '0' COMMENT '暂留'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_cap_level_cash` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `cap_id` int(11) NOT NULL DEFAULT '0' COMMENT '团长id',
  `c_cap_id` int(11) NOT NULL DEFAULT '0' COMMENT '下级团长id',
  `time` varchar(64) NOT NULL DEFAULT '0' COMMENT '时间',
  `cash` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '佣金',
  `level` int(11) NOT NULL DEFAULT '0' COMMENT '等级',
  `goods` varchar(255) NOT NULL DEFAULT '0' COMMENT '商品',
  `order_id` int(11) NOT NULL DEFAULT '0' COMMENT '订单id',
  `order_code` varchar(255) NOT NULL DEFAULT '0' COMMENT '订单号',
  `goods_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_cap_level_cash','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level_cash')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_level_cash','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level_cash')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_level_cash','cap_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level_cash')." ADD   `cap_id` int(11) NOT NULL DEFAULT '0' COMMENT '团长id'");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_level_cash','c_cap_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level_cash')." ADD   `c_cap_id` int(11) NOT NULL DEFAULT '0' COMMENT '下级团长id'");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_level_cash','time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level_cash')." ADD   `time` varchar(64) NOT NULL DEFAULT '0' COMMENT '时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_level_cash','cash')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level_cash')." ADD   `cash` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '佣金'");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_level_cash','level')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level_cash')." ADD   `level` int(11) NOT NULL DEFAULT '0' COMMENT '等级'");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_level_cash','goods')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level_cash')." ADD   `goods` varchar(255) NOT NULL DEFAULT '0' COMMENT '商品'");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_level_cash','order_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level_cash')." ADD   `order_id` int(11) NOT NULL DEFAULT '0' COMMENT '订单id'");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_level_cash','order_code')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level_cash')." ADD   `order_code` varchar(255) NOT NULL DEFAULT '0' COMMENT '订单号'");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_level_cash','goods_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level_cash')." ADD   `goods_id` int(11) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_cap_level_cash','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cap_level_cash')." ADD   `status` int(11) NOT NULL DEFAULT '0'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_capgoods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示',
  `cap_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '团长ID',
  `atv_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '活动ID',
  `gid` varchar(255) DEFAULT '' COMMENT '活动商品ID',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '是否结束',
  `qrcode` varchar(255) NOT NULL DEFAULT '' COMMENT '二维码',
  PRIMARY KEY (`id`),
  KEY `gid` (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=182304 DEFAULT CHARSET=utf8 COMMENT='团长商品选择表';

");

if(!pdo_fieldexists('longbing_shequpintuan_capgoods','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_capgoods')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_capgoods','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_capgoods')." ADD   `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示'");}
if(!pdo_fieldexists('longbing_shequpintuan_capgoods','cap_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_capgoods')." ADD   `cap_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '团长ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_capgoods','atv_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_capgoods')." ADD   `atv_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '活动ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_capgoods','gid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_capgoods')." ADD   `gid` varchar(255) DEFAULT '' COMMENT '活动商品ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_capgoods','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_capgoods')." ADD   `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_capgoods','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_capgoods')." ADD   `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_capgoods','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_capgoods')." ADD   `status` int(1) NOT NULL DEFAULT '1' COMMENT '是否结束'");}
if(!pdo_fieldexists('longbing_shequpintuan_capgoods','qrcode')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_capgoods')." ADD   `qrcode` varchar(255) NOT NULL DEFAULT '' COMMENT '二维码'");}
if(!pdo_fieldexists('longbing_shequpintuan_capgoods','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_capgoods')." ADD   PRIMARY KEY (`id`)");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_cargos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示',
  `oids` varchar(2500) NOT NULL DEFAULT '' COMMENT '订单IDs',
  `cargos_code` varchar(32) NOT NULL COMMENT '货单号',
  `cap_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '团长ID',
  `cityid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '城市ID',
  `print_status` int(1) NOT NULL DEFAULT '0' COMMENT '打印状态:0=未打印;1=已打印',
  `sign_status` int(1) NOT NULL DEFAULT '0' COMMENT '签收状态:0=未签收;1=已签收',
  `sign_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '签收时间',
  `delivery_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '配送时间',
  `print_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '打印时间',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1083 DEFAULT CHARSET=utf8 COMMENT='清单表';

");

if(!pdo_fieldexists('longbing_shequpintuan_cargos','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos')." ADD   `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos','oids')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos')." ADD   `oids` varchar(2500) NOT NULL DEFAULT '' COMMENT '订单IDs'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos','cargos_code')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos')." ADD   `cargos_code` varchar(32) NOT NULL COMMENT '货单号'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos','cap_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos')." ADD   `cap_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '团长ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos','cityid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos')." ADD   `cityid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '城市ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos','print_status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos')." ADD   `print_status` int(1) NOT NULL DEFAULT '0' COMMENT '打印状态:0=未打印;1=已打印'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos','sign_status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos')." ADD   `sign_status` int(1) NOT NULL DEFAULT '0' COMMENT '签收状态:0=未签收;1=已签收'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos','sign_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos')." ADD   `sign_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '签收时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos','delivery_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos')." ADD   `delivery_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '配送时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos','print_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos')." ADD   `print_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '打印时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos')." ADD   `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos')." ADD   `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_cargos_connect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` varchar(64) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `caid` int(10) NOT NULL DEFAULT '0' COMMENT '清单ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5962 DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_cargos_connect','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos_connect')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos_connect','oid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos_connect')." ADD   `oid` varchar(64) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos_connect','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos_connect')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos_connect','caid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos_connect')." ADD   `caid` int(10) NOT NULL DEFAULT '0' COMMENT '清单ID'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_cargos_sup` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示',
  `oids` varchar(2500) NOT NULL DEFAULT '' COMMENT '订单IDs',
  `cargos_code` varchar(32) NOT NULL COMMENT '货单号',
  `sup_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '供应商ID',
  `cityid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '城市ID',
  `print_status` int(1) NOT NULL DEFAULT '0' COMMENT '打印状态:0=未打印;1=已打印',
  `gh_status` int(1) NOT NULL DEFAULT '0' COMMENT '供货状态:0=未供货;1=已供货',
  `gh_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '供货时间',
  `delivery_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '配送时间',
  `print_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '打印时间',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `gy_status` int(10) NOT NULL DEFAULT '0',
  `gy_time` varchar(32) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COMMENT='供货清单表';

");

if(!pdo_fieldexists('longbing_shequpintuan_cargos_sup','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos_sup')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos_sup','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos_sup')." ADD   `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos_sup','oids')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos_sup')." ADD   `oids` varchar(2500) NOT NULL DEFAULT '' COMMENT '订单IDs'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos_sup','cargos_code')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos_sup')." ADD   `cargos_code` varchar(32) NOT NULL COMMENT '货单号'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos_sup','sup_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos_sup')." ADD   `sup_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '供应商ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos_sup','cityid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos_sup')." ADD   `cityid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '城市ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos_sup','print_status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos_sup')." ADD   `print_status` int(1) NOT NULL DEFAULT '0' COMMENT '打印状态:0=未打印;1=已打印'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos_sup','gh_status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos_sup')." ADD   `gh_status` int(1) NOT NULL DEFAULT '0' COMMENT '供货状态:0=未供货;1=已供货'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos_sup','gh_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos_sup')." ADD   `gh_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '供货时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos_sup','delivery_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos_sup')." ADD   `delivery_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '配送时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos_sup','print_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos_sup')." ADD   `print_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '打印时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos_sup','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos_sup')." ADD   `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos_sup','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos_sup')." ADD   `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos_sup','gy_status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos_sup')." ADD   `gy_status` int(10) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos_sup','gy_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos_sup')." ADD   `gy_time` varchar(32) NOT NULL DEFAULT '0'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_cargos_sup_connect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caid` int(10) NOT NULL DEFAULT '0' COMMENT '清单ID',
  `oid` varchar(64) NOT NULL,
  `uniacid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5962 DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_cargos_sup_connect','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos_sup_connect')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos_sup_connect','caid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos_sup_connect')." ADD   `caid` int(10) NOT NULL DEFAULT '0' COMMENT '清单ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos_sup_connect','oid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos_sup_connect')." ADD   `oid` varchar(64) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_cargos_sup_connect','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cargos_sup_connect')." ADD   `uniacid` int(11) DEFAULT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `firstpinyin` varchar(255) DEFAULT '',
  `pinyin` varchar(255) DEFAULT '',
  `city` varchar(255) DEFAULT '',
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '是否开通',
  `uniacid` int(10) NOT NULL DEFAULT '666' COMMENT '微擎ID',
  `tacity` int(1) NOT NULL DEFAULT '0' COMMENT '默认城市',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('longbing_shequpintuan_cities','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cities')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_cities','firstpinyin')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cities')." ADD   `firstpinyin` varchar(255) DEFAULT ''");}
if(!pdo_fieldexists('longbing_shequpintuan_cities','pinyin')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cities')." ADD   `pinyin` varchar(255) DEFAULT ''");}
if(!pdo_fieldexists('longbing_shequpintuan_cities','city')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cities')." ADD   `city` varchar(255) DEFAULT ''");}
if(!pdo_fieldexists('longbing_shequpintuan_cities','lat')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cities')." ADD   `lat` varchar(255) DEFAULT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_cities','lng')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cities')." ADD   `lng` varchar(255) DEFAULT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_cities','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cities')." ADD   `status` int(1) NOT NULL DEFAULT '0' COMMENT '是否开通'");}
if(!pdo_fieldexists('longbing_shequpintuan_cities','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cities')." ADD   `uniacid` int(10) NOT NULL DEFAULT '666' COMMENT '微擎ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_cities','tacity')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_cities')." ADD   `tacity` int(1) NOT NULL DEFAULT '0' COMMENT '默认城市'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_city_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示',
  `gid` int(10) NOT NULL DEFAULT '0' COMMENT '商品ID',
  `cityid` int(10) NOT NULL DEFAULT '0' COMMENT '城市ID',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '是否删除标识',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=559 DEFAULT CHARSET=utf8 COMMENT='城市商品关联表';

");

if(!pdo_fieldexists('longbing_shequpintuan_city_goods','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_city_goods')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_city_goods','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_city_goods')." ADD   `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示'");}
if(!pdo_fieldexists('longbing_shequpintuan_city_goods','gid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_city_goods')." ADD   `gid` int(10) NOT NULL DEFAULT '0' COMMENT '商品ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_city_goods','cityid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_city_goods')." ADD   `cityid` int(10) NOT NULL DEFAULT '0' COMMENT '城市ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_city_goods','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_city_goods')." ADD   `status` int(1) NOT NULL DEFAULT '1' COMMENT '是否删除标识'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uid` int(10) NOT NULL DEFAULT '0' COMMENT '用户id',
  `cpgid` int(10) NOT NULL DEFAULT '0' COMMENT '商品关联ID',
  `cmt_images` varchar(2500) NOT NULL DEFAULT '' COMMENT '评价图片',
  `cmt_content` varchar(255) NOT NULL DEFAULT '' COMMENT '评价',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评价表';

");

if(!pdo_fieldexists('longbing_shequpintuan_comment','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_comment')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_comment','uid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_comment')." ADD   `uid` int(10) NOT NULL DEFAULT '0' COMMENT '用户id'");}
if(!pdo_fieldexists('longbing_shequpintuan_comment','cpgid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_comment')." ADD   `cpgid` int(10) NOT NULL DEFAULT '0' COMMENT '商品关联ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_comment','cmt_images')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_comment')." ADD   `cmt_images` varchar(2500) NOT NULL DEFAULT '' COMMENT '评价图片'");}
if(!pdo_fieldexists('longbing_shequpintuan_comment','cmt_content')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_comment')." ADD   `cmt_content` varchar(255) NOT NULL DEFAULT '' COMMENT '评价'");}
if(!pdo_fieldexists('longbing_shequpintuan_comment','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_comment')." ADD   `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_config_formid` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示',
  `uid` int(10) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `form_id` varchar(255) NOT NULL DEFAULT '' COMMENT 'form_id',
  `status` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否使用',
  `end_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '过期时间',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7233 DEFAULT CHARSET=utf8 COMMENT='模板消息储存表';

");

if(!pdo_fieldexists('longbing_shequpintuan_config_formid','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_formid')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_formid','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_formid')." ADD   `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_formid','uid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_formid')." ADD   `uid` int(10) NOT NULL DEFAULT '0' COMMENT '用户ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_formid','form_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_formid')." ADD   `form_id` varchar(255) NOT NULL DEFAULT '' COMMENT 'form_id'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_formid','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_formid')." ADD   `status` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否使用'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_formid','end_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_formid')." ADD   `end_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '过期时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_formid','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_formid')." ADD   `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_formid','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_formid')." ADD   `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_config_pay` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `pid` int(10) NOT NULL DEFAULT '0' COMMENT '小程序关联id',
  `mch_id` varchar(255) NOT NULL DEFAULT '' COMMENT '商户号',
  `pay_key` varchar(255) NOT NULL DEFAULT '' COMMENT '支付秘钥',
  `cert_path` varchar(255) NOT NULL DEFAULT '' COMMENT '证书',
  `key_path` varchar(255) NOT NULL DEFAULT '' COMMENT '证书',
  `min_price` int(6) NOT NULL DEFAULT '0' COMMENT '最低提现金额',
  `pay_name` varchar(255) NOT NULL DEFAULT 'wechat' COMMENT '支付类型',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `pay_type` int(1) NOT NULL DEFAULT '0' COMMENT '支付类型:0=微信;1=支付宝',
  `diff_price` varchar(10) NOT NULL DEFAULT '1' COMMENT '手续费',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='支付配置表';

");

if(!pdo_fieldexists('longbing_shequpintuan_config_pay','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_pay')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_pay','pid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_pay')." ADD   `pid` int(10) NOT NULL DEFAULT '0' COMMENT '小程序关联id'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_pay','mch_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_pay')." ADD   `mch_id` varchar(255) NOT NULL DEFAULT '' COMMENT '商户号'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_pay','pay_key')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_pay')." ADD   `pay_key` varchar(255) NOT NULL DEFAULT '' COMMENT '支付秘钥'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_pay','cert_path')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_pay')." ADD   `cert_path` varchar(255) NOT NULL DEFAULT '' COMMENT '证书'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_pay','key_path')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_pay')." ADD   `key_path` varchar(255) NOT NULL DEFAULT '' COMMENT '证书'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_pay','min_price')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_pay')." ADD   `min_price` int(6) NOT NULL DEFAULT '0' COMMENT '最低提现金额'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_pay','pay_name')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_pay')." ADD   `pay_name` varchar(255) NOT NULL DEFAULT 'wechat' COMMENT '支付类型'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_pay','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_pay')." ADD   `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_pay','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_pay')." ADD   `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_pay','pay_type')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_pay')." ADD   `pay_type` int(1) NOT NULL DEFAULT '0' COMMENT '支付类型:0=微信;1=支付宝'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_pay','diff_price')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_pay')." ADD   `diff_price` varchar(10) NOT NULL DEFAULT '1' COMMENT '手续费'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_config_printer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示',
  `uniquepr` int(10) NOT NULL DEFAULT '0' COMMENT '唯一标示',
  `printname` varchar(32) NOT NULL DEFAULT '' COMMENT '打印机名称',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '开启状态',
  `isauto` int(1) NOT NULL DEFAULT '0' COMMENT '自动打印:0=手动;1=自动',
  `obconfig` text NOT NULL COMMENT '打印配置',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `city_id` int(10) NOT NULL DEFAULT '0' COMMENT '城市id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='打印机配置';

");

if(!pdo_fieldexists('longbing_shequpintuan_config_printer','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_printer')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_printer','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_printer')." ADD   `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_printer','uniquepr')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_printer')." ADD   `uniquepr` int(10) NOT NULL DEFAULT '0' COMMENT '唯一标示'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_printer','printname')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_printer')." ADD   `printname` varchar(32) NOT NULL DEFAULT '' COMMENT '打印机名称'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_printer','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_printer')." ADD   `status` int(1) NOT NULL DEFAULT '0' COMMENT '开启状态'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_printer','isauto')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_printer')." ADD   `isauto` int(1) NOT NULL DEFAULT '0' COMMENT '自动打印:0=手动;1=自动'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_printer','obconfig')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_printer')." ADD   `obconfig` text NOT NULL COMMENT '打印配置'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_printer','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_printer')." ADD   `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_printer','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_printer')." ADD   `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_printer','city_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_printer')." ADD   `city_id` int(10) NOT NULL DEFAULT '0' COMMENT '城市id'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_config_template` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示',
  `template_id` varchar(255) NOT NULL DEFAULT '' COMMENT '模板消息ID',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '模板名称',
  `mp_template_id` varchar(255) NOT NULL DEFAULT '' COMMENT '公众号模板ID',
  `type` int(3) NOT NULL DEFAULT '0' COMMENT '模板唯一标示',
  `status` int(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态:1=开启;0=关闭 | 预留后期如果要加状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='模板消息表';

");

if(!pdo_fieldexists('longbing_shequpintuan_config_template','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_template')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_template','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_template')." ADD   `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_template','template_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_template')." ADD   `template_id` varchar(255) NOT NULL DEFAULT '' COMMENT '模板消息ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_template','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_template')." ADD   `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_template','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_template')." ADD   `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_template','name')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_template')." ADD   `name` varchar(50) NOT NULL DEFAULT '' COMMENT '模板名称'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_template','mp_template_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_template')." ADD   `mp_template_id` varchar(255) NOT NULL DEFAULT '' COMMENT '公众号模板ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_template','type')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_template')." ADD   `type` int(3) NOT NULL DEFAULT '0' COMMENT '模板唯一标示'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_template','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_template')." ADD   `status` int(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态:1=开启;0=关闭 | 预留后期如果要加状态'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_config_upload` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示',
  `oss` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1-阿里云2-七牛云',
  `al_bucket` varchar(255) NOT NULL DEFAULT '' COMMENT '仓库名称',
  `al_access_key_id` varchar(50) NOT NULL DEFAULT '',
  `al_access_key_secret` varchar(100) NOT NULL DEFAULT '',
  `al_base_dir` varchar(200) NOT NULL DEFAULT '' COMMENT '存储目录',
  `al_use_http` varchar(255) NOT NULL DEFAULT '' COMMENT '自定义域名',
  `al_endpoint` varchar(255) NOT NULL DEFAULT '',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `qn_accesskey` varchar(255) NOT NULL DEFAULT '' COMMENT '七牛云accesskey',
  `qn_secretkey` varchar(255) NOT NULL DEFAULT '' COMMENT '七牛云secretkey',
  `qn_bucket` varchar(255) NOT NULL DEFAULT '' COMMENT '七牛云仓库名称',
  `qn_use_http` varchar(255) NOT NULL DEFAULT '' COMMENT '七牛云accesskey',
  `tx_appid` varchar(255) NOT NULL DEFAULT '' COMMENT '腾讯云appid',
  `tx_secretid` varchar(255) NOT NULL DEFAULT '' COMMENT '腾讯云secretid',
  `tx_secretkey` varchar(255) NOT NULL DEFAULT '' COMMENT '腾讯云secretkey',
  `tx_bucket` varchar(255) NOT NULL DEFAULT '' COMMENT '腾讯云仓库名称',
  `tx_region` varchar(255) NOT NULL DEFAULT '' COMMENT '腾讯云仓库地域',
  `tx_use_http` varchar(255) NOT NULL DEFAULT '' COMMENT '腾讯云仓库域名',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniacid` (`uniacid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='上传配置表';

");

if(!pdo_fieldexists('longbing_shequpintuan_config_upload','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_upload')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_upload','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_upload')." ADD   `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_upload','oss')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_upload')." ADD   `oss` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1-阿里云2-七牛云'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_upload','al_bucket')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_upload')." ADD   `al_bucket` varchar(255) NOT NULL DEFAULT '' COMMENT '仓库名称'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_upload','al_access_key_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_upload')." ADD   `al_access_key_id` varchar(50) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('longbing_shequpintuan_config_upload','al_access_key_secret')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_upload')." ADD   `al_access_key_secret` varchar(100) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('longbing_shequpintuan_config_upload','al_base_dir')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_upload')." ADD   `al_base_dir` varchar(200) NOT NULL DEFAULT '' COMMENT '存储目录'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_upload','al_use_http')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_upload')." ADD   `al_use_http` varchar(255) NOT NULL DEFAULT '' COMMENT '自定义域名'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_upload','al_endpoint')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_upload')." ADD   `al_endpoint` varchar(255) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('longbing_shequpintuan_config_upload','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_upload')." ADD   `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_upload','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_upload')." ADD   `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_upload','qn_accesskey')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_upload')." ADD   `qn_accesskey` varchar(255) NOT NULL DEFAULT '' COMMENT '七牛云accesskey'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_upload','qn_secretkey')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_upload')." ADD   `qn_secretkey` varchar(255) NOT NULL DEFAULT '' COMMENT '七牛云secretkey'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_upload','qn_bucket')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_upload')." ADD   `qn_bucket` varchar(255) NOT NULL DEFAULT '' COMMENT '七牛云仓库名称'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_upload','qn_use_http')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_upload')." ADD   `qn_use_http` varchar(255) NOT NULL DEFAULT '' COMMENT '七牛云accesskey'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_upload','tx_appid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_upload')." ADD   `tx_appid` varchar(255) NOT NULL DEFAULT '' COMMENT '腾讯云appid'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_upload','tx_secretid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_upload')." ADD   `tx_secretid` varchar(255) NOT NULL DEFAULT '' COMMENT '腾讯云secretid'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_upload','tx_secretkey')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_upload')." ADD   `tx_secretkey` varchar(255) NOT NULL DEFAULT '' COMMENT '腾讯云secretkey'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_upload','tx_bucket')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_upload')." ADD   `tx_bucket` varchar(255) NOT NULL DEFAULT '' COMMENT '腾讯云仓库名称'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_upload','tx_region')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_upload')." ADD   `tx_region` varchar(255) NOT NULL DEFAULT '' COMMENT '腾讯云仓库地域'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_upload','tx_use_http')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_upload')." ADD   `tx_use_http` varchar(255) NOT NULL DEFAULT '' COMMENT '腾讯云仓库域名'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_upload','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_upload')." ADD   PRIMARY KEY (`id`)");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_config_wechat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `mini_name` varchar(50) NOT NULL DEFAULT '',
  `appid` varchar(30) NOT NULL DEFAULT '',
  `appsecret` varchar(50) NOT NULL DEFAULT '',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  `rep_title` varchar(255) DEFAULT '' COMMENT '全局文字',
  `qrcode` varchar(255) NOT NULL DEFAULT '' COMMENT '二维码',
  `headimage` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `hope` int(10) NOT NULL DEFAULT '0' COMMENT '全部商品显示位置',
  `copyright` varchar(255) NOT NULL DEFAULT '' COMMENT '底部版权',
  `copyright_link` varchar(255) NOT NULL DEFAULT '' COMMENT '链接',
  `cright` int(1) NOT NULL DEFAULT '0' COMMENT '版权类型',
  `reflect` varchar(64) NOT NULL DEFAULT '0' COMMENT '提现显示设置',
  `balance` int(11) NOT NULL DEFAULT '10' COMMENT '余额使用占比',
  `balance_status` int(11) NOT NULL DEFAULT '0' COMMENT '0关闭1开启余额',
  `refund_site` int(11) NOT NULL DEFAULT '0' COMMENT '0自动退款1手动',
  `datanull_font` varchar(255) NOT NULL DEFAULT '' COMMENT '底部空数据替换',
  `share_title` varchar(255) NOT NULL DEFAULT '' COMMENT '分享标语设置',
  `img_icon` varchar(625) NOT NULL DEFAULT '0' COMMENT '秒杀次日达图标',
  `is_dm` int(11) NOT NULL DEFAULT '0' COMMENT '弹幕显示',
  `is_sale` int(11) NOT NULL DEFAULT '0' COMMENT '销量显示',
  `today_img` varchar(625) NOT NULL DEFAULT '0' COMMENT '今日推荐图片',
  `fx_content` longtext NOT NULL COMMENT '分销说明',
  `fx_status` int(11) NOT NULL DEFAULT '0' COMMENT '分销状态',
  `end_hx_time` int(11) NOT NULL DEFAULT '0' COMMENT '过期时间核销',
  `all_cat` int(11) NOT NULL DEFAULT '0' COMMENT '是否开启只显示当前分类',
  `is_cap_cash` int(11) NOT NULL DEFAULT '0' COMMENT '是否开启团长等级佣金',
  `is_search` int(11) NOT NULL DEFAULT '0',
  `distance` varchar(32) NOT NULL DEFAULT '0' COMMENT '距离',
  `spike_img` varchar(255) NOT NULL DEFAULT '0',
  `cap_sort` int(11) NOT NULL DEFAULT '0',
  `balance_site` varchar(1048) NOT NULL DEFAULT '0' COMMENT '余额说明',
  `much_price` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '最低下单金额',
  `rechage_status` int(11) NOT NULL DEFAULT '1' COMMENT '充值开关',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unia` (`uniacid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COMMENT='小程序配置表';

");

if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `uniacid` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','mini_name')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `mini_name` varchar(50) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','appid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `appid` varchar(30) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','appsecret')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `appsecret` varchar(50) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `create_time` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `update_time` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','rep_title')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `rep_title` varchar(255) DEFAULT '' COMMENT '全局文字'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','qrcode')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `qrcode` varchar(255) NOT NULL DEFAULT '' COMMENT '二维码'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','headimage')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `headimage` varchar(255) NOT NULL DEFAULT '' COMMENT '头像'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','hope')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `hope` int(10) NOT NULL DEFAULT '0' COMMENT '全部商品显示位置'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','copyright')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `copyright` varchar(255) NOT NULL DEFAULT '' COMMENT '底部版权'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','copyright_link')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `copyright_link` varchar(255) NOT NULL DEFAULT '' COMMENT '链接'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','cright')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `cright` int(1) NOT NULL DEFAULT '0' COMMENT '版权类型'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','reflect')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `reflect` varchar(64) NOT NULL DEFAULT '0' COMMENT '提现显示设置'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','balance')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `balance` int(11) NOT NULL DEFAULT '10' COMMENT '余额使用占比'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','balance_status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `balance_status` int(11) NOT NULL DEFAULT '0' COMMENT '0关闭1开启余额'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','refund_site')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `refund_site` int(11) NOT NULL DEFAULT '0' COMMENT '0自动退款1手动'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','datanull_font')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `datanull_font` varchar(255) NOT NULL DEFAULT '' COMMENT '底部空数据替换'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','share_title')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `share_title` varchar(255) NOT NULL DEFAULT '' COMMENT '分享标语设置'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','img_icon')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `img_icon` varchar(625) NOT NULL DEFAULT '0' COMMENT '秒杀次日达图标'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','is_dm')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `is_dm` int(11) NOT NULL DEFAULT '0' COMMENT '弹幕显示'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','is_sale')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `is_sale` int(11) NOT NULL DEFAULT '0' COMMENT '销量显示'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','today_img')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `today_img` varchar(625) NOT NULL DEFAULT '0' COMMENT '今日推荐图片'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','fx_content')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `fx_content` longtext NOT NULL COMMENT '分销说明'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','fx_status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `fx_status` int(11) NOT NULL DEFAULT '0' COMMENT '分销状态'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','end_hx_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `end_hx_time` int(11) NOT NULL DEFAULT '0' COMMENT '过期时间核销'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','all_cat')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `all_cat` int(11) NOT NULL DEFAULT '0' COMMENT '是否开启只显示当前分类'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','is_cap_cash')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `is_cap_cash` int(11) NOT NULL DEFAULT '0' COMMENT '是否开启团长等级佣金'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','is_search')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `is_search` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','distance')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `distance` varchar(32) NOT NULL DEFAULT '0' COMMENT '距离'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','spike_img')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `spike_img` varchar(255) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','cap_sort')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `cap_sort` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','balance_site')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `balance_site` varchar(1048) NOT NULL DEFAULT '0' COMMENT '余额说明'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','much_price')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `much_price` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '最低下单金额'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','rechage_status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   `rechage_status` int(11) NOT NULL DEFAULT '1' COMMENT '充值开关'");}
if(!pdo_fieldexists('longbing_shequpintuan_config_wechat','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_config_wechat')." ADD   PRIMARY KEY (`id`)");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_coupon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `coupon_name` varchar(64) NOT NULL COMMENT '优惠券名称',
  `coupon_type` int(10) NOT NULL COMMENT '1:新人券',
  `full_money` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '门槛',
  `free_money` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '优惠金额',
  `goods_id` varchar(255) NOT NULL DEFAULT '0' COMMENT '商品id',
  `coupon_id` int(11) NOT NULL DEFAULT '0' COMMENT '优惠券id',
  `start_time` varchar(32) NOT NULL DEFAULT '0' COMMENT '开始时间',
  `end_time` varchar(32) NOT NULL DEFAULT '0' COMMENT '结束时间',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '状态 1开启 0关闭',
  `content` varchar(255) NOT NULL DEFAULT '0' COMMENT '备注信息',
  `give_goods` int(10) NOT NULL DEFAULT '0' COMMENT '赠送商品id',
  `max_num` int(11) NOT NULL DEFAULT '0' COMMENT '发放数量',
  `limit_num` int(11) NOT NULL DEFAULT '1' COMMENT '每人限领',
  `create_time` varchar(32) NOT NULL DEFAULT '0',
  `expiration_time` varchar(32) NOT NULL DEFAULT '0' COMMENT '过期时间',
  `limit_goods` text NOT NULL COMMENT '商品id',
  `is_del` int(11) NOT NULL DEFAULT '0' COMMENT '软删除',
  `send_type` int(11) NOT NULL DEFAULT '0' COMMENT '发放方式',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_coupon','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon')." ADD   `uniacid` int(10) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon','coupon_name')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon')." ADD   `coupon_name` varchar(64) NOT NULL COMMENT '优惠券名称'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon','coupon_type')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon')." ADD   `coupon_type` int(10) NOT NULL COMMENT '1:新人券'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon','full_money')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon')." ADD   `full_money` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '门槛'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon','free_money')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon')." ADD   `free_money` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '优惠金额'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon','goods_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon')." ADD   `goods_id` varchar(255) NOT NULL DEFAULT '0' COMMENT '商品id'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon','coupon_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon')." ADD   `coupon_id` int(11) NOT NULL DEFAULT '0' COMMENT '优惠券id'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon','start_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon')." ADD   `start_time` varchar(32) NOT NULL DEFAULT '0' COMMENT '开始时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon','end_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon')." ADD   `end_time` varchar(32) NOT NULL DEFAULT '0' COMMENT '结束时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon')." ADD   `status` int(11) NOT NULL DEFAULT '0' COMMENT '状态 1开启 0关闭'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon','content')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon')." ADD   `content` varchar(255) NOT NULL DEFAULT '0' COMMENT '备注信息'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon','give_goods')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon')." ADD   `give_goods` int(10) NOT NULL DEFAULT '0' COMMENT '赠送商品id'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon','max_num')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon')." ADD   `max_num` int(11) NOT NULL DEFAULT '0' COMMENT '发放数量'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon','limit_num')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon')." ADD   `limit_num` int(11) NOT NULL DEFAULT '1' COMMENT '每人限领'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon')." ADD   `create_time` varchar(32) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon','expiration_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon')." ADD   `expiration_time` varchar(32) NOT NULL DEFAULT '0' COMMENT '过期时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon','limit_goods')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon')." ADD   `limit_goods` text NOT NULL COMMENT '商品id'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon','is_del')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon')." ADD   `is_del` int(11) NOT NULL DEFAULT '0' COMMENT '软删除'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon','send_type')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon')." ADD   `send_type` int(11) NOT NULL DEFAULT '0' COMMENT '发放方式'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_coupon_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `coupon_id` int(11) NOT NULL DEFAULT '1' COMMENT '优惠券id',
  `status` int(11) NOT NULL COMMENT '1未使用2已使用',
  `use_time` varchar(32) NOT NULL DEFAULT '0' COMMENT '使用时间',
  `create_time` varchar(32) NOT NULL DEFAULT '0',
  `get_time` varchar(32) NOT NULL DEFAULT '0' COMMENT '获券时间',
  `full_money` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '门槛',
  `free_money` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '优惠金额',
  `goods_id` varchar(255) NOT NULL DEFAULT '0' COMMENT '限制那些商品',
  `give_goods` int(10) NOT NULL DEFAULT '0' COMMENT '获赠商品',
  `give_coupon_id` int(10) NOT NULL DEFAULT '0' COMMENT '获赠优惠券',
  `expiration_time` varchar(32) NOT NULL DEFAULT '0' COMMENT '过期时间',
  `order_code` varchar(64) NOT NULL DEFAULT '0' COMMENT '订单编号',
  `coupon_name` varchar(255) NOT NULL DEFAULT '0' COMMENT '优惠券名称',
  `limit_goods` text NOT NULL COMMENT '商品 id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_coupon_user','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon_user')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon_user','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon_user')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon_user','uid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon_user')." ADD   `uid` int(11) NOT NULL COMMENT '用户id'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon_user','coupon_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon_user')." ADD   `coupon_id` int(11) NOT NULL DEFAULT '1' COMMENT '优惠券id'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon_user','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon_user')." ADD   `status` int(11) NOT NULL COMMENT '1未使用2已使用'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon_user','use_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon_user')." ADD   `use_time` varchar(32) NOT NULL DEFAULT '0' COMMENT '使用时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon_user','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon_user')." ADD   `create_time` varchar(32) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon_user','get_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon_user')." ADD   `get_time` varchar(32) NOT NULL DEFAULT '0' COMMENT '获券时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon_user','full_money')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon_user')." ADD   `full_money` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '门槛'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon_user','free_money')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon_user')." ADD   `free_money` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '优惠金额'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon_user','goods_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon_user')." ADD   `goods_id` varchar(255) NOT NULL DEFAULT '0' COMMENT '限制那些商品'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon_user','give_goods')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon_user')." ADD   `give_goods` int(10) NOT NULL DEFAULT '0' COMMENT '获赠商品'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon_user','give_coupon_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon_user')." ADD   `give_coupon_id` int(10) NOT NULL DEFAULT '0' COMMENT '获赠优惠券'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon_user','expiration_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon_user')." ADD   `expiration_time` varchar(32) NOT NULL DEFAULT '0' COMMENT '过期时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon_user','order_code')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon_user')." ADD   `order_code` varchar(64) NOT NULL DEFAULT '0' COMMENT '订单编号'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon_user','coupon_name')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon_user')." ADD   `coupon_name` varchar(255) NOT NULL DEFAULT '0' COMMENT '优惠券名称'");}
if(!pdo_fieldexists('longbing_shequpintuan_coupon_user','limit_goods')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_coupon_user')." ADD   `limit_goods` text NOT NULL COMMENT '商品 id'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_delivery_mang` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL DEFAULT '0',
  `cap_id` int(10) NOT NULL DEFAULT '0' COMMENT '团长ID',
  `start_time` int(10) NOT NULL DEFAULT '0' COMMENT '开始时间',
  `end_time` int(10) NOT NULL DEFAULT '0' COMMENT '结束时间',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_delivery_mang','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_delivery_mang')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_delivery_mang','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_delivery_mang')." ADD   `uniacid` int(10) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_delivery_mang','cap_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_delivery_mang')." ADD   `cap_id` int(10) NOT NULL DEFAULT '0' COMMENT '团长ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_delivery_mang','start_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_delivery_mang')." ADD   `start_time` int(10) NOT NULL DEFAULT '0' COMMENT '开始时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_delivery_mang','end_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_delivery_mang')." ADD   `end_time` int(10) NOT NULL DEFAULT '0' COMMENT '结束时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_delivery_mang','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_delivery_mang')." ADD   `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_delivery_mang','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_delivery_mang')." ADD   `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uniacid` int(11) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示',
  `goods_name` varchar(255) NOT NULL DEFAULT '' COMMENT '名称',
  `goods_headimage` varchar(255) DEFAULT '' COMMENT '浓缩图',
  `goods_headimages` varchar(2500) DEFAULT '' COMMENT '滚动图',
  `goods_content` longtext COMMENT '详情',
  `init_price` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '原价',
  `price` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品优惠价',
  `stock` int(10) NOT NULL DEFAULT '0' COMMENT '库存',
  `tag_id` varchar(255) NOT NULL DEFAULT '' COMMENT '标签IDS',
  `fx_ratio` int(3) NOT NULL DEFAULT '0' COMMENT '分销比例',
  `sup_id` int(10) NOT NULL DEFAULT '0' COMMENT '供应商ID',
  `norms` varchar(255) NOT NULL DEFAULT ' ' COMMENT '规格',
  `delivery_time` varchar(255) NOT NULL DEFAULT ' ' COMMENT '送达时间',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `cost_price` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '成本价',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '状态:0=上架;1=下架',
  `recommend` int(10) NOT NULL DEFAULT '0' COMMENT '推荐0 不推荐 1 推荐',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '值越大排序越前',
  `cat_id` int(10) NOT NULL DEFAULT '0' COMMENT '分类',
  `virtual_status` int(10) NOT NULL DEFAULT '0' COMMENT '虚拟销量状态',
  `virtual` int(10) NOT NULL DEFAULT '0' COMMENT '虚拟销量',
  `re_name` varchar(255) NOT NULL COMMENT '商品副标题',
  `spike_price` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '秒杀价',
  `goods_icon` int(11) NOT NULL DEFAULT '0' COMMENT '商品标签',
  `virtual_goods` int(11) NOT NULL DEFAULT '0' COMMENT '是不是虚拟商品',
  `virtual_code` varchar(255) NOT NULL DEFAULT '0' COMMENT '虚拟商品提货码',
  `virtual_time` varchar(64) NOT NULL DEFAULT '0' COMMENT '虚拟商品过期时间',
  `new_mj` int(11) NOT NULL DEFAULT '0' COMMENT '新的满减',
  `max_integral` int(11) NOT NULL DEFAULT '0' COMMENT '最多使用多少积分',
  `re_integral` int(11) NOT NULL DEFAULT '0' COMMENT '返多少积分',
  `much_norms` varchar(625) NOT NULL DEFAULT '0' COMMENT '多规格',
  `is_del` int(11) NOT NULL DEFAULT '0' COMMENT '是否删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=326 DEFAULT CHARSET=utf8 COMMENT='商品表';

");

if(!pdo_fieldexists('longbing_shequpintuan_goods','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `uniacid` int(11) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','goods_name')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `goods_name` varchar(255) NOT NULL DEFAULT '' COMMENT '名称'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','goods_headimage')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `goods_headimage` varchar(255) DEFAULT '' COMMENT '浓缩图'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','goods_headimages')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `goods_headimages` varchar(2500) DEFAULT '' COMMENT '滚动图'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','goods_content')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `goods_content` longtext COMMENT '详情'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','init_price')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `init_price` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '原价'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','price')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `price` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品优惠价'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','stock')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `stock` int(10) NOT NULL DEFAULT '0' COMMENT '库存'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','tag_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `tag_id` varchar(255) NOT NULL DEFAULT '' COMMENT '标签IDS'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','fx_ratio')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `fx_ratio` int(3) NOT NULL DEFAULT '0' COMMENT '分销比例'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','sup_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `sup_id` int(10) NOT NULL DEFAULT '0' COMMENT '供应商ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','norms')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `norms` varchar(255) NOT NULL DEFAULT ' ' COMMENT '规格'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','delivery_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `delivery_time` varchar(255) NOT NULL DEFAULT ' ' COMMENT '送达时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','cost_price')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `cost_price` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '成本价'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `status` int(1) NOT NULL DEFAULT '0' COMMENT '状态:0=上架;1=下架'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','recommend')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `recommend` int(10) NOT NULL DEFAULT '0' COMMENT '推荐0 不推荐 1 推荐'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','sort')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `sort` int(10) NOT NULL DEFAULT '0' COMMENT '值越大排序越前'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','cat_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `cat_id` int(10) NOT NULL DEFAULT '0' COMMENT '分类'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','virtual_status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `virtual_status` int(10) NOT NULL DEFAULT '0' COMMENT '虚拟销量状态'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','virtual')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `virtual` int(10) NOT NULL DEFAULT '0' COMMENT '虚拟销量'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','re_name')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `re_name` varchar(255) NOT NULL COMMENT '商品副标题'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','spike_price')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `spike_price` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '秒杀价'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','goods_icon')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `goods_icon` int(11) NOT NULL DEFAULT '0' COMMENT '商品标签'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','virtual_goods')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `virtual_goods` int(11) NOT NULL DEFAULT '0' COMMENT '是不是虚拟商品'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','virtual_code')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `virtual_code` varchar(255) NOT NULL DEFAULT '0' COMMENT '虚拟商品提货码'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','virtual_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `virtual_time` varchar(64) NOT NULL DEFAULT '0' COMMENT '虚拟商品过期时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','new_mj')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `new_mj` int(11) NOT NULL DEFAULT '0' COMMENT '新的满减'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','max_integral')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `max_integral` int(11) NOT NULL DEFAULT '0' COMMENT '最多使用多少积分'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','re_integral')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `re_integral` int(11) NOT NULL DEFAULT '0' COMMENT '返多少积分'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','much_norms')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `much_norms` varchar(625) NOT NULL DEFAULT '0' COMMENT '多规格'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods','is_del')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods')." ADD   `is_del` int(11) NOT NULL DEFAULT '0' COMMENT '是否删除'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_goods_car` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `cgoods_id` int(11) NOT NULL DEFAULT '0',
  `goods_id` int(11) NOT NULL DEFAULT '0',
  `num` int(11) NOT NULL DEFAULT '1',
  `goods_name` varchar(255) NOT NULL DEFAULT '0',
  `goods_img` varchar(625) NOT NULL DEFAULT '0',
  `cap_id` int(11) NOT NULL DEFAULT '0',
  `city_id` int(11) NOT NULL DEFAULT '0',
  `atv_id` int(11) NOT NULL DEFAULT '0',
  `sup_id` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `much_norms` int(11) NOT NULL DEFAULT '0' COMMENT '多规格',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3731 DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_goods_car','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_car')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_car','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_car')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_car','cgoods_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_car')." ADD   `cgoods_id` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_car','goods_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_car')." ADD   `goods_id` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_car','num')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_car')." ADD   `num` int(11) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_car','goods_name')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_car')." ADD   `goods_name` varchar(255) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_car','goods_img')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_car')." ADD   `goods_img` varchar(625) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_car','cap_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_car')." ADD   `cap_id` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_car','city_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_car')." ADD   `city_id` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_car','atv_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_car')." ADD   `atv_id` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_car','sup_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_car')." ADD   `sup_id` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_car','uid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_car')." ADD   `uid` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_car','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_car')." ADD   `status` int(11) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_car','much_norms')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_car')." ADD   `much_norms` int(11) NOT NULL DEFAULT '0' COMMENT '多规格'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_goods_cat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `p_id` int(10) NOT NULL DEFAULT '0' COMMENT '分类父id',
  `content` varchar(255) NOT NULL COMMENT '分类类容',
  `level` int(10) NOT NULL COMMENT '分类等级',
  `create_time` varchar(32) NOT NULL COMMENT '创建时间',
  `status` int(10) NOT NULL DEFAULT '0' COMMENT '分类状态 0关闭 1开启',
  `type` int(10) NOT NULL DEFAULT '0' COMMENT '暂时没用',
  `uniacid` int(10) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `img` varchar(255) NOT NULL DEFAULT '0' COMMENT '图片',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_goods_cat','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_cat')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_cat','p_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_cat')." ADD   `p_id` int(10) NOT NULL DEFAULT '0' COMMENT '分类父id'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_cat','content')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_cat')." ADD   `content` varchar(255) NOT NULL COMMENT '分类类容'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_cat','level')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_cat')." ADD   `level` int(10) NOT NULL COMMENT '分类等级'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_cat','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_cat')." ADD   `create_time` varchar(32) NOT NULL COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_cat','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_cat')." ADD   `status` int(10) NOT NULL DEFAULT '0' COMMENT '分类状态 0关闭 1开启'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_cat','type')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_cat')." ADD   `type` int(10) NOT NULL DEFAULT '0' COMMENT '暂时没用'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_cat','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_cat')." ADD   `uniacid` int(10) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_cat','sort')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_cat')." ADD   `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_cat','img')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_cat')." ADD   `img` varchar(255) NOT NULL DEFAULT '0' COMMENT '图片'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_goods_evaluate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `goods_id` int(11) NOT NULL DEFAULT '0' COMMENT '商品id',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `img` varchar(625) NOT NULL DEFAULT '0' COMMENT '评价图片',
  `content` varchar(255) NOT NULL DEFAULT '0' COMMENT '内容',
  `create_time` varchar(64) NOT NULL DEFAULT '0' COMMENT '评价时间',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '状态',
  `order_id` int(11) NOT NULL DEFAULT '0' COMMENT '订单id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_goods_evaluate','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_evaluate')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_evaluate','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_evaluate')." ADD   `uniacid` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_evaluate','goods_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_evaluate')." ADD   `goods_id` int(11) NOT NULL DEFAULT '0' COMMENT '商品id'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_evaluate','user_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_evaluate')." ADD   `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户id'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_evaluate','img')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_evaluate')." ADD   `img` varchar(625) NOT NULL DEFAULT '0' COMMENT '评价图片'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_evaluate','content')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_evaluate')." ADD   `content` varchar(255) NOT NULL DEFAULT '0' COMMENT '内容'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_evaluate','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_evaluate')." ADD   `create_time` varchar(64) NOT NULL DEFAULT '0' COMMENT '评价时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_evaluate','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_evaluate')." ADD   `status` int(11) NOT NULL DEFAULT '1' COMMENT '状态'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_evaluate','order_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_evaluate')." ADD   `order_id` int(11) NOT NULL DEFAULT '0' COMMENT '订单id'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_goods_icon` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `name` varchar(625) NOT NULL,
  `img` varchar(625) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_goods_icon','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_icon')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_icon','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_icon')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_icon','name')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_icon')." ADD   `name` varchar(625) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_icon','img')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_icon')." ADD   `img` varchar(625) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_goods_norms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(625) NOT NULL DEFAULT '0' COMMENT '规格名称',
  `price` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `stock` int(11) NOT NULL DEFAULT '0' COMMENT '库存',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '状态',
  `sort` varchar(255) NOT NULL DEFAULT '0' COMMENT '排序',
  `img` varchar(625) NOT NULL DEFAULT '0' COMMENT '图片',
  `norms` varchar(255) NOT NULL DEFAULT '0',
  `is_del` int(11) NOT NULL DEFAULT '0' COMMENT '是否删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_goods_norms','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_norms')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_norms','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_norms')." ADD   `uniacid` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_norms','name')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_norms')." ADD   `name` varchar(625) NOT NULL DEFAULT '0' COMMENT '规格名称'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_norms','price')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_norms')." ADD   `price` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_norms','stock')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_norms')." ADD   `stock` int(11) NOT NULL DEFAULT '0' COMMENT '库存'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_norms','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_norms')." ADD   `status` int(11) NOT NULL DEFAULT '0' COMMENT '状态'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_norms','sort')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_norms')." ADD   `sort` varchar(255) NOT NULL DEFAULT '0' COMMENT '排序'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_norms','img')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_norms')." ADD   `img` varchar(625) NOT NULL DEFAULT '0' COMMENT '图片'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_norms','norms')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_norms')." ADD   `norms` varchar(255) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_norms','is_del')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_norms')." ADD   `is_del` int(11) NOT NULL DEFAULT '0' COMMENT '是否删除'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_goods_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uniacid` int(11) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示',
  `tag_name` varchar(255) NOT NULL DEFAULT '' COMMENT '标签名称',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `type` int(1) NOT NULL DEFAULT '0' COMMENT '标签:0=限购;1=满减',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '开启状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='标签表';

");

if(!pdo_fieldexists('longbing_shequpintuan_goods_tag','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_tag')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_tag','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_tag')." ADD   `uniacid` int(11) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_tag','tag_name')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_tag')." ADD   `tag_name` varchar(255) NOT NULL DEFAULT '' COMMENT '标签名称'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_tag','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_tag')." ADD   `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_tag','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_tag')." ADD   `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_tag','type')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_tag')." ADD   `type` int(1) NOT NULL DEFAULT '0' COMMENT '标签:0=限购;1=满减'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_tag','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_tag')." ADD   `status` int(1) NOT NULL DEFAULT '1' COMMENT '开启状态'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_goods_tagcontent` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uniacid` int(11) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示',
  `type` int(10) NOT NULL DEFAULT '0' COMMENT '标签类型',
  `money` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '满多少',
  `discounts` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '减多少/限购多少份',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='标签内容表';

");

if(!pdo_fieldexists('longbing_shequpintuan_goods_tagcontent','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_tagcontent')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_tagcontent','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_tagcontent')." ADD   `uniacid` int(11) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_tagcontent','type')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_tagcontent')." ADD   `type` int(10) NOT NULL DEFAULT '0' COMMENT '标签类型'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_tagcontent','money')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_tagcontent')." ADD   `money` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '满多少'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_tagcontent','discounts')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_tagcontent')." ADD   `discounts` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '减多少/限购多少份'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_tagcontent','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_tagcontent')." ADD   `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_goods_tagcontent','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_goods_tagcontent')." ADD   `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_integral` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `integral` int(11) NOT NULL DEFAULT '0' COMMENT '积分',
  `money` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '积分',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '状态',
  `content` varchar(1048) NOT NULL DEFAULT '0' COMMENT '积分说明',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_integral','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_integral')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_integral','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_integral')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_integral','integral')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_integral')." ADD   `integral` int(11) NOT NULL DEFAULT '0' COMMENT '积分'");}
if(!pdo_fieldexists('longbing_shequpintuan_integral','money')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_integral')." ADD   `money` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '积分'");}
if(!pdo_fieldexists('longbing_shequpintuan_integral','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_integral')." ADD   `status` int(11) NOT NULL DEFAULT '0' COMMENT '状态'");}
if(!pdo_fieldexists('longbing_shequpintuan_integral','content')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_integral')." ADD   `content` varchar(1048) NOT NULL DEFAULT '0' COMMENT '积分说明'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_minus_mj` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `full` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '满多少元',
  `discount` double(10,2) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_minus_mj','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_minus_mj')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_minus_mj','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_minus_mj')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_minus_mj','full')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_minus_mj')." ADD   `full` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '满多少元'");}
if(!pdo_fieldexists('longbing_shequpintuan_minus_mj','discount')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_minus_mj')." ADD   `discount` double(10,2) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_minus_mj','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_minus_mj')." ADD   `status` int(10) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_order_return` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `order_code` varchar(255) NOT NULL DEFAULT '0' COMMENT '售后单号',
  `order_id` int(11) NOT NULL DEFAULT '0' COMMENT '订单id',
  `shopbag_id` int(11) NOT NULL DEFAULT '0' COMMENT '子订单的id',
  `goods_id` int(11) NOT NULL DEFAULT '0' COMMENT '商品id',
  `num` int(11) NOT NULL DEFAULT '0' COMMENT '商品数量',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0:团长审核中 1：通过 2：不通过',
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '1:退款订单 2：退货订单',
  `create_time` varchar(64) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `sh_time` varchar(64) NOT NULL DEFAULT '0' COMMENT '平台审核时间',
  `capsh_time` varchar(64) NOT NULL DEFAULT '0' COMMENT '团长审核时间',
  `price` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '总的退款金额',
  `balance` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '余额退款',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `img` varchar(255) NOT NULL DEFAULT '0' COMMENT '图片',
  `content` varchar(255) NOT NULL DEFAULT '0' COMMENT '退款内容',
  `cap_id` int(11) NOT NULL DEFAULT '0' COMMENT '团长id',
  `company_status` int(11) NOT NULL DEFAULT '0' COMMENT '平台审核状态0：审核中，1成功，2失败',
  `text` varchar(625) NOT NULL DEFAULT '0' COMMENT '平台标注说明',
  `imgs` varchar(1024) NOT NULL DEFAULT '0' COMMENT '图片',
  `goods_ids` varchar(255) NOT NULL DEFAULT '0' COMMENT '退款的商品',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_order_return','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_order_return')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_order_return','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_order_return')." ADD   `uniacid` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_order_return','order_code')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_order_return')." ADD   `order_code` varchar(255) NOT NULL DEFAULT '0' COMMENT '售后单号'");}
if(!pdo_fieldexists('longbing_shequpintuan_order_return','order_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_order_return')." ADD   `order_id` int(11) NOT NULL DEFAULT '0' COMMENT '订单id'");}
if(!pdo_fieldexists('longbing_shequpintuan_order_return','shopbag_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_order_return')." ADD   `shopbag_id` int(11) NOT NULL DEFAULT '0' COMMENT '子订单的id'");}
if(!pdo_fieldexists('longbing_shequpintuan_order_return','goods_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_order_return')." ADD   `goods_id` int(11) NOT NULL DEFAULT '0' COMMENT '商品id'");}
if(!pdo_fieldexists('longbing_shequpintuan_order_return','num')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_order_return')." ADD   `num` int(11) NOT NULL DEFAULT '0' COMMENT '商品数量'");}
if(!pdo_fieldexists('longbing_shequpintuan_order_return','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_order_return')." ADD   `status` int(11) NOT NULL DEFAULT '0' COMMENT '0:团长审核中 1：通过 2：不通过'");}
if(!pdo_fieldexists('longbing_shequpintuan_order_return','type')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_order_return')." ADD   `type` int(11) NOT NULL DEFAULT '0' COMMENT '1:退款订单 2：退货订单'");}
if(!pdo_fieldexists('longbing_shequpintuan_order_return','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_order_return')." ADD   `create_time` varchar(64) NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_order_return','sh_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_order_return')." ADD   `sh_time` varchar(64) NOT NULL DEFAULT '0' COMMENT '平台审核时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_order_return','capsh_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_order_return')." ADD   `capsh_time` varchar(64) NOT NULL DEFAULT '0' COMMENT '团长审核时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_order_return','price')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_order_return')." ADD   `price` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '总的退款金额'");}
if(!pdo_fieldexists('longbing_shequpintuan_order_return','balance')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_order_return')." ADD   `balance` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '余额退款'");}
if(!pdo_fieldexists('longbing_shequpintuan_order_return','uid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_order_return')." ADD   `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户id'");}
if(!pdo_fieldexists('longbing_shequpintuan_order_return','img')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_order_return')." ADD   `img` varchar(255) NOT NULL DEFAULT '0' COMMENT '图片'");}
if(!pdo_fieldexists('longbing_shequpintuan_order_return','content')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_order_return')." ADD   `content` varchar(255) NOT NULL DEFAULT '0' COMMENT '退款内容'");}
if(!pdo_fieldexists('longbing_shequpintuan_order_return','cap_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_order_return')." ADD   `cap_id` int(11) NOT NULL DEFAULT '0' COMMENT '团长id'");}
if(!pdo_fieldexists('longbing_shequpintuan_order_return','company_status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_order_return')." ADD   `company_status` int(11) NOT NULL DEFAULT '0' COMMENT '平台审核状态0：审核中，1成功，2失败'");}
if(!pdo_fieldexists('longbing_shequpintuan_order_return','text')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_order_return')." ADD   `text` varchar(625) NOT NULL DEFAULT '0' COMMENT '平台标注说明'");}
if(!pdo_fieldexists('longbing_shequpintuan_order_return','imgs')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_order_return')." ADD   `imgs` varchar(1024) NOT NULL DEFAULT '0' COMMENT '图片'");}
if(!pdo_fieldexists('longbing_shequpintuan_order_return','goods_ids')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_order_return')." ADD   `goods_ids` varchar(255) NOT NULL DEFAULT '0' COMMENT '退款的商品'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示',
  `coupon_id` int(11) NOT NULL DEFAULT '0' COMMENT '优惠券id',
  `order_code` varchar(255) NOT NULL COMMENT '订单号',
  `count_price` double(10,2) DEFAULT NULL COMMENT '总金额',
  `pay_price` double(10,2) DEFAULT NULL COMMENT '支付金额',
  `pay_type` int(1) DEFAULT '0' COMMENT '订单状态：-1=取消订单,0=未支付,1=已付款,2=待提货,3=交易完成',
  `uid` int(10) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `cap_id` int(10) NOT NULL DEFAULT '0' COMMENT '团长ID',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `pay_time` int(11) NOT NULL DEFAULT '0' COMMENT '付款时间',
  `up_time` int(11) NOT NULL DEFAULT '0' COMMENT '团长收货时间',
  `end_time` int(11) NOT NULL DEFAULT '0' COMMENT '交易完成时间',
  `goods_data` text NOT NULL COMMENT '商品序列化',
  `address_data` varchar(3000) NOT NULL DEFAULT '' COMMENT '地址序列化',
  `coupon_data` varchar(3000) NOT NULL DEFAULT ' ' COMMENT '优惠券序列化',
  `pay_data` varchar(1000) NOT NULL DEFAULT '' COMMENT '支付返回序列化',
  `ref_data` varchar(1000) NOT NULL DEFAULT '' COMMENT '退款返回序列化',
  `comment_id` int(11) NOT NULL DEFAULT '0' COMMENT '评论id',
  `ref_time` int(11) NOT NULL DEFAULT '0' COMMENT '退款时间',
  `order_qrcode` varchar(255) NOT NULL DEFAULT '' COMMENT '订单码',
  `fx_price` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '分销佣金',
  `qx_time` int(11) NOT NULL DEFAULT '0' COMMENT '订单倒计时',
  `send_time` int(10) NOT NULL DEFAULT '0' COMMENT '发货时间',
  `order_path` text NOT NULL COMMENT '物流信息',
  `profit_price` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '利润',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `delivery_time` int(10) NOT NULL DEFAULT '0' COMMENT '送达时间',
  `user_mobile` varchar(11) DEFAULT '' COMMENT '用户手机号:仅为了搜索',
  `print_status` int(1) NOT NULL DEFAULT '0' COMMENT '打印状态:0=未打印;1=已打印',
  `cityid` int(10) NOT NULL DEFAULT '0' COMMENT '所属城市',
  `atv_id` int(10) NOT NULL DEFAULT '0' COMMENT '活动ID',
  `cargoid` int(10) NOT NULL DEFAULT '0' COMMENT '清单ID',
  `lift` int(10) NOT NULL DEFAULT '0' COMMENT '是否自提0自提1送货上门',
  `freight` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '运费',
  `order_text` varchar(500) NOT NULL COMMENT '订单备注',
  `prepay_id` varchar(64) NOT NULL DEFAULT '0',
  `balance` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '余额支付金额',
  `delivery_data` varchar(625) NOT NULL DEFAULT '0' COMMENT '配送时间',
  `is_spike` int(10) NOT NULL DEFAULT '0' COMMENT '判断是否是秒杀',
  `is_virtual` int(10) NOT NULL DEFAULT '0' COMMENT '是不是虚拟商品订单',
  `hx_virtual` int(11) NOT NULL DEFAULT '0' COMMENT '虚拟商品是否已经核销',
  `send_integral` int(11) NOT NULL DEFAULT '0' COMMENT '赠送积分',
  `use_integral` int(11) NOT NULL DEFAULT '0' COMMENT '使用积分',
  `is_balance` int(11) NOT NULL DEFAULT '0' COMMENT '是否是余额支付',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7003 DEFAULT CHARSET=utf8 COMMENT='订单表';

");

if(!pdo_fieldexists('longbing_shequpintuan_orders','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','coupon_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `coupon_id` int(11) NOT NULL DEFAULT '0' COMMENT '优惠券id'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','order_code')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `order_code` varchar(255) NOT NULL COMMENT '订单号'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','count_price')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `count_price` double(10,2) DEFAULT NULL COMMENT '总金额'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','pay_price')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `pay_price` double(10,2) DEFAULT NULL COMMENT '支付金额'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','pay_type')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `pay_type` int(1) DEFAULT '0' COMMENT '订单状态：-1=取消订单,0=未支付,1=已付款,2=待提货,3=交易完成'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','uid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `uid` int(10) NOT NULL DEFAULT '0' COMMENT '用户ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','cap_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `cap_id` int(10) NOT NULL DEFAULT '0' COMMENT '团长ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','pay_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `pay_time` int(11) NOT NULL DEFAULT '0' COMMENT '付款时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','up_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `up_time` int(11) NOT NULL DEFAULT '0' COMMENT '团长收货时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','end_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `end_time` int(11) NOT NULL DEFAULT '0' COMMENT '交易完成时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','goods_data')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `goods_data` text NOT NULL COMMENT '商品序列化'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','address_data')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `address_data` varchar(3000) NOT NULL DEFAULT '' COMMENT '地址序列化'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','coupon_data')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `coupon_data` varchar(3000) NOT NULL DEFAULT ' ' COMMENT '优惠券序列化'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','pay_data')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `pay_data` varchar(1000) NOT NULL DEFAULT '' COMMENT '支付返回序列化'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','ref_data')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `ref_data` varchar(1000) NOT NULL DEFAULT '' COMMENT '退款返回序列化'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','comment_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `comment_id` int(11) NOT NULL DEFAULT '0' COMMENT '评论id'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','ref_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `ref_time` int(11) NOT NULL DEFAULT '0' COMMENT '退款时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','order_qrcode')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `order_qrcode` varchar(255) NOT NULL DEFAULT '' COMMENT '订单码'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','fx_price')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `fx_price` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '分销佣金'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','qx_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `qx_time` int(11) NOT NULL DEFAULT '0' COMMENT '订单倒计时'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','send_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `send_time` int(10) NOT NULL DEFAULT '0' COMMENT '发货时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','order_path')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `order_path` text NOT NULL COMMENT '物流信息'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','profit_price')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `profit_price` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '利润'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','delivery_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `delivery_time` int(10) NOT NULL DEFAULT '0' COMMENT '送达时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','user_mobile')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `user_mobile` varchar(11) DEFAULT '' COMMENT '用户手机号:仅为了搜索'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','print_status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `print_status` int(1) NOT NULL DEFAULT '0' COMMENT '打印状态:0=未打印;1=已打印'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','cityid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `cityid` int(10) NOT NULL DEFAULT '0' COMMENT '所属城市'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','atv_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `atv_id` int(10) NOT NULL DEFAULT '0' COMMENT '活动ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','cargoid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `cargoid` int(10) NOT NULL DEFAULT '0' COMMENT '清单ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','lift')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `lift` int(10) NOT NULL DEFAULT '0' COMMENT '是否自提0自提1送货上门'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','freight')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `freight` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '运费'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','order_text')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `order_text` varchar(500) NOT NULL COMMENT '订单备注'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','prepay_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `prepay_id` varchar(64) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','balance')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `balance` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '余额支付金额'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','delivery_data')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `delivery_data` varchar(625) NOT NULL DEFAULT '0' COMMENT '配送时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','is_spike')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `is_spike` int(10) NOT NULL DEFAULT '0' COMMENT '判断是否是秒杀'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','is_virtual')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `is_virtual` int(10) NOT NULL DEFAULT '0' COMMENT '是不是虚拟商品订单'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','hx_virtual')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `hx_virtual` int(11) NOT NULL DEFAULT '0' COMMENT '虚拟商品是否已经核销'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','send_integral')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `send_integral` int(11) NOT NULL DEFAULT '0' COMMENT '赠送积分'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','use_integral')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `use_integral` int(11) NOT NULL DEFAULT '0' COMMENT '使用积分'");}
if(!pdo_fieldexists('longbing_shequpintuan_orders','is_balance')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_orders')." ADD   `is_balance` int(11) NOT NULL DEFAULT '0' COMMENT '是否是余额支付'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_recharge` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0' COMMENT '用户id',
  `cash` double(10,2) DEFAULT '0.00' COMMENT '充值金额',
  `create_time` varchar(64) DEFAULT '0' COMMENT '充值时间',
  `order_code` varchar(255) NOT NULL DEFAULT '0' COMMENT '充值订单号',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '状态',
  `recharge` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '充值金额',
  `return_integral` int(11) NOT NULL DEFAULT '0' COMMENT '赠送积分',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_recharge','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_recharge')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_recharge','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_recharge')." ADD   `uniacid` int(11) DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_recharge','uid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_recharge')." ADD   `uid` int(11) DEFAULT '0' COMMENT '用户id'");}
if(!pdo_fieldexists('longbing_shequpintuan_recharge','cash')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_recharge')." ADD   `cash` double(10,2) DEFAULT '0.00' COMMENT '充值金额'");}
if(!pdo_fieldexists('longbing_shequpintuan_recharge','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_recharge')." ADD   `create_time` varchar(64) DEFAULT '0' COMMENT '充值时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_recharge','order_code')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_recharge')." ADD   `order_code` varchar(255) NOT NULL DEFAULT '0' COMMENT '充值订单号'");}
if(!pdo_fieldexists('longbing_shequpintuan_recharge','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_recharge')." ADD   `status` int(11) NOT NULL DEFAULT '0' COMMENT '状态'");}
if(!pdo_fieldexists('longbing_shequpintuan_recharge','recharge')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_recharge')." ADD   `recharge` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '充值金额'");}
if(!pdo_fieldexists('longbing_shequpintuan_recharge','return_integral')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_recharge')." ADD   `return_integral` int(11) NOT NULL DEFAULT '0' COMMENT '赠送积分'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_recharge_balance` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `recharge` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '充值',
  `return_money` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '可获金额',
  `return_integral` int(11) NOT NULL DEFAULT '0' COMMENT '可送积分',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_recharge_balance','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_recharge_balance')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_recharge_balance','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_recharge_balance')." ADD   `uniacid` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_recharge_balance','recharge')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_recharge_balance')." ADD   `recharge` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '充值'");}
if(!pdo_fieldexists('longbing_shequpintuan_recharge_balance','return_money')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_recharge_balance')." ADD   `return_money` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '可获金额'");}
if(!pdo_fieldexists('longbing_shequpintuan_recharge_balance','return_integral')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_recharge_balance')." ADD   `return_integral` int(11) NOT NULL DEFAULT '0' COMMENT '可送积分'");}
if(!pdo_fieldexists('longbing_shequpintuan_recharge_balance','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_recharge_balance')." ADD   `status` int(11) NOT NULL DEFAULT '0' COMMENT '状态'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_shopbag` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示',
  `oid` int(10) NOT NULL DEFAULT '0' COMMENT '订单ID',
  `uid` int(10) NOT NULL COMMENT '购买用户id',
  `cpgid` int(11) NOT NULL COMMENT '商品活动中间表',
  `goods_num` int(3) NOT NULL DEFAULT '1' COMMENT '购买商品数量',
  `ref_type` int(1) DEFAULT '0' COMMENT '退货状态：0=未申请,1=未审核,2=同意,3=拒绝,4=退款完成',
  `ref_info` varchar(1000) NOT NULL DEFAULT '' COMMENT '退货原因序列化',
  `ref_false_info` varchar(1000) NOT NULL DEFAULT '' COMMENT '退货失败原因',
  `ref_data` varchar(1000) NOT NULL DEFAULT '' COMMENT '退款返回序列化',
  `comment_id` int(10) NOT NULL DEFAULT '0' COMMENT '评论id',
  `create_time` varchar(255) DEFAULT NULL COMMENT '创建时间',
  `ref_time` varchar(255) DEFAULT NULL COMMENT '退货申请时间',
  `refund_time` varchar(255) DEFAULT NULL COMMENT '退货完成时间',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '是否选中',
  `goods_id` int(10) NOT NULL DEFAULT '0' COMMENT '商品ID',
  `goods_name` varchar(255) DEFAULT '' COMMENT '商品名字',
  `goods_headimage` varchar(255) DEFAULT '' COMMENT '商品名字',
  `init_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '原价',
  `cost_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '成本价',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '支付价',
  `return_id` int(11) DEFAULT '0' COMMENT '退货订单号',
  `tag` varchar(255) DEFAULT '' COMMENT '标签',
  `fx_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '分销佣金',
  `qx_is` int(10) NOT NULL DEFAULT '0' COMMENT '是否取消:0=正常;1=取消订单',
  `norms` varchar(255) DEFAULT '' COMMENT '规格',
  `cityid` int(10) NOT NULL DEFAULT '0' COMMENT '城市ID',
  `sup_id` int(10) NOT NULL DEFAULT '0' COMMENT '供应商ID',
  `is_spike` int(10) NOT NULL DEFAULT '0' COMMENT '判断是否是秒杀',
  `use_integral` varchar(255) NOT NULL DEFAULT '0',
  `send_integral` varchar(255) NOT NULL DEFAULT '0',
  `much_norms` varchar(625) NOT NULL DEFAULT '0' COMMENT '多规格',
  PRIMARY KEY (`id`),
  KEY `oid` (`oid`,`cpgid`)
) ENGINE=InnoDB AUTO_INCREMENT=10874 DEFAULT CHARSET=utf8 COMMENT='购物袋表';

");

if(!pdo_fieldexists('longbing_shequpintuan_shopbag','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD 
  `id` int(10) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','oid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `oid` int(10) NOT NULL DEFAULT '0' COMMENT '订单ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','uid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `uid` int(10) NOT NULL COMMENT '购买用户id'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','cpgid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `cpgid` int(11) NOT NULL COMMENT '商品活动中间表'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','goods_num')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `goods_num` int(3) NOT NULL DEFAULT '1' COMMENT '购买商品数量'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','ref_type')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `ref_type` int(1) DEFAULT '0' COMMENT '退货状态：0=未申请,1=未审核,2=同意,3=拒绝,4=退款完成'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','ref_info')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `ref_info` varchar(1000) NOT NULL DEFAULT '' COMMENT '退货原因序列化'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','ref_false_info')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `ref_false_info` varchar(1000) NOT NULL DEFAULT '' COMMENT '退货失败原因'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','ref_data')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `ref_data` varchar(1000) NOT NULL DEFAULT '' COMMENT '退款返回序列化'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','comment_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `comment_id` int(10) NOT NULL DEFAULT '0' COMMENT '评论id'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `create_time` varchar(255) DEFAULT NULL COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','ref_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `ref_time` varchar(255) DEFAULT NULL COMMENT '退货申请时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','refund_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `refund_time` varchar(255) DEFAULT NULL COMMENT '退货完成时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `status` int(1) NOT NULL DEFAULT '1' COMMENT '是否选中'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','goods_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `goods_id` int(10) NOT NULL DEFAULT '0' COMMENT '商品ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','goods_name')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `goods_name` varchar(255) DEFAULT '' COMMENT '商品名字'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','goods_headimage')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `goods_headimage` varchar(255) DEFAULT '' COMMENT '商品名字'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','init_price')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `init_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '原价'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','cost_price')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `cost_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '成本价'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','price')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '支付价'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','return_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `return_id` int(11) DEFAULT '0' COMMENT '退货订单号'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','tag')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `tag` varchar(255) DEFAULT '' COMMENT '标签'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','fx_price')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `fx_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '分销佣金'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','qx_is')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `qx_is` int(10) NOT NULL DEFAULT '0' COMMENT '是否取消:0=正常;1=取消订单'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','norms')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `norms` varchar(255) DEFAULT '' COMMENT '规格'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','cityid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `cityid` int(10) NOT NULL DEFAULT '0' COMMENT '城市ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','sup_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `sup_id` int(10) NOT NULL DEFAULT '0' COMMENT '供应商ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','is_spike')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `is_spike` int(10) NOT NULL DEFAULT '0' COMMENT '判断是否是秒杀'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','use_integral')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `use_integral` varchar(255) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','send_integral')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `send_integral` varchar(255) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','much_norms')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   `much_norms` varchar(625) NOT NULL DEFAULT '0' COMMENT '多规格'");}
if(!pdo_fieldexists('longbing_shequpintuan_shopbag','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_shopbag')." ADD   PRIMARY KEY (`id`)");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_sign` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `day` int(11) NOT NULL DEFAULT '1',
  `send` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_sign','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_sign')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_sign','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_sign')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_sign','day')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_sign')." ADD   `day` int(11) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('longbing_shequpintuan_sign','send')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_sign')." ADD   `send` int(11) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_sign','type')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_sign')." ADD   `type` int(11) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_sign_record` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `sign_time` varchar(11) NOT NULL DEFAULT '0' COMMENT '签到时间',
  `send` int(11) NOT NULL DEFAULT '0' COMMENT '赠送积分',
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '是否是任务',
  `status` int(11) NOT NULL DEFAULT '0',
  `task_id` int(11) NOT NULL DEFAULT '0' COMMENT '任务id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_sign_record','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_sign_record')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_sign_record','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_sign_record')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_sign_record','uid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_sign_record')." ADD   `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户id'");}
if(!pdo_fieldexists('longbing_shequpintuan_sign_record','sign_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_sign_record')." ADD   `sign_time` varchar(11) NOT NULL DEFAULT '0' COMMENT '签到时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_sign_record','send')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_sign_record')." ADD   `send` int(11) NOT NULL DEFAULT '0' COMMENT '赠送积分'");}
if(!pdo_fieldexists('longbing_shequpintuan_sign_record','type')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_sign_record')." ADD   `type` int(11) NOT NULL DEFAULT '0' COMMENT '是否是任务'");}
if(!pdo_fieldexists('longbing_shequpintuan_sign_record','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_sign_record')." ADD   `status` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_sign_record','task_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_sign_record')." ADD   `task_id` int(11) NOT NULL DEFAULT '0' COMMENT '任务id'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_sign_site` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `send` int(11) NOT NULL DEFAULT '0' COMMENT '每次签到赠送积分',
  `text` text NOT NULL COMMENT '签到说明',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_sign_site','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_sign_site')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_sign_site','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_sign_site')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_sign_site','send')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_sign_site')." ADD   `send` int(11) NOT NULL DEFAULT '0' COMMENT '每次签到赠送积分'");}
if(!pdo_fieldexists('longbing_shequpintuan_sign_site','text')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_sign_site')." ADD   `text` text NOT NULL COMMENT '签到说明'");}
if(!pdo_fieldexists('longbing_shequpintuan_sign_site','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_sign_site')." ADD   `status` int(11) NOT NULL DEFAULT '0'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_spike` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `goods_id` varchar(625) NOT NULL DEFAULT '0' COMMENT '秒杀商品',
  `start_time` varchar(64) NOT NULL DEFAULT '0' COMMENT '开始时间',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '状态',
  `active_id` int(11) NOT NULL DEFAULT '0' COMMENT '活动id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_spike','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_spike')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_spike','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_spike')." ADD   `uniacid` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_spike','goods_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_spike')." ADD   `goods_id` varchar(625) NOT NULL DEFAULT '0' COMMENT '秒杀商品'");}
if(!pdo_fieldexists('longbing_shequpintuan_spike','start_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_spike')." ADD   `start_time` varchar(64) NOT NULL DEFAULT '0' COMMENT '开始时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_spike','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_spike')." ADD   `status` int(11) NOT NULL DEFAULT '1' COMMENT '状态'");}
if(!pdo_fieldexists('longbing_shequpintuan_spike','active_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_spike')." ADD   `active_id` int(11) NOT NULL DEFAULT '0' COMMENT '活动id'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_supplier` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `address` varchar(255) DEFAULT '' COMMENT '地址',
  `lng` varchar(255) DEFAULT '' COMMENT '经度',
  `lat` varchar(255) DEFAULT '' COMMENT '纬度',
  `username` varchar(255) DEFAULT '' COMMENT '供应商姓名',
  `mobile` varchar(11) DEFAULT '' COMMENT '联系电话',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '审核状态: 0=未审核;1=审核成功',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `cityid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '城市ID',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`uid`) COMMENT '用户ID'
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='供应商表';

");

if(!pdo_fieldexists('longbing_shequpintuan_supplier','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_supplier')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_supplier','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_supplier')." ADD   `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示'");}
if(!pdo_fieldexists('longbing_shequpintuan_supplier','uid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_supplier')." ADD   `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_supplier','address')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_supplier')." ADD   `address` varchar(255) DEFAULT '' COMMENT '地址'");}
if(!pdo_fieldexists('longbing_shequpintuan_supplier','lng')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_supplier')." ADD   `lng` varchar(255) DEFAULT '' COMMENT '经度'");}
if(!pdo_fieldexists('longbing_shequpintuan_supplier','lat')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_supplier')." ADD   `lat` varchar(255) DEFAULT '' COMMENT '纬度'");}
if(!pdo_fieldexists('longbing_shequpintuan_supplier','username')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_supplier')." ADD   `username` varchar(255) DEFAULT '' COMMENT '供应商姓名'");}
if(!pdo_fieldexists('longbing_shequpintuan_supplier','mobile')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_supplier')." ADD   `mobile` varchar(11) DEFAULT '' COMMENT '联系电话'");}
if(!pdo_fieldexists('longbing_shequpintuan_supplier','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_supplier')." ADD   `status` int(1) NOT NULL DEFAULT '0' COMMENT '审核状态: 0=未审核;1=审核成功'");}
if(!pdo_fieldexists('longbing_shequpintuan_supplier','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_supplier')." ADD   `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_supplier','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_supplier')." ADD   `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_supplier','cityid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_supplier')." ADD   `cityid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '城市ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_supplier','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_supplier')." ADD   PRIMARY KEY (`id`)");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_ucs_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) DEFAULT '0',
  `cap_id` int(10) DEFAULT '0' COMMENT '团长ID',
  `uid` int(10) DEFAULT '0' COMMENT '用户id',
  `num` int(10) DEFAULT '0' COMMENT '选择次数',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3892 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('longbing_shequpintuan_ucs_record','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_ucs_record')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_ucs_record','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_ucs_record')." ADD   `uniacid` int(10) DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_ucs_record','cap_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_ucs_record')." ADD   `cap_id` int(10) DEFAULT '0' COMMENT '团长ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_ucs_record','uid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_ucs_record')." ADD   `uid` int(10) DEFAULT '0' COMMENT '用户id'");}
if(!pdo_fieldexists('longbing_shequpintuan_ucs_record','num')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_ucs_record')." ADD   `num` int(10) DEFAULT '0' COMMENT '选择次数'");}
if(!pdo_fieldexists('longbing_shequpintuan_ucs_record','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_ucs_record')." ADD   `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_ucs_record','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_ucs_record')." ADD   `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `openid` varchar(255) DEFAULT NULL COMMENT '小程序openID',
  `mp_openid` varchar(30) NOT NULL DEFAULT '' COMMENT '公众号openid',
  `uniacid` int(11) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示',
  `unionid` varchar(30) NOT NULL DEFAULT '' COMMENT '微信全局唯一标示unionid',
  `headimage` varchar(255) DEFAULT '' COMMENT '头像',
  `nickname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '' COMMENT '昵称',
  `cp_id` int(10) NOT NULL DEFAULT '0' COMMENT '最后一次选择的社区ID',
  `mobile` varchar(11) NOT NULL DEFAULT '' COMMENT '手机号',
  `login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `storey` varchar(255) NOT NULL DEFAULT ' ' COMMENT '楼层信息',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '是否封杀:0=正常;1=封杀',
  `cash` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '余额',
  `fx_pid` int(11) NOT NULL DEFAULT '0' COMMENT '上级用户id',
  `fx_cash` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '分销佣金',
  `integral` int(11) NOT NULL DEFAULT '0' COMMENT '积分',
  `last_sign_time` varchar(11) NOT NULL DEFAULT '0',
  `total_sign_day` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5780 DEFAULT CHARSET=utf8 COMMENT='用户表';

");

if(!pdo_fieldexists('longbing_shequpintuan_user','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_user','openid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user')." ADD   `openid` varchar(255) DEFAULT NULL COMMENT '小程序openID'");}
if(!pdo_fieldexists('longbing_shequpintuan_user','mp_openid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user')." ADD   `mp_openid` varchar(30) NOT NULL DEFAULT '' COMMENT '公众号openid'");}
if(!pdo_fieldexists('longbing_shequpintuan_user','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user')." ADD   `uniacid` int(11) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示'");}
if(!pdo_fieldexists('longbing_shequpintuan_user','unionid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user')." ADD   `unionid` varchar(30) NOT NULL DEFAULT '' COMMENT '微信全局唯一标示unionid'");}
if(!pdo_fieldexists('longbing_shequpintuan_user','headimage')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user')." ADD   `headimage` varchar(255) DEFAULT '' COMMENT '头像'");}
if(!pdo_fieldexists('longbing_shequpintuan_user','nickname')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user')." ADD   `nickname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '' COMMENT '昵称'");}
if(!pdo_fieldexists('longbing_shequpintuan_user','cp_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user')." ADD   `cp_id` int(10) NOT NULL DEFAULT '0' COMMENT '最后一次选择的社区ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_user','mobile')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user')." ADD   `mobile` varchar(11) NOT NULL DEFAULT '' COMMENT '手机号'");}
if(!pdo_fieldexists('longbing_shequpintuan_user','login_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user')." ADD   `login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_user','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user')." ADD   `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_user','update_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user')." ADD   `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_user','storey')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user')." ADD   `storey` varchar(255) NOT NULL DEFAULT ' ' COMMENT '楼层信息'");}
if(!pdo_fieldexists('longbing_shequpintuan_user','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user')." ADD   `status` int(1) NOT NULL DEFAULT '0' COMMENT '是否封杀:0=正常;1=封杀'");}
if(!pdo_fieldexists('longbing_shequpintuan_user','cash')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user')." ADD   `cash` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '余额'");}
if(!pdo_fieldexists('longbing_shequpintuan_user','fx_pid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user')." ADD   `fx_pid` int(11) NOT NULL DEFAULT '0' COMMENT '上级用户id'");}
if(!pdo_fieldexists('longbing_shequpintuan_user','fx_cash')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user')." ADD   `fx_cash` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '分销佣金'");}
if(!pdo_fieldexists('longbing_shequpintuan_user','integral')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user')." ADD   `integral` int(11) NOT NULL DEFAULT '0' COMMENT '积分'");}
if(!pdo_fieldexists('longbing_shequpintuan_user','last_sign_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user')." ADD   `last_sign_time` varchar(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_user','total_sign_day')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user')." ADD   `total_sign_day` int(11) NOT NULL DEFAULT '0'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_user_address_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `address` varchar(625) NOT NULL DEFAULT '0' COMMENT '楼层信息',
  `user_name` varchar(625) NOT NULL DEFAULT '0' COMMENT '收货人姓名',
  `mobile` varchar(64) NOT NULL DEFAULT '0' COMMENT '收货人电话',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1默认',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1963 DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_user_address_info','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_address_info')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_user_address_info','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_address_info')." ADD   `uniacid` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_user_address_info','user_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_address_info')." ADD   `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户id'");}
if(!pdo_fieldexists('longbing_shequpintuan_user_address_info','address')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_address_info')." ADD   `address` varchar(625) NOT NULL DEFAULT '0' COMMENT '楼层信息'");}
if(!pdo_fieldexists('longbing_shequpintuan_user_address_info','user_name')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_address_info')." ADD   `user_name` varchar(625) NOT NULL DEFAULT '0' COMMENT '收货人姓名'");}
if(!pdo_fieldexists('longbing_shequpintuan_user_address_info','mobile')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_address_info')." ADD   `mobile` varchar(64) NOT NULL DEFAULT '0' COMMENT '收货人电话'");}
if(!pdo_fieldexists('longbing_shequpintuan_user_address_info','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_address_info')." ADD   `status` int(11) NOT NULL DEFAULT '0' COMMENT '1默认'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_user_fx` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `balance` int(11) NOT NULL DEFAULT '0' COMMENT '分销比列',
  `level` int(11) NOT NULL DEFAULT '1' COMMENT '等级',
  `create_time` varchar(32) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_user_fx','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_fx')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_user_fx','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_fx')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_user_fx','balance')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_fx')." ADD   `balance` int(11) NOT NULL DEFAULT '0' COMMENT '分销比列'");}
if(!pdo_fieldexists('longbing_shequpintuan_user_fx','level')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_fx')." ADD   `level` int(11) NOT NULL DEFAULT '1' COMMENT '等级'");}
if(!pdo_fieldexists('longbing_shequpintuan_user_fx','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_fx')." ADD   `create_time` varchar(32) NOT NULL DEFAULT '0' COMMENT '创建时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_user_fx_record` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `cid` int(11) NOT NULL DEFAULT '0' COMMENT '下级用户id',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `cash` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '佣金',
  `time` varchar(32) NOT NULL DEFAULT '0' COMMENT '时间',
  `status` int(11) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1' COMMENT '等级',
  `order_id` int(11) NOT NULL DEFAULT '0' COMMENT '订单id',
  `order_code` varchar(255) NOT NULL DEFAULT '0' COMMENT '订单号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_user_fx_record','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_fx_record')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_user_fx_record','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_fx_record')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_user_fx_record','cid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_fx_record')." ADD   `cid` int(11) NOT NULL DEFAULT '0' COMMENT '下级用户id'");}
if(!pdo_fieldexists('longbing_shequpintuan_user_fx_record','uid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_fx_record')." ADD   `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户id'");}
if(!pdo_fieldexists('longbing_shequpintuan_user_fx_record','cash')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_fx_record')." ADD   `cash` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '佣金'");}
if(!pdo_fieldexists('longbing_shequpintuan_user_fx_record','time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_fx_record')." ADD   `time` varchar(32) NOT NULL DEFAULT '0' COMMENT '时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_user_fx_record','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_fx_record')." ADD   `status` int(11) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_user_fx_record','level')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_fx_record')." ADD   `level` int(11) NOT NULL DEFAULT '1' COMMENT '等级'");}
if(!pdo_fieldexists('longbing_shequpintuan_user_fx_record','order_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_fx_record')." ADD   `order_id` int(11) NOT NULL DEFAULT '0' COMMENT '订单id'");}
if(!pdo_fieldexists('longbing_shequpintuan_user_fx_record','order_code')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_fx_record')." ADD   `order_code` varchar(255) NOT NULL DEFAULT '0' COMMENT '订单号'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_user_token` (
  `token` varchar(50) NOT NULL COMMENT 'Token',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员ID',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `expiretime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '过期时间',
  PRIMARY KEY (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='会员Token表';

");

if(!pdo_fieldexists('longbing_shequpintuan_user_token','token')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_token')." ADD 
  `token` varchar(50) NOT NULL COMMENT 'Token'");}
if(!pdo_fieldexists('longbing_shequpintuan_user_token','user_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_token')." ADD   `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_user_token','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_token')." ADD   `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_user_token','expiretime')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_user_token')." ADD   `expiretime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '过期时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_userwallet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `cap_id` int(10) NOT NULL DEFAULT '0' COMMENT '团长ID',
  `wall_code` varchar(32) NOT NULL DEFAULT '' COMMENT '提现流水号',
  `wall_fee` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '提现金额',
  `wall_data` varchar(2500) NOT NULL DEFAULT '' COMMENT '提现返回序列化',
  `wall_user_data` varchar(2500) NOT NULL DEFAULT '' COMMENT '提现信息序列化',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一用户',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '是否提现',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='提现表';

");

if(!pdo_fieldexists('longbing_shequpintuan_userwallet','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_userwallet')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_userwallet','cap_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_userwallet')." ADD   `cap_id` int(10) NOT NULL DEFAULT '0' COMMENT '团长ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_userwallet','wall_code')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_userwallet')." ADD   `wall_code` varchar(32) NOT NULL DEFAULT '' COMMENT '提现流水号'");}
if(!pdo_fieldexists('longbing_shequpintuan_userwallet','wall_fee')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_userwallet')." ADD   `wall_fee` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '提现金额'");}
if(!pdo_fieldexists('longbing_shequpintuan_userwallet','wall_data')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_userwallet')." ADD   `wall_data` varchar(2500) NOT NULL DEFAULT '' COMMENT '提现返回序列化'");}
if(!pdo_fieldexists('longbing_shequpintuan_userwallet','wall_user_data')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_userwallet')." ADD   `wall_user_data` varchar(2500) NOT NULL DEFAULT '' COMMENT '提现信息序列化'");}
if(!pdo_fieldexists('longbing_shequpintuan_userwallet','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_userwallet')." ADD   `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_userwallet','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_userwallet')." ADD   `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一用户'");}
if(!pdo_fieldexists('longbing_shequpintuan_userwallet','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_userwallet')." ADD   `status` int(1) NOT NULL DEFAULT '0' COMMENT '是否提现'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_virtual_record` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0' COMMENT '订单id',
  `order_code` varchar(255) NOT NULL DEFAULT '0' COMMENT '订单编号',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '核销人员',
  `user_name` varchar(255) NOT NULL DEFAULT '0' COMMENT '核销人姓名',
  `time` varchar(64) NOT NULL DEFAULT '0' COMMENT '核销时间',
  `goods_name` varchar(255) NOT NULL DEFAULT '0' COMMENT '商品名字',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_virtual_record','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_virtual_record')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_virtual_record','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_virtual_record')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_virtual_record','order_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_virtual_record')." ADD   `order_id` int(11) NOT NULL DEFAULT '0' COMMENT '订单id'");}
if(!pdo_fieldexists('longbing_shequpintuan_virtual_record','order_code')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_virtual_record')." ADD   `order_code` varchar(255) NOT NULL DEFAULT '0' COMMENT '订单编号'");}
if(!pdo_fieldexists('longbing_shequpintuan_virtual_record','user_id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_virtual_record')." ADD   `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '核销人员'");}
if(!pdo_fieldexists('longbing_shequpintuan_virtual_record','user_name')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_virtual_record')." ADD   `user_name` varchar(255) NOT NULL DEFAULT '0' COMMENT '核销人姓名'");}
if(!pdo_fieldexists('longbing_shequpintuan_virtual_record','time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_virtual_record')." ADD   `time` varchar(64) NOT NULL DEFAULT '0' COMMENT '核销时间'");}
if(!pdo_fieldexists('longbing_shequpintuan_virtual_record','goods_name')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_virtual_record')." ADD   `goods_name` varchar(255) NOT NULL DEFAULT '0' COMMENT '商品名字'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_web_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示',
  `captain` text NOT NULL COMMENT '团长介绍',
  `supplier` text NOT NULL COMMENT '供应商介绍',
  `privacy` text NOT NULL COMMENT '隐私政策',
  `accredited` text NOT NULL COMMENT '授权介绍',
  `is_supplier` int(1) NOT NULL DEFAULT '1' COMMENT '供应商菜单开关',
  `app_bg_color` varchar(255) NOT NULL DEFAULT '' COMMENT '背景颜色',
  `user_center_color` int(1) NOT NULL DEFAULT '1' COMMENT '背景颜色',
  `bottom_nav` int(1) NOT NULL DEFAULT '1' COMMENT '底部导航栏',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniacid` (`uniacid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COMMENT='网站配置表';

");

if(!pdo_fieldexists('longbing_shequpintuan_web_config','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_web_config')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID'");}
if(!pdo_fieldexists('longbing_shequpintuan_web_config','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_web_config')." ADD   `uniacid` int(10) NOT NULL DEFAULT '0' COMMENT '微擎唯一标示'");}
if(!pdo_fieldexists('longbing_shequpintuan_web_config','captain')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_web_config')." ADD   `captain` text NOT NULL COMMENT '团长介绍'");}
if(!pdo_fieldexists('longbing_shequpintuan_web_config','supplier')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_web_config')." ADD   `supplier` text NOT NULL COMMENT '供应商介绍'");}
if(!pdo_fieldexists('longbing_shequpintuan_web_config','privacy')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_web_config')." ADD   `privacy` text NOT NULL COMMENT '隐私政策'");}
if(!pdo_fieldexists('longbing_shequpintuan_web_config','accredited')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_web_config')." ADD   `accredited` text NOT NULL COMMENT '授权介绍'");}
if(!pdo_fieldexists('longbing_shequpintuan_web_config','is_supplier')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_web_config')." ADD   `is_supplier` int(1) NOT NULL DEFAULT '1' COMMENT '供应商菜单开关'");}
if(!pdo_fieldexists('longbing_shequpintuan_web_config','app_bg_color')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_web_config')." ADD   `app_bg_color` varchar(255) NOT NULL DEFAULT '' COMMENT '背景颜色'");}
if(!pdo_fieldexists('longbing_shequpintuan_web_config','user_center_color')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_web_config')." ADD   `user_center_color` int(1) NOT NULL DEFAULT '1' COMMENT '背景颜色'");}
if(!pdo_fieldexists('longbing_shequpintuan_web_config','bottom_nav')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_web_config')." ADD   `bottom_nav` int(1) NOT NULL DEFAULT '1' COMMENT '底部导航栏'");}
if(!pdo_fieldexists('longbing_shequpintuan_web_config','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_web_config')." ADD   PRIMARY KEY (`id`)");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_longbing_shequpintuan_wxapp_link` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '0' COMMENT '小程序名字',
  `link` varchar(255) NOT NULL DEFAULT '0' COMMENT '链接',
  `img` varchar(625) NOT NULL DEFAULT '0' COMMENT '图片',
  `create_time` varchar(64) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

");

if(!pdo_fieldexists('longbing_shequpintuan_wxapp_link','id')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_wxapp_link')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('longbing_shequpintuan_wxapp_link','uniacid')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_wxapp_link')." ADD   `uniacid` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('longbing_shequpintuan_wxapp_link','name')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_wxapp_link')." ADD   `name` varchar(255) NOT NULL DEFAULT '0' COMMENT '小程序名字'");}
if(!pdo_fieldexists('longbing_shequpintuan_wxapp_link','link')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_wxapp_link')." ADD   `link` varchar(255) NOT NULL DEFAULT '0' COMMENT '链接'");}
if(!pdo_fieldexists('longbing_shequpintuan_wxapp_link','img')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_wxapp_link')." ADD   `img` varchar(625) NOT NULL DEFAULT '0' COMMENT '图片'");}
if(!pdo_fieldexists('longbing_shequpintuan_wxapp_link','create_time')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_wxapp_link')." ADD   `create_time` varchar(64) NOT NULL");}
if(!pdo_fieldexists('longbing_shequpintuan_wxapp_link','status')) {pdo_query("ALTER TABLE ".tablename('longbing_shequpintuan_wxapp_link')." ADD   `status` int(11) NOT NULL DEFAULT '0' COMMENT '状态'");}
