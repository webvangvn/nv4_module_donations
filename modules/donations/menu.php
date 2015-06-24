<?php

/**
 * @Project NUKEVIET 4.x
 * @Author Webvang (hoang.nguyen@webvang.vn)
 * @Copyright (C) 2015 VINADES.,JSC. All rights reserved
 * @Createdate Tue, 02 Jun 2015 16:35:15 GMT
 */
if( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$sql = 'SELECT id, title, alias FROM ' . NV_PREFIXLANG . '_' . $mod_data . ' ORDER BY weight ASC';
$result = $db->query( $sql );
while( $row = $result->fetch() )
{
	$array_item[$row['id']] = array(
		'groups_view' => $row['groups_view'],
		'key' => $row['id'],
		'title' => $row['title'],
		'alias' => $row['alias'] . $global_config['rewrite_exturl'],
	);
}
