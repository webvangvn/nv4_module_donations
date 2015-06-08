<?php

/**
 * @Project NUKEVIET 4.x
 * @Author Webvang (hoang.nguyen@webvang.vn)
 * @Copyright (C) 2015 webvang.vn. All rights reserved
 * @Createdate Tue, 02 Jun 2015 16:35:15 GMT
 */

if ( ! defined( 'NV_MAINFILE' ) ) die( 'Stop!!!' );

$sql_drop_module = array();
$sql_drop_module[] = "DROP TABLE IF EXISTS ".$db_config['prefix']."_".$lang."_".$module_data."_donations_group";

$sql_drop_module[] = "DROP TABLE IF EXISTS ".$db_config['prefix']."_".$lang."_".$module_data."_donations_unit";

$sql_drop_module[] = "DROP TABLE IF EXISTS ".$db_config['prefix']."_".$lang."_".$module_data."_material_donations";

$sql_drop_module[] = "DROP TABLE IF EXISTS ".$db_config['prefix']."_".$lang."_".$module_data."_payment_online";

$sql_drop_module[] = "DROP TABLE IF EXISTS ".$db_config['prefix']."_".$lang."_".$module_data."_units";

$sql_drop_module[] = "DROP TABLE IF EXISTS ".$db_config['prefix']."_".$lang."_".$module_data."_letters_of_thanks";


$sql_create_module = $sql_drop_module;
$sql_create_module[] = "CREATE TABLE ".$db_config['prefix']."_".$lang."_".$module_data."_donations_group (
  groupid mediumint(8) unsigned NOT NULL auto_increment,
  who_view tinyint(2) unsigned NOT NULL default '0',
  groups_view varchar(255) NOT NULL default '',
  vi_title varchar(255) NOT NULL default '',
  vi_alias varchar(255) NOT NULL default '',
  vi_description varchar(255) NOT NULL default '',
  vi_keywords text NOT NULL,
  PRIMARY KEY  (groupid),
  UNIQUE KEY vi_alias (vi_alias),
  KEY parentid (parentid)
) ENGINE=MyISAM;";

$sql_create_module[] = "CREATE TABLE ".$db_config['prefix']."_".$lang."_".$module_data."_donations_unit (
  donations_id int(11) unsigned NOT NULL auto_increment,
  donations_code varchar(30) NOT NULL default '',
  donations_name varchar(255) NOT NULL,
  donations_email varchar(255) NOT NULL,
  donations_address text NOT NULL,
  donations_phone varchar(20) NOT NULL,
  people_get_help text NOT NULL,
  unit_total char(3) NOT NULL,
  donations_time int(11) unsigned NOT NULL default '0',
  form varchar(20) NOT NULL,
  PRIMARY KEY  (donations_id),
  UNIQUE KEY donations_code (order_code),
) ENGINE=MyISAM;";

$sql_create_module[] = "CREATE TABLE ".$db_config['prefix']."_".$lang."_".$module_data."_material_donations (
  donations_id int(11) unsigned NOT NULL auto_increment,
  donations_code varchar(30) NOT NULL default '',
  donations_name varchar(255) NOT NULL,
  donations_email varchar(255) NOT NULL,
  donations_address text NOT NULL,
  donations_phone varchar(20) NOT NULL,
  people_get_help text NOT NULL,
  listid text NOT NULL,
  listnum text NOT NULL,
  donations_time int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (donations_id),
  UNIQUE KEY donations_code (order_code),
) ENGINE=MyISAM;";

$sql_create_module[] = "CREATE TABLE ".$db_config['prefix']."_".$lang."_".$module_data."_payment_online (
  payment varchar(100) NOT NULL,
  paymentname varchar(255) NOT NULL,
  domain varchar(255) NOT NULL,
  active tinyint(4) NOT NULL default '0',
  weight int(11) NOT NULL default '0',
  config text NOT NULL,
  images_button varchar(255) NOT NULL,
  PRIMARY KEY  (payment)
) ENGINE=MyISAM;";

$sql_create_module[] = "CREATE TABLE ".$db_config['prefix']."_".$lang."_".$module_data."_units (
  id int(11) NOT NULL auto_increment,
  vi_title varchar(255) NOT NULL default '',
  vi_note text NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM;";

$sql_create_module[] = "CREATE TABLE ".$db_config['prefix']."_".$lang."_".$module_data."_letters_of_thanks (
id int(11) NOT NULL auto_increment,
vi_title varchar(255) NOT NULL default '',
vi_note text NOT NULL,
vi_url_mail varchar(255) NOT NULL 
vi_conten text NOT NULL,
PRIMARY KEY (id)
) ENGINE=MyISAM;";