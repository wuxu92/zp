<?php 

if ( !class_exists('\SplClassLoader')) {
	require(__DIR__ . '/spl-class-loader/SplClassLoader.php');
}

$classLoader = new \SplClassLoader('model', dirname(__DIR__) . '/');
$classLoader->register();

$classLoader = new \SplClassLoader('libs', dirname(__DIR__) );
$classLoader->register();

$classLoader = new \SplClassLoader('cat', dirname(__DIR__) );
$classLoader->register();

$classLoader = new \SplClassLoader('test', dirname(__DIR__) );
$classLoader->register();
