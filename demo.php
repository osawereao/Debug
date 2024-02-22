<?php
require 'debug.php';
function isName(&$name = null){
	$name = 'John';
}

$name = null;
isName($name);
DebugX::dump($name);