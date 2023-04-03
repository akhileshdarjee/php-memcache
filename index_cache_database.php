<?php

require_once("cache.php");

$host = "localhost";
$user = "user";
$password = "password";
$database = "database";
$key = "key";
$cache = new Cache();

if ($cache->has($key)) {
	$cachedData = $cache->get($key);
	print "Data retrieved from MemCached (^_^)";
	print "\n";
}
else {
	$connection = new mysqli($host, $user, $password, $database) or die(mysqli_error());

	$query = "SELECT id, name, display_name, table_name, controller_name, slug FROM oc_modules WHERE active = 1";
	$result = $connection->query($query);
	$rows = $result->fetch_all(MYSQLI_ASSOC);
	$connection->close();

	$cache->set($key, $rows);
	$cachedData = $cache->get($key);
	print "Data retrieved from database (-_-)";
	print "\n";
}

if ($cachedData) {
	print_r($cachedData);
} else {
	die("Cache cannot be created :'(");
}

?>
