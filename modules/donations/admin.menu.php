<?php

/**
 * @Project NUKEVIET 4.x
 * @Author Webvang (hoang.nguyen@webvang.vn)
 * @Copyright (C) 2015 webvang.vn. All rights reserved
 * @Createdate Tue, 02 Jun 2015 16:35:15 GMT
 */
 
if( ! defined( 'NV_ADMIN' ) ) die( 'Stop!!!' );

if( ! function_exists('nv_news_array_cat_admin') )
{
	/**
	 * nv_news_array_cat_admin()
	 *
	 * @return
	 */
	function nv_news_array_cat_admin( $module_data )
	{
		global $db;

		$array_cat_admin = array();
		$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_admins ORDER BY userid ASC';
		$result = $db->query( $sql );

		while( $row = $result->fetch() )
		{
			$array_cat_admin[$row['userid']][$row['catid']] = $row;
		}

		return $array_cat_admin;
	}
}

$is_refresh = false;
$array_cat_admin = nv_news_array_cat_admin( $module_data );

if( ! empty( $module_info['admins'] ) )
{
	$module_admin = explode( ',', $module_info['admins'] );
	foreach( $module_admin as $userid_i )
	{
		if( ! isset( $array_cat_admin[$userid_i] ) )
		{
			$db->query( 'INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_admins (userid, catid, admin, add_content, pub_content, edit_content, del_content) VALUES (' . $userid_i . ', 0, 1, 1, 1, 1, 1)' );
			$is_refresh = true;
		}
	}
}
if( $is_refresh )
{
	$array_cat_admin = nv_news_array_cat_admin( $module_data );
}

$admin_id = $admin_info['admin_id'];
$NV_IS_ADMIN_MODULE = false;
$NV_IS_ADMIN_FULL_MODULE = false;
if( defined( 'NV_IS_SPADMIN' ) )
{
	$NV_IS_ADMIN_MODULE = true;
	$NV_IS_ADMIN_FULL_MODULE = true;
}
else
{
	if( isset( $array_cat_admin[$admin_id][0] ) )
	{
		$NV_IS_ADMIN_MODULE = true;
		if( intval( $array_cat_admin[$admin_id][0]['admin'] ) == 2 )
		{
			$NV_IS_ADMIN_FULL_MODULE = true;
		}
	}
}

$allow_func = array( 'main', 'view', 'stop', 'publtime', 'waiting', 'declined', 're-published', 'content', 'rpc', 'del_content', 'alias', 'topicajax', 'sourceajax', 'tagsajax' );

if( ! isset( $site_mods['cms'] ) )
{
	$submenu['content'] = $lang_module['content_add'];
}

if( $NV_IS_ADMIN_MODULE )
{
	
	$submenu['add_group'] = $lang_module['add_group'];
	$submenu['add_unit'] = $lang_module['add_unit'];
	$submenu['add_currency'] = $lang_module['add_currency'];
	$submenu['add_donations'] = $lang_module['add_donations'];
	$submenu['letters_of_thanks'] = $lang_module['letters_of_thanks'];
	$submenu['payment_online'] = $lang_module['payment_online'];
	$submenu['config'] = $lang_module['config'];
	
	$allow_func[] = 'add_group';
	$allow_func[] = 'change_group';
	$allow_func[] = 'list_group';
	$allow_func[] = 'del_group';
	
	$allow_func[] = 'add_unit';
	$allow_func[] = 'change_unit';
	$allow_func[] = 'list_unit';
	$allow_func[] = 'del_unit';
	
	$allow_func[] = 'add_currency';
	$allow_func[] = 'change_currency';
	$allow_func[] = 'list_currency';
	$allow_func[] = 'del_currency';
	
	$allow_func[] = 'add_donations';
	$allow_func[] = 'change_donations';
	$allow_func[] = 'list_donations';
	$allow_func[] = 'del_donations';
	
	$allow_func[] = 'letters_of_thanks';
	
	$allow_func[] = 'payment_online';
	
	$allow_func[] = 'config';
	
	
	
	
	
	

}
