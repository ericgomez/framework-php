<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

$container = require __DIR__ . '/../bootstrap/container.php';
