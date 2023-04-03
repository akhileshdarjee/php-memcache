<?php

$memcache = new Memcached();
$memcache->addServer("127.0.0.1", 11211);

$response = $memcache->get("name");

if ($response) {
	echo $response . "\n";
} else {
	echo "Adding data to cache...\n";
	$memcache->set("name", "Your name has been stored in MemCached (^_^)") or die("Cache cannot be created :'(");
}

?>
