<?php 

$query['pavmegamenu'][]  = "DELETE FROM `".DB_PREFIX ."setting` WHERE `code`='pavmegamenu' and `key` = 'pavmegamenu_module'";

$query['pavmegamenu'][]  = "DELETE FROM `".DB_PREFIX ."setting` WHERE `code`='pavmegamenu_params' and `key` = 'params'";
$query['pavmegamenu'][] =  " 
INSERT INTO `".DB_PREFIX ."setting` (`setting_id`, `store_id`, `code`, `key`, `value`, `serialized`) VALUES
(6782, 0, 'pavmegamenu_params', 'pavmegamenu_params', '[{\"submenu\":1,\"subwidth\":900,\"id\":2,\"align\":\"aligned-left\",\"group\":0,\"cols\":3,\"rows\":[{\"cols\":[{\"type\":\"menu\",\"colwidth\":4,\"colclass\":\"\"},{\"type\":\"menu\",\"colwidth\":4},{\"type\":\"menu\",\"colwidth\":4}]}]},{\"id\":8,\"group\":1,\"cols\":1,\"submenu\":1,\"align\":\"aligned-left\",\"rows\":[]},{\"id\":9,\"group\":1,\"cols\":1,\"submenu\":1,\"align\":\"aligned-left\",\"rows\":[]},{\"id\":3,\"group\":0,\"cols\":1,\"submenu\":1,\"align\":\"aligned-left\",\"rows\":[{\"cols\":[{\"type\":\"menu\",\"colwidth\":12}]}]},{\"id\":26,\"group\":0,\"cols\":1,\"submenu\":1,\"align\":\"aligned-left\",\"rows\":[{\"cols\":[{\"type\":\"menu\",\"colwidth\":12}]}]},{\"id\":27,\"group\":0,\"cols\":1,\"submenu\":1,\"align\":\"aligned-left\",\"rows\":[{\"cols\":[{\"type\":\"menu\",\"colwidth\":12}]}]}]', 0);

";

$query['pavblog'][] ="
INSERT INTO `".DB_PREFIX ."layout_route` (`layout_route_id`, `layout_id`, `store_id`, `route`) VALUES
(0, 14, 0, 'pavblog/%');
";
$query['pavblog'][] ="
INSERT INTO `".DB_PREFIX ."layout` (`layout_id`, `name`) VALUES
(0, 'Pav Blog');
";
?>