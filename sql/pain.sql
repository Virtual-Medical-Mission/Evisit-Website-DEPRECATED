CREATE TABLE `pain` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `painX` varchar(255) DEFAULT NULL,
  `painY` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `internal` varchar(255) DEFAULT NULL,
  `uid` bigint DEFAULT NULL,
  `apid` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) 
