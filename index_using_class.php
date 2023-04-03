<?php

require_once("cache.php");

$cache = new Cache();
$response = $cache->get("full_name");

if ($response) {
	echo $response . "\n";
} else {
	echo "Adding data to cache...\n";
	$cache->set("full_name", "Your full name has been stored in MemCached (^_^)") or die("Cache cannot be created :'(");
}

?>
