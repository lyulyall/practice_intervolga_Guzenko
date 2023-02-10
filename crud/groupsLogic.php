<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/php/db.php';

class GroupsTable
{
	public static function addGroups()
	{
		if (array_key_exists('addGroups', $_POST))
		{
			if ( !empty($_POST['specialty']))
			{
				$serv['specialty'] = htmlspecialchars($_POST['specialty']);
				$sql = "INSERT INTO `groups` (`specialty`) VALUES (:specialty)";

				$pdo = dbconnect();
				$stmt = $pdo->prepare($sql);
				$stmt->execute($serv);
				header('Location: /practice_intervolga/php/groups.php');
			}
			else
			{
				echo "<script>alert(\"Ошибка! Все поля должны быть заполнены\");</script>";
			}
		}
	}

	public static function changeGroups()
	{
		if (array_key_exists('saveStudent', $_POST))
		{
			if ( !empty($_POST['specialty']))
			{
				$serv['id']=$_GET['id'];
				$serv['specialty']= htmlspecialchars($_POST['specialty']);

				$sql = "UPDATE `groups` SET `specialty`=:specialty WHERE `id`=:id";

				$pdo = dbconnect();
				$stmt = $pdo->prepare($sql);
				$stmt->execute($serv);
				header('Location: /practice_intervolga/php/groups.php');
			}
			else
			{
				echo "<script>alert(\"Ошибка! Поля не должны быть пустые\");</script>";
			}
		}
	}
}
?>