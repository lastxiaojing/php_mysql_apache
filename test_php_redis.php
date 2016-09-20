// php 连接和简单使用redis的例子

<?php

       	// Connecting to Redis server on localhost
       	$redis = new Redis();
       	$redis->connect('127.0.0.1', 6379);
       	echo "Connecting to server successfully";
       	echo "\n";
       	// check whether server is running or not
       	echo "Server is running: " . $redis->ping();
       	echo "\n";

       	// Set the data in redis string
       	$redis->set("tutorial-name", "Redis tutorial");
       	// Get the stored data and print it
       	echo "Stored string in redis:: " . $redis->get("tutorial-name");
       	echo "\n";

       	// store data in redis list
       	$redis->lpush("tutorial-list", "Redis");
       	$redis->lpush("tutorial-list", "Mongodb");
       	$redis->lpush("tutorial-list", "Mysql");
       	// Get the stored data and print it
       	$arList = $redis->lrange("tutorial-list", 0, 5);
       	echo "Stored string in redis:: ";
       	print_r($arList);

       	// Redis Php Keys Example
       	$arList = $redis->keys("*");
       	echo "Stored keys in redis:: ";
       	print_r($arList);
?>
