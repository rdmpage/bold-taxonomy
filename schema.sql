CREATE TABLE `bold` (
  `taxid` int(11) unsigned NOT NULL,
  `taxon` varchar(255) DEFAULT NULL,
  `tax_rank` varchar(64) DEFAULT NULL,
  `tax_division` varchar(64) DEFAULT NULL,
  `parentid` int(11) DEFAULT NULL,
  `parentname` varchar(255) DEFAULT NULL,
  `taxonrep` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`taxid`),
  KEY `taxon` (`taxon`),
  KEY `tax_rank` (`tax_rank`),
  KEY `tax_division` (`tax_division`),
  KEY `parentid` (`parentid`),
  KEY `parentname` (`parentname`),
  KEY `taxonrep` (`taxonrep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
