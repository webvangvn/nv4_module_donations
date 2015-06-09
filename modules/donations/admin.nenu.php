<?php

/**
 * @Project NUKEVIET 3.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2015 VINADES.,JSC. All rights reserved
 * @Createdate Tue, 02 Jun 2015 16:35:15 GMT
 */

if ( ! defined( 'NV_ADMIN' ) or ! defined( 'NV_MAINFILE' ) or ! defined( 'NV_IS_MODADMIN' ) ) die( 'Stop!!!' );

$submenu['main'] = $lang_module['main'];
$submenu['config'] = $lang_module['config'];
$submenu['add_group'] = $lang_module['add_group'];
$submenu['add_unit'] = $lang_module['add_unit'];
$submenu['add_currency'] = $lang_module['add_currency'];
$submenu['add_donations'] = $lang_module['add_donations'];
$submenu['letters_of_thanks'] = $lang_module['letters_of_thanks'];
$submenu['payment_online'] = $lang_module['payment_online'];

$allow_func = array( 'main', 'config', 'groups','del_groups', 'unit', 'del_unit', 'currency', 'del_curency', 'donations', 'del_donations', 'letters_of_thanks', 'payment_online');