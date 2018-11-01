
CREATE TABLE `fontsvn_identities` (
  `id` mediumint(24) NOT NULL AUTO_INCREMENT,
  `identity` varchar(45) DEFAULT '',
  `base` varchar(1) DEFAULT '',
  `second` varchar(2) DEFAULT '',
  `thirds` varchar(3) DEFAULT '',
  `downloads` int(13) DEFAULT '0',
  `views` int(13) DEFAULT '0',
  `glyphs` LONGBLOB,
  `name` varchar(255) DEFAULT '',
  `tags` varchar(255) DEFAULT '',
  `barcode` varchar(32) DEFAULT '',
  `referee` varchar(128) DEFAULT '',
  `filename` varchar(128) DEFAULT '',
  `preview` varchar(255) DEFAULT '',
  `naming` varchar(255) DEFAULT '',
  `css` varchar(255) DEFAULT '',
  `created` int(13) DEFAULT '0',  
  `verify` int(13) DEFAULT '0',
  `verified` int(13) DEFAULT '0',
  `files` int(13) DEFAULT '0',
  `missing` int(13) DEFAULT '0',
  `last` int(13) DEFAULT '0',
  `downloaded` int(13) DEFAULT '0',
  `glyphed` int(13) DEFAULT '0',
  `notified` int(13) DEFAULT '0',
  `articleid` int(13) DEFAULT '0',
  `validation` LONGBLOB,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `fontsvn_indexes` (
  `id` mediumint(24) NOT NULL AUTO_INCREMENT,
  `parent_id` mediumint(24) NOT NULL DEFAULT '0',
  `base` varchar(3) DEFAULT '',
  `fonts` int(13) DEFAULT '0',
  `downloads` int(13) DEFAULT '0',
  `views` int(13) DEFAULT '0',
  `last` int(13) DEFAULT '0',
  `notified` int(13) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `fontsvn_identities_indexes` (
  `id` mediumint(27) NOT NULL AUTO_INCREMENT,
  `index_id` mediumint(24) NOT NULL DEFAULT '0',
  `identity_id` mediumint(24) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
