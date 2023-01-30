<?php
function DBConnect()
{
	$dsn = 'mysql:host=localhost;dbname=student_rating';
	$user = 'root';
	$passwd = '';

	$pdo = new PDO($dsn, $user, $passwd);
	return $pdo;
}

