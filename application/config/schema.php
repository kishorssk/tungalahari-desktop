<?php

define('DB_SCHEMA', 'CREATE DATABASE IF NOT EXISTS :db CHARACTER SET utf8 COLLATE utf8_general_ci');

define('METADATA_TABLE_L1_SCHEMA', 'CREATE TABLE `' . METADATA_TABLE_L1 . '` (
  `name` varchar(500) NOT NULL,
  `sal` varchar(100) DEFAULT NULL,
  `rollno` varchar(50) DEFAULT NULL,
  `batch_details` varchar(500) DEFAULT NULL,
  `year_awarded` int(10) DEFAULT NULL,
  `info` varchar(2000) DEFAULT NULL,
  `other_awards` varchar(2000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8');


define('CHAR_ENCODING_SCHEMA', 'SET NAMES utf8');

?>
