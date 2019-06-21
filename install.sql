-- 创建记录表
DROP TABLE IF EXISTS `novelai`;
CREATE TABLE `novelai` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`type` int(11) DEFAULT 0 COMMENT '种类',
	`instr` varchar(255) NOT NULL COMMENT '用户输入',
	`outstr` varchar(255) COMMENT 'AI输出',
	`wrong` int(11) DEFAULT 0 COMMENT '错误',
	`count` int(11) DEFAULT 0 COMMENT '次数',
	`create_time` bigint COMMENT '创建时间',
	`update_time` bigint COMMENT '修改时间',
	PRIMARY KEY(`id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;