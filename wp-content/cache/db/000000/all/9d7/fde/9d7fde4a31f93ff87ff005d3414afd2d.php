¥FOS<?php exit; ?>a:6:{s:10:"last_error";s:0:"";s:10:"last_query";s:302:"
			SELECT instances.raw_url
			FROM wp_kamwvb_blc_instances AS instances JOIN wp_kamwvb_blc_links AS links 
				ON instances.link_id = links.link_id
			WHERE 
				instances.container_type = 'post'
				AND instances.container_id = 1150
				AND links.broken = 1
				AND parser_type = 'link' 
		";s:11:"last_result";a:0:{}s:8:"col_info";a:1:{i:0;O:8:"stdClass":13:{s:4:"name";s:7:"raw_url";s:5:"table";s:9:"instances";s:3:"def";s:0:"";s:10:"max_length";i:0;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:0;s:4:"blob";i:1;s:4:"type";s:4:"blob";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}}s:8:"num_rows";i:0;s:10:"return_val";i:0;}